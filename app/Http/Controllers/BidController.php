<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Payment;

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
        foreach ($bids as $bid){
            $payments = Payment::where('bid_id',$bid->id)->get();
        }
        
        $data = [
            'job' => $job,
            'bids' => $bids,
            'payments' => $payments,
        ];

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
            $message = 'Bid by '.$bid->user->name.' has been accepted. Please make and verify your payment in 3 x 24 hours before the bidder will endorse.';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }else{
            $message = 'Bid by'.$bid->user->name.' is unable to be accepted';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }
    }

    public function reject(Request $request, $id){
        $bid = Bid::find($id);

        if ($bid){
            $bid->reject = 1;
            $bid->save();
            $message = 'Bid by '.$bid->user->name.' has been rejected';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }else{
            $message = 'Bid by'.$bid->user->name.' is unable to be rejected';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }
    }

    public function done_owner(Request $request, $id){
        $bid = Bid::find($id);

        if ($bid){
            $bid->done_owner = 1;
            $bid->save();
            $message = 'Bid by '.$bid->user->name.' is done';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }else{
            $message = 'Bid by'.$bid->user->name.' is unable to be marked done';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }
    }

    public function done_influencer(Request $request, $id){
        $bid = Bid::find($id);
        $job = Job::find($bid->job_id);
        
        if ($bid){
            $bid->done_influencer = 1;
            $bid->save();
            $message = 'Bid for "'.$job->title.'" is marked as done. Please wait for the endorser to confirm it before you receive the payment.';
            return redirect('bid_status/'.Auth::user()->id)->with('message', $message);
        }else{
            $message = 'Bid by'.$bid->user->name.' is unable to be marked done';
            return redirect('bid_status/'.Auth::user()->id)->with('message', $message);
        }
    }

    public function cancel(Request $request, $id){
        $bid = Bid::find($id);

        if ($bid){
            $bid->cancel = 1;
            $bid->save();
            $message = 'Bid by '.$bid->user->name.' has been cancelled';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }else{
            $message = 'Bid by'.$bid->user->name.' is unable to be cancelled';
            return redirect('bid/'.$request->job_id)->with('message', $message);
        }
    }

    public function bid_status($id)
    {
        $user = $this->getUserById($id);
        $bids = Bid::where('user_id',$id)->get();
        if (count($bids) > 0){
            foreach ($bids as $bid){
                $jobs = Job::whereId($bid->id)->get();
                $payments = Payment::where('bid_id',$bid->id)->get();
            }
        }else{
            $jobs = '';
        }

        $data = [
            'user' => $user,
            'bids' => $bids,
            'jobs' => $jobs,
            'payments' => $payments,
        ];

        return view('pages.bid_status')->with($data);
        
    }

    public function getUserById($id)
    {
        return User::find($id)->firstOrFail();
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
