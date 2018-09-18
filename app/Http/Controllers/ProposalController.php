<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals=Proposal::orderBy('id')->paginate(5);

        return view('admin.dashboard',compact('proposals'))->with('i');
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
            'budget'=>'required|max:10000|mimes:pdf'

           
        ]);

        //handle document upload
        if($request->hasFile('budget')){
            //get filename with the extension
            $filenameWithExt=$request->file('budget')->getClientOriginalName();
            //get the filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET THE EXT
            $extension=$request->file('budget')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('budget')->storeAs('public/budgetDocs',$fileNameToStore);


        }else{
            $fileNameToStore='noDoc.pdf';
        }

            $proposal=new Proposal;

            $proposal->title = $request->input('title');
            $proposal->organization_name = $request->input('organization_name');
            $proposal->address = $request->input('address');
            $proposal->phone = $request->input('phone');
            $proposal->email = $request->input('email');
            $proposal->submitted_by_name = $request->input('submitted_by_name');
            $proposal->summary = $request->input('summary');
            $proposal->background = $request->input('background');
            $proposal->activities = $request->input('activities');
            $proposal->budget =$fileNameToStore;
           $proposal->save();
               

              }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal=Proposal::find($id);
        return view('Proposals.show',compact('proposal'));
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
        //
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
