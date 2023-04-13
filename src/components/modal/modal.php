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
            <div class="modal-body">
                <p class="text-center">Historico</p>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger" id="assitanceModal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    <?php
}
?>