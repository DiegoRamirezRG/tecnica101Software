<?php

session_start();
require_once '../../config/userOpts/userOpts.php';
require_once '../../components/navbar/navbar.php';
require_once '../../components/bottonBar/bottomNav.php';
require_once '../../components/toast/toast.php';
require_once '../../components/modal/modal.php';

if (!isset($_SESSION['sessionUser'])) {
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
    <link rel="stylesheet" href="../../pages/student_page/studentStyle.css">
    <link rel="stylesheet" href="../../pages/teacher_page/teacherStyle.css">
    <link rel="stylesheet" href="../../pages/schoolControl_page/schoolControlStyle.css">

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
    switch ($type) {
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
    switch ($type) {
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

    <!-- se manda a llamar cada modal del src/components/modal -->

    <?php createModal(); ?>
    <?php editUserModal(); ?>
    <?php alertUpdateData(); ?>
    <?php alertSuccessData(); ?>
    <?php assitanceModal(); ?>
    <?php conductModal(); ?>
    <?php addConductModal(); ?>
    <?php addNewStudent(); ?>
    <?php addNewTeacherModal(); ?>
    <?php loadTeacherDetailsModal(); ?>
    <?php assignClassTeacher(); ?>
    <?php editTeacher(); ?>
    <?php addNewSchoolControlModal(); ?>
    <?php loadSchoolControlDetailsModal(); ?>
    <?php editSchoolControl(); ?>

    <!-- Se manda a llamar cada toast de src/components/toast -->

    <?php showToast('failedLogout', 'Error al hacer Logout', 'Ha ocurrido un error al hacer logout, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedAddConduct', 'Error al agregar Conducta', 'Ha ocurrido un error al agregar la nueva conducta, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedNewStudent', 'Error al agregar al Estudiante', 'Ha ocurrido un error al nuevo estudiante, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedNewTeacher', 'Error al agregar al Profesor', 'Ha ocurrido un error al nuevo profesor, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedNewSchoolControl', 'Error al agregar al Administrativo', 'Ha ocurrido un error al nuevo administrativo, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedAssignClass', 'Error al asignar la Materia', 'Ha ocurrido un error al asignar la materia al profesor, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedUpdateTeacher', 'Error al acutalizar la Data', 'Ha ocurrido un error al actualizar la data del profesor, si esto persiste, comunicate con el administrador.'); ?>
    <?php showToast('failedUpdateSchoolControl', 'Error al acutalizar la Data', 'Ha ocurrido un error al actualizar la data del Administrativo, si esto persiste, comunicate con el administrador.'); ?>


    <?php showSucessToast('toastSuccessUpdate', 'Actualizacion de data exitosa', 'La asistencia se actualizo correctamente') ?>
    <?php showSucessToast('successConductUpdate', 'Agregado de data exitosa', 'La conducta se agrego correctamente') ?>
    <?php showSucessToast('successNewStudent', 'Agregado de data exitosa', 'El alumno se agrego correctamente') ?>
    <?php showSucessToast('successNewTeacher', 'Agregado de data exitosa', 'El profesor se agrego correctamente') ?>
    <?php showSucessToast('successNewSchoolControl', 'Agregado de data exitosa', 'El administrativo se agrego correctamente') ?>
    <?php showSucessToast('successNewAssignClass', 'Agregado de data exitosa', 'Se le asigno la materia al profesor correctamente') ?>
    <?php showSucessToast('successUpdateDate', 'Agregado de data exitosa', 'Se actualizaco al profesor correctamente') ?>
    <?php showSucessToast('successUpdateSchoolControlDate', 'Agregado de data exitosa', 'Se actualizaco al administrativo correctamente') ?>

    <script src="../../components/bottonBar/bottomNav.js"></script>
    <script src="../../components/navbar/navbar.js"></script>

    <script>
        $(document).ready(function() {

            loadDOM();

            $("#logout").on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "../../controller/login_controller/loginController.php",
                    data: ({
                        function: "LOGOUT"
                    }),
                    dataType: "html",
                    async: false,
                    success: function(result) {
                        if (result == 'Failed') {
                            $("#failedLogout").toast('show');
                        } else {
                            location.reload();
                        }
                    }
                })
            });

            $("#logoutBottom").on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "../../controller/login_controller/loginController.php",
                    data: ({
                        function: "LOGOUT"
                    }),
                    dataType: "html",
                    async: false,
                    success: function(result) {
                        if (result == 'Failed') {
                            $("#failedLogout").toast('show');
                        } else {
                            location.reload();
                        }
                    }
                })
            });

            ///SchoolControl
            ///SchoolControl
            ///SchoolControl

            //Show New SchoolControl Modal
            $(document).on('click', '#newSchoolControlBtn', function() {
                $("#addNewSchoolControlModal").modal('show');
            });

            //Hide New SchoolControl Modal
            $(document).on('click', '#addNewSchoolControlClose', function() {
                $("#addNewSchoolControlModal").modal('hide');
            });

            //Lunch live search
            $(document).on('keyup', '#schoolControlSearched', function() {
                loadSchoolControlTable();
            })

            //LoadSchoolControlTable
            function loadSchoolControlTable() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/schoolControl_controller/schoolControlController.php',
                    data: ({
                        function: 'schoolControlLoadTable',
                        name: $("#schoolControlSearched").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#schoolControlTableBody").html(response);
                    }
                })
            };

            //Register a New SchoolControl User
            $(document).on('click', '#newSchoolControlButton', function() {

                if ($("#newSchoolControlName").val() == "") {
                    alert('El nombre no puede ser vacio');
                    $("#newSchoolControlName").focus();
                    return;
                }

                if ($("#newSchoolControlLastname").val() == "") {
                    alert('El Apellido Paterno no puede ser vacio');
                    $("#newSchoolControlLastname").focus();
                    return;
                }

                if ($("#newSchoolControlMLastname").val() == "") {
                    alert('El Apellido Materno no puede ser vacio');
                    $("#newSchoolControlMLastname").focus();
                    return;
                }

                if ($("#newSchoolControlPhone").val() == "") {
                    alert('El Telefono no puede ser vacio');
                    $("#newSchoolControlPhone").focus();
                    return;
                }

                if ($("#newSchoolControlEmail").val() == "") {
                    alert('El Correo no puede ser vacio');
                    $("#newSchoolControlEmail").focus();
                    return;
                }

                if ($("#newSchoolControlPassword").val() == "") {
                    alert('La Contraseña no puede ser vacia');
                    $("#newSchoolControlPassword").focus();
                    return;
                }

                if ($("#newSchoolControlConfirmPassword").val() == "") {
                    alert('La Confirmacion de Contraseña no puede ser vacia');
                    $("#newSchoolControlConfirmPassword").focus();
                    return;
                }

                if ($("#newSchoolControlPassword").val() != $("#newSchoolControlConfirmPassword").val()) {
                    alert('Las Contraseñas no coinciden');
                    $("#newSchoolControlPassword").focus();
                    $("#newSchoolControlConfirmPassword").focus();
                    return;
                }

                $.ajax({
                    method: "POST",
                    url: '../../controller/schoolControl_controller/schoolControlController.php',
                    data: ({
                        function: 'createNewSchoolControl',
                        name: $("#newSchoolControlName").val(),
                        lastname: $("#newSchoolControlLastname").val(),
                        mothersLN: $("#newSchoolControlMLastname").val(),
                        phone: $("#newSchoolControlPhone").val(),
                        email: $("#newSchoolControlEmail").val(),
                        password: $("#newSchoolControlPassword").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == "Success") {
                            $("#addNewSchoolControlModal").modal('hide');
                            $("#successNewSchoolControl").toast('show');

                            $("#newSchoolControlName").val('');
                            $("#newSchoolControlLastname").val('');
                            $("#newSchoolControlMLastname").val('');
                            $("#newSchoolControlPhone").val('');
                            $("#newSchoolControlEmail").val('');
                            $("#newSchoolControlPassword").val('');
                            $("#newSchoolControlConfirmPassword").val('');

                            loadSchoolControlTable();
                        } else {
                            $("#failedNewSchoolControl").toast('show');
                        }
                    }
                })
            });

            //Show Detail Modal SchoolControl
            $(document).on('click', '#schoolControlTableBody tr', function() {
                localStorage.setItem('schoolControlRow', this.id);
                $.ajax({
                    method: 'POST',
                    url: '../../controller/schoolControl_controller/schoolControlController.php',
                    data: ({
                        function: 'loadSchoolControlDetails',
                        id_user: this.id
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#schoolControlDetailsModalBody").html(response);
                        $("#schoolControlDetailsModal").modal('show');
                    }
                })
            });

            //Hide Detail Modal SchoolControl
            $(document).on('click', '#closeSchoolControlDetailsModal', function() {
                $("#schoolControlDetailsModal").modal('hide');
            });

            //Load Update Modal SchoolControl
            $(document).on('click', '#editSchoolControlBtn', function() {
                $("#schoolControlDetailsModal").modal('hide');
                $.ajax({
                    method: 'POST',
                    url: '../../controller/schoolControl_controller/schoolControlController.php',
                    data: ({
                        function: 'loadUpdateModalSchoolControl',
                        id_user: localStorage.getItem('schoolControlRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#editSchoolControlBody").html(response);
                        $("#editSchoolControlModal").modal('show');
                    }
                })
            });

            function loadUpdateSchoolControlModalFunc() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/schoolControl_controller/schoolControlController.php',
                    data: ({
                        function: 'loadUpdateModalSchoolControl',
                        id_user: localStorage.getItem('schoolControlRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#editSchoolControlBody").html(response);
                        $("#editSchoolControlModal").modal('show');
                    }
                })
            }

            //Hide Update Modal
            $(document).on('click', '#editSchoolControlClose', function() {
                $("#editSchoolControlModal").modal('hide');
                $("#schoolControlDetailsModal").modal('show');
            });

            $(document).on('click', '#editSchoolControlButton', function() {

                if ($("#editSchoolControlName").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editSchoolControlName").focus()
                    return;
                }
                if ($("#editSchoolControlLastname").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editSchoolControlLastname").focus()
                    return;
                }
                if ($("#editSchoolControlMLastname").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editSchoolControlMLastname").focus()
                    return;
                }
                if ($("#editSchoolControlPhone").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editSchoolControlPhone").focus()
                    return;
                }
                if ($("#editSchoolControlEmail").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editSchoolControlEmail").focus()
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/schoolControl_controller/schoolControlController.php',
                    data: ({
                        function: 'updateSchoolControlInfo',
                        name: $("#editSchoolControlName").val(),
                        last_name: $("#editSchoolControlLastname").val(),
                        mothersL: $("#editSchoolControlMLastname").val(),
                        phone: $("#editSchoolControlPhone").val(),
                        email: $("#editSchoolControlEmail").val(),
                        id_user: localStorage.getItem('schoolControlRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == 'Success') {
                            $("#editSchoolControlModal").modal('hide');
                            $("#schoolControlDetailsModal").modal('show');
                            loadSchoolControlTable();
                            $("#successUpdateSchoolControlDate").toast('show');
                        } else {
                            $("#failedUpdateSchoolControl").toast('show');
                        }
                    }
                })

            });

            ///TEACHER
            ///TEACHER
            ///TEACHER

            //Show New Teacher Modal
            $(document).on('click', '#newTeacherBtn', function() {
                $("#addNewTeacherModal").modal('show');
            });

            //Hide New Teacher Modal
            $(document).on('click', '#addNewTeacherClose', function() {
                $("#addNewTeacherModal").modal('hide');
            });

            //Lunch live search
            $(document).on('change', '#filterGradoTeacher, #filterGrupoTeacher, #filterTurnoTeacher', function() {
                loadTeachersTable();
            })

            $(document).on('keyup', '#classSearched, #teacherSearched', function() {
                loadTeachersTable();
            })

            //LoadTeacherTable
            function loadTeachersTable() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadTable',
                        grade: $("#filterGradoTeacher").val(),
                        group: $("#filterGrupoTeacher").val(),
                        shift: $("#filterTurnoTeacher").val(),
                        class: $("#classSearched").val(),
                        name: $("#teacherSearched").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#teachersTableBody").html(response);
                    }
                })
            };

            //Register a New Teacher
            $(document).on('click', '#newTeacherButton', function() {

                if ($("#newTeacherName").val() == "") {
                    alert('El nombre no puede ser vacio');
                    $("#newTeacherName").focus();
                    return;
                }

                if ($("#newTeacherLastname").val() == "") {
                    alert('El Apeido Paterno no puede ser vacio');
                    $("#newTeacherLastname").focus();
                    return;
                }

                if ($("#newTeacherMLastname").val() == "") {
                    alert('El Apeido Materno no puede ser vacio');
                    $("#newTeacherMLastname").focus();
                    return;
                }

                if ($("#newTeacherPhone").val() == "") {
                    alert('El Telefono no puede ser vacio');
                    $("#newTeacherPhone").focus();
                    return;
                }

                if ($("#newTeacherEmail").val() == "") {
                    alert('El Correo no puede ser vacio');
                    $("#newTeacherEmail").focus();
                    return;
                }

                if ($("#newTeacherPassword").val() == "") {
                    alert('La Contraseña no puede ser vacia');
                    $("#newTeacherPassword").focus();
                    return;
                }

                if ($("#newTeacherConfirmPassword").val() == "") {
                    alert('La Confirmacion de Contraseña no puede ser vacia');
                    $("#newTeacherConfirmPassword").focus();
                    return;
                }

                if ($("#newTeacherPassword").val() != $("#newTeacherConfirmPassword").val()) {
                    alert('Las Contraseñas no coinciden');
                    $("#newTeacherPassword").focus();
                    $("#newTeacherConfirmPassword").focus();
                    return;
                }

                $.ajax({
                    method: "POST",
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'createNewTeacher',
                        name: $("#newTeacherName").val(),
                        lastname: $("#newTeacherLastname").val(),
                        mothersLN: $("#newTeacherMLastname").val(),
                        phone: $("#newTeacherPhone").val(),
                        email: $("#newTeacherEmail").val(),
                        password: $("#newTeacherPassword").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == "Success") {
                            $("#addNewTeacherModal").modal('hide');
                            $("#successNewTeacher").toast('show');

                            $("#newTeacherName").val('');
                            $("#newTeacherLastname").val('');
                            $("#newTeacherMLastname").val('');
                            $("#newTeacherPhone").val('');
                            $("#newTeacherEmail").val('');
                            $("#newTeacherPassword").val('');
                            $("#newTeacherConfirmPassword").val('');

                            loadTeachersTable();
                        } else {
                            $("#failedNewTeacher").toast('show');
                        }
                    }
                })
            });

            //Show Detail Modal
            $(document).on('click', '#teachersTableBody tr', function() {
                localStorage.setItem('teacherRow', this.id);
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadTeacherDetails',
                        id_user: this.id
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#teacherDetailsModalBody").html(response);
                        $("#teacherDetailsModal").modal('show');
                    }
                })
            });

            //Load Classess
            $("#teacherDetailsModal").on('shown.bs.modal', function() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadTableBody',
                        id_user: localStorage.getItem('teacherRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#tableClassTeacherBody").html(response);
                    }
                })
            });

            //Hide Detail Modal
            $(document).on('click', '#closeTeacherDetailsModal', function() {
                $("#teacherDetailsModal").modal('hide');
            });

            //Add Assign Class
            $(document).on('click', '#assignTeacherBtn', function() {
                $("#teacherDetailsModal").modal('hide');
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadClasses',
                        id_user: localStorage.getItem('teacherRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#assignClassTeacherModalBody").html(response);
                        $("#assignClassTeacherModal").modal('show');
                    }
                })
            });

            //Reload The modal
            function reloadAssignModal() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadClasses',
                        id_user: localStorage.getItem('teacherRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#assignClassTeacherModalBody").html(response);
                    }
                })
            }

            //Change of Inputs Selected for Filter
            $(document).on('change', '#selectedShift, #selectedGrade, #selectedGroup', function() {
                if ($("#selectedShift").val() == "") {
                    return;
                }

                if ($("#selectedGrade").val() == "") {
                    return;
                }

                if ($("#selectedGroup").val() == "") {
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadSelected',
                        shift: $("#selectedShift").val(),
                        grade: $("#selectedGrade").val(),
                        group: $("#selectedGroup").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#classTeacherBody").html(response);
                    }
                })
            })

            //Close Assign Class
            $(document).on('click', '#closeAssignClassTeacher', function() {
                $("#assignClassTeacherModal").modal('hide');
                $("#teacherDetailsModal").modal('show');
            });


            //Assign Class ON bd
            $(document).on('click', '#assignTeacherSendBtn', function() {

                if ($("#selectedShift").val() == "") {
                    alert('No puede ser vacio');
                    $("#selectedShift").focus();
                    return;
                }
                if ($("#selectedGrade").val() == "") {
                    alert('No puede ser vacio');
                    $("#selectedGrade").focus();
                    return;
                }
                if ($("#selectedGroup").val() == "") {
                    alert('No puede ser vacio');
                    $("#selectedGroup").focus();
                    return;
                }
                if ($("#selectedClass").val() == "") {
                    alert('No puede ser vacio');
                    $("#selectedClass").focus();
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'assignTeacherClass',
                        id_teacher: localStorage.getItem('teacherRow'),
                        shift: $("#selectedShift").val(),
                        grade: $("#selectedGrade").val(),
                        group: $("#selectedGroup").val(),
                        class: $("#selectedClass").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == 'Success') {
                            reloadAssignModal();
                            $("#successNewAssignClass").toast('show');
                        } else {
                            console.log(response);
                            $("#failedAssignClass").toast('show');
                        }
                    }
                })
            });

            //Load Update Modal
            $(document).on('click', '#editTeacherBtn', function() {
                $("#teacherDetailsModal").modal('hide');
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadUpdateModal',
                        id_user: localStorage.getItem('teacherRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#editTeacherBody").html(response);
                        $("#editTeacherModal").modal('show');
                    }
                })
            });

            function loadUpdateModalFunc() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'loadUpdateModal',
                        id_user: localStorage.getItem('teacherRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#editTeacherBody").html(response);
                        $("#editTeacherModal").modal('show');
                    }
                })
            }

            //Hide Update Modal
            $(document).on('click', '#editTeacherClose', function() {
                $("#editTeacherModal").modal('hide');
                $("#teacherDetailsModal").modal('show');
            });

            $(document).on('click', '#editTeacherButton', function() {

                if ($("#editTeacherName").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editTeacherName").focus()
                    return;
                }
                if ($("#editTeacherLastname").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editTeacherLastname").focus()
                    return;
                }
                if ($("#editTeacherMLastname").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editTeacherMLastname").focus()
                    return;
                }
                if ($("#editTeacherPhone").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editTeacherPhone").focus()
                    return;
                }
                if ($("#editTeacherEmail").val() == "") {
                    alert('Error Campos Vacios');
                    $("#editTeacherEmail").focus()
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/teachers_controller/teachersController.php',
                    data: ({
                        function: 'updateTeacherInfo',
                        name: $("#editTeacherName").val(),
                        last_name: $("#editTeacherLastname").val(),
                        mothersL: $("#editTeacherMLastname").val(),
                        phone: $("#editTeacherPhone").val(),
                        email: $("#editTeacherEmail").val(),
                        id_user: localStorage.getItem('teacherRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == 'Success') {
                            $("#editTeacherModal").modal('hide');
                            $("#teacherDetailsModal").modal('show');
                            loadTeachersTable();
                            $("#successUpdateDate").toast('show');
                        } else {
                            $("#failedUpdateTeacher").toast('show');
                        }
                    }
                })

            });

            /////
            /////
            /////
            //Edit Student Data
            $(document).on('click', "#editData", function() {
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
                    success: function(response) {
                        $("#modalStudentEdit").html(response);
                        $("#editStudentDataModal").modal('show');
                    }
                })
            });

            //Añadir estudiante
            $(document).on('click', '#newStudentBtn', function() {
                $("#addNewStudentModal").modal('show');
            });

            $(document).on('click', '#addNewStudentClose', function() {
                $("#addNewStudentModal").modal('hide');
            });

            $(document).on('click', "#newStudentButton", function() {

                if ($("#newStudentname").val() == "") {
                    alert('El Nombre no puede estar vacio');
                    $("#newStudentname").focus();
                    return;
                }

                if ($("#newStudentLastname").val() == "") {
                    alert('El Apeido Paterno no puede estar vacio');
                    $("#newStudentLastname").focus();
                    return;
                }

                if ($("#newStudentMLastname").val() == "") {
                    alert('El Apeido Materno no puede estar vacio');
                    $("#newStudentMLastname").focus();
                    return;
                }

                if ($("#newStudentShift").val() == "") {
                    alert('El Turno no puede estar vacio');
                    $("#newStudentShift").focus();
                    return;
                }

                if ($("#newStudentGrade").val() == "") {
                    alert('El Grado no puede estar vacio');
                    $("#newStudentGrade").focus();
                    return;
                }

                if ($("#newStudentGroup").val() == "") {
                    alert('El Grupo no puede estar vacio');
                    $("#newStudentGrade").focus();
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'registerNewStudent',
                        name: $("#newStudentname").val(),
                        lastname: $("#newStudentLastname").val(),
                        motherL: $("#newStudentMLastname").val(),
                        grade: $("#newStudentGrade").val(),
                        group: $("#newStudentGroup").val(),
                        shift: $("#newStudentShift").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == 'Success') {
                            $("#newStudentname").val('');
                            $("#newStudentLastname").val('');
                            $("#newStudentMLastname").val('');
                            $("#newStudentGrade").val('');
                            $("#newStudentGroup").val('');
                            $("#newStudentShift").val('');

                            $("#addNewStudentModal").modal('hide');
                            $("#successNewStudent").toast('show');
                            loadStudentData();
                        } else {
                            $("#failedNewStudent").toast('show');
                        }
                    }
                })
            })

            //Conudcta
            $(document).on('click', "#seeConduct", function() {

                $("#modal").modal('hide');
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadConductModal',
                        id_student: localStorage.getItem('clickedRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#conductModalBody").html(response);
                        $("#conductModal").modal('show');
                    }
                })
            });

            $(document).on('click', '#addNewConductData', function() {
                $("#conductModal").modal('hide');
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadSubmitAsConduct',
                        id_student: localStorage.getItem('clickedRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#submitAs").html(response);
                        $("#addConductModal").modal('show');
                    }
                })
            });

            $("#submitConduct").on('click', function() {

                let selected = $('#selectedSubmitAs option:selected');
                let entity = selected.data('entity');

                if ($("#idScoreConduct").val() == "") {
                    alert('El Puntaje no puede ser vacio');
                    $("#idScoreConduct").focus();
                    return;
                }

                if ($("#newConductDesc").val() == "") {
                    alert('La Descripcion no puede estar vacia');
                    $("#newConductDesc").focus();
                    return;
                }

                if ($("#selectedSubmitAs").val() == "") {
                    alert('Necesita tener un tipo de usuario seleccionado');
                    $("#newConductDesc").focus();
                    return;
                }

                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: "submitNewConductData",
                        id_user: localStorage.getItem('clickedRow'),
                        description: $("#newConductDesc").val(),
                        value: $("#idScoreConduct").val(),
                        asValue: $("#selectedSubmitAs").val(),
                        asEntity: entity
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        if (response == 'Success') {
                            $("#successConductUpdate").toast('show')
                            $("#addConductModal").modal('hide');
                            $("#conductModal").modal('show');
                        } else {
                            $("#failedAddConduct").toast('show')
                            $("#addConductModal").modal('hide');
                            $("#conductModal").modal('show');
                        }
                    }
                })
            })

            $("#addConductModalClose").on('click', function() {
                $("#addConductModal").modal('hide');
                $("#conductModal").modal('show');
            })

            $(document).on('click', '#conducModalClose', function() {
                $("#conductModal").modal('hide');
                $("#modal").modal('show');
            });

            $("#conductModal").on('shown.bs.modal', function() {
                loadHistoricConductTableBody(localStorage.getItem('clickedRow'));
            });

            $(document).on('change', '#selectedFilter', function() {
                loadHistoricConductTableBody(localStorage.getItem('clickedRow'));
            });

            function loadHistoricConductTableBody(student_id) {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadConductTableBody',
                        id_student: student_id,
                        where: $("#selectedFilter").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#conductTableBody").html(response);
                    }
                })
            }



            //Asistencia
            $(document).on('click', "#assitanceM, #assitanceH", function() {
                $("#modal").modal('hide');
                let method = $(this).attr('btnAction');
                localStorage.setItem('assistanceTableMethod', method);
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadAssitanceModal',
                        method: method,
                        id_student: localStorage.getItem('clickedRow')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#assitanceModalBody").html(response);
                        $("#assistance").modal('show');
                    }
                })
            });

            $(document).on('click', '#assitanceModal', function() {
                $("#assistance").modal('hide');
                $("#modal").modal('show');
            })

            $("#assistance").on('shown.bs.modal', function() {
                loadHistoricData(localStorage.getItem('clickedRow'), localStorage.getItem('assistanceTableMethod'));
            })

            $(document).on('change', "#searchedDate", function() {
                let date = $(this).val();
                if (date != "") {
                    loadHistoricData(localStorage.getItem('clickedRow'), localStorage.getItem('assistanceTableMethod'));
                } else {
                    //Do nothin
                }
            });

            $(document).on('change', '#selectedMonth', function() {
                if ($(this).val() != "") {
                    loadHistoricData(localStorage.getItem('clickedRow'), localStorage.getItem('assistanceTableMethod'));
                }
            });

            $(document).on('change', '#selectedClass', function() {
                if ($(this).val() != "") {
                    loadHistoricData(localStorage.getItem('clickedRow'), localStorage.getItem('assistanceTableMethod'));
                }
            });

            $(document).on('change', '#tableActionAssistance tr td select', function() {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'updateAssistance',
                        updated: $(this).val(),
                        asistanceId: $(this).attr('id')
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(msg) {
                        console.log(msg);
                        if (msg === 'Success') {
                            $("#toastSuccessUpdate").toast('show');
                        }
                    }
                })
            });

            function loadHistoricData(id_student, method) {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadAssistanceTable',
                        id_student: id_student,
                        method: method,
                        searchedDay: $("#searchedDate").val(),
                        searchedMonth: $("#selectedMonth").val(),
                        searchedClass: $("#selectedClass").val()
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(response) {
                        $("#tableActionAssistance").html(response);
                    }
                });
            }

            //Update data

            $(document).on('click', '#confirm', function() {

                let name = $("#updatedName").val();
                let apPat = $("#updatedLastName").val();
                let apMat = $("#updatedMotherLastName").val();
                let turno = $("#updatedTurno").val();
                let grado = $("#updatedGrado").val();
                let grupo = $("#updatedGrupo").val();

                if (name == '') {
                    alert('El nombre no puede ser vacio');
                    $("#updatedName").focus();
                    return;
                }

                if (apPat == '') {
                    alert('El apellido paterno no puede ser vacio');
                    $("#updatedLastName").focus();
                    return;
                }

                if (apMat == '') {
                    alert('El apellido materno no puede ser vacio');
                    $("#updatedMotherLastName").focus();
                    return;
                }

                if (turno == '') {
                    alert('El turno no puede ser vacio');
                    $("#updatedTurno").focus();
                    return;
                }

                if (grado == '') {
                    alert('El grado no puede ser vacio');
                    $("#updatedGrado").focus();
                    return;
                }

                if (grupo == '') {
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
                    success: function(response) {
                        if (response == 'Success') {
                            showSucess();
                        } else {
                            showFailed();
                        }
                    }
                })

            })

            $(document).on('click', '#closeSuccess', function() {
                closeAllModals();
                loadStudentData();
            });

            $(document).on('click', '#closeFailed', function() {
                closeAllModals();
                loadStudentData();
            })

            $(document).on('click', "#updateData", function() {
                $("#editStudentDataModal").modal('hide');
                $("#confirmUpdate").modal('show');
            })

            $(document).on('click', '#cancelUpdate', function() {
                $("#editStudentDataModal").modal('hide');
                $("#modal").show();
            })

            $(document).on('click', '#cancelConfirm', function() {
                $("#confirmUpdate").hide();
                $("#editStudentDataModal").modal('show');
            })

            $(document).on('click', "#closeModalStudent", function() {
                closeAllModals();
            })

            function closeAllModals() {
                $("#modal").modal('hide');
                $("#editStudentDataModal").modal('hide');
                $("#confirmUpdate").modal('hide');
                $("#successUpdate").modal('hide');
                $("#alertFailedData").modal('hide');
            }

            function showSucess() {
                $("#confirmUpdate").hide();
                $("#successUpdate").modal('show');
            }

            function showFailed() {
                $("#confirmUpdate").hide();
                $("#alertFailedData").modal('show');
            }

            //Loading Components functions

            function loadDOM() {
                const DOMPage = localStorage.getItem('currentPage');
                if (DOMPage === null) {
                    loadHome();
                } else if (DOMPage === 'homePage') {
                    loadHome();
                } else if (DOMPage === 'studentPage') {
                    loadStudnets();
                    loadStudentData();
                } else if (DOMPage === 'teacherPage') {
                    loadTeachers();
                    loadTeachersTable();
                } else if (DOMPage === 'schoolControlPage') {
                    loadSchoolControl();
                    loadSchoolControlTable();
                }
            }

            $(document).on('click', '#homeCardComponent, #home, #homeBottom', function() {
                loadHome();
            });

            $(document).on('click', '#studentsCardComponent, #students, #studentsBottom', function() {
                loadStudnets();
                loadStudentData();
            })

            $(document).on('click', '#teachersCardComponent, #teachers, #teachersBottom', function() {
                loadTeachers();
                loadTeachersTable();
            });

            $(document).on('click', '#adminsCardComponent, #admins, #adminsBottom', function() {
                loadSchoolControl();
                loadSchoolControlTable();
            });


            function loadHome() {
                $("#MainContent").load('../../pages/home_page/homePage.php');
                localStorage.setItem('currentPage', 'homePage');
            }

            function loadStudnets() {
                $("#MainContent").load('../../pages/student_page/studentPage.php');
                localStorage.setItem('currentPage', 'studentPage');
            }

            function loadTeachers() {
                $("#MainContent").load('../../pages/teacher_page/teacherPage.php');
                localStorage.setItem('currentPage', 'teacherPage');
            }

            function loadSchoolControl() {
                $("#MainContent").load('../../pages/schoolControl_page/schoolControlPage.php')
                localStorage.setItem('currentPage', 'schoolControlPage');
            }

            //Live Tipe Student Searcher
            $(document).on('keyup', "#searchStudent", function() {
                loadStudentData();
            })

            $(document).on('change', "#filterTurno, #filterGrado, #filterGrupo", function() {
                loadStudentData();
            });

            //Handle Click Row TR

            $("#modal").on('shown.bs.modal', function() {
                loadStudentAssistance(localStorage.getItem('clickedRow'));
            })

            $(document).on('click', '#studentTableBody tr', function() {
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
                    success: function(modalBody) {
                        $("#modalBody").html(modalBody);
                        $("#modal").modal('show');
                    }
                })
            });

            function loadStudentAssistance(id) {
                $.ajax({
                    method: 'POST',
                    url: '../../controller/students_controller/studentController.php',
                    data: ({
                        function: 'loadAssistance',
                        id_alumno: id
                    }),
                    dataType: 'html',
                    async: false,
                    success: function(dataTr) {
                        $("#assistanceTable").html(dataTr);
                    }
                })
            }

            //Load data Tables

            function loadStudentData() {

                let nameSearched = '';
                let groupSearched = '';
                let gradeSearched = '';
                let shiftSearched = '';

                if ($("#searchStudent").val() !== '' && $("#searchStudent").val() !== undefined) {
                    nameSearched = $("#searchStudent").val();
                }

                if ($("#filterTurno").val() !== '' && $("#filterTurno").val() !== undefined) {
                    shiftSearched = $("#filterTurno").val();
                }

                if ($("#filterGrado").val() !== '' && $("#filterGrado").val() !== undefined) {
                    gradeSearched = $("#filterGrado").val();
                }

                if ($("#filterGrupo").val() !== '' && $("#filterGrupo").val() !== undefined) {
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
                    success: function(data) {
                        $("#studentTableBody").html(data);
                    }
                })
            }
        });
    </script>
</body>

</html>