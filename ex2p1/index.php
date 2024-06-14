<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
          .bg{
            background-image: url(imagen.jpg);
            background-position: center center;
          }
          .fondo{
            background-image: url(fondo.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            overflow: hidden;
            max-width: 100%;
            height: auto;
          }
        </style>
    </head>
    <body class="fondo">
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-6 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                  <div class="card border-0 shadow-sm bg-light rounded ">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                      <div class="row">
                        <div class="col-12">
                          <div class="mb-5">
                            <h3 class="text-center text-primary fs-1">INICIO DE SESION</h3>
                          </div>
                        </div>
                      </div>
                      <form action="sesion.php" method="POST">
                        <div class="row gy-3 overflow-hidden">
                          <div class="col-12">
                            <div class="form-floating mb-3">
                              <input value="jhon123" type="text" class="form-control" name="usuario" id="email" placeholder="name@example.com">
                              <label for="email" class="form-label fa-4">Usuario</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-floating mb-3">
                              <input value="123456" type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
                              <label for="password" class="form-label">Password</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <?php
                              if(isset($_GET["mensaje"])){
                                echo "<h3 class='text-danger'>Contraseña o usuario incorrecto</h3>";
                              }
                            ?>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <input class="btn bsb-btn-2xl btn-primary" type="submit" value="Entrar">
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-6 bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                </div> 
              </div>
            </div>
          </section> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
