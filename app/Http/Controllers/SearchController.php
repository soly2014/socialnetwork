<?php

namespace Facemash\Http\Controllers;

use Illuminate\Http\Request;

use Facemash\Http\Requests;
use Facemash\Http\Controllers\Controller;
use Facemash\User;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResults(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return redirect()->route('home');
        }
        
        $search_results = User::where('name','LIKE',"%{$query}%")
                             ->orWhere('username','LIKE',"%{$query}%")
                             ->get();

        return view('search')->with('search_results',$search_results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
