<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('../../config/database/conexion.php');

function round_num($num) {
    if ($num < floor($num) + 0.5) {
      return floor($num);  // redondear hacia abajo
    } else {
      return ceil($num);  // redondear hacia arriba
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
                                <tbody id="conductTableBodyCoor">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <div class="col-sm-10 col-md-6 col-12">
                            <button class="btn btn-primary w-100" id="addNewConductDataCoor">Añadir registro</button>
                        </div>
                        <div class="col-sm-10 col-md-6 col-12 mt-3 mt-md-0">
                            <select class="form-select w-100" aria-label="Default select example" id="selectedFilterCoor">
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

if($_POST['function'] == 'loadSubmitAsConductCoor'){
    try {
        
        $teacherWhere = '';

        $query = "SELECT cl.name as name, ctt.id_class_teacher as class FROM student_table as st, class_table as cl, class_teacher_table as ctt WHERE cl.id_class = ctt.class_fk AND ctt.shift_fk = st.shift_fk AND ctt.grade_fk = st.grade_fk AND ctt.group_fk = st.group_fk AND st.id_student = ".$_POST['id_student']." AND ctt.teacher_fk = ".$_SESSION['sessionUser']['id_user']."";

        $result = $conn->query($query);
        
        if($result->num_rows > 0){

            ?>
            <select class="form-select" aria-label="Default select example" id="selectedSubmitAsCoor">
                <option selected value="">Agregar conducta como</option>
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
                <select class="form-select" aria-label="Default select example" id="selectedSubmitAsCoor">
                    <option selected value="">Agregar conducta como</option>    
                    <option data-entity="Other" value="<?php echo $_SESSION['sessionUser']['id_user']?>"><?php echo $_SESSION['sessionUser']['type']?></option>
                </select>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>