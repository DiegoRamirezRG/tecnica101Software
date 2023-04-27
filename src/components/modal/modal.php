<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION['sessionUser']['type'] == 'Control'){
    $disable = false;
}else{
    $disable = true;
}

function createModal()
{
?>
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="modalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeModalStudent">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function editUserModal()
{
?>
    <div class="modal fade" id="editStudentDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="modalStudentEdit">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="cancelUpdate">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="updateData">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function alertUpdateData()
{
?>
    <div class="modal fade" tabindex="-1" id="confirmUpdate" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger text-center"><b>¿Estás seguro de que deseas actualizar la información de este alumno?</b></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">¡Advertencia! ¿Está seguro de querer actualizar la información del alumno? Esta acción modificará permanentemente los datos del estudiante en el sistema. Asegúrese de verificar cuidadosamente la información antes de confirmar la actualización.</p>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-warning" id="confirm">Confirmar</button>
                    <button type="button" class="btn btn-danger" id="cancelConfirm">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}


function alertSuccessData()
{
?>
    <div class="modal fade" tabindex="-1" id="successUpdate" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-success text-center"><b>La informacion se actualizo correctamente</b></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">¡Actualización exitosa! La información del alumno ha sido actualizada correctamente en el sistema. ¡Gracias por mantener los datos actualizados!</p>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="closeSuccess">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function alertFailedData()
{
?>
    <div class="modal fade" tabindex="-1" id="failedUpdate" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex mx-auto">
                    <h4 class="modal-title text-danger text-center mx-auto"><b>Ocurrio un Error al actualizar la informacion</b></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Por favor recarga la pagina y vuelve a intentarlo. Si esto perdura contactar con el administrador</p>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="closeFailed">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}


function assitanceModal()
{
?>
    <div class="modal fade" tabindex="-1" id="assistance" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="assitanceModalBody">
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="assitanceModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function conductModal()
{
?>
    <div class="modal fade" tabindex="-1" id="conductModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="conductModalBody">

                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="conducModalClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function conductModalCoor()
{
?>
    <div class="modal fade" tabindex="-1" id="conductModalCoor" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="conductModalBodyCoor">

                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="conducModalCloseCoor">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function addConductModal()
{
?>
    <div class="modal fade" tabindex="-1" id="addConductModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="conductModalBody">
                    <div class="col">
                        <div class="row mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="idScoreConduct"><i class='bx bxs-face fs-1'></i></span>
                                <select class="form-select" aria-label="Default select example" id="idScoreConduct">
                                    <option selected value="">Selecciona El Puntaje</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Bueno">Bueno</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="newConductDesc">Descripcion</label>
                                <textarea class="form-control mt-1" id="newConductDesc" rows="3" placeholder="El alumno hizo . . ."></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group" id="submitAs">

                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-success" id="submitConduct">Añadir Conducta</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="addConductModalClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function addConductModalCoor()
{
?>
    <div class="modal fade" tabindex="-1" id="addConductModalCoor" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col">
                        <div class="row mt-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="idScoreConduct"><i class='bx bxs-face fs-1'></i></span>
                                <select class="form-select" aria-label="Default select example" id="idScoreConductCoor">
                                    <option selected value="">Selecciona El Puntaje</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Bueno">Bueno</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="newConductDesc">Descripcion</label>
                                <textarea class="form-control mt-1" id="newConductDescCoor" rows="3" placeholder="El alumno hizo . . ."></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group" id="submitAsCoor">

                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-success" id="submitConductCoor">Añadir Conducta</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="addConductModalCloseCoor">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function addNewStudent()
{
?>
    <div class="modal fade" tabindex="-1" id="addNewStudentModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="addNewStudentModalBody">
                    <div class="col-12 col-md-10 d-flex flex-column justify-content-center mx-auto">
                        <div class="row mt-3 mb-3 text-center">
                            <h2>Añadir nuevo estudiante</h2>
                        </div>
                        <div class="row flex-wrap">
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre" id="newStudentname">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Apeido Paterno" id="newStudentLastname">
                                </div>
                            </div>
                        </div>
                        <div class="row flex-wrap">
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Apeido Materno" id="newStudentMLastname">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <select class="form-select" id="newStudentShift">
                                        <option selected value="">Turno</option>
                                        <option value="1">Matutino</option>
                                        <option value="2">Vespertino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select class="form-select" id="newStudentGrade">
                                        <option selected value="">Grado</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select class="form-select" id="newStudentGroup">
                                        <option selected value="">Grupo</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                        <option value="5">E</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="col text-center">
                                <button class="btn btn-primary" id="newStudentButton">Registrar Alumno</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="addNewStudentClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

// modales modulo Teacher

function addNewTeacherModal()
{
?>
    <div class="modal fade" tabindex="-1" id="addNewTeacherModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 col-md-10 d-flex flex-column justify-content-center mx-auto">
                        <div class="row mt-3 mb-3 text-center">
                            <h2>Añadir nuevo Profesor</h2>
                        </div>
                        <div class="row flex-wrap">
                            <label class="mb-1">Informacion Personal</label>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre" id="newTeacherName">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Apeido Paterno" id="newTeacherLastname">
                                </div>
                            </div>
                        </div>
                        <div class="row flex-wrap">
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Apeido Materno" id="newTeacherMLastname">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control" placeholder="Telefono" id="newTeacherPhone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="mb-1">Crendenciales</label>
                            <div class="col-12 text-center mb-3">
                                <input type="email" class="form-control" placeholder="maestro@correo.com" id="newTeacherEmail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-3">
                                <input type="password" class="form-control" placeholder="Contraseña" id="newTeacherPassword">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-3">
                                <input type="password" class="form-control" placeholder="Verifica la contraseña" id="newTeacherConfirmPassword">
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="col text-center">
                                <button class="btn btn-primary" id="newTeacherButton">Registrar Profesor</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="addNewTeacherClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function editTeacher()
{
?>
    <div class="modal fade" tabindex="-1" id="editTeacherModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="editTeacherBody">

                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="editTeacherClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function loadTeacherDetailsModal()
{
?>
    <div class="modal fade" id="teacherDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="teacherDetailsModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeTeacherDetailsModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function assignClassTeacher()
{
?>
    <div class="modal fade" id="assignClassTeacherModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="assignClassTeacherModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeAssignClassTeacher">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

// modales modulo Admins

function addNewSchoolControlModal()
{
?>
    <div class="modal fade" tabindex="-1" id="addNewSchoolControlModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 col-md-10 d-flex flex-column justify-content-center mx-auto">
                        <div class="row mt-3 mb-3 text-center">
                            <h2>Añadir nuevo Administrativo</h2>
                        </div>
                        <div class="row flex-wrap">
                            <label class="mb-1">Informacion Personal</label>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre" id="newSchoolControlName">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Apellido Paterno" id="newSchoolControlLastname">
                                </div>
                            </div>
                        </div>
                        <div class="row flex-wrap">
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Apellido Materno" id="newSchoolControlMLastname">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control" placeholder="Telefono" id="newSchoolControlPhone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="mb-1">Crendenciales</label>
                            <div class="col-6 text-center mb-3">
                                <input type="email" class="form-control" placeholder="control@correo.com" id="newSchoolControlEmail">
                            </div>
                            <div class="col-6 text-center mb-3">
                                <select class="form-select" aria-label="Default select example" id="filterTypeSchoolControl">
                                    <option selected value="">Cargo</option>
                                    <option value="1">Control</option>
                                    <option value="2">Coordinador</option>
                                    <option value="3">Prefecto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-3">
                                <input type="password" class="form-control" placeholder="Contraseña" id="newSchoolControlPassword">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-3">
                                <input type="password" class="form-control" placeholder="Verifica la contraseña" id="newSchoolControlConfirmPassword">
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="col text-center">
                                <button class="btn btn-primary" id="newSchoolControlButton">Registrar Administrativo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="addNewSchoolControlClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function editSchoolControl()
{
?>
    <div class="modal fade" tabindex="-1" id="editSchoolControlModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="editSchoolControlBody">

                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" id="editSchoolControlClose">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function loadSchoolControlDetailsModal()
{
?>
    <div class="modal fade" id="schoolControlDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="schoolControlDetailsModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeSchoolControlDetailsModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}

function newClassModal(){
    ?>
    <div class="modal fade" id="newClassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <div class="col-12 col-sm-9 mt-3">
                        <div class="row text-center">
                            <h1>Nueva Materia</h1>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="newClassInputName" class="form-label">Nombre de la Materia:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Añadir materia" id="newClassInputName">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-3 d-flex justify-content-center">
                            <div class="col-7">
                                <button class="btn btn-primary w-100" id="addNewClassTriggerCycle">Añadir Materia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeNewClassModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function loadEditClassModal(){
    ?>
    <div class="modal fade" id="editClassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <div class="col-12 col-sm-9 mt-3">
                        <div class="row text-center">
                            <h1>Editar Materia</h1>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="editClassInputName" class="form-label">Nombre de la Materia:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Editar materia" id="editClassInputName">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-3 d-flex justify-content-center">
                            <div class="col-7">
                                <button class="btn btn-primary w-100" id="editClassTriggerCycle">Editar Materia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeEditClassModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function confirmationFinishCycle(){
    ?>
    <div class="modal fade" tabindex="-1" id="confirmFinishCycle" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger text-center"><b>¿Estás seguro de que deseas Finalizar el Ciclo Escolar?</b></h4>
            </div>
            <div class="modal-body">
                <p class="text-center">¡Advertencia! Al finalizar el ciclo escolar, es probable que se borren las asistencias, las materias asignadas y otros datos, como archivos de planeaciones y registros de trabajo de los alumnos. Ademas los estudiantes pasaran de grado academico.</p>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-warning" id="confirmFinishCycle">Confirmar</button>
                <button type="button" class="btn btn-danger" id="cancelConfirmFinishCycle">Cancelar</button>
            </div>
            </div>
        </div>
    </div>
    <?php
}

function confirmationPLusFinishCycle(){
    ?>
    <div class="modal fade" tabindex="-1" id="confirmPlusFinishCycle" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body text-center">
                <h1 class="modal-title text-danger display-1"><b>¿Esta usted completamente SEGURO?</b></h1>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-warning" id="yeahIWannFinishCycle">Si</button>
                <button type="button" class="btn btn-danger" id="cancelConfirmPlusFinishCycle">No</button>
            </div>
            </div>
        </div>
    </div>
    <?php
}

function loadingModal(){
    ?>
    <div class="modal fade" tabindex="-1" id="loadingFInish" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center d-flex flex-column justify-content-center align-content-center mx-auto">
                    <lottie-player src="../../assets/animations/loading2.json"  background="transparent"  speed="1"  style="height: 150px;"  loop  autoplay></lottie-player>
                    <h3 style="color: #dc3545;"><b>CARGANDO</b></h3>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function changeProfilePassword(){
    ?>
    <div class="modal fade" id="changeProfilePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <div class="col-12 col-sm-9 mt-3">
                        <div class="row text-center">
                            <h1>Cambiar Contraseña</h1>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="currentPassword" class="form-label">Ingresa tu contraseña actual</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Contraseña Actual" id="currentPassword">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="newChangePassword" class="form-label">Ingresa la nueva contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Nueva Contraseña" id="newChangePassword">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="newChangePasswordConfirm" class="form-label">Confirma la nueva contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Nueva Contraseña" id="newChangePasswordConfirm">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-3 d-flex justify-content-center">
                            <div class="col-7">
                                <button class="btn btn-primary w-100" id="changePasswordsButnModal">Cambiar Contraseña</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeChangePasswordModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function loadCropImage(){
    ?>
        <div class="modal fade" tabindex="-1" id="cropProfileImageModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" class="cropImage"/>
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-start align-items-center">
                                <div class="preview"></div>
                                <p class="h5 text-center w-75">Esto sera la foto que se seleccionara</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-success" id="cropProfileBtn">Recortar</button>
                    <button type="button" class="btn btn-danger" id="cancelCropBtn">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
    <?php
}

function classModalDetailOpen(){
    ?>
    <div class="modal fade" tabindex="-1" id="modalClassDetailOpen" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body" id="classDetailModalBody">

            </div>
            <div class="modal-footer">
                <button type="button btn-danger" class="btn btn-secondary" id="closeModalClassDetailOpen">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    <?php
}

function allGroupAttendance(){
    ?>
    <div class="modal fade" tabindex="-1" id="modalClassAttendanceModal" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="classAttendanceModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button btn-danger" class="btn btn-secondary" id="closeModalClassAttendance">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function uploadFilesModal(){
    ?>
    <div class="modal fade" id="uploadModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="uploadModalBody">
                    <form class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button btn-danger" class="btn btn-secondary" id="closeModalUpload">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function takeAssistanceModal(){

    $fecha = date('Y-m-d'); 
    $day = date('d', strtotime($fecha));
    $month = date('F', strtotime($fecha));
    $mes = getMesEnEspanol($month);

    ?>
    <div class="modal fade" tabindex="-1" id="modalTakeAssitance" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="takeAssitanceModalBody">
                    <div style="height: 60vh;">
                        <div class="col">
                            <div class="row text-center">
                                <h1>Tomar Asistencia</h1>
                                <h3 class="text-danger"><strong>Dia: <?php echo $day.' de '.$mes?></strong></h3>
                            </div>
                            <div class="row p-2 p-md-5">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-10">Alumno</th>
                                            <th class="col-2">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modalTakeAssistanceTable">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button btn-danger" class="btn btn-secondary" id="closeModalTakeAssistance">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function getMesEnEspanol($mesEnIngles) {
    switch(strtolower($mesEnIngles)) {
        case 'january':
            return 'Enero';
        case 'february':
            return 'Febrero';
        case 'march':
            return 'Marzo';
        case 'april':
            return 'Abril';
        case 'may':
            return 'Mayo';
        case 'june':
            return 'Junio';
        case 'july':
            return 'Julio';
        case 'august':
            return 'Agosto';
        case 'september':
            return 'Septiembre';
        case 'october':
            return 'Octubre';
        case 'november':
            return 'Noviembre';
        case 'december':
            return 'Diciembre';
        default:
            return '';
    }
}

?>