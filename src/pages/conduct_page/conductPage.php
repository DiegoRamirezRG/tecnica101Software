<?php

?>
<div class="container">
    <div class="studentMaxContainer tab-content">
        <div class="filterContainer pt-4">
            <h1 class="headerForm">Administracion de Conducta</h1>
            <div class="col-sm-11 col-xs-11 col-md-10 col-lg-8 pt-4">
                <div class="row d-flex flex-wrap">
                    <div class="col">
                        <input class="form-control me-2" type="search" placeholder="Buscar Alumno" aria-label="Search" id="searchStudentConductCoor">
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterConductByShift">
                            <option selected value="">Turno</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterConductByGrade">
                            <option selected value="">Grado</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterConductByGroup">
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
        <div class="studnetsTableContainer">
            <table id="studentsTable" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">G/G/T</th>
                    </tr>
                </thead>
                <tbody id="conductStudentTableBody" class="tbodyHover">

                </tbody>
            </table>
        </div>
    </div>
</div>