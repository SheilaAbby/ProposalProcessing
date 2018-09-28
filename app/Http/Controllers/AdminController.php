<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\User;
use DB;
use Session;
use Notification;
use App\Notifications\ProposalAccepted;
use App\Notifications\proposalRejected;



class AdminController extends Controller
{

 public function index(){

 	$sentProposals=Proposal::select("*")
 				  ->whereNotNull('submitted_at')->simplePaginate(10);
 	return view('admin.index',compact('sentProposals'));
 }

  
public function proposalUpdates(Request $request,$id){


    	 switch($request->statusButton) {

             case 'move_to_stage1': 
                    //action for save-draft.
             
             $proposal=DB::table('proposals')->where('id',$id)->update(['Status'=>'Moved to Stage 1']);

			 Session::flash('alert-success','Success!Proposal Moved to Stage 1!');

           	Return redirect()->route('admin.index');

           	break;

           		case 'move_to_stage2': 

               $proposal=DB::table('proposals')->where('id',$id)->update(['Status'=>'Moved to Stage 2']);

          		 Session::flash('alert-success','Success!Proposal Moved to Stage 2!');

          			 Return redirect()->route('admin.index');

            break;

              case 'accept': 

              // $proposal=DB::table('proposals')->where('id',$id)->update(['Status'=>'Accepted']);

               $p=Proposal::find($id);
               $user=$p->user;
               $userId=$user->id;

               $proposal=DB::table('proposals')->where('user_id',$userId)->update(['Status'=>'Accepted']);

				//$proposalAccept=Proposal::where('Status','Accepted');

				$user->notify(new ProposalAccepted($p));

         
          		 Session::flash('alert-success','Success!Proposal Accepted!Email sent to the Applicant!');

          			 Return redirect()->route('admin.index');

          			 break;
               
               case 'reject':

              
               $p=Proposal::find($id);
               $user=$p->user;
               $userId=$user->id;

               $proposal=DB::table('proposals')->where('user_id',$userId)->update(['Status'=>'Rejected']);
				$user->notify(new proposalRejected($p));


          		 Session::flash('alert-danger','Proposal Rejected!Email sent to the Applicant');

          		
          			 Return redirect()->route('admin.index');

           		
           		break;
                
            }
          
    	}

  
    //return all newly created proposals whose status is unprocessed.

    public function uprocessedProposals(){

    	$newProposal=Proposal::where('Status','Unprocessed')
    							->whereNotNull('submitted_at')->simplePaginate(5);

    	return view('admin.NewlySentProposals',compact('newProposal'));

    }
    public function showNewProposal($id)
    {
     	$proposal=Proposal::find($id);
		return view('admin.showNewProposal',compact('proposal'));  
    }


    public function Stage_1_Proposals(){
    	$stage1Proposal=Proposal::where('Status','Moved to Stage 1')->simplePaginate(5);

    	return view('admin.viewStage1Proposals',compact('stage1Proposal'));
    }
    public function showStage1Proposal($id)
    {
     	$proposal=Proposal::find($id);
		return view('admin.showStage1Proposal',compact('proposal'));  
    }

    public function Stage_2_Proposals(){
    	$stage2Proposal=Proposal::where('Status','Moved to Stage 2')->simplePaginate(5);

    	return view('admin.viewStage2Proposals',compact('stage2Proposal'));

    }
    public function showStage2Proposal($id)
    {
     	$proposal=Proposal::find($id);
		return view('admin.showStage2Proposal',compact('proposal'));  
    }

    public function AcceptedProposals(){

    	$accepted_Proposals=Proposal::where('Status','Accepted')->simplePaginate(5);

    	return view('admin.acceptedProposals',compact('accepted_Proposals'));

}
	 public function RejectedProposals(){

    	$rejected_Proposals=Proposal::where('Status','Rejected')->simplePaginate(5);

    	return view('admin.rejectedProposals',compact('rejected_Proposals'));

}


}
