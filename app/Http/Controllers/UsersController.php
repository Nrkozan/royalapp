<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /*
     * Get all users
     * @param Request $request
     */
    public function index(Request $request)
    {
        $user = getMe();
        return view('editProfile', compact('user'));
    }

    /*
     * Get user by id
     * @param Request $request
     */
    public function putProfile(Request $request)
    {
        //maybe todo
    }
}
