@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title> @lang('Buscador de Escuelas')</title> 
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('site/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('site/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">    
  <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('site/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="{{asset('site/images/logo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars-rs-food">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">@lang('Inicio')
            </a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">@lang('Usuarios')</a>
              <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="{{url('/users/create')}}">@lang('Crear Usario')</a>
                <a class="dropdown-item" href="{{url('/users')}}">@lang('Lista de Usuarios')</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">@lang('Roles')</a>
              <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="{{url('/rules/create')}}">@lang('Crear Rol')</a>
                <a class="dropdown-item" href="{{url('/rules')}}">@lang('Lista de Roles')</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">@lang('Escuelas')</a>
              <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="{{url('/schools/create')}}">@lang('Crear Escuela')</a>
                <a class="dropdown-item" href="{{url('/schools')}}">@lang('Lista de Escuelas')</a>
              </div>
            </li>
             <li class="nav-item "><a class="nav-link" href="{{url('/reports')}}">@lang('Reporte')
            </a></li>
            <li class="nav-item"><a class="nav-link" href="/locale/es"><img src="{{asset('site/images/Peru.png')}}">@lang('ES')
            </a></li> 
            <li class="nav-item"><a class="nav-link" href="/locale/en"><img src="{{asset('site/images/uSa.png')}}">@lang('EN')
            </a></li> 
            <li class="nav-item "><a class="nav-link" href="{{url('/school/busqueda')}}">@lang('Buscador')
            </a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>@lang('Roles')</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>@lang('Rol')</h2>
						<p>@lang('Editar Rol')</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form  action="{{url('/rules/'.$data->id)}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						{{method_field('PATCH')}}
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="Rol">@lang('Rol')</label>
									<input type="text" placeholder="Roll" id="rule" class="form-control" name="rule" value ="{{$data->rule}}" required data-error="Ingrese el rol">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>

							<div class="col-md-12">
								<div class="submit-button text-center">
								<input type="submit" name="Editar">								
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
	

	<!-- Start Contact info -->
	<div class="contact-imfo-box">
    <div class="container">
      <div class="row">
        <div class="col-md-4 arrow-right">
          <i class="fa fa-volume-control-phone"></i>
          <div class="overflow-hidden">
            <h4>Phone</h4>
            <p class="lead">
              +01 123-456-4590
            </p>
          </div>
        </div>
        <div class="col-md-4 arrow-right">
          <i class="fa fa-envelope"></i>
          <div class="overflow-hidden">
            <h4>Email</h4>
            <p class="lead">
              yourmail@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <i class="fa fa-map-marker"></i>
          <div class="overflow-hidden">
            <h4>Location</h4>
            <p class="lead">
              800, Lorem Street, US
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By : 
					<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('site/js/popper.min.js')}}"></script>
  <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
	
	<script src="{{asset('site/js/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('site/js/images-loded.min.js')}}"></script>
	<script src="{{asset('site/js/isotope.min.js')}}"></script>
	<script src="{{asset('site/js/baguetteBox.min.js')}}"></script>
	<script src="{{asset('site/js/jquery.mapify.js')}}"></script>
	<script src="{{asset('site/js/form-validator.min.js')}}"></script>
    <script src="{{asset('site/js/contact-form-script.js')}}"></script>
    <script src="{{asset('site/js/custom.js')}}"></script>
	<script>
		$('.map-full').mapify({
			points: [
				{
					lat: 40.7143528,
					lng: -74.0059731,
					marker: true,
					title: 'Marker title',
					infoWindow: 'Live Dinner Restaurant'
				}
			]
		});	
	</script>
</body>
</html>

@endsection