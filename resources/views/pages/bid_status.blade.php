@extends('layouts.default')
@section('content')
<div class="main" role="main">

        <!-- Page Heading -->
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Endorsement Bid</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Bid</li>
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


                    <div class="table-responsive">
                        <table class="job-manager-jobs table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="job_title">Endorsement Title</th>
                                    <th class="date">Date Posted</th>
                                    <th class="filled">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bids as $bid)
                                <tr>
                                    <td class="job_title">
                                        @foreach ($jobs as $job)
                                            @if ($job->id == $bid->job_id)
                                                <a href="{!! URL::to('/job/'.$job->id) !!}" class="job_title_link">{{ $job->title }}</a>
                                            @endif
                                        @endforeach
                                        <ul class="job-dashboard-actions">                      
                                            @if($bid->reject == 0 && $bid->accept == 0 && $bid->done_influencer == 0)
                                            <li><a href="{{ $bid->id.'/reject' }}" 
                                                    class="job-dashboard-action-edit"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('rejec').submit();">Reject</a></li>
                                                    <form id="reject" action="{{ $bid->id.'/reject' }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" value="{{ $job->id }}" name="job_id" id="job_id">
                                                    </form>
                                            @endif
                                            
                                            @if($bid->done_influencer == 0 && $bid->accept == 1) 
                                            <li><a href="{{ url('bid/'.$bid->id.'/done_influencer') }}" 
                                                class="job-dashboard-action-edit"
                                                onclick="event.preventDefault();
                                                document.getElementById('done').submit();">Done</a></li>
                                                    <form id="done" action="{{ url('bid/'.$bid->id.'/done_influencer') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" value="{{ $job->id }}" name="job_id" id="job_id">
                                                    </form>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="date">{{ \Carbon\Carbon::parse($bid->created_at)->format('d M, Y')}}</td>
                                    {{-- <td class="filled">{!! nl2br($bid->description) !!}</td>
                                    <td class="filled">{{ $bid->expected.' days' }}</td> --}}
                                    <td class="status">
                                        @if($bid->accept == 1 && $bid->reject == 0 && $bid->done_owner == 0 && $bid->done_influencer == 0)
                                        Accepted
                                        @elseif($bid->accept == 0 && $bid->reject == 1 && $bid->done_owner == 0 && $bid->done_influencer == 0)
                                        Rejected
                                        @elseif($bid->accept == 1 && $bid->reject == 0 && $bid->done_owner == 1 && $bid->done_influencer == 1)
                                        Done
                                        @else
                                        Pending
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