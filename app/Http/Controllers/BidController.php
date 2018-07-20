<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('user_id',Auth::user()->id)->get();
        $bids = Bid::all();
        $data = [
            'jobs' => $jobs,
            'bids' => $bids,
        ];

        return view('pages.job_dashboard')->with($data);
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
        $validated = $this->validate($request, [
            'description' => 'required',
            'expected' => 'required'
        ]);

        $bid = Bid::create([
            'user_id' => $request->user_id,
            'job_id' => $request->job_id,
            'description' => $request->description,
            'expected' => $request->expected
        ]);

        return redirect('job/'.$request->job_id)->with('message', 'You have successfully bid on this project');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = $this->getJobById($id);
        $bids = Bid::where('job_id',$job->id)->get();

        $data = [
            'job' => $job,
            'bids' => $bids,
        ];

        // dd($bids['1']->user->profile);

        return view('pages.bidder')->with($data);
    }

    public function getJobById($id)
    {
        return Job::find($id)->firstOrFail();
    }

    public function accept(Request $request, $id){
        $bid = Bid::find($id);

        if ($bid){
            $bid->accept = 1;
            $bid->save();
            $message = 'Bid by '.$bid->user->name.' has been accepted';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }else{
            $message = 'Bid by'.$bid->user->name.' is unable to be accepted';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }
    }

    public function reject(Request $request, $id){

    }

    public function done(Request $request, $id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
