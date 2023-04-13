
<div class="container">
    <div class="studentMaxContainer tab-content">
        <div class="filterContainer pt-4">
            <h2>Administracion de Alumnos</h2>
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8 pt-4">
                <div class="row d-flex flex-wrap">
                    <div class="col-xs-10 col-9">
                        <input class="form-control me-2" type="search" placeholder="Buscar Alumno" aria-label="Search" id="searchStudent">
                    </div>
                    <div class="col-xs-12 col-3">
                        <button class="btn btn-outline-primary sizableBtn" type="submit"></button>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterTurno">
                            <option selected value="">Turno</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterGrado">
                            <option selected value="">Grado</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterGrupo">
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
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>G/G/T</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody" class="tbodyHover">

                </tbody>
            </table>
        </div>
    </div>
</div>