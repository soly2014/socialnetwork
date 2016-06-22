<?php

namespace Facemash\Http\Controllers;

use Illuminate\Http\Request;

use Facemash\Http\Requests;
use Facemash\Http\Controllers\Controller;
use Facemash\User;
use Facemash\Friends;
use DB;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile($username)
    {

        $user = User::where('username',$username)->first();
        if(!$user){

            abort(404);
        }
        return view('profile')->with('user',$user);
    }
      

      public function getUpdate($id)
     {
        return view('update');
        }


    public function postUpdate(Request $request,$id)
    {
        $this->validate($request, [
        'name'     => 'max:255',
        'location' => 'max:20',
        'email'    => 'email',
    ]);

        Auth::user()->update([
        'name'           => $request->input('name'),
        'email'          => $request->input('email'),
        'location'       => $request->input('location'),


            ]);

        return redirect()->route('update')->with('info','your profile has been updated');
    }

     public function addFriend($username)
     {

        $friend_id   = Auth::user()->id;
        $user_id = User::where('username',$username)->first()->id;
        $accepted  = false;

        $friend  = new Friends;
        $friend->user_id = $user_id;
        $friend->friend_id = $friend_id;
        $friend->accepted = $accepted;

        $friend->save();

        return redirect()->route('profile',['username'=>$username])->with('info','friend request sent successfully');

     }

     public function acceptFriend($username)
     {
        
             $user = User::where('username',$username)->first()->id;


            Friends::where('user_id',Auth::user()->id )
                             ->where('friend_id', $user)
                             ->update(['accepted' => true]);


        return redirect()->route('profile',['username'=>$username]);
      }
}
