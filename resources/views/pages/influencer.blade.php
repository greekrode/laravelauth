@extends('layouts.default')
@section('content')
<div class="main" role="main">

        <!-- Page Heading -->
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            {{-- <li><a href="#"></a></li> --}}
                            <li class="active">Profile</li>
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
                                <div class="col-md-5">
                                    <figure class="alignnone">
                                        <img src="
                                        @if ($user->avatar)
                                        {{ $user->avatar }}
                                        @else
                                        {{ url('http://placehold.it/320x290') }}
                                        @endif
                                        " alt="">
                                        <img src="" alt="">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <h2 class="name">{{ $user->first_name.' '.$user->last_name }}</h2>
                                    <i class="tagline"></i>
                                    <ul class="meta">
                                        <li>Public Figure</li>
                                        <li>Open Minded</li>
                                    </ul>
                                    <ul class="info">
                                        <li><i class="fa fa-users"></i> Following: {{ $user->following }}</a></li>
                                        <li><i class="fa fa-users"></i> Followers: {{ $user->followers }}</a></li>
                                    </ul>

                                    <ul class="info" style="font-size:35px !important; display:inline-block !important;">
                                        {{-- <li style="display: inline-block !important"><i class="fa fa-instagram"></i></li> --}}
                                        <li style="display: inline-block !important"><i class="fa fa-facebook"></i></li>
                                        <li style="display: inline-block !important"><i class="fa fa-twitter"></i></li>
                                    </ul>
                                    

                                    <div class="spacer-lg"></div>
                            
                                    <a href="#" class="btn btn-success btn-lg"><span class="fa fa-envelope"></span> Send Message</a>
                                </div>
                            </div>

                            <div class="spacer-lg"></div>
                            
                            <h4>Description</h4>
                            <p>{!! nl2br($user->bio) !!}</p>
                            
                            <hr class="lg">
                            
                            <h4>Location</h4>
                            @if ($user->location)
										{{ $user->location }} <br />

										@if(config('settings.googleMapsAPIStatus'))
											Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span> <br />
                                            
											<div id="map-canvas" style="clear:both; height:200px"></div>
										@endif
								@endif
                            <!-- Google Map / End -->
                            
                            <hr class="lg">
                            
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <h4>Skills</h4>
                                    <div class="list list__arrow2">
                                        <ul>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <h4>Experience</h4>
                                    <div class="list list__arrow2">
                                        <ul>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
                                            <li>Lorem Ipsum</li>
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
                            {{-- <h3 class="widget-title">Pet Sitting Jobs</h3>
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
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!-- /Widget :: Recent Jobs -->
                    </aside>
                    <!-- Sidebar / End -->

                </div>
            </div>
        </section>

        
@if(config('settings.googleMapsAPIStatus'))
{!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
@endif

<!-- Google Map Init-->
<script type="text/javascript">
//FUNCTION TO ASSIST WITH AUTO ADDRESS INPUT USING GOOGLE MAPS API3
//<![CDATA[
window.onload=function(){
    if(document.getElementById("location"))
    {
        var input = document.getElementById('location');
        var options; // = {componentRestrictions: {country: 'us'}};
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }
 }//]]>
</script>

@if ($user && $user->location)

	<script type="text/javascript">

		function google_maps_geocode_and_map() {

			var geocoder = new google.maps.Geocoder();
			var address = '{{$user->location}}';

			geocoder.geocode( { 'address': address}, function(results, status) {

				if (status == google.maps.GeocoderStatus.OK) {

					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();

					// SHOW LATITUDE AND LONGITUDE
					document.getElementById('latitude').innerHTML += latitude;
					document.getElementById('longitude').innerHTML += longitude;

					// CHECK IF HTML DOM CONTAINER IS FOUND
					if (document.getElementById('map-canvas')){
						function getMap() {

						    // Coordinates to center the map
						    var LatitudeAndLongitude = new google.maps.LatLng(latitude,longitude);
							
							var mapOptions = {
								scrollwheel: false,
								disableDefaultUI: false,
								draggable: false,
								zoom: 14,
								center: LatitudeAndLongitude,
								mapTypeId: google.maps.MapTypeId.TERRAIN // HYBRID, ROADMAP, SATELLITE, or TERRAIN
							};

							var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
							
						  	// MARKER
						    var marker = new google.maps.Marker({
						        map: map,
						        //icon: "",
						        title: '<strong>{{$user->first_name}}</strong> <br />  {{$user->email}}',
						        position: map.getCenter()
						    });

						    // INFO WINDOW
							var infowindow = new google.maps.InfoWindow();
							infowindow.setContent('<strong>{{$user->first_name}}</strong> <br />  {{$user->email}}');

						    infowindow.open(map, marker);
							google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map, marker);
							});

						}

						// // ATTACH MAP TO DOM HTML ELEMENT
						google.maps.event.addDomListener(window, 'load', getMap);

					}

				}

			});

		}
		
		google_maps_geocode_and_map();
	</script>
@endif
@stop        