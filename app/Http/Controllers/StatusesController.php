<?php

namespace Facemash\Http\Controllers;

use Illuminate\Http\Request;

use Facemash\Http\Requests;
use Facemash\Http\Controllers\Controller;
use Facemash\User;
use DB;
use Facemash\Statuses;
use Auth;


class StatusesController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postStatus(Request $request)
    {

            $this->validate($request, [
        'status' => 'required|max:1000',
                                        ]);


        $status = new Statuses;

        $status->body    = $request->status;
        $status->user_id = Auth::user()->id;

        $status->save();

        return redirect()->route('timeline');

    }

    public function replyStatus($id,Request $request)
    {
        
            $this->validate($request, [
        "reply-{$id}" => 'required|max:1000',
                                        ]);
        $status = new Statuses;

                $status->body = $request->input("reply-{$id}");
                $status->user_id     = Auth::user()->id;
                $status->parent_id    = $id;
        $status->save();


        return redirect()->route('timeline');


    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
