 @extends('layouts.default')
@section('content')
	<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h1>Endorsement List</h1>
						</div>
						<div class="col-md-6">
							<ul class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li class="active">Endorsement List</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
						@if(session()->has('message'))
							<div class="alert alert-success">
								{{ session()->get('message') }}
							</div>
						@endif
					<div class="job_listings">
						<form class="job_filters">

							<div class="search_jobs">
								<div class="search_keywords">
									<label for="search_keywords">Keywords</label>
									<input type="text" name="search_keywords" id="search_keywords" placeholder="All Pet Sitters" class="form-control" value="" />
								</div>

								<div class="search_location">
									<label for="search_location">Location</label>
									<input type="text" name="search_location" id="search_location" placeholder="Any Location" class="form-control" value="" />
								</div>

								<div class="search_type">
									<label>Service</label>
									<span class="select-style">
										<select class="form-control">
											<option>All Services</option>
											<option>Pet Feeding</option>
											<option>Dog Walking</option>
											<option>Cat Feeding</option>
										</select>
									</span>
								</div>

								<div class="search_submit">
									<label>Submit</label>
									<button class="btn btn-block btn-primary">Search</button>
								</div>
							</div>
						</form>

						<ul class="job_listings">
							@foreach($jobs as $job)
							<li class="job_listing">
								<a href="{{ 'job/'.$job->id }}">
									<img src="{{ $job->user->profile->avatar }}" alt="" class="company_logo">
									<div class="position">
										<h2>{{ $job->title }}</h3>
										<div class="company">
											<strong>{!! nl2br($job->description) !!}</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-hourglass"></i> {{ date('d-m-Y', strtotime($job->created_at)) }}<br>
										<i class="fa fa-user"></i> {{ $job->user->first_name.' '.$job->user->last_name }}
									</div>
									{{-- <ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul> --}}
									<ul class="meta">
										<li><h3>Rp {{ number_format($job->price , 0) }}</h3></li>
									</ul>
								</a>
							</li>
							@endforeach
						</ul>
					</div>

					<div class="spacer"></div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<a class="load_more_jobs btn btn-default" href="#">Load more job listings</a>
						</div>
					</div>

				</div>
			</section>
@stop