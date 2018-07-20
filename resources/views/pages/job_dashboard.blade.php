@extends('layouts.default')
@section('content')
<div class="main" role="main">

        <!-- Page Heading -->
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Your Dashboard</li>
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

                    <div class="table-responsive">
                        <table class="job-manager-jobs table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="job_title">Endorsement Title</th>
                                    <th class="date">Date Posted</th>
                                    {{-- <th class="status">Status</th> --}}
                                    {{-- <th class="expires">Expires</th> --}}
                                    <th class="filled">Bidders</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                <tr>
                                    <td class="job_title">
                                        <a href="job/{{ $job->id }}" class="job_title_link">{{ $job->title }}</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="job/{{ $job->id }}/edit" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="job/{{ $job->id }}/destroy" class="job-dashboard-action-delete">Delete</a></li>
                                            <li><a href="bid/{{ $job->id }}" class="job-dashboard-action-mark_filled">View Bidders</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y')}}</td>
                                    <td class="filled">
                                        <?php $i = 0; ?>
                                        @foreach ($bids as $bid)
                                            @if ($bid->job_id == $job->id)
                                                <?php $i = $i + 1; ?>
                                            @endif
                                        @endforeach
                                        {{ $i }}
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