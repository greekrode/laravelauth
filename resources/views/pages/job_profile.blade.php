@extends('layouts.default')
@section('content')
<div class="main" role="main">

        <!-- Page Heading -->
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Endorsement</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Endorsement Detail</li>
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
                    <div class="content col-md-8">
                        
                        <div class="job-profile-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="name">{{ $job->title }}</h2>
                                    <span class="tagline" style="font-style:italic;"><i class="fa fa-user"></i> Posted by: {{ $user->first_name.' '.$user->last_name }}</span>
                                    {{-- <ul class="meta">
                                        <li>Dog Walker</li>
                                        <li>Pet Sitter</li>
                                    </ul> --}}
                                    <ul class="info">
                                        <li><i class="fa fa-map-marker"></i> {{ $job->location }}</a></li>
                                        <li><i class="fa fa-clock-o"></i> Updated {{ $diff }} ago</li>
                                    </ul>

                                    <div class="spacer-lg"></div>
                        
                                </div>
                            </div>

                            <div class="spacer-lg"></div>
                            
                            <div class="row">
                                @foreach ($photos as $photo)
                                <div class="col-md-3">
                                        {{-- <figure class="alignnone">
                                        </figure> --}}
                                        <img src="{{ asset('storage/'.$photo->image) }}" class="img-thumbnail" style="width:150px !important; height:150px !important">
                                </div>
                                @endforeach
                            </div>

                            <div class="spacer-lg"></div>
                            <hr>


                            <h4>Description</h4>
                            <p>{!! nl2br($job->description) !!}</p>
                        
                            
                            <hr class="lg">
                            
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <h4>Skills</h4>
                                    <div class="list list__arrow2">
                                        <ul>
                                            <li>Dog Walking</li> 
                                            <li>Pet Feeding</li> 
                                            <li>Pet Sitting</li>
                                            <li>Boarding</li> 
                                            <li>Overnight Care</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <h4>Experience</h4>
                                    <div class="list list__arrow2">
                                        <ul>
                                            <li>Dogs</li> 
                                            <li>Cats</li> 
                                            <li>Fish</li>
                                            <li>Lizards/Reptiles</li>
                                            <li>Small Mammals</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <h4>Education</h4>
                                    <div class="list list__arrow2">
                                        <ul>
                                            <li>
                                                University of California, Berkeley<br>
                                                <span class="date text-muted"><i class="fa fa-calendar"></i> Jan 2009 - Mar 2010</span>
                                                <div class="position">Bachelor degree</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Sidebar -->
                    <aside class="sidebar col-md-3 col-md-offset-1 col-bordered">
                        <hr class="visible-sm visible-xs lg">
                        <!-- Widget :: Recent Jobs -->
                        <div class="widget_recent_jobs widget widget__sidebar">
                            <h3 class="widget-title">Pet Sitting Jobs</h3>
                            <div class="widget-content">
                                <ul class="job_listings">
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Dog Walker Needed</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    Anywhere
                                                </li>
                                                <li class="company">
                                                    Sara White
                                                </li>
                                                <li class="job-type">
                                                    Pet Sitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Seeking reliable pet sitter for 2</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    London, UK
                                                </li>
                                                <li class="company">
                                                    John Doe
                                                </li>
                                                <li class="job-type">
                                                    Pet Sitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Pet sitter needed for one dog</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    Fayetteville, NC
                                                </li>
                                                <li class="company">
                                                    Bill Russell
                                                </li>
                                                <li class="job-type">
                                                    Pet Sitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Seeking reliable pet sitter for 2</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    Varina, NC
                                                </li>
                                                <li class="company">
                                                    Timothy Black
                                                </li>
                                                <li class="job-type">
                                                    Pet Sitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Dog owner looking to walk/sit for dog</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    Sanford, NC
                                                </li>
                                                <li class="company">
                                                    Eddy Merry
                                                </li>
                                                <li class="job-type">
                                                    Pet Sitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Seeking reliable pet sitter for 2</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    Apex, NC
                                                </li>
                                                <li class="company">
                                                    Sara White
                                                </li>
                                                <li class="job-type">
                                                    Pet Sitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Local Dog Walking and Pet Services</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    London, UK
                                                </li>
                                                <li class="company">
                                                    Allen O’Neal
                                                </li>
                                                <li class="job-type">
                                                    Dog Walking
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Pet sitter, Dog walker, &amp; more!</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    Morrisville, NC
                                                </li>
                                                <li class="company">
                                                    Tim Purple
                                                </li>
                                                <li class="job-type">
                                                    Petsitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="position">
                                                <h3>Seeking reliable pet sitter for 2</h3>
                                            </div>
                                            <ul class="meta">
                                                <li class="location">
                                                    London, UK
                                                </li>
                                                <li class="company">
                                                    Sara White
                                                </li>
                                                <li class="job-type">
                                                    Petsitter
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Widget :: Recent Jobs -->
                    </aside>
                    <!-- Sidebar / End -->

                </div>
            </div>
        </section>
@stop