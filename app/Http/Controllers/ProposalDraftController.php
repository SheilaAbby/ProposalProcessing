<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use Auth;
class ProposalDraftController extends Controller
{
  public function viewSavedDrafts(){

  	$id=Auth::user()->id;

  	$proposal=Proposal::where('user_id',$id)
  						->where('submitted_at',NULL)
  						->get();

  						

  	return view('Proposals.DraftProposals.ShowDrafts',compact('proposal'));
  }


public function EditDraft($id){
	$draft=Proposal::find($id);

  	return view('Proposals.DraftProposals.EditDraft',compact('draft'));
  }


}
