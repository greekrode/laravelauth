@extends('layouts.default')
@section('content')
<div class="main" role="main">

        <!-- Page Heading -->
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Endorsement Bidders</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Bidder</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Heading / End -->

        <!-- Page Content -->
        <section class="page-content">
            <div class="container">
                
                
                
                <div id="job-manager-job-dashboard">
                        @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                            {{ session()->get('message') }}
                        </div>
                        @endif

                    <h2>{{ $job->title }}</h2>

                    <div class="table-responsive">
                        <table class="job-manager-jobs table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="job_title">Endorsement Title</th>
                                    <th class="date">Date Posted</th>
                                    <th class="status">Description</th>
                                    <th class="expires">Expected Day</th>
                                    <th class="filled">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bids as $key=>$bid)
                                <tr>
                                    <td class="job_title">
                                        <a href="{!! URL::to('/profile/'.$bid->user->name) !!}" class="job_title_link">{{ $bid->user->name }}</a>
                                        <ul class="job-dashboard-actions">
                                            @if ($bid->accept == 0)
                                            <li><a href="{{ $bid->id.'/accept' }}" 
                                                class="job-dashboard-action-edit"
                                                onclick="event.preventDefault();
                                                document.getElementById('accept').submit();">Accept</a></li>
                                                <form id="accept" action="{{ $bid->id.'/accept' }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" value="{{ $job->id }}" name="job_id" id="job_id">
                                                </form>
                                            @endif
                                            
                                            @if($bid->reject ==0)
                                            <li><a href="{{ $bid->id.'/reject' }}" 
                                                    class="job-dashboard-action-edit"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('rejec').submit();">Reject</a></li>
                                                    <form id="reject" action="{{ $bid->id.'/reject' }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" value="{{ $job->id }}" name="job_id" id="job_id">
                                                    </form>
                                            @endif

                                            @if($bid->done == 0)
                                            <li><a href="{{ $bid->id.'/done' }}" 
                                                    class="job-dashboard-action-edit"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('done').submit();">Done</a></li>
                                                    <form id="done" action="{{ $bid->id.'/done' }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" value="{{ $job->id }}" name="job_id" id="job_id">
                                                    </form>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="date">{{ \Carbon\Carbon::parse($bid->created_at)->format('d M, Y')}}</td>
                                    <td class="filled">{!! nl2br($bid->description) !!}</td>
                                    <td class="filled">{{ $bid->expected.' days' }}</td>
                                    <td class="status">
                                        @if($bid->accept == 1 && $bid->reject == 0 && $bid->done == 0)
                                        Accepted
                                        @elseif($bid->accept == 0 && $bid->reject == 1 && $bid->done == 0)
                                        Rejected
                                        @elseif($bid->accept == 0 && $bid->reject == 0 && $bid->done == 1)
                                        Done
                                        @else
                                        &#45;
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
@stop