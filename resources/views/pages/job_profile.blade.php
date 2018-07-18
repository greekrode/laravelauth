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
                                <div class="col-md-8">
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
                                <div class="col-md-4">
                                    <a href="#" class="btn btn-success btn-md"><span class="fa fa-check"></span> Endorse this</a>
                                </div>
                            </div>

                            <div class="spacer-xs"></div>
                            
                            <div class="row">
                                <div id="endorseCarousel">
                                @foreach ($photos as $photo)
                                    <div class="item" >
                                        <img class="lazyOwl" data-src="{{ asset('storage/'.$photo->image) }}" alt="Image">
                                    </div>
                                @endforeach
                                </div>                                
                            </div>

                            <div class="spacer-lg"></div>
                            <hr>


                            <h4>Description</h4>
                            <p>{!! nl2br($job->description) !!}</p>
                        
                            
                            <hr class="lg">
                        

                    </div>

                    <!-- Sidebar -->

                </div>
            </div>
        </section>
        
        <script>     
        $(document).ready(function() {      
          $("#endorseCarousel").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3],
                lazyLoad : true,
            });  
        });
        </script>
@stop