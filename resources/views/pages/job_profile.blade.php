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
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                <div class="row" id="bid" style="display:none;">
                    <div class="content col-md-8">
                        <div class="card">
                            <div class="container">
                                    <h1>Bid on this project</h1>
                                    <form action="{{ route('bid.store') }}" method="post" id="bid-form" class="job-manager-form" >
                                    @csrf

                                        <input type="hidden" id="job_id" name="job_id" value="{{ $job->id }}">
                                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>{!! Form::label('expected', 'Time to finished', array('class' => 'col-6 control-label')); !!}</h4>
                                                <select class="col-6 form-control" name="expected" id="expected">
                                                    @for ($i = 0; $i < 31; $i++)
                                                        <option value="{{ $i }}">{{ $i.' days' }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                    <h4>{!! Form::label('description', 'Why we should choose you?', array('class' => 'col-6 control-label')); !!}</h4>
                                                    {!! Form::textarea('description', old('description'), array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Tell us why.')) !!}
                                            </div>
                                        </div>

                                        <div class="spacer"></div>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-2">
                                                <input type="submit" name="submit" class="btn btn-success btn-md" value="Bid Now &rarr;">
                                            </div>
                                        </div>
                                        
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    @if($job->user_id == Auth::user()->id)
                                        {{-- <button href="{{ route('job.edit') }}" class="btn btn-success btn-md" onclick="showBid()" id="endorse"><span class="fa fa-check"></span> Endorse this</button> --}}
                                        {!! HTML::icon_link(URL::to('/job/'.$job->id.'/edit'), 'fa fa-fw fa-cog', 'Edit endorsement', array('class' => 'btn btn-md btn-info')) !!}
                                        <div class="spacer-lg"></div>
                                        {!! HTML::icon_link(URL::to('/job/'.$job->id.'/destroy'), 'fa fa-fw fa-trash', 'Delete endorsement', array('class' => 'btn btn-md btn-danger')) !!}
                                    @else
                                        <button href="" class="btn btn-success btn-md" onclick="showBid()" id="endorse"><span class="fa fa-check"></span> Endorse this</button>
                                    @endif
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

        <script>
            // function showBid() {
            //     var x = document.getElementById("bid");
            //     if (x.style.display == "none") {
            //         x.style.display = "block";
            //     } else {
            //         x.style.display = "none";
            //     }
            // }

            $(document).ready(function(){
                $("#endorse").click(function(){
                    $("#bid").toggle(1000);
                });
            });
        </script>
@stop