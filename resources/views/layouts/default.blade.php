<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

    @include('includes.head')

</head>
<body>

	<div class="site-wrapper">

		<!-- Header -->
		@include('includes.header')
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Content -->
			@yield('content')
			<!-- Page Content / End -->

			<!-- Footer -->
			@include('includes.footer')
			<!-- Footer / End -->

		</div>
		<!-- Main / End -->
	</div>





	<!-- Javascript Files
	================================================== -->
    @include('includes.script')



</body>
</html>
