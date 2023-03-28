<?php
session_start();

if(isset($_SESSION['sessionUser'])) {
    header("Location: ../mainboard_screen/mainboardScreen.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Layout</title>

    <link rel="stylesheet" href="./loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head>
<body style="height: 100vh; overflow:hidden;">
    <div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 col-sm-11 col-lg-8 glassmorph text-center d-flex">
            <div class="col-12 col-sm-13 col-lg-12 col-xl-6 h-100 d-flex flex-column justify-content-between">
                <div class="row d-flex flex-column">
                    <div class="col-12 col-sm-12 col-lg-8">
                        <img src="../../assets/img/tecnicaLogo.svg" class="img-fluid" alt="">
                    </div>
                    <div class="col col-sm-9 mx-auto mt-4">
                        <h1 class="welcomeBlack">Bienvenido!</h1>
                        <p class="messageWelcome">Al sistema de control escolar de la Secundaria Tecnica.</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center mx-auto flex-column w-100">
                    <div class="col-sm-9 col-lg-10">
                        <div class="row d-flex flex-column inputs">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="emailInput" placeholder="name@example.com">
                                    <label for="floatingInput">Correo</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                                    <label for="floatingPassword">Contraseña</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px; margin-bottom: 10px">
                        <a class="text-center" href="">Olvide mi contraseña</a>
                    </div>
                </div>
                <div class="row d-flex flex-row justify-content-center align-items-center" style="height: 18%">
                    <div class="col-12 col-sm-9 col-lg-6">
                        <button class="btn btn-lg btn-responsive btn-primary w-75 button" id="loginBtn" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Iniciar Sesion</button>
                    </div>
                    <div class="col-12 col-sm-9 col-lg-6">
                        <button class="btn btn-lg btn-responsive btn-outline-primary w-75" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Pide Acceso</button>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-10 mx-auto">
                    <div class="row">
                        <p class="disclaimer">Este sistema solo se puede accede una vez la cuenta se encuentre creada por algún administrador. Si usted  no cuenta con una cuenta. Pida acceso o comuníquese con el administrador.</p>
                    </div>
                </div>
            </div>
            <div class="d-none d-xl-block flex-column col-lg-6">
                <div class="row h-100 d-flex justify-content-center align-items-center">
                    <img src="../../assets/img/sideImg.svg" style="width: 80%"alt="">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){

            $("#loginBtn").on('click', function(){

                event.preventDefault();

                if($("#emailInput").val() == ''){
                    alert("Email vacio");
                    return false;
                }

                if($("#passwordInput").val() == ''){
                    alert('Contraseña Vacia')
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "../../controller/login_controller/loginController.php",
                    data: ({
                        function: "LOGIN",
                        email: $("#emailInput").val(),
                        password: $("#passwordInput").val()
                    }),
                    dataType: "html",
                    async: false,
                    success: function(response){
                        if (response == 'Failed') {
                            alert("Error al hacer login");
                            return false;
                        } else if (response == 'Success') {
                            window.location = '../mainboard_screen/mainboardScreen.php';
                        }
                    }
                })
            });
        });
    </script>
</body>
</html>