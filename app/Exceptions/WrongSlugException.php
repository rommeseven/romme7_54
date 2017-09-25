<?php

namespace App\Exceptions;

use App\Notifications\WrongSlugVisited;
use App\User;
use Exception;
use Illuminate\Support\Facades\Notification;

class WrongSlugException extends Exception
{
    private $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return abort(404);
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report()
    {
        $admins = User::whereRoleIs('superadmin')->get();
        Notification::send($admins, new WrongSlugVisited($this->slug));
    }
}
