<?php

session_start();
require_once '../../config/userOpts/userOpts.php';
require_once '../../components/navbar/navbar.php';
require_once '../../components/bottonBar/bottomNav.php';
require_once '../../components/toast/toast.php';

if(!isset($_SESSION['sessionUser'])) {
    header("Location: ../login_screen/loginScreen.php");
    exit();
}

$type = $_SESSION['sessionUser']['type'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Panel de ' . $type ?></title>
    <link rel="icon" href="../../assets/img/tecnicaMainLogo.svg" type="image/svg+xml">

    <link rel="stylesheet" href="./mainboardStyle.css">
    <link rel="stylesheet" href="../../components/navbar/navbar.css">
    <link rel="stylesheet" href="../../components/bottonBar/bottomNav.css">

    <!--- CSS de paginas ajax--->
    <link rel="stylesheet" href="../../pages/home_page/homeStyle.css">


    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    switch($type){
        case 'Control':
            //Navigation to Control Mainboard
            // header("Location: ./principal_mainboard/principalMainboard.php");
            renderNavBar($controlSidebarOpts);
            break;
        case 'Coordinador':
            //Navigation to Coordinador Mainboard
            // header("Location: ./coordinador_mainboard/coordinadorMainboard.php");
            renderNavBar($coordinadorSidebarOpts);
            break;
        case 'Prefecto':
            //Navigation to Perfecto Mainboard
            // header("Location: ./prefect_mainboard/prefectMainboard.php");
            renderNavBar($prefectoSidebarOpts);
            break;
        case 'Maestro':
            //Navigation to Perfecto Mainboard
            // header("Location: ./teacher_mainboard/teacherMainboard.php");
            renderNavBar($teacherSidebarOpts);
            break;
        case 'GOD':
            // header("Location: ./god_mainboard/godMainboard.php");
            renderNavBar($godSidebarOpts);
            break;
    }
    ?>
    <section class="home">
        <div class="text">
            <div class="container-fluid maxConainer" id="MainContent">

            </div>
        </div>
    </section>
    <?php 
    switch($type){
        case 'Control':
            //Navigation to Control Mainboard
            // header("Location: ./principal_mainboard/principalMainboard.php");
            renderBottomBar($controlBottomOpts);
            break;
        case 'Coordinador':
            //Navigation to Coordinador Mainboard
            // header("Location: ./coordinador_mainboard/coordinadorMainboard.php");
            renderBottomBar($coordinadorBottomOpts);
            break;
        case 'Prefecto':
            //Navigation to Perfecto Mainboard
            // header("Location: ./prefect_mainboard/prefectMainboard.php");
            renderBottomBar($prefectoBottomOpts);
            break;
        case 'Maestro':
            //Navigation to Perfecto Mainboard
            // header("Location: ./teacher_mainboard/teacherMainboard.php");
            renderBottomBar($teacherBottomOpts);
            break;
        case 'GOD':
            // header("Location: ./god_mainboard/godMainboard.php");
            renderBottomBar($godBottomOpts);
            break;
    }
    ?>

    <?php  showToast('failedLogout', 'Error al hacer Logout', 'Ha ocurrido un error al hacer logout, si esto persiste, comunicate con el administrador.'); ?>

    <script src="../../components/bottonBar/bottomNav.js"></script>
    <script src="../../components/navbar/navbar.js"></script>
    <script>
        $(document).ready(function(){

            loadDOM();

            $("#logout").on('click', function(){
                $.ajax({
                    type: "POST",
                    url: "../../controller/login_controller/loginController.php",
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

            $("#logoutBottom").on('click', function(){
                $.ajax({
                    type: "POST",
                    url: "../../controller/login_controller/loginController.php",
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

            $("#home, #homeBottom").on('click', function(){
                loadHome();
            });

            //Loading Components functions

            function loadDOM(){
                const DOMPage = localStorage.getItem('currentPage');
                if(DOMPage === null){
                    loadHome();
                }else if(DOMPage === 'homePage'){
                    loadHome();
                }
            }

            function loadHome(){
                $("#MainContent").load('../../pages/home_page/homePage.php');
                localStorage.setItem('currentPage', 'homePage');
            }
            
        });
    </script>
</body>
</html>

