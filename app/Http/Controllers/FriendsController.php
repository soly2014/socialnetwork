<?php

namespace Facemash\Http\Controllers;

use Illuminate\Http\Request;

use Facemash\Http\Requests;
use Facemash\Http\Controllers\Controller;
use Facemash\User;
use DB;
use Auth;


class FriendsController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $friends = Auth::user()->friends();
        return view('friends')
                        ->with('friends',$friends);
    }

}
