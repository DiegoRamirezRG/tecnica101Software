<?php

session_start();

include_once('../../config/database/conexion.php');

if($_POST['function'] == 'loadStudentData'){
    try {
        $nombreWhere = "";
        $gradoWhere = "";
        $grupoWhere = "";
        $turnoWhere = "";

        

        if($_POST['name'] != ''){
            $nombreWhere = " AND CONCAT(st.name, ' ', st.last_name, ' ', st.mothersLast_name) LIKE '"."%".$_POST['name']."%"."' ";
        }

        if($_POST['grado'] != ''){
            $gradoWhere = " AND gt.name LIKE '"."%".$_POST['grado']."%"."' ";
        }

        if($_POST['grupo'] != ''){
            $grupoWhere = " AND gp.name LIKE '"."%".$_POST['grupo']."%"."' ";
        }

        if($_POST['turno'] != ''){
            $turnoWhere = " AND sf.name LIKE '"."%".$_POST['turno']."%"."' ";
        }


        $query = "SELECT 
            st.id_student as id, st.name as name, CONCAT(st.last_name,  ' ', st.mothersLast_name) as lastNames, CONCAT(gt.name, '° ', gp.name, ' ', sf.name) as currentStudent
        FROM 
            student_table as st, group_table as gp, grade_table as gt, shift_table as sf 
        WHERE 
            st.grade_fk = gt.id_grade AND st.group_fk = gp.id_group AND st.shift_fk = sf.id_shift".$nombreWhere.$gradoWhere.$grupoWhere.$turnoWhere;

        $result = $conn->query($query);
        foreach ($result as $row ) {
            ?>
            <tr id="<?php echo $row['id']?>">
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['lastNames']?></td>
                <td><?php echo $row['currentStudent']?></td>
            </tr>
            <?php
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadModalBody'){

    try {

        $queryInfo = "SELECT CONCAT(st.name, ' ',st.last_name,  ' ', st.mothersLast_name) as name, tn.name as turno, gr.name as grado, gp.name as grupo, AVG(CASE value WHEN 'Malo' THEN 1 WHEN 'Regular' THEN 2 WHEN 'Bueno' THEN 3 ELSE 0 END) as conducta FROM conduct_table as ct, student_table as st, shift_table as tn, grade_table as gr, group_table as gp WHERE st.id_student = ct.student_fk AND st.shift_fk = tn.id_shift AND st.grade_fk = gr.id_grade AND st.group_fk = gp.id_group AND ct.student_fk = ".$_POST['id_alumno']."";

        $result = $conn->query($queryInfo);
        if($result->num_rows > 0){
        foreach($result as $row);
            ?>
            <div class="modalHeader d-flex flex-column justify-content-between">
                <div class="col-11 col-md-10 d-flex flex-column jusitfy-content-center mx-auto">
                    <div class="row">
                        <h2><?php echo $row['name']?></h2>
                    </div>
                    <div class="row w-100 d-flex flex-wrap mx-auto justify-content-between">
                        <div class="col-12 col-md-5 d-flex justify-content-between">
                            <span class="badge rounded-pill bg-dark fs-5"><?php echo $row['turno']?></span>
                            <span class="badge rounded-pill bg-warning fs-5"><?php echo $row['grado']?></span>
                            <span class="badge rounded-pill bg-danger fs-5"><?php echo $row['grupo']?></span>
                        </div>
                        <div class="col-12 col-sm-7 d-flex justify-content-center justify-content-sm-end">
                            <button class="btn btn-outline-warning btn-rounded w-75 w-md-50 w-lg-25 adaptapBtn" id="editData">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="informationBody mt-5">
                <div class="col">
                    <div class="container d-sm-block d-lg-flex justify-content-between">
                        <div class="col-xs-12 col-s-12 col-md-12 col-lg-8 col-xl-7">
                            <h5>Asistencia Semanal</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <!---Tabla dias de la semana--->
                                    <table class="table table-striped">
                                        <thead>
                                            <th>
                                                <tr>
                                                    <td>L</td>
                                                    <td>M</td>
                                                    <td>M</td>
                                                    <td>J</td>
                                                    <td>V</td>
                                                </tr>
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr id="assistanceTable">
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <button class="btn btn-outline-danger" id="assitanceM" btnAction="modificar">Modificar</button>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-outline-success mt-2" id="assitanceH" btnAction="historico">Historico</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-4">
                            <h5>Conducta</h5>
                            <div class="row d-flex justify-content-center">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <i class='bx bxs-face fs-1'></i>
                                    <p class="fs-3 mt-3 ml-3"><?php
                                    $conducta = round_num($row['conducta']);
                                    if($conducta == 0){
                                        echo 'Excelente';
                                    }
                                    if($conducta == 1){
                                        echo 'Malo';
                                    }
                                    if($conducta == 2){
                                        echo 'Regular';
                                    }
                                    if($conducta == 3){
                                        echo 'Bueno';
                                    }
                                    ?></p>
                                </div>
                                <div class="div"></div>
                                <button class="btn btn-outline-primary w-75" id="seeConduct">Ver Conducta</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                </div>
            </div>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }

}

function round_num($num) {
    if ($num < floor($num) + 0.5) {
      return floor($num);  // redondear hacia abajo
    } else {
      return ceil($num);  // redondear hacia arriba
    }
}

if($_POST['function'] == 'loadAssistance'){
    try {
        $dayCount = array();
        $carryDb = array();
        $carryDay = '';

        $today = date("Y-m-d");
        $first_day_of_week = date('Y-m-d', strtotime("monday this week"));

        $assistanceQuery = "SELECT day, student_fk, LEFT(status, 1) as status FROM attendance_table WHERE day >= '".$first_day_of_week."' AND day <= '".$today."' AND student_fk = ".$_POST['id_alumno']." ORDER BY day ASC";

        $assistanceResult = $conn->query($assistanceQuery);


        if($assistanceResult->num_rows > 0){

            while($row = mysqli_fetch_array($assistanceResult)){
                foreach ($assistanceResult as $row) {
                    array_push($carryDb, $row);
                }
            }

            for ($i = 0; $i < 5; $i++) {
                if(isset($carryDb[$i])){
                    $carryDay = $carryDb[$i]['day'];
                    array_push($dayCount, $carryDb[$i]);
                }else{
                    $carryDay = date('Y-m-d', strtotime($carryDay . ' +1 day'));
                    array_push($dayCount, array(
                        'day' => $carryDay,
                        'student_fk' => $_POST['id_alumno'],
                        'status' => '-'
                    ));
                }
            }

            foreach($dayCount as $day){
                ?>
                <td><?php echo $day['status']?></td>
                <?php
            }

        }else{

            for ($i=0; $i < 5; $i++) { 
                $addDayNoData = date('Y-m-d', strtotime($first_day_of_week . ' +'.$i.' day'));
                array_push($dayCount, array(
                    'day' => $addDayNoData,
                    'student_fk' => $_POST['id_alumno'],
                    'status' => '-'
                ));
            }

            foreach($dayCount as $day){
                ?>
                    <td><?php echo $day['status'] ?></td>
                <?php
            }

        }
    } catch (\Throwable $th) {
        echo  $th;
    }
}

if($_POST['function'] == 'loadChangeInfo'){
    try {
        
        $query = "SELECT st.name, st.last_name, st.mothersLast_name, sf.name as turno, gr.name as grado, gp.name as grupo FROM student_table as st, shift_table as sf, grade_table as gr, group_table as gp WHERE st.grade_fk = gr.id_grade AND st.group_fk = gp.id_group AND st.shift_fk = sf.id_shift AND id_student = ".$_POST['id_student']."";
        $data = $conn->query($query);
        
        if($data->num_rows > 0){

            foreach ($data as $row) {
                ?>
                    <div class="div">
                        <div class="col col-lg-10 d-flex justify-content-center flex-column mx-auto">
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" alt="" class="img-fluid" style="height: 200px; border-radius: 50%;">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" name="" class="form-control" id="updatedName" value="<?php echo $row['name']?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6">
                                    <input type="text" name="" class="form-control" id="updatedLastName" value="<?php echo $row['last_name']?>">
                                </div>
                                <div class="col-12 col-md-6 mt-3 mt-md-0">
                                    <input type="text" name="" class="form-control" id="updatedMotherLastName" value="<?php echo $row['mothersLast_name']?>">
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" id="updatedTurno">
                                        <option value="1"  <?php echo ($row['turno'] == 'Matutino') ? 'selected' : '' ?> >Matutino</option>
                                        <option value="2" <?php echo ($row['turno'] == 'Vespertino') ? 'selected' : '' ?>>Vespertino</option>
                                    </select>
                                </div>  
                                <div class="col">
                                    <select class="form-select" aria-label="Default select example" id="updatedGrado">
                                        <option value="1" <?php echo ($row['grado'] == 1) ? 'selected' : '' ?>>Primero</option>
                                        <option value="2" <?php echo ($row['grado'] == 2) ? 'selected' : '' ?>>Segundo</option>
                                        <option value="3" <?php echo ($row['grado'] == 3) ? 'selected' : '' ?>>Tercero</option>
                                    </select>
                                </div>  
                                <div class="col-3 col-md-4">
                                    <select class="form-select" aria-label="Default select example" id="updatedGrupo">
                                        <option value="1" <?php echo ($row['grupo'] == 'A') ? 'selected' : ''?>>A</option>
                                        <option value="2" <?php echo ($row['grupo'] == 'B') ? 'selected' : ''?>>B</option>
                                        <option value="3" <?php echo ($row['grupo'] == 'C') ? 'selected' : ''?>>C</option>
                                        <option value="4" <?php echo ($row['grupo'] == 'D') ? 'selected' : ''?>>D</option>
                                        <option value="5" <?php echo ($row['grupo'] == 'E') ? 'selected' : ''?>>E</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }

        }else{
            echo "Error al caragar data";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}



if($_POST['function'] == 'updateStudent'){
    try {

        $query = "UPDATE student_table SET name = '".$_POST['name']."', last_name = '".$_POST['apPt']."', mothersLast_name = '".$_POST['apMt']."', grade_fk = '".$_POST['grado']."', group_fk = '".$_POST['grupo']."', shift_fk = '".$_POST['turno']."' WHERE id_student = ".$_POST['id_student']."";

        $result = $conn->query($query);
        if(mysqli_affected_rows($conn)  > 0){
            echo "Success";
        }else{
            echo "Failed";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadAssitanceModal'){
    try {

        $query = "SELECT ct.id_class, ct.name FROM class_teacher_table as ctt, student_table as st, class_table as ct WHERE ctt.shift_fk = st.shift_fk AND ctt.grade_fk = st.grade_fk AND ctt.group_fk = st.group_fk AND ctt.class_fk = ct.id_class AND st.id_student = ".$_POST['id_student']."";

        $result = $conn->query($query);

        if($result->num_rows > 0){
            ?>
                <div class="container d-flex justify-content-center mt-3 mb-3">
                    <div class="col-10">
                        <div class="row text-center">
                            <h2><?php echo($_POST['method'] == 'modificar' ? 'Modificar' : 'Historico')?></h2>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-4">
                                <input class="form-control" type="date" name="" id="searchedDate" placeholder="DD/MM/AAAA">
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <select class="form-select" aria-label="Default select example" id="selectedMonth">
                                    <option selected value="">Mes</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <select class="form-select" aria-label="Default select example" id="selectedClass">
                                    <option selected value="">Materia</option>
                                    <?php 
                                        foreach ($result as $class) {
                                            ?>
                                                <option value="<?php echo $class['id_class']?>"><?php echo $class['name']?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container tableContainer">
                                <table class="customAssistanceTable table table-striped" id="tableActionAssistance">
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

        }else{
            ?>
                <div class="container d-flex justify-content-center mt-3 mb-3">
                    <div class="col-10">
                        <div class="row text-center">
                            <h2><?php echo($_POST['method'] == 'modificar' ? 'Modificar' : 'Historico')?></h2>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-4">
                                <input class="form-control" type="date" name="" id="searchedDate" placeholder="DD/MM/AAAA">
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <select class="form-select" aria-label="Default select example" id="selectedMonth">
                                    <option selected value="">Mes</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0">
                                <select class="form-select" aria-label="Default select example" id="selectedClass">
                                    <option selected value="">Materia</option>
                                    <option value="">Aun no tiene materias</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container tableContainer">
                                <table class="customAssistanceTable table-striped-columns" id="tableActionAssistance">
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadAssistanceTable'){

    try {

        $dia ="";
        $mes = "";
        $materia = "";

        if($_POST['searchedDay'] != ''){
            $dia = " AND a.day LIKE '".$_POST['searchedDay']."'";
        }

        if($_POST['searchedMonth'] != ''){
            $mes = " AND MONTH(a.day) LIKE '".$_POST['searchedMonth']."'";
        }

        if($_POST['searchedClass'] != ''){
            $materia = " AND ct.id_class LIKE '".$_POST['searchedClass']."'";
        }

        $query = "SELECT a.id_attendance as id, a.day, LEFT(a.status, 1) as status FROM class_teacher_table as ctt, student_table as st, class_table as ct, attendance_table as a WHERE ctt.shift_fk = st.shift_fk AND ctt.grade_fk = st.grade_fk AND ctt.group_fk = st.group_fk AND ctt.class_fk = ct.id_class AND a.class_teacher_fk = ctt.id_class_teacher AND a.student_fk = st.id_student AND st.id_student = ".$_POST['id_student']."".$dia.$mes.$materia;

        $result = $conn->query($query);

        if($result->num_rows > 0){    
            ?>
                <thead class="assitanceTableHeader">
                    <tr>
                        <?php 
                            foreach ($result as $header) {
                                ?>
                                    <th class="custom-th"><?php echo $header['day']?></th>
                                <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 

                            if($_POST['method'] == 'modificar'){
                                foreach ($result as $mod) {
                                    ?>
                                        <td class="custom-th">
                                            <select class="form-control customSelect" aria-label="Default select example" id="<?php echo $mod['id']?>">
                                                <option value="Asistencia" <?php echo ($mod['status'] == 'A') ? 'selected' : ''?>>A</option>
                                                <option value="Retraso" <?php echo ($mod['status'] == 'R') ? 'selected' : ''?>>R</option>
                                                <option value="Falta" <?php echo ($mod['status'] == 'F') ? 'selected' : ''?>>F</option>
                                                <option value="Justificacion" <?php echo ($mod['status'] == 'J') ? 'selected' : ''?>>J</option>
                                                <option value="Baja" <?php echo ($mod['status'] == 'B') ? 'selected' : ''?>>B</option>
                                            </select>
                                        </td>
                                    <?php
                                }
                            }else{
                                foreach ($result as $his) {
                                    ?>
                                        <th class="custom-th"><?php echo $his['status']?></th>
                                    <?php
                                }
                            }
                        ?>
                    </tr>
                </tbody>
            <?php
        }


    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'updateAssistance'){
    try {

        $query = "UPDATE attendance_table SET status = '".$_POST['updated']."' WHERE id_attendance = ".$_POST['asistanceId']."";

        $result = $conn->query($query);
        if(mysqli_affected_rows($conn)  > 0){
            echo 'Success';
        }else{
            echo 'Failed';
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadConductModal'){
    try {

        $query = "SELECT AVG(CASE value WHEN 'Malo' THEN 1 WHEN 'Regular' THEN 2 WHEN 'Bueno' THEN 3 ELSE 0 END) as conducta FROM conduct_table WHERE student_fk = ".$_POST['id_student']."";

        $queryClassesConduct = "SELECT DISTINCT COALESCE(user_table.type, '') AS kind, COALESCE(class_table.name, '') AS class FROM conduct_table LEFT JOIN user_table ON conduct_table.person = user_table.id_user LEFT JOIN class_teacher_table ON conduct_table.class_teacher_fk = class_teacher_table.id_class_teacher LEFT JOIN class_table ON class_teacher_table.class_fk = class_table.id_class WHERE conduct_table.student_fk = ".$_POST['id_student']."";

        $result = $conn->query($query);
        $resultClasses = $conn->query($queryClassesConduct);

        foreach($result as $data);

        ?>
            <div class="container">
                <div class="col">
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center">
                            <i class='bx bxs-face fs-1'></i>
                            <p class="fs-3 mt-3 ml-3"><?php
                                    $conducta = round_num($data['conducta']);
                                    if($conducta == 0){
                                        echo 'Excelente';
                                    }
                                    if($conducta == 1){
                                        echo 'Malo';
                                    }
                                    if($conducta == 2){
                                        echo 'Regular';
                                    }
                                    if($conducta == 3){
                                        echo 'Bueno';
                                    }
                                ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="conductTableContainer">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody id="conductTableBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <div class="col-sm-10 col-md-6 col-12">
                            <button class="btn btn-primary w-100" id="addNewConductData">Añadir Registro</button>
                        </div>
                        <div class="col-sm-10 col-md-6 col-12 mt-3 mt-md-0">
                            <select class="form-select w-100" aria-label="Default select example" id="selectedFilter">
                                <option selected value="">Materia</option>
                                <?php
                                    foreach($resultClasses as $who){
                                        ?>
                                            <option value="<?php echo ($who['kind'] == "" ? $who['class'] : $who['kind'])?>"><?php echo ($who['kind'] == "" ? $who['class'] : $who['kind'])?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        <?php

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadConductTableBody'){
    try {

        $where = "";
        if($_POST['where'] != ""){
            $where = " AND (user_table.type = '".$_POST['where']."' OR class_table.name LIKE '%".$_POST['where']."%')";
        }

        $query = "SELECT id_conduct, description, value, DAY(day) as dia, MONTH(day) as mes FROM conduct_table WHERE student_fk = ".$_POST['id_student']."";

        $queryMax = "SELECT conduct_table.id_conduct AS id_conduct, conduct_table.description AS description, conduct_table.value, DAY(conduct_table.day) as dia, MONTH(conduct_table.day) as mes, COALESCE(user_table.type, '') AS type_or_teacher, COALESCE(class_table.name, '') AS class_name FROM conduct_table LEFT JOIN user_table ON conduct_table.person = user_table.id_user LEFT JOIN class_teacher_table ON conduct_table.class_teacher_fk = class_teacher_table.id_class_teacher LEFT JOIN class_table ON class_teacher_table.class_fk = class_table.id_class WHERE conduct_table.student_fk = ".$_POST['id_student']."".$where;

        $result = $conn->query($queryMax);
        if($result->num_rows > 0){

            foreach($result as $data){
                ?>
                    <tr id="<?php echo $data['id_conduct']?>">
                        <td><?php echo $data['dia']."/".$data['mes']?></td>
                        <td><?php echo $data['value']?></td>
                        <td><?php echo $data['description']?></td>
                    </tr>
                <?php
            }

        }else{
            ?>
                <tr>
                    <td>Aun</td>
                    <td>No Existe</td>
                    <td>Data</td>
                </tr>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadSubmitAsConduct'){
    try {
        
        $teacherWhere = '';

        $query = "SELECT cl.name as name, ctt.id_class_teacher as class FROM student_table as st, class_table as cl, class_teacher_table as ctt WHERE cl.id_class = ctt.class_fk AND ctt.shift_fk = st.shift_fk AND ctt.grade_fk = st.grade_fk AND ctt.group_fk = st.group_fk AND st.id_student = ".$_POST['id_student']." AND ctt.teacher_fk = ".$_SESSION['sessionUser']['id_user']."";

        $result = $conn->query($query);
        
        if($result->num_rows > 0){

            ?>
            <select class="form-select" aria-label="Default select example" id="selectedSubmitAs">
                <option selected value="">Agregar Conducta Como</option>
                <option data-entity="Other" value="<?php echo $_SESSION['sessionUser']['id_user']?>"><?php echo $_SESSION['sessionUser']['type']?></option>
                <?php
                
                foreach ($result as $opts) {
                    ?>
                        <option data-entity="Maestro" value="<?php echo $opts['class']?>"><?php echo $opts['name']?></option>
                    <?php
                }
                
                ?>
            </select>
            <?php

        }else{
            ?>
                <select class="form-select" aria-label="Default select example" id="selectedSubmitAs">
                    <option selected value="">Agregar Conducta Como</option>    
                    <option data-entity="Other" value="<?php echo $_SESSION['sessionUser']['id_user']?>"><?php echo $_SESSION['sessionUser']['type']?></option>
                </select>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == "submitNewConductData"){
    try {

        $value = '';
        $column = '';

        if($_POST['asEntity'] == 'Maestro'){
            $value = $_POST['asValue'];
            $column = "class_teacher_fk";
        }else{
            $value = $_POST['asValue'];
            $column = "person";
        }

        $query = "INSERT INTO conduct_table(student_fk, description, value, $column) VALUE (".$_POST['id_user'].", '".$_POST['description']."', '".$_POST['value']."', $value)";

        $result = $conn->query($query);
        
        if(mysqli_affected_rows($conn) > 0){
            echo "Success";
        }else{
            echo "Failed";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'registerNewStudent'){
    try {

        $query ="INSERT INTO student_table (name, last_name, mothersLast_name, grade_fk, group_fk, shift_fk) VALUE ('".$_POST['name']."', '".$_POST['lastname']."', '".$_POST['motherL']."', ".$_POST['grade'].", ".$_POST['group'].", ".$_POST['shift'].")";

        $result = $conn->query($query);

        if(mysqli_affected_rows($conn) > 0){
            echo "Success";
        }else{
            echo "Failed";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>
