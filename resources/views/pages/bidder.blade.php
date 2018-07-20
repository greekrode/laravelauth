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
                    {{-- <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                        Your endorsement listings are shown in the table below. Expired listings will be automatically removed after 30 days.
                    </div> --}}
                    <h2>{{ $job->title }}</h2>

                    <div class="table-responsive">
                        <table class="job-manager-jobs table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="job_title">Endorsement Title</th>
                                    <th class="date">Date Posted</th>
                                    <th class="status">Description</th>
                                    <th class="expires">Expected Day</th>
                                    {{-- <th class="filled">Bidders</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bids as $key=>$bid)
                                <tr>
                                    <td class="job_title">
                                        <a href="{!! URL::to('/profile/'.$bid->user->name) !!}" class="job_title_link">{{ $bid->user->name }}</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="bid/{{ $bid->id }}/accept" class="job-dashboard-action-edit">Accept</a></li>
                                            <li><a href="bid/{{ $bid->id }}/reject" class="job-dashboard-action-delete">Reject</a></li>
                                            <li><a href="bid/{{ $bid->id }}/done" class="job-dashboard-action-delete">Done</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">{{ \Carbon\Carbon::parse($bid->created_at)->format('d M, Y')}}</td>
                                    <td class="filled">{!! nl2br($bid->description) !!}</td>
                                    <td class="filled">{{ $bid->expected.' days' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
@stop