<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('../../config/database/conexion.php');
include_once('../../components/card/card.php');

if($_SESSION['sessionUser']['type'] == 'Maestro'){
    $disable = false;
}else{
    $disable = true;
}


if($_POST['function'] == 'loadClassesCards'){
    try {

        $where = "";
        $gradoWhere = "";
        $grupoWhere = "";
        $turnoWhere = "";

        if(isset($_POST['grado']) && $_POST['grado'] != ''){
            $where = "WHERE ";
            $gradoWhere = " AND gt.name LIKE '"."%".$_POST['grado']."%"."' ";
        }

        if(isset($_POST['grupo']) && $_POST['grupo'] != ''){
            $where = "WHERE ";
            $grupoWhere = " AND gp.name LIKE '"."%".$_POST['grupo']."%"."' ";
        }

        if(isset($_POST['turno']) && $_POST['turno'] != ''){
            $where = "WHERE ";
            $turnoWhere = " AND sf.name LIKE '"."%".$_POST['turno']."%"."' ";
        }
        
        $query = "SELECT ctt.id_class_teacher, ct.name as class_name, gt.name as grade_name, gr.name as group_name, st.name as shift_name
        FROM class_teacher_table ctt
        JOIN class_table ct ON ctt.class_fk = ct.id_class
        JOIN grade_table gt ON ctt.grade_fk = gt.id_grade
        JOIN group_table gr ON ctt.group_fk = gr.id_group
        JOIN shift_table st ON ctt.shift_fk = st.id_shift ".$where.$gradoWhere.$grupoWhere.$turnoWhere;

        $result = $conn->query($query);
        if($result && mysqli_num_rows($result) > 0){
            foreach ($result as $data) {
                createClassCard($data);
            }
        }else{
            echo "No existen materias con los filtros seleccionados";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadClassDetailModal'){
    try {

            $query = "SELECT ctt.id_class_teacher, ct.name as class_name, gt.name as grade_name, gr.name as group_name, st.name as shift_name, CONCAT(ut.name,' ', ut.last_name,' ', ut.mothersLast_name) as teacher_name, ut.id_user as teacher_id
            FROM class_teacher_table ctt
            JOIN class_table ct ON ctt.class_fk = ct.id_class
            JOIN grade_table gt ON ctt.grade_fk = gt.id_grade
            JOIN group_table gr ON ctt.group_fk = gr.id_group
            JOIN shift_table st ON ctt.shift_fk = st.id_shift
            JOIN user_table ut ON ctt.teacher_fk = ut.id_user
            WHERE ctt.id_class_teacher = ".$_POST['classId']."";

            $result = $conn->query($query);
            foreach($result as $data);

        ?>
        <div class="classMaxContainer">
            <div class="infoClassDetailContainer col flex-column d-flex align-items-center">
                <div class="row mt-3">
                    <h1 class="display-2"><?php echo $data['class_name']?></h1>
                </div>
                <div class="row mb-2">
                    <span class="badge rounded-pill bg-success" style="font-size: 15px;"><?php echo $data['teacher_name']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="badge rounded-pill bg-primary"><?php echo $data['shift_name']?></span>
                        <span class="badge rounded-pill bg-danger"><?php echo $data['grade_name']?></span>
                        <span class="badge rounded-pill bg-info"><?php echo $data['group_name']?></span>
                    </div>
                </div>
            </div>
            <div class="mt-3 mt-md-5 customRowContent flex-wrap">
                <div class="col-12 col-md-4">
                    <div style="<?php echo ($disable) ? 'display: none;' : ''?>">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-success w-75 responsiveOptionClassDetailButton ASSI"></button>
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-primary w-75 responsiveOptionClassDetailButton PLAN"></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-secondary w-75 responsiveOptionClassDetailButton ESTU"></button>
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-danger w-75 responsiveOptionClassDetailButton TRAB"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="<?php echo ($disable) ? '' : 'display: none;'?>">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-success w-75 responsiveOptionClassDetailButton ASSICor" id="attendanceCoordButtonClassDetailsModal" data-idTeacher="<?php echo $data['teacher_id']?>" data-idClass="<?php echo $_POST['classId']?>"></button>
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-primary w-75 responsiveOptionClassDetailButton PLANCor" id="downloadPlanCoordButtonClassDetailsModal" data-idTeacher="<?php echo $data['teacher_id']?>" data-idClass="<?php echo $_POST['classId']?>"></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-secondary w-75 responsiveOptionClassDetailButton ESTUCor" id="downloadGuidesCoordButtonClassDetailsModal" data-idTeacher="<?php echo $data['teacher_id']?>" data-idClass="<?php echo $_POST['classId']?>"></button>
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center mb-3">
                                    <button class="btn btn-danger w-75 responsiveOptionClassDetailButton TRABCor" id="downloadWorksCoordButtonClassDetailsModal" data-idTeacher="<?php echo $data['teacher_id']?>" data-idClass="<?php echo $_POST['classId']?>"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 d-flex flex-column card p-4">
                    <div class="row text-center d-flex justify-content-center">
                        <div class="col-12 col-md-7">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar Alumno" aria-label="Username" id="searchedStudentClassDetailModal">
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-10 tableCotnainerClassDeails">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            Nombre del Estudiante
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="classDetailStudentTableBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadStudents'){
    try {
        $nameWhere = "";

        if(isset($_POST['searchedStudent']) && $_POST['searchedStudent'] != ""){
            $nameWhere = " AND CONCAT(st.name, ' ', st.last_name, ' ', st.mothersLast_name) LIKE '%".$_POST['searchedStudent']."%'";
        }

        $query = "SELECT 
            st.id_student, 
            CONCAT(st.name, ' ', st.last_name, ' ', st.mothersLast_name) AS full_name
        FROM 
            student_table st
            JOIN class_teacher_table ctt ON st.grade_fk = ctt.grade_fk AND st.group_fk = ctt.group_fk AND st.shift_fk = ctt.shift_fk 
            JOIN class_table ct ON ctt.class_fk = ct.id_class
        WHERE 
            ctt.id_class_teacher = ".$_POST['class_teacher_id']."".$nameWhere;

        $result = $conn->query($query);
        if($result && mysqli_num_rows($result) > 0){
            foreach ($result as $data ) {
                ?>
                <tr id="<?php echo $data['id_student']?>">
                    <td><?php echo $data['full_name']?></td>
                </tr>
                <?php
            }
        }else{
            ?>
                <td><?php echo $query?></td>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}
?>