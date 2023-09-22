<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login con  PHP - Bootstrap 4</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        <link rel="icon" type="image/png" href="img/image.png"/>
    </head>
    
    <body>
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" method="post">
                <span class="login-form-title">LOGIN</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="user" name="usuario" placeholder="Usuario">

                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">

                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">INGRESAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>     

     <script src="js/jquery-3.3.1.min.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="js/login_2.js"></script>
      <script src="js/index_profile.js"></script>

    </body>
</html> 