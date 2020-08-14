
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title> </title>



 <link rel="shortcut icon" href="{{asset('site/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('site/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
     
  <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('site/css/custom.css')}}">


    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lineicons/style.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/chart-master/Chart.js')}}"></script>
    
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:white;position: relative;">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="{{asset('site/images/logo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars-rs-food">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="{{url('/home')}}">@lang('Inicio')
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

  <div class="all-page-title page-breadcrumb">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12">
          <h1>@lang('Reportes')</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading-title text-center">
            <h2>@lang('Reporte de Aplicativo')</h2>
            <p>@lang('Graficos y Tablas ')</p>
          </div>
        </div>
      </div>

  <section id="container" >
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

          <div class="row">
          <div class="col-lg-9 main-chart">

                    <div class="row mt">
                      <!--CUSTOM CHART START -->
                      <!-- --------------------------start grafico -->
                      <div class="border-head">
                          <h3>@lang('Departamentos con mayor numero de Escuelas')</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">

                              <li><span>10</span></li>
                              <li><span>8</span></li>
                              <li><span>6</span></li>
                              <li><span>4</span></li>
                              <li><span>2</span></li>
                              <li><span>0</span></li>
                          </ul>
                          @foreach($mayores as $mayor)
                          <div class="bar">
                              <div class="title">{{$mayor->departament}}</div>
                              <div class="value tooltips" data-original-title="{{$mayor['count(departament)'] }}" data-toggle="tooltip" data-placement="top">{{($mayor['count(departament)']*100)/10}}%</div>
                          </div>
                          @endforeach
                          
                      </div>
                      <!-- --------------------------tabla -->
                      <br>
                      <br>
                      <div class="col-md-12">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> @lang('Departamentos con Bajo Indice de Escuelas Validadas')</h4>
                            <hr>
                          <table class="table">
                              <thead>    
                              <tr>
                                  <th>POS</th>
                                  <th>Departamento</th>
                                  <th>Cantidad</th>    
                              </tr>
                      
                              </thead>
                              <tbody>
                                 @foreach($mapeos as $may)
                                      <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$may->departament}}</td>
                                          <td>{{$may['count(departament)'] }}</td>
                                         
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        </div><! --/content-panel -->
                    </div>
                    <!-- --------------------------end tabla -->
                      <!--custom chart end-->

                      <div class="border-head">
                          <h3>@lang('Departamentos con mayor numero de Usuarios')</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10</span></li>
                              <li><span>8</span></li>
                              <li><span>6</span></li>
                              <li><span>4</span></li>
                              <li><span>2</span></li>
                              <li><span>0</span></li>
                          </ul>

                          @foreach($entrenos as $mayor)
                          <div class="bar">
                              <div class="title">{{$mayor->departament}}</div>
                              <div class="value tooltips" data-original-title="{{$mayor['count(departament)'] }}" data-toggle="tooltip" data-placement="top">{{($mayor['count(departament)']*100)/10}}%</div>
                          </div>
                          @endforeach

                      </div>
                      <!-- --------------------------tabla -->
                      <br>
                      <br>
                      <div class="col-md-12">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> @lang('Departamentos con Bajo Indice de Usuarios')</h4>
                            <hr>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>POS</th>
                                  <th>Departamento</th>
                                  <th>Cantidad</th>  
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($menores as $men)
                                      <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$men->departament}}</td>
                                          <td>{{$men['count(departament)'] }}</td>
                                         
                                      </tr>
                                  @endforeach         
                              </tbody>
                          </table>
                        </div><! --/content-panel -->
                    </div>
                    </div><!-- /row --> 
                    
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                                  
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
     
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
   <!-- <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script> -->
    <!--<script type="text/javascript" src="assets/js/gritter-conf.js"></script>-->

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
    <script src="assets/js/zabuto_calendar.js"></script>    
  </body>
</html>
