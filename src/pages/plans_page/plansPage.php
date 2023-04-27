<?php

session_start();

if($_SESSION['sessionUser']['type'] == 'Control'){
    $disable = false;
}else{
    $disable = true;
}

?>
<div class="container">
    <div class="studentMaxContainer tab-content">
        <div class="filterContainer pt-4">
            <h1 class="headerForm">Administracion de Planeaciones</h1>
            <div class="col-sm-11 col-xs-11 col-md-10 col-lg-8 pt-4">
                <div class="row pt-4">
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterTurnoGrupoPlanDownload">
                            <option selected value="">Turno</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterGradoGrupoPlanDownload">
                            <option selected value="">Grado</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterGrupoGrupoPlanDownload">
                            <option selected value="">Grupo</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>  
                </div>
            </div>
        </div>
        <div class="cardsClassContainer" id="grupoContainerCardsPlanDownload">
            
        </div>
    </div>
</div>