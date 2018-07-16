@extends('layouts.default')
@section('content')
<section class="slider-holder">
        <div class="container">
            <div class="flexslider carousel">
                <ul class="slides">
                    <li>
                        <img src="http://placehold.it/1122x480" alt="" />
                    </li>
                    <li>
                        <img src="http://placehold.it/1122x480" alt="" />
                    </li>
                    <li>
                        <img src="http://placehold.it/1122x480" alt="" />
                    </li>
                </ul>

                <div class="search-box">
                    <h2>Find an Awesome Influencer Around You</h2>
                    <form action="#" method="POST" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="All Influencers">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Any Location">
                        </div>
                        <div class="form-group">
                            <div class="select-style">
                                <select class="form-control">
                                    <option>Categories</option>
                                    <option>Entertainment</option>
                                    <option>Fashion</option>
                                    <option>Sport</option>
                                    <option>Health & Wellness</option>
                                    <option>Music</option>
                                    <option>Photography</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
<section class="page-content">
        <div class="container">

            <!-- Light Section -->
            <section class="section-light section-nomargin">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="with-subtitle" data-animation="fadeInUp" data-animation-delay="0">Latest Listings <small data-animation="fadeInUp" data-animation-delay="100">Today Influencers</small></h2>
                        <div class="row">
                                @foreach ($users as $user)
                                <div class="col-xs-6 col-sm-3 col-md-3" data-animation="fadeInLeft" data-animation-delay="0">
                                    <div class="job-listing-box">
                                        <figure class="job-listing-img">
                                            <a href="{{ action('InfluencerController@show', $user->id) }}"><img src="
                                                @if ($user->avatar)
                                                {{ $user->avatar }}
                                                @else
                                                {{ url('http://placehold.it/160x160') }}
                                                @endif
                                                " alt=""></a>
                                        </figure>
                                        <div class="job-listing-body">
                                            <h4 class="name"><a href="/influencer">{{ $user->name }}</a></h4>
                                            <p>{{ $user->bio }}</p>
                                        </div>
                                        <footer class="job-listing-footer">
                                            <ul class="meta">
                                                <li class="category">Photographers</li>
                                                <li class="location"><a href="#">Medan, ID</a></li>
                                                <li class="date">Posted 1 day ago</li>
                                            </ul>
                                        </footer>
                                    </div>
                                </div>
                                @endforeach

                            <div class="clearfix visible-xs"></div>
                            <div class="spacer visible-xs"></div>
                        </div>
                    </div>
                    <div class="col-md-4" data-animation="fadeInRight" data-animation-delay="0">
                        <div class="spacer-lg visible-sm visible-xs"></div>
                        <h2>Featured Listings</h2>
                        <!-- Featured Listings -->
                        <div class="owl-carousel owl-theme owl-featured-listings">
                            <div class="job-listing-box featured">
                                <figure class="job-listing-img">
                                    <a href="/influencer"><img src="http://placehold.it/708x671" alt=""></a>
                                </figure>
                                <div class="job-listing-holder">
                                    <div class="job-listing-body">
                                        <h4 class="name"><a href="/influencer">John Doe</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <footer class="job-listing-footer">
                                        <ul class="meta">
                                            <li class="category">Producer</li>
                                            <li class="location"><a href="#">Medan, ID</a></li>
                                            <li class="date">Posted 5 days ago</li>
                                        </ul>
                                    </footer>
                                </div>
                            </div>
                            <div class="job-listing-box featured">
                                <figure class="job-listing-img">
                                    <a href="/influencer"><img src="http://placehold.it/708x671" alt=""></a>
                                </figure>
                                <div class="job-listing-holder">
                                    <div class="job-listing-body">
                                        <h4 class="name"><a href="/influencer">Mark Kruse</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <footer class="job-listing-footer">
                                        <ul class="meta">
                                            <li class="category">Dancer</li>
                                            <li class="location"><a href="#">Medan, ID</a></li>
                                            <li class="date">Posted 5 days ago</li>
                                        </ul>
                                    </footer>
                                </div>
                            </div>
                            <div class="job-listing-box featured">
                                <figure class="job-listing-img">
                                    <a href="/influencer"><img src="http://placehold.it/708x671" alt=""></a>
                                </figure>
                                <div class="job-listing-holder">
                                    <div class="job-listing-body">
                                        <h4 class="name"><a href="/influencer">Jason Rodriguez</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <footer class="job-listing-footer">
                                        <ul class="meta">
                                            <li class="category">Writer</li>
                                            <li class="location"><a href="#">Medan, ID</a></li>
                                            <li class="date">Posted 5 days ago</li>
                                        </ul>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Listings / End -->

                    </div>
                </div>
            </section>
            <!-- Light Section / End -->

            <!-- Section -->
            <section class="section section-nomargin">
                <div class="row">
                    <div class="col-md-6" data-animation="fadeInLeft" data-animation-delay="0">
                        <div class="img-box">
                            <img src="images/samples/img1.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>For Business Owners</h2>
                        <div class="icon-box circled icon-box-animated" data-animation="fadeInLeft" data-animation-delay="0">
                            <div class="icon">
                                <i class="entypo search"></i>
                            </div>
                            <div class="icon-box-body">
                                <h4>Find Your Perfect Influencer</h4>
                                Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.
                            </div>
                        </div>

                        <div class="icon-box circled icon-box-animated" data-animation="fadeInLeft" data-animation-delay="200">
                            <div class="icon">
                                <i class="entypo vcard"></i>
                            </div>
                            <div class="icon-box-body">
                                <h4>Contact Influencer</h4>
                                Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.
                            </div>
                        </div>

                        <div class="icon-box circled icon-box-animated" data-animation="fadeInLeft" data-animation-delay="400">
                            <div class="icon">
                                <i class="entypo check"></i>
                            </div>
                            <div class="icon-box-body">
                                <h4>Hire with Confidence</h4>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                            </div>
                        </div>

                        <a href="job-list.html" class="btn btn-primary">Start Here <i class="fa fa-arrow-circle-o-right fa-lg fa-right"></i></a>

                    </div>
                </div>

                <hr class="lg">

                <div class="row">
                    <div class="col-md-6 col-md-push-6" data-animation="fadeInRight" data-animation-delay="0">
                        <div class="img-box">
                            <img src="images/samples/img2.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <h2>For Influencers</h2>
                        <div class="icon-box circled icon-box-animated" data-animation="fadeInRight" data-animation-delay="0">
                            <div class="icon">
                                <i class="entypo pencil"></i>
                            </div>
                            <div class="icon-box-body">
                                <h4>Create a Free Profile</h4>
                                Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.
                            </div>
                        </div>

                        <div class="icon-box circled icon-box-animated" data-animation="fadeInRight" data-animation-delay="200">
                            <div class="icon">
                                <i class="entypo calendar"></i>
                            </div>
                            <div class="icon-box-body">
                                <h4>Describe Yourself</h4>
                                Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.
                            </div>
                        </div>

                        <div class="icon-box circled icon-box-animated" data-animation="fadeInRight" data-animation-delay="400">
                            <div class="icon">
                                <i class="entypo star"></i>
                            </div>
                            <div class="icon-box-body">
                                <h4>Become a Star</h4>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                            </div>
                        </div>

                        <a href="/profile/create" class="btn btn-primary">Start Here <i class="fa fa-arrow-circle-o-right fa-lg fa-right"></i></a>

                    </div>
                </div>

            </section>
            <!-- Section / End -->


            <!-- Light Section -->
            <section class="section-light section-nomargin">
                <div class="title-bordered" data-animation="fadeInUp" data-animation-delay="0">
                    <h2>Why Choose Us <small>Main Features</small></h2>
                </div>
                <div class="row">
                    <div class="col-md-3" data-animation="fadeInDown" data-animation-delay="0">
                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                            <div class="icon">
                                <i class="entypo chat"></i>
                            </div>
                            <div class="icon-box-body">
                                <h3>100% Satisfaction Guarantee</h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean tempor auctor sollicit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" data-animation="fadeInDown" data-animation-delay="200">
                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                            <div class="icon">
                                <i class="entypo heart"></i>
                            </div>
                            <div class="icon-box-body">
                                <h3>Easy to Use</h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean tempor auctor sollicit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" data-animation="fadeInDown" data-animation-delay="400">
                        <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                            <div class="icon">
                                <i class="entypo light-bulb"></i>
                            </div>
                            <div class="icon-box-body">
                                <h3>24/7 Support</h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean tempor auctor sollicit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="icon-box filled centered lg circled icon-box-animated-inverse" data-animation="fadeInDown" data-animation-delay="600">
                            <div class="icon">
                                <i class="entypo thumbs-up"></i>
                            </div>
                            <div class="icon-box-body">
                                <h3>Lots of Choice</h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean tempor auctor sollicit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Light Section / End -->

            <!-- Section -->
            <section class="section section-nomargin">
                <div class="title-bordered" data-animation="fadeInUp" data-animation-delay="0">
                    <h2>What Clients Say <small>Recent reviews</small></h2>
                </div>
                <div class="row">
                    <div class="col-md-6" data-animation="fadeInLeft" data-animation-delay="0">
                        <div class="testimonial">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut laoreet mi. Integer vitae elit quis leo tincidunt euismod. Nullam blandit vestibulum lectus sed sollicitudin. </p>
                            </blockquote>
                            <div class="bq-author">
                                <figure class="author-img">
                                    <img src="http://placehold.it/60x60" alt="">
                                </figure>
                                <h6>John Doe</h6>
                                <span class="bq-author-info">CEO, Compay Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-animation="fadeInRight" data-animation-delay="0">
                        <div class="spacer-lg visible-sm visible-xs"></div>
                        <div class="testimonial">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut laoreet mi. Integer vitae elit quis leo tincidunt euismod. Nullam blandit vestibulum lectus sed sollicitudin. </p>
                            </blockquote>
                            <div class="bq-author">
                                <figure class="author-img">
                                    <img src="http://placehold.it/60x60" alt="">
                                </figure>
                                <h6>Samantha White</h6>
                                <span class="bq-author-info">Manager, Compay Name</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section / End -->

        </div>
    </section>
@stop