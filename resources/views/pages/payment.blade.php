@extends('layouts.default')
@section('content')
<!-- Main -->
<div class="main" role="main">

<!-- Page Heading -->
<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Verify Payment</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Payment</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Heading / End -->

<!-- Page Content -->
<section class="page-content">
    <div class="container">
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Job Form -->
                <form action="{{ route('payment.store') }}" method="post" id="submit-payment-form" class="job-manager-form" enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{ session()->get('message') }}
                    </div>
                @endif

                    <input type="hidden" value="{{ $job->id }}" id="job_id" name="job_id">
                    <input type="hidden" value="{{ $bid->id }}" id="bid_id" name="bid_id">
                    <input type="hidden" value="{{ $job->user->id }}" id="user_id" name="user_id"> 
                    <!-- Job Information Fields -->
                    <fieldset class="fieldset-title">
                        {!! Form::label('title', 'Endorsement Title' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('title', $job->title, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Enter the job title', 'disabled' => 'true')) !!}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-title">
                        {!! Form::label('user', 'Bid User', array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('user', $job->user->name, array('id' => 'user', 'class' => 'form-control', 'disabled' => 'true')) !!}
                            @if ($errors->has('user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-title">
                        {!! Form::label('bank_name', 'Bank Name' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('bank_name', old('bank_name'), array('id' => 'bank_name', 'class' => 'form-control', 'placeholder' => 'Enter the bank name')) !!}
                            @if ($errors->has('bank_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-title">
                        {!! Form::label('account_name', 'Bank Account Name' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('account_name', old('account_name'), array('id' => 'account_name', 'class' => 'form-control', 'placeholder' => 'Enter the bank account name')) !!}
                            @if ($errors->has('account_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('account_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                        
                    <fieldset class="fieldset-title">
                        {!! Form::label('account_number', 'Bank Account Number' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('account_number', old('account_number'), array('id' => 'account_number', 'class' => 'form-control', 'placeholder' => 'Enter the bank account number')) !!}
                            @if ($errors->has('account_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('account_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-amount">
                        {!! Form::label('amount', 'Payment Amount' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp</span>
                                {!! Form::number('amount', old('amount'), array('id' => 'amount', 'class' => 'form-control', 'placeholder' => 'Payment amount' , 'aria-describedby' => 'basic-addon1', 'data-a-dec' => ',', 'data-a-sep' => '.')) !!}
                                @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-date">
                        {!! Form::label('payment_date', 'Payment Date', array('class' => 'col-12 control-label')) !!}
                        <div class="field">
                            {!! Form::date('payment_date', old('payment_date'), array('id'=>'payment_date', 'class' => 'form-control')) !!}
                            @if ($errors->has('payment_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('payment_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-remarks">
                        {!! Form::label('remarks', 'Payment Remarks', array('class' => 'col-12 control-label')) !!}
                        <div class="field">
                            {!! Form::textarea('remarks', old('remarks'), array('id' => 'remarks', 'class' => 'form-control', 'placeholder' => 'Enter any payment remarks')) !!}
                            @if ($errors->has('remarks'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('remarks') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-photos">
                        <label for="photos">Payment transcript</label>
                            {!! Form::file('photos[]', array('id' => 'photos', 'class' => 'form-control')) !!}
                            <small class="description">
                            Upload only one image</small>
                    </fieldset>

                    <div class="spacer"></div>

                    <p>
                        <input type="submit" name="submit_job" class="btn btn-primary" value="Verify Payment &rarr;" />
                    </p>

                </form>
                <!-- Job Form / End -->
            </div>
        </div>

    </div>
</section>
<script>
    jQuery(function($) {
      $('#amount').autoNumeric('init');    
  });
</script>
<!-- Page Content / End -->
@stop