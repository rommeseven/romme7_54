<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * delete a specific notification
     *
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->delete();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }


    /**
     * mark as read a specific notification
     *
     * @param $id
     * @return mixed
     */
    public function markAsRead($id) {
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->delete();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }    
    /**
     * mark as read a specific notification
     *
     * @return mixed
     */
    public function markAllAsRead() {
        $user = \Auth::user();
        $notification = $user->notifications()->delete();
    	return back();
    	
    }    
}
