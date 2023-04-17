<div class="container">
    <div class="studentMaxContainer tab-content">
        <div class="filterContainer pt-4">
            <h1 class="headerForm">Administracion de Profesores</h1>
            <div class="col-sm-11 col-xs-11 col-md-10 col-lg-8 pt-4">
                <div class="row d-flex flex-wrap">
                    <div class="col-6 col-md-5">
                        <input class="form-control me-2" type="search" placeholder="Buscar Profesor" aria-label="Search" id="teacherSearched">
                    </div>
                    <div class="col-6 col-md-4">
                        <input class="form-control me-2" type="search" placeholder="Buscar Materia" aria-label="Search" id="classSearched">
                    </div>
                    <div class="col-8 col-md-3 d-flex mx-auto justify-content-md-end mt-3 mt-md-0 ">
                        <button class="btn btn-outline-primary sizableBtnTeacher" id="newTeacherBtn"></button>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterTurnoTeacher">
                            <option selected value="">Turno</option>
                            <option value="1">Matutino</option>
                            <option value="2">Vespertino</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterGradoTeacher">
                            <option selected value="">Grado</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                        </select>
                    </div>  
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" id="filterGrupoTeacher">
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
        </div>
        <div class="studnetsTableContainer">
            <table id="teachersTable" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody id="teachersTableBody" class="tbodyHover">

                </tbody>
            </table>
        </div>
    </div>
</div>