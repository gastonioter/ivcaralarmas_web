
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" href="https://ivcaralarmas.com/public/img/logo.png">
        <meta name="apple-mobile-web-app-title" content="Ivcar Alarmas">

        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" sizes="196x196" href="https://ivcaralarmas.com/public/img/logo.png">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Una app de IoT" />
        <meta name="author" content="Ivcar alarmas" />
        <title><?= esc($doc) ?></title>

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=base_url()?>/public/css/style.custom.css">
		<link rel="stylesheet" href="<?=base_url()?>/public/fontawesome/css/all.css">

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
					<img class="img-fluid" src="<?=base_url()?>/public/img/logo.png" alt="..." />
                    <!--<a class="navbar-brand mx-lg-5 mx-1" href="#">Ivcar Alarmas</a>-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#home">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="#products">Productos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#alarmasmart">Alarma WiFi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-dark py-5"  id="home">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"> <b class="text-primary">IVCAR</b> ALARMAS</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Somos una empresa de seguridad que diseñamos sistemas inteligentes basados en la tecnología IoT. </p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?=base_url().route_to('app_register')?>">Registrarme</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="<?=base_url().route_to('app_login')?>">Log In</a>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="<?=base_url()?>/public/img/home/internet-of-things.png" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section -->
            <section class="py-5" id="products">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Sistemas de domótica a medida.</h2></div>

                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-broadcast"></i></div>
                                    <h2 class="h5">Alarmas WiFi</h2>
                                    <p class="mb-0">Comandá y visualizá el estado de los sensores de tu alarma en tiempo real desde cualquier sitio remoto.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-house-door-fill"></i></div>
                                    <h2 class="h5">Automatización del hogar</h2>
                                    <p class="mb-0">Con sólo un click encenderás tus luces, riego, bombas, y cualquier dispositivo.</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-thermometer-sun"></i></div>
                                    <h2 class="h5">Sensado</h2>
                                    <p class="mb-0">Controlar temperatura, humedad, horas de trabajo de una maquina y más.</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-closed-fill"></i></div>
                                    <h2 class="h5">Control de Acceso</h2>
                                    <p class="mb-0">Administrá el acceso en estacionamientos, casas, oficinas. Podés editar desde un panel los autorizados a ingresar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="py-5 bg-light">
            </div>

            <!-- Blog preview section -->
            <section class="py-5 " id="alarmasmart">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Una alarma Inteligente</h2>
                                <p class="lead fw-normal text-muted mb-5">Convertí tu alarma convencional en una alarma smart.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="<?=base_url()?>/public/img/home/compatibilidad.png" alt="logo" />
                                <div class="card-body p-4">

                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Compatibilidad</h5></a>
                                    <p class="card-text mb-0">Nuestro sistema es compatible con cualquier alarma del mercado que ya tengas instalada. En unos simples pasos harás de ella una alarma inteligente.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                              <img class="card-img-top" src="<?=base_url()?>/public/img/home/notificationsapp.png" alt="logo" />
                                <div class="card-body p-4">

                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Notificaciones</h5></a>
                                    <p class="card-text mb-0">Cuando se dispare algún evento, recibirás alertas mediante SMS y/o llamadas a tus números de teléfono que registés en el sistema.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="<?=base_url()?>/public/img/home/dashboardapp.png" alt="logo" />
                                <div class="card-body p-4">

                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Dashboard</h5></a>
                                    <p class="card-text mb-0">Comandá y visualizá en tiempo real tu alarma desde una app web. También tenés gráficos con eventos históricos</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Call to action
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                                <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                                </div>
                                <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                            </div>
                        </div>
                    </aside> -->
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto" id="contact">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">&copy; Ivcar Alarmas <b class="inline" id="year"></b></div></div>
                    <div class="col-auto">
                      <a class="">Contactános</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="https://api.whatsapp.com/send?phone=543385448580"><i class="fas fa-phone-alt"></i></a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="mailto:alarmasivcar@hotmail.com"><i class="fas fa-envelope"></i></a>
                      </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<script type="text/javascript">
  var fecha = new Date();
  var ano = fecha.getFullYear();
  elemento = document.getElementById("year");
  elemento.innerHTML=ano;

  if(navigator.onLine) {
    goOnline();
} else {
   goOffile();
}

window.addEventListener('offline', goOffline());
window.addEventListener('online', goOnline());

function goOnline() {
    document.body.classList.remove('offline');
    document.body.classList.add('online');
    // Hacer algo más al ir online
}

function goOffline() {
    document.body.classList.remove('online');
    document.body.classList.add('online');
    // Hacer algo más al ir offline
}
  </script>
