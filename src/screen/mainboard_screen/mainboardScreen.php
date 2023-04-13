<?php

session_start();
require_once '../../config/userOpts/userOpts.php';
require_once '../../components/navbar/navbar.php';
require_once '../../components/bottonBar/bottomNav.php';
require_once '../../components/toast/toast.php';
require_once '../../components/modal/modal.php';

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
    <link rel="stylesheet" href="../../components/modal/modal.css">

    <!--- CSS de paginas ajax--->
    <link rel="stylesheet" href="../../pages/home_page/homeStyle.css">
    <link rel="stylesheet" href="../../pages//student_page/studentStyle.css">

    <!---Datatables--->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    switch($type){
        case 'Control':
            renderNavBar($controlSidebarOpts);
            break;
        case 'Coordinador':
            renderNavBar($coordinadorSidebarOpts);
            break;
        case 'Prefecto':
            renderNavBar($prefectoSidebarOpts);
            break;
        case 'Maestro':
            renderNavBar($teacherSidebarOpts);
            break;
        case 'GOD':
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
            renderBottomBar($controlBottomOpts);
            break;
        case 'Coordinador':
            renderBottomBar($coordinadorBottomOpts);
            break;
        case 'Prefecto':
            renderBottomBar($prefectoBottomOpts);
            break;
        case 'Maestro':
            renderBottomBar($teacherBottomOpts);
            break;
        case 'GOD':
            renderBottomBar($godBottomOpts);
            break;
    }
    ?>


    <?php createModal();?>
    <?php editUserModal();?>
    <?php alertUpdateData();?>
    <?php alertSuccessData();?>
    <?php assitanceModal();?>
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

            //Edit Student Data
            $(document).on('click', "#editData", function(){
                $("#modal").hide();
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadChangeInfo',
                        id_student: localStorage.getItem('clickedRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response){
                        $("#modalStudentEdit").html(response);
                        $("#editStudentDataModal").modal('show');
                    }
                })
            });

            //Asistencia
            $(document).on('click', "#assitanceM, #assitanceH", function(){
                $("#modal").modal('hide');
                $("#assistance").modal('show');
            });

            $(document).on('click', '#assitanceModal', function(){
                $("#assistance").modal('hide');
                $("#modal").modal('show');
            })

            //Update data

            $(document).on('click', '#confirm', function(){

                let name = $("#updatedName").val();
                let apPat = $("#updatedLastName").val();
                let apMat = $("#updatedMotherLastName").val();
                let turno = $("#updatedTurno").val();
                let grado = $("#updatedGrado").val();
                let grupo = $("#updatedGrupo").val();

                if(name == ''){
                    alert('El nombre no puede ser vacio');
                    $("#updatedName").focus();
                    return;
                }

                if(apPat == ''){
                    alert('El apellido paterno no puede ser vacio');
                    $("#updatedLastName").focus();
                    return;
                }

                if(apMat == ''){
                    alert('El apellido materno no puede ser vacio');
                    $("#updatedMotherLastName").focus();
                    return;
                }

                if(turno == ''){
                    alert('El turno no puede ser vacio');
                    $("#updatedTurno").focus();
                    return;
                }

                if(grado == ''){
                    alert('El grado no puede ser vacio');
                    $("#updatedGrado").focus();
                    return;
                }

                if(grupo == ''){
                    alert('El grupo no puede ser vacio');
                    $("#updatedGrupo").focus();
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'updateStudent',
                        id_student: localStorage.getItem('clickedRow'),
                        name: name,
                        apPt: apPat,
                        apMt: apMat,
                        turno: turno,
                        grado: grado,
                        grupo: grupo
                    }),
                    dataType: 'html',
                    async: false,
                    success: function (response){
                        if(response == 'Success'){
                            showSucess();
                        }else{
                            showFailed();
                        }
                    }
                })
                
            })
            
            $(document).on('click', '#closeSuccess', function(){
                closeAllModals();
            })

            $(document).on('click', "#updateData", function(){
                $("#editStudentDataModal").modal('hide');
                $("#confirmUpdate").modal('show');
            })

            $(document).on('click','#cancelUpdate', function(){
                $("#editStudentDataModal").modal('hide');
                $("#modal").show();
            })

            $(document).on('click', '#cancelConfirm', function(){
                $("#confirmUpdate").hide();
                $("#editStudentDataModal").modal('show');
            })

            $(document).on('click', "#closeModalStudent", function(){
                closeAllModals();
            })

            $(document).on('click', '#homeCardComponent, #home, #homeBottom', function(){
                loadHome();
            });

            $(document).on('click', '#studentsCardComponent, #students, #studentsBottom', function(){
                loadStudnets();
                loadStudentData();
            })

            function closeAllModals(){
                $("#modal").modal('hide');
                $("#editStudentDataModal").modal('hide');
                $("#confirmUpdate").modal('hide');
                $("#successUpdate").modal('hide');
                $("#alertFailedData").modal('hide');
            }

            function showSucess(){
                $("#confirmUpdate").hide();
                $("#successUpdate").modal('show');
            }

            function showFailed(){
                $("#confirmUpdate").hide();
                $("#alertFailedData").modal('show');
            }

            //Loading Components functions

            function loadDOM(){
                const DOMPage = localStorage.getItem('currentPage');
                if(DOMPage === null){
                    loadHome();
                }else if(DOMPage === 'homePage'){
                    loadHome();
                }else if(DOMPage === 'studentPage'){
                    loadStudnets();
                    loadStudentData();
                }
            }

            function loadHome(){
                $("#MainContent").load('../../pages/home_page/homePage.php');
                localStorage.setItem('currentPage', 'homePage');
            }

            function loadStudnets(){
                $("#MainContent").load('../../pages/student_page/studentPage.php');
                localStorage.setItem('currentPage', 'studentPage');
            }

            //Live Tipe Student Searcher
            $(document).on('keyup', "#searchStudent", function(){
                loadStudentData();
            })

            $(document).on('change', "#filterTurno, #filterGrado, #filterGrupo", function(){
                loadStudentData();
            });

            //Handle Click Row TR

            $("#modal").on('shown.bs.modal', function(){
                loadStudentAssistance(localStorage.getItem('clickedRow'));
            })

            $(document).on('click', '#studentTableBody tr', function(){
                localStorage.setItem('clickedRow', this.id);
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadModalBody',
                        id_alumno: this.id
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(modalBody){
                        $("#modalBody").html(modalBody);
                        $("#modal").modal('show');
                    }
                })
            });

            function loadStudentAssistance(id){
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadAssistance',
                        id_alumno: id
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(dataTr){
                        console.log(dataTr);
                        $("#assistanceTable").html(dataTr);
                    }
                })
            }

            //Load data Tables

            function loadStudentData(){

                let nameSearched = '';
                let groupSearched = '';
                let gradeSearched = '';
                let shiftSearched = '';

                if($("#searchStudent").val() !== '' && $("#searchStudent").val() !== undefined){
                    nameSearched = $("#searchStudent").val();
                }

                if($("#filterTurno").val() !== '' && $("#filterTurno").val() !== undefined){
                    shiftSearched = $("#filterTurno").val();
                }

                if($("#filterGrado").val() !== '' && $("#filterGrado").val() !== undefined){
                    gradeSearched = $("#filterGrado").val();
                }

                if($("#filterGrupo").val() !== '' && $("#filterGrupo").val() !== undefined){
                    groupSearched = $("#filterGrupo").val();
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadStudentData',
                        name: nameSearched,
                        turno: shiftSearched,
                        grado: gradeSearched,
                        grupo: groupSearched
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(data){
                        $("#studentTableBody").html(data);
                    }
                })
            }
            
        });
    </script>
</body>
</html>

