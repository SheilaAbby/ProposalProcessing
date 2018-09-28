<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Proposal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;

        $acceptedProposal=Proposal::where('user_id',$id)
                                    ->where('Status','Accepted')
                                    ->get();
        $rejectedProposal=Proposal::where('user_id',$id)
                                    ->where('Status','Rejected')
                                    ->get();


        return view('home',compact(['acceptedProposal','rejectedProposal']));
    }
}
