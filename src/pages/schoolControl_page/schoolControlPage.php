<div class="container">
    <div class="studentMaxContainer tab-content">
        <div class="filterContainer pt-4">
            <h1 class="headerForm">Gestión de administrativos</h1>
            <div class="col-sm-11 col-xs-11 col-md-10 col-lg-8 pt-4">
                <div class="row d-flex flex-wrap">
                    <div class="col-4 col-md-4 d-flex mx-auto">
                        <input class="form-control me-2" type="search" placeholder="Buscar personal administrativo" aria-label="Search" id="schoolControlSearched">
                    </div>
                    <div class="col-4 col-md-4 d-flex mx-auto">
                        <input class="form-control me-2" type="search" placeholder="Buscar cargo administrativo" aria-label="Search" id="schoolControlJobSearched">
                    </div>
                    <div class="col-4 col-md-4 d-flex mx-auto justify-content-md-end mt-0 mt-md-0 ">
                        <button class="btn btn-outline-primary sizableBtnSchoolControl" id="newSchoolControlBtn"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="studnetsTableContainer">
            <table id="schoolControlTable" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cargo</th>
                    </tr>
                </thead>
                <tbody id="schoolControlTableBody" class="tbodyHover">

                </tbody>
            </table>
        </div>
    </div>
</div>