<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Linked Bootstrap -->
    <?php require_once('./utils/bootstrap/cssLinked.php')?>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="./src/assets/img/tecnicaMainFavIco.png" type="image/png">

</head>
<body style="height: 100vh;">
    <div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center">
        <lottie-player src="src/assets/animations/loading.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        <h1>Cargado...</h1>
        <p class="red hidden" id="manual">Si no le ha redireccionado <a href="src/screen/login_screen/loginScreen.php">click aqui</a></p>
    </div>

    <?php require_once('./utils/lottie/jsLikned.php')?>
    <?php require_once('./utils/jquery/jsLinked.php')?>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                window.location = 'src/screen/login_screen/loginScreen.php'
                $("#manual").removeClass('hidden');
            }, 5000);
        })
    </script>
</body>
</html>