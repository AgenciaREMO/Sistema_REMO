
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url()?>"><img src="<?= base_url() ?>img/logo-remo.png" alt="Logo_REMO"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador de Cotizaciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url()?>conceptos/listaDescripciones">Conceptos</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>cotizaciones/listaCotizaciones">Cotizaciones Emitidas</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>cotizaciones/listaCotizacionesPendientes">Cotizaciones Pendientes</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>elementos_seccion/listaElementosSeccion">Elementos de Sección</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Generador de Portafolios<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url()?>portafolios/c_portafolios/mostrarPortafolio">Portafolios</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>c_imagenes/cargarListaImagenes">Contenido gráfico</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Proyectos</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Cerrar sesión </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

    <br>
    <br>