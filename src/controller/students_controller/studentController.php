<?php

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
            <div class="modalHeader w-100 d-flex align-items-center justify-content-between">
                <div class="col-1 d-flex justify-content-center">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" class="img-fluid rounded" alt="">
                </div>
                <div class="col-10">
                    <div class="row">
                        <h2><?php echo $row['name']?></h2>
                    </div>
                    <div class="row d-flex flex-wrap">
                        <div class="col-5 d-flex justify-content-between">
                            <span class="badge rounded-pill bg-dark fs-5"><?php echo $row['turno']?></span>
                            <span class="badge rounded-pill bg-warning fs-5"><?php echo $row['grado']?></span>
                            <span class="badge rounded-pill bg-danger fs-5"><?php echo $row['grupo']?></span>
                        </div>
                        <div class="col-12 col-sm-7 d-flex justify-content-center justify-content-sm-end">
                            <button class="btn btn-outline-warning btn-rounded w-75 adaptapBtn" id="editData">Editar</button>
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
                                        <button class="btn btn-outline-danger" id="assitanceM">Modificar</button>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-outline-success mt-2" id="assitanceH">Historico</button>
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
                                        echo 'Demonio';
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
                                <button class="btn btn-outline-primary w-75">Editar</button>
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
        ?>
        <h1>Si jalo</h1>
        <?php
    } catch (\Throwable $th) {
        echo $th;
    }
}

?>
