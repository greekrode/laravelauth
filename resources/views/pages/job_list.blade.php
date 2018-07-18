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
							<li class="job_listing">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>Debbie Bidart</h3>
										<div class="company">
											<strong>Pet Sitter</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> Melbourne, AU
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
							<li class="job_listing">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>John Doe</h3>
										<div class="company">
											<strong>Dog Walker</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> New York, US
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
							<li class="job_listing job_position_featured">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>Carolina White</h3>
										<div class="company">
											<strong>Pet Sitter</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> Sydney, AU
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
							<li class="job_listing">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>Annie Lakes</h3>
										<div class="company">
											<strong>Pet Sitter</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> London, UK
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
							<li class="job_listing">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>James Smith</h3>
										<div class="company">
											<strong>Dog Walker</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> Melbourne, AU
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
							<li class="job_listing">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>Ashly Gray</h3>
										<div class="company">
											<strong>Cat Sitter</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> New York, US
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
							<li class="job_listing">
								<a href="#">
									<img src="http://placehold.it/58x58" alt="" class="company_logo">
									<div class="position">
										<h3>Timothy Green</h3>
										<div class="company">
											<strong>Dog Walker</strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-map-marker"></i> London, UK
									</div>
									<ul class="meta">
										<li class="date">
											Posted 2 months ago
										</li>
									</ul>
								</a>
							</li>
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