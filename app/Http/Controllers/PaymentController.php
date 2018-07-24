<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Job;
use App\Models\Bid;
use App\Models\Profile;
use App\Models\User;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagintaionEnabled = config('usersmanagement.enablePagination');
        if ($pagintaionEnabled) {
            $payments = Payment::paginate(config('usersmanagement.paginateListSize'));
        } else {
            $payments = Payment::all();
        }
        

        return view('pages.admin.payment', compact('payments'));
    }

    public function download($id)
    {
        $payment = Payment::whereId($id)->first();

        return Storage::download($payment->photo);
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
        if($request->hasFile('photos') ){
            foreach ($request->file('photos') as $photo){
                $filename = $photo->store('photos');
            }
        }

        $payment = Payment::create([
            'bid_id' => $request->bid_id,
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'photo' => $filename,
        ]);

        $message = 'The payment verification for bid number '.$request->bid_id.' has been submitted';
        return redirect('bid/'.$request->job_id)->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($bid_id, $job_id)
    {
        $bid = Bid::find($bid_id);
        $job = Job::find($job_id);

        $data = [
            'bid' => $bid,
            'job' => $job,
        ];

        // dd($data);

        return view('pages.payment')->with($data);
    }

    public function payment_reject($id){
        $payment = Payment::whereId($id)->first();

        if ($payment){
            $payment->reject = 1;
            $payment->save();
            $message = 'Payment number '.$id.' has been rejected.';
            return redirect('payment')->with('message', $message);
        }else{
            $message = 'Payment number '.$id.' is unable to be rejected.';
            return redirect('payment')->with('message', $message);
        }    
    }

    public function payment_accept($id){
        $payment = Payment::whereId($id)->first();

        if ($payment){
            $payment->accept = 1;
            $payment->save();
            $message = 'Payment number '.$id.' has been accepted.';
            return redirect('payment')->with('message', $message);
        }else{
            $message = 'Payment number '.$id.' is unable to be accepted.';
            return redirect('payment')->with('message', $message);
        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
