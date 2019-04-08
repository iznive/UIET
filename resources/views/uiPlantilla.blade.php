<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="es"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="es"><![endif]-->
<!--[if !IE]><!-->
<html lang="es">
	<!--<![endif]-->

	<head>
		<title>@yield('customTitle')</title>

		<!--[if IE]>
            <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/>
		<![endif]-->

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Sistema Integral Académico Administrativo UIET" name="description"/>
        <meta content="Francisco Gabriel Alvarez Alcaraz" name="author"/>

		<link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/themify-icons/themify-icons.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/flag-icon-css/css/flag-icon.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/animate.css/animate.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/switchery/dist/switchery.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/ladda/dist/ladda-themeless.min.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/slick.js/slick/slick.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/bower_components/slick.js/slick/slick-theme.css?v=2') }}">

		@yield('customHead')

		<link rel="stylesheet" href="{{ asset('/assets/css/styles.css?v=3') }}">
		<link rel="stylesheet" href="{{ asset('/assets/css/plugins.css?v=2') }}">
		<link rel="stylesheet" href="{{ asset('/assets/css/lyt5-theme-1.css?v=2') }}" id="skin_color">

		<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico?v=3') }}" />
	</head>

	<body>

		<div id="app" class="lyt-5">

			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<div>
						<!-- start: SEARCH FORM -->
						<div class="search-form hidden-md hidden-lg">
							<a class="s-open" href="#"> <i class="ti-search"></i> </a>
							<form class="navbar-form" role="search">
								<a class="s-remove" href="#" target=".navbar-form"> <i class="ti-close"></i> </a>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Buscar...">
									<button class="btn search-button" type="submit">
										<i class="ti-search"></i>
									</button>
								</div>
							</form>
						</div>
						<!-- end: SEARCH FORM -->
						<!-- start: USER OPTIONS -->
						<div class="nav-user-wrapper">
							<div class="media">
								<div class="media-left">
									<a class="profile-card-photo" href="#"><img alt="" src="{{ asset('/assets/images/avatar-1.jpg') }}"></a>
								</div>
								<div class="media-body">
									<span class="media-heading text-white">
										Frank
									</span>
									<div class="text-small text-white-transparent">
										Administrador
									</div>
								</div>

							</div>
						</div>

						<nav>
							<div class="navbar-title">
								<span>Menú Principal</span>
							</div>
							<ul class="main-navigation-menu">
								<li>
									<a href="{{ url('/Principal') }}">
									<div class="item-content">
										<div class="item-media">
											<div class="lettericon" data-color="auto" data-text="INICIO" data-size="sm" data-char-count="2"></div>
										</div>
										<div class="item-inner">
											<span class="title"> Inicio </span>
										</div>
									</div> </a>
								</li>

								<li>
									<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<div class="lettericon" data-color="auto" data-text="PERSONAL" data-size="sm" data-char-count="2"></div>
										</div>
										<div class="item-inner">
											<span class="title"> Personal </span><i class="icon-arrow"></i>
										</div>
									</div> </a>
									<ul class="sub-menu">
										<li>
											<a href="{{ url('/Personal') }}"> <span class="title"> Consulta </span> </a>
										</li>
										<li>
											<a href="{{ url('/Personal_Alta_A') }}"> <span class="title"> Alta</span> </a>
										</li>

									</ul>
								</li>

								<li>
									<a href="javascript:void(0)">
										<div class="item-content">
											<div class="item-media">
												<div class="lettericon" data-color="auto" data-text="ESTADISTICAS" data-size="sm" data-char-count="2"></div>
											</div>
											<div class="item-inner">
												<span class="title"> Estadística </span><i class="icon-arrow"></i>
											</div>
										</div>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="javascript:;">
												<span>Rectoria</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">

												<li>
													<a href="{{ url('/Esta_REC_PersonalTipo') }}">
														<span>Tipo Personal</span> <i class="icon-arrow"></i>
													</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="javascript:;">
												<span>Recursos Humanos</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/Esta_RH_General') }}"><span>General </span> <i class="icon-arrow"></i></a>
												</li>
												<li>
													<a href="{{ url('/Esta_RH_INEGI') }}"><span>INEGI </span> <i class="icon-arrow"></i></a>
												</li>
												<li>
													<a href="{{ url('/Esta_RH_NivelEstudio') }}"><span>Nivel Estudio </span> <i class="icon-arrow"></i></a>
												</li>
												<li>
													<a href="{{ url('/Esta_RH_AreaFormacion') }}"><span>Área de Formación </span> <i class="icon-arrow"></i></a>
												</li>
												<li>
													<a href="{{ url('/Esta_RH_Edad') }}"><span>Edad </span> <i class="icon-arrow"></i></a>
												</li>
												<li>
													<a href="{{ url('/Esta_RH_Antiguedad') }}"><span>Antigüedad </span> <i class="icon-arrow"></i></a>
												</li>
												<li>
													<a href="{{ url('/Esta_RH_TiempoDedicacion') }}"><span>Tiempo Dedicación </span> <i class="icon-arrow"></i></a>
												</li>
											</ul>
										</li>
									</ul>
								</li>

								<li>
									<a href="javascript:void(0)">
										<div class="item-content">
											<div class="item-media">
												<div class="lettericon" data-color="auto" data-text="BI" data-size="sm" data-char-count="2"></div>
											</div>
											<div class="item-inner">
												<span class="title"> BI </span><i class="icon-arrow"></i>
											</div>
										</div>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="javascript:;">
												<span>Recursos Humanos</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/BI_RH_Personal') }}"><span>Personal </span> <i class="icon-arrow"></i></a>
												</li>
											</ul>
										</li>
									</ul>
								</li>

								<li>
									<a href="javascript:void(0)">
										<div class="item-content">
											<div class="item-media">
												<div class="lettericon" data-color="auto" data-text="CATA" data-size="sm" data-char-count="2"></div>
											</div>
											<div class="item-inner">
												<span class="title"> Catálogos </span><i class="icon-arrow"></i>
											</div>
										</div>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="javascript:;">
												<span>Universidad</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/Empresa') }}">
														<span>Empresa </span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Sede') }}">
														<span>Sede</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/SuperiorJerarquico') }}">
														<span>Superior Jerarquico</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Departamento') }}">
														<span>Departamento</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/CategoriaPuesto') }}">
														<span>Categoría</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Puesto') }}">
														<span>Puesto</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/TipoContrato') }}">
														<span>Tipo Contrato</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/AreaFormacion') }}">
														<span>Area Formación</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/PostgradoTipo') }}">
														<span>Tipo Postgrado</span> <i class="icon-arrow"></i>
													</a>
												</li>

												<li>
													<a href="{{ url('/PostgradoSituacion') }}">
														<span> Situación Postgrado</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Carrera') }}">
														<span>Carreras</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/EjeFormacion') }}">
														<span>Eje Formación</span> <i class="icon-arrow"></i>
													</a>
												</li>

												<li>
													<a href="{{ url('/Generacion') }}">
														<span> Generación</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Documentos') }}">
														<span>Documentos</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/DocumentoClasificacion') }}">
														<span>Clasificación Documentos</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Lengua') }}">
														<span>Lenguas </span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Discapacidad') }}">
														<span>Discapacidades </span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/ConocimientoComputo') }}">
														<span>Cómputo </span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/FormacionBasica') }}">
														<span>Formación Básica </span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/VinculacionNivelParticipacion') }}">
														<span>Vinculacion Nivel </span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/InvestigacionNivelParticipacion') }}">
														<span>Investigación Nivel </span> <i class="icon-arrow"></i>
													</a>
												</li>
											</ul>
										</li>

										<li>
											<a href="javascript:;">
												<span>General</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/Pais') }}">
														<span>País</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Entidad') }}">
														<span>Entidad Federativa</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/Municipio') }}">
														<span>Municipio</span> <i class="icon-arrow"></i>
													</a>
												</li> 
												<li>
													<a href="{{ url('/Localidad') }}">
														<span>Localidad</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/EstadoCivil') }}">
														<span>Estado Civil</span> <i class="icon-arrow"></i>
													</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>

								<li>
									<a href="javascript:void(0)">
										<div class="item-content">
											<div class="item-media">
												<div class="lettericon" data-color="auto" data-text="TITULACION" data-size="sm" data-char-count="2"></div>
											</div>
											<div class="item-inner">
												<span class="title"> Titulación </span><i class="icon-arrow"></i>
											</div>
										</div>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="javascript:;">
												<span>Proceso</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/Titulacion_Alta') }}">
														<span>Alta</span> <i class="icon-arrow"></i>
													</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>

								<li>
									<a href="javascript:void(0)">
										<div class="item-content">
											<div class="item-media">
												<div class="lettericon" data-color="auto" data-text="SE" data-size="sm" data-char-count="2"></div>
											</div>
											<div class="item-inner">
												<span class="title"> Servicio Escolar </span><i class="icon-arrow"></i>
											</div>
										</div>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="javascript:;">
												<span>Alumnos</span> <i class="icon-arrow"></i>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/SE_Alumno') }}">
														<span>Consulta</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/SE_Alumnos_Alta') }}">
														<span>Alta</span> <i class="icon-arrow"></i>
													</a>
												</li>
												<li>
													<a href="{{ url('/SE_Alumnos_CM') }}">
														<span>Carga Masiva</span> <i class="icon-arrow"></i>
													</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>

							</ul>

						</nav>
					</div>
				</div>
			</div>

			<div class="app-content">

				<header class="navbar navbar-default navbar-static-top">

					<div class="navbar-header">
						<button href="#" class="sidebar-mobile-toggler pull-left btn no-radius hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand" href=""> <img src="{{ asset('/assets/images/logo.png?v=2') }}" alt=""/> </a>
						<a class="navbar-brand navbar-brand-collapsed" href=""> <img src="{{ asset('assets/images/logo-collapsed.png?v=5') }}" alt="" /> </a>

						<button class="btn pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse" data-toggle-class="menu-open">
							<i class="fa fa-folder closed-icon"></i><i class="fa fa-folder-open open-icon"></i><small><i class="fa fa-caret-down margin-left-5"></i></small>
						</button>
					</div>

					<div class="navbar-collapse collapse">
						<ul class="nav navbar-left hidden-sm hidden-xs">
							<li class="sidebar-toggler-wrapper">
								<div>
									<button href="javascript:void(0)" class="btn sidebar-toggler visible-md visible-lg">
										<i class="fa fa-bars"></i>
									</button>
								</div>
							</li>
							<li>
								<a href="#" class="toggle-fullscreen"> <i class="fa fa-expand expand-off"></i><i class="fa fa-compress expand-on"></i></a>
							</li>
							<li>
								<form role="search" class="navbar-form main-search">
									<div class="form-group">
										<input type="text" placeholder="Buscar..." class="form-control">
										<button class="btn search-button" type="submit">
											<i class="fa fa-search"></i>
										</button>
									</div>
								</form>
							</li>
						</ul>
						<ul class="nav navbar-right">

							<li class="dropdown">
								<a href class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell"></i> </a>
								<ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large animated fadeInUpShort">
									<li>
										<span class="dropdown-header">Notificaciones</span>
									</li>
									<li class="view-all">
										<a href="#"> Ver Todas </a>
									</li>
								</ul>
							</li>


							<li class="dropdown">
								<a href="{{ url('/Logout') }}"> <i class="fa fa-power-off"></i> </a>
							</li>

						</ul>

                    </div>

				</header>

				<div class="main-content">
					<div class="wrap-content container" id="container">

						@yield('customBread')

						@yield('customContent')

					</div>
				</div>
			</div>

			<footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> SIAAUIET</span>. <span>Todos los derechos reservados.</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>



		</div>


		<script src="{{ asset('/bower_components/jquery/dist/jquery.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/components-modernizr/modernizr.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/js-cookie/src/js.cookie.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/jquery-fullscreen/jquery.fullscreen-min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/switchery/dist/switchery.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/jquery.knobe/dist/jquery.knob.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/slick.js/slick/slick.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/jquery-numerator/jquery-numerator.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/ladda/dist/spin.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/ladda/dist/ladda.min.js?v=2') }}"></script>
		<script src="{{ asset('/bower_components/ladda/dist/ladda.jquery.min.js?v=2') }}"></script>

		@yield('customScript')

		<script src="{{ asset('/assets/js/letter-icons.js?v=2') }}"></script>
		<script src="{{ asset('/assets/js/main.js?v=44') }}"></script>

		@yield('customScript2')

	</body>
</html>
