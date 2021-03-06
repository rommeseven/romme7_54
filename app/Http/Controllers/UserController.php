<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\NewUserAdded;
use App\Notifications\UserRoleChanged;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    /*
     * Show the form for creating a new resource.
     *l
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.create");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete())
        {
            Session::flash("success", 'You have deleted User#'.$user->id.' successfully!');
            Session::flash("success_autohide", "4500");
            return redirect("cmseven/users");
        }
        else
        {
            Session::flash("error", "An error occured while removing the user. (ErrCode 39)");
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('backend.users.edit')->withUser($user)->withRoles($roles);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('backend.users.index')->withUsers($users);
    }

    public function search(Request $request)
    {

        $this->validate($request, array(
            'search' => 'required|max:255',
        ));
        $users = User::search($request->input('search'))->paginate(10);
        if (!$users->count())
        {
            Session::flash("error", 'Could not find user with data "'.$request->input('search').'".');
            Session::flash("error_autohide", "4500");
            return redirect('/cmseven/users');
        }
        $searched = $users->count().' User(s) Found:';
        return view('backend.users.index')->withUsers($users)->with("searched", $searched)->with('searchQuery', $request->input('search'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show')->withUser($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'     => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email'    => "required|email|unique:users",
        ));
        $password = '';
        if ($request->has('password') && !empty($request->password))
        {
            $this->validate($request, array(
                'password' => 'confirmed',
            ));
            $password = trim($request->password);
        }
        else
        {
            $length   = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwyxzABCDEFGHJKLMNPQRSTUVWXYZ';
            $max      = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; $i++)
            {
                $password .= $keyspace[random_int(0, $max)];
            }
        }
        $user           = new User();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = Hash::make($password);
        $admins         = User::wherePermissionIs('read_users')->get()->except(auth()->user()->id);
        /*TODO:  [notification] into event listener! */
        Notification::send($admins, new NewUserAdded($user));
        if ($user->save())
        {
            Session::flash("success", "You successfully create this user.");
            Session::flash("success_autohide", "4500");
            return redirect()->route('users.show', $user->id);
        }
        else
        {
            Session::flash("error", "An error occured while creating the user. (ErrCode: 142)");
            Session::flash("error_autohide", "4500");
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $password = null;
        if ($request->has('email') && !empty($request->input('email')))
        {
            $this->validate($request, array(

                'email' => 'email|unique:users,email'.$id,
            ));
        }
        if ($request->has('name') && !empty($request->input('name')))
        {
            $this->validate($request, array(
                'name' => 'max:255',
            ));
        }
        if ($request->has('username') && !empty($request->input('username')))
        {
            $this->validate($request, array(
                'username' => 'max:255|unique:users',
            ));
        }

        if ($request->has('password') && !empty($request->password))
        {
            $this->validate($request, array(
                'password' => 'confirmed'.($request->pwchoice == 'typepw') ? '|required' : '',
            ));
            $password = trim($request->password);
        }
        else if ($request->pwchoice == 'genpw')
        {
            $length   = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwyxzABCDEFGHJKLMNPQRSTUVWXYZ';
            $max      = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; $i++)
            {
                $password .= $keyspace[random_int(0, $max)];
            }
        }
        $user = User::findOrFail($id);

        if (null !== $password)
        {
            $user->password = Hash::make($password);
        }

        $user->name     = (null === $request->input("name")) ? $user->name : $request->input("name");
        $user->username = (null === $request->input("username")) ? $user->username : $request->input("username");
        $user->email    = (null === $request->input("email")) ? $user->email : $request->input("email");

        $user->save();

        if ($request->roles)
        {
            $user->syncRoles(explode(',', $request->roles));
        
            /*TODO:  [notification] into event listener! */
            Notification::send($user, new UserRoleChanged());            
        }

        Session::flash("success", "Your changes have been saved.");
        Session::flash("success_autohide", "4500");
        return redirect()->route('users.show', $user->id);
    }
};
