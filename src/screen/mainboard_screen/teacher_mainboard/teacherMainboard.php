<?php

session_start();

if(!isset($_SESSION['sessionUser'])) {
    header("Location: ../../login_screen/loginScreen.php");
    exit();
}

require_once('../../../components/toast/toast.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher mainboard</title>
    <link rel="icon" href="../../../assets/img/tecnicaMainLogo.svg" type="image/svg+xml">

    <link rel="stylesheet" href="./teacherMainboard.css">
    <link rel="stylesheet" href="../../../components/navbar/navbar.css">
    <link rel="stylesheet" href="../../../components/bottonBar/bottomNav.css">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8037ffea84.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php include('../../../components/navbar/navbar.php')?>

    <section class="home">
        <div class="text">
            <div class="container-fluid bg-danger">
                <h1>Teachers Mainboard</h1>
            </div>
        </div>
    </section>

    <?php include('../../../components/bottonBar/bottomNav.php')?>
    <?php  showToast('failedLogout', 'Error al hacer Logout', 'Ha ocurrido un error al hacer logout, si esto persiste, comunicate con el administrador.'); ?>

    <script src="../../../components/bottonBar/bottomNav.js"></script>
    <script src="../../../components/navbar/navbar.js"></script>
    <script>
        $(document).ready(function(){

            $("#logout").on('click', function(){
                $.ajax({
                    type: "POST",
                    url: "../../../controller/login_controller/loginController.php",
                    data: ({
                        function: "LOGOUT"
                    }),
                    dataType: "html",
                    async: false,
                    success: function(result){
                        if(result == 'Failed'){
                            $("#failedLogout").toast('show');
                        }else{
                            location.reload();
                        }
                    }
                })
            });
        })
    </script>
</body>
</html>