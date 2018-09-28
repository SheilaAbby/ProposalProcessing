<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\User;
use Notification;
use App\Notifications\NewProposal;
use Session;
use Auth;
use DB;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => 'required|string|max:255',
            'organization_name'=>'required|string|max:255',
            'address'=>'required',
            'phone'=>'required',
            'email' => 'required|string|email|max:255|unique:users',
            'submitted_by_name'=>'required|string|max:20',
            'summary'=>'required',
            'background'=>'required',
            'activities'=>'required',
            'budget'=>'required|string|max:255'



           
        ]);
        

         switch($request->submitButton) {

             case 'Draft': 
                    //action for save-draft.
              $proposal=new Proposal;

            $proposal->user_id = Auth::user()->id;
            $proposal->title = $request->input('title');
            $proposal->organization_name = $request->input('organization_name');
            $proposal->address = $request->input('address');
            $proposal->phone = $request->input('phone');
            $proposal->email = $request->input('email');
            $proposal->submitted_by_name = $request->input('submitted_by_name');
            $proposal->summary = $request->input('summary');
            $proposal->background = $request->input('background');
            $proposal->activities = $request->input('activities');
            $proposal->budget =$request->input('budget');
            $proposal->save();


           Session::flash('alert-success','Success!Draft saved!.');

           Return redirect()->route('home');



                break;

                case 'Send': 
                    //action for send
            $proposal=new Proposal;

            $proposal->user_id = Auth::user()->id;
            $proposal->title = $request->input('title');
            $proposal->organization_name = $request->input('organization_name');
            $proposal->address = $request->input('address');
            $proposal->phone = $request->input('phone');
            $proposal->email = $request->input('email');
            $proposal->submitted_by_name = $request->input('submitted_by_name');
            $proposal->summary = $request->input('summary');
            $proposal->background = $request->input('background');
            $proposal->activities = $request->input('activities');
            $proposal->budget =$request->input('budget');
            $proposal->submitted_at=now();
           $proposal->save();

                //sending the notification of a newly created proposal to admin dashbord
            
         
           $user=User::find(32);

            $user->notify(new NewProposal);

           Session::flash('alert-success','Success!Proposal Send.');

           Return redirect()->route('home');

           //on sending proposal disable the send button


                break;

                
            }

            
               


   }
  


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
