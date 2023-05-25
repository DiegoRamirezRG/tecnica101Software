<?php

include_once('../../config/database/conexion.php');

if($_POST['function'] == 'loadClassesContainer'){
    try {

        ?>
        <div class="col-12 col-md-5">
            <div class="mt-1 classSearchContainer d-flex flex-column justify-content-center">
                <div class="col">
                    <div class="row d-flex justify-content-center mx-auto">
                        <div class="col-10 col-md-7">
                            <div class="input-group mb-3 mb-md-0">
                                <input type="text" class="form-control" placeholder="Buscar materia" id="classSearchedCycle">
                            </div>
                        </div>
                        <div class="col-10 col-md-5 d-flex justify-content-center">
                            <button class="btn btn-primary w-100" id="addNewClassCycle">Añadir materia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-2 tableCycleContainer">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre de la materia</th>
                    </tr>
                </thead>
                <tbody id="classesCycleTableBody">
                    
                </tbody>
            </table>
        </div>  
        <?php

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadTableBody'){
    try {

        $nameWhere = "";

        if(isset($_POST['name']) AND $_POST['name'] != ""){
            $nameWhere = " WHERE name LIKE '%".$_POST['name']."%'";
        }

        $query = "SELECT id_class, name FROM class_table".$nameWhere." ORDER BY name ASC";

        $result = $conn->query($query);

        if($result -> num_rows > 0){

            foreach ($result as $data) {
                ?>
                    <tr class="trHoverable" id="<?php echo $data['id_class']?>">
                        <td><?php echo $data['name']?></td>
                    </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td>No existen las materias</td>
            </tr>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'createNewClass'){
    try {

        $query = "INSERT INTO class_table(name) VALUE ('".$_POST['name']."')";
        $result = $conn->query($query);

        if(mysqli_affected_rows($conn) > 0){
            echo 'Sucess';
        }else{
            echo 'Failed';
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'updateClassNameData'){
    try {

        $query = "UPDATE class_table SET name = '".$_POST['name']."' WHERE id_class = ".$_POST['id_class']."";
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

if($_POST['function'] == 'finishCycle'){
    try {

        $worksDir = "../../examples/works";
        $plansDir = "../../examples/plans";
        $guidesDir = "../../examples/guides";

        $deleteConduct = "DELETE FROM conduct_table WHERE student_fk IN (SELECT id_student FROM student_table WHERE grade_fk = 3)";
        $deleteStudents = "DELETE FROM student_table WHERE grade_fk = 3";
        $deleteTableTeacherClass = "DELETE FROM attendance_table";
        $deleteTableAssitance = "DELETE FROM class_teacher_table";
        $deleteTablePlanning ="DELETE FROM planning_table";
        $deleTableWorks = "DELETE FROM student_works_table";
        $deleteTableGuides = "DELETE FROM student_guides_table";
        $updateOtherStudents = "UPDATE student_table SET grade_fk = grade_fk + 1 WHERE grade_fk < 3";


        $conn->begin_transaction();

        $conn->query($deleteConduct);
        $conn->query($deleteStudents);
        $conn->query($deleteTableTeacherClass);
        $conn->query($deleteTableAssitance);
        $conn->query($deleteTablePlanning);
        $conn->query($deleTableWorks);
        $conn->query($deleteTableGuides);
        $conn->query($updateOtherStudents);


        if($conn->commit()){

            borrarArchivos($worksDir);
            createFolder($worksDir);

            borrarArchivos($plansDir);
            createFolder($plansDir);
            
            borrarArchivos($guidesDir);
            createFolder($guidesDir);

            echo "Success";
        }else{
            echo "Failed";
        }

    } catch (\Throwable $th) {
        mysqli_rollback($conn);
        echo 'Failed: ' . $th->getMessage();
    }
}

function borrarArchivos($carpeta) {
    foreach(glob($carpeta.'/*') as $archivo) {
        if(is_dir($archivo)) {
            borrarArchivos($archivo);
        } else {
            unlink($archivo);
        }
    }
    rmdir($carpeta);
}

function createFolder($folder){
    if(!is_dir($folder)){
        mkdir($folder, 0777, true);
    }else{

    }
}

?>