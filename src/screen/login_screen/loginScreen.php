<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../utils/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
    <div class="container-fluid h-100 d-flex justify-content-center align-items-center">
        <div class="col-8 h-75 neumoprhCard d-flex flex-row">
            <div class="col d-flex flex-column formContainer">
                <img src="../../assets/img/tecnicaLogo.svg" class="mainLogo" alt="">
                <div class="">
                    <h1>Bienvenido!</h1>
                    <p class="welcomeMessage">Al sistema de control escolar de la Secundaria Tecnica </p>
                    <div class="col-10 mx-auto">
                        <form action="#">
                            <div class="inputs">
                                    <div class="input-group input-group-lg mb-4">
                                        <input type="text" id="email" class="form-control" placeholder="Correo Electronico"/>
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                                    </div>
                            </div>
                        </form>
                        <p class="text-right"><a href="#">Olvide mi contraseña</a></p>
                        <div class="row btnDiv">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-lg btn-primary">Iniciar Sesion</button>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-lg btn-outline-primary">Pide Acceso</button>
                            </div>
                        </div>
                    </div>
                    <p class="warning">Este sistema solo se puede accede una vez la cuenta se encuentre creada por algún administrador. Si usted  no cuenta con una cuenta. Pida acceso o comuníquese con el administrador.</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <img src="../../assets/img/sideImg.svg" class="sideImg" alt="">
            </div>
        </div>
    </div>
</body>
</html>