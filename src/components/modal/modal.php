<?php

function createModal(){
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

function editUserModal(){
    ?>
    <div class="modal fade" id="editStudentDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="modalStudentEdit">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="cancelUpdate">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="updateData" >Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function alertUpdateData(){
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


function alertSuccessData(){
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

function alertFailedData(){
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


function assitanceModal(){
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

function conductModal(){
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

function addConductModal(){
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

function addNewStudent(){
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

function addNewTeacherModal(){
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

function editTeacher(){
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

function loadTeacherDetailsModal(){
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

function assignClassTeacher(){
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

?>