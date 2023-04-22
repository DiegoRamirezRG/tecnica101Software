<?php

include_once('../../config/database/conexion.php');

if($_POST['function'] == 'loadTable'){
    try {
        $gradeFilter = "";
        $groupFilter = "";
        $shiftFilter = "";
        $classFilter = "";
        $nameFilter = "";

        if(isset($_POST['grade']) AND $_POST['grade'] != ""){
            $gradeFilter = " AND (ctt.grade_fk = ".$_POST['grade'].")";
        }

        if(isset($_POST['group']) AND $_POST['group'] != ""){
            $groupFilter = " AND (ctt.group_fk = ".$_POST['group'].")";
        }

        if(isset($_POST['shift']) AND $_POST['shift'] != ""){
            $shiftFilter = " AND (ctt.shift_fk = ".$_POST['shift'].")";
        }

        if(isset($_POST['class']) AND $_POST['class'] != ""){
            $classFilter = " AND (ct.name LIKE '%".$_POST['class']."%')";
        }

        if(isset($_POST['name']) AND $_POST['name'] != ""){
            $nameFilter = " AND CONCAT(ut.name, ' ', ut.last_name, ' ', ut.mothersLast_name) LIKE '%".$_POST['name']."%'";
        }

        $query = "SELECT DISTINCT ut.id_user, CONCAT(ut.name, ' ', ut.last_name, ' ', ut.mothersLast_name) as name
        FROM user_table as ut 
        LEFT JOIN class_teacher_table as ctt ON ut.id_user = ctt.teacher_fk 
        LEFT JOIN class_table as ct ON ctt.class_fk = ct.id_class 
        WHERE ut.type = 'Maestro'".$gradeFilter.$groupFilter.$shiftFilter.$classFilter.$nameFilter;

        $result = $conn->query($query);

        if($result->num_rows > 0){

            foreach($result as $row){
                ?>
                    <tr id="<?php echo $row['id_user']?>">
                        <td><?php echo $row['name']?></td>
                    </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td>No Existen Maestros Aun</td>
            </tr>
            <?php
        }
    } catch (\Throwable $th) {
        echo $th;
    }

}

if($_POST['function'] == 'createNewTeacher'){
    try {

        $encrypted_password = md5($_POST['password']);

        $query = "INSERT INTO user_table (email, password, name, last_name, mothersLast_name, phone, type) VALUE ('".$_POST['email']."', '".$encrypted_password."', '".$_POST['name']."', '".$_POST['lastname']."', '".$_POST['mothersLN']."', ".$_POST['phone'].", 'Maestro')"; 

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

if($_POST['function'] == 'loadTeacherDetails') {
    try {

        $query = "SELECT CONCAT(name, ' ', last_name, ' ', mothersLast_name) as name from user_table WHERE id_user = ".$_POST['id_user']."";

        $result = $conn->query($query);
        foreach ($result as $data)

        ?>
            <div class="container">
                <div class="col">
                    <div class="row text-center mt-3 mb-3 d-flex justify-content-center">
                        <h1><?php echo $data['name']?></h1>
                        <div class="col-5">
                            <span class="badge rounded-pill bg-success">Maestro</span>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-12 col-md-5">
                            <div class="row d-flex justify-content-center">
                                    <div class="col-8 col-md-12">
                                        <div class="row">
                                            <button class="btn btn-primary" id="editTeacherBtn">Editar Informacion</button>
                                        </div>
                                        <div class="row mt-3">
                                            <button class="btn btn-warning" id="assignTeacherBtn">Asignar una Clase</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3 mt-3 mt-md-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Materia</td>
                                        <td>Grupo</td>
                                    </tr>
                                </thead>
                                <tbody id="tableClassTeacherBody">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadTableBody'){
    try {

        $query = "SELECT c.name AS nombre, CONCAT( gr.name, ' ° ', gp.name, ' ', LEFT(sf.name, 3)) as grupo
        FROM user_table u
        JOIN class_teacher_table as ct ON u.id_user = ct.teacher_fk
        JOIN class_table as c ON ct.class_fk = c.id_class
        JOIN grade_table as gr ON ct.grade_fk = gr.id_grade
        JOIN group_table as gp ON ct.group_fk = gp.id_group
        JOIN shift_table as sf ON ct.shift_fk = sf.id_shift
        WHERE u.id_user = ".$_POST['id_user']."";

        $result = $conn->query($query);
        
        if($result -> num_rows > 0){

            foreach ($result as $data) {
                ?>
                    <tr>
                        <td><?php echo $data['nombre']?></td>
                        <td><?php echo $data['grupo']?></td>
                    </tr>
                <?php
            }

        }else{
            ?>
            <tr>
                <td>No tiene</td>
                <td>Clases Aun</td>
            </tr>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadClasses'){
    try {
        ?>
        <div class="container d-flex justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row text-center mt-3 mb-3 d-flex justify-content-center">
                    <h1>Asignar Clase</h1>
                    <div class="col-5">
                        <span class="badge rounded-pill bg-success">Maestro</span>
                    </div>
                </div>
                <div class="row mt-3 d-flex justify-content-between">
                    <div class="col-12 col-md-4">
                        <select class="form-select" aria-label="Default select example" id="selectedShift">
                            <option selected value="">Turno</option>
                            <option value="1">Matutino</option>
                            <option value="2">Vespertino</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <select class="form-select" aria-label="Default select example" id="selectedGrade">
                            <option selected value="">Grado</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <select class="form-select" aria-label="Default select example" id="selectedGroup">
                            <option selected value="">Grupo</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            <option value="5">E</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3 mb-5 d-flex justify-content-center">
                    <div class="col-12 col-md-12" id="classTeacherBody">
                    
                    </div>
                </div>
                <div class="row mt-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 text-center">
                        <button class="btn btn-primary" id="assignTeacherSendBtn">Asignar Clase</button>
                    </div>
                </div>
            </div>
        </div>
        <?php

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'loadSelected'){
    try {
        
        $query = "SELECT id_class, name
        FROM class_table WHERE id_class NOT IN ( SELECT class_fk FROM class_teacher_table WHERE shift_fk = ".$_POST['shift']." AND grade_fk = ".$_POST['grade']." AND group_fk = ".$_POST['group'].")";

        $result = $conn->query($query);

        if($result -> num_rows > 0){
            ?>
            <select id="selectedClass" class="form-select" aria-label="Default select example" data-live-search="true">
                <option selected value="">Materia</option>
                <?php
                foreach ($result as $data) {
                    ?>
                        <option value="<?php echo $data['id_class']?>"><?php echo $data['name']?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        }else{
            ?>
                <select id="selectedClass" class="form-select" aria-label="Default select example" data-live-search="true">
                <option selected value="">No hay ninguna clase</option>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'assignTeacherClass'){
    try {

        $query = "INSERT INTO class_teacher_table(teacher_fk, grade_fk, group_fk, shift_fk, class_fk) VALUES (".$_POST['id_teacher'].", ".$_POST['grade'].", ".$_POST['group'].", ".$_POST['shift'].", ".$_POST['class'].")";
        
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

if($_POST['function'] == 'loadUpdateModal'){
    try {

        $query = "SELECT name, last_name, mothersLast_name, phone, email FROM user_table WHERE id_user = ".$_POST['id_user']."";

        $result = $conn->query($query);

        if($result -> num_rows > 0){

            foreach ($result as $data)

            ?>
                <div class="col-12 col-md-10 d-flex flex-column justify-content-center mx-auto">
                    <div class="row mt-3 mb-3 text-center">
                        <h2>Editar Profesor</h2>
                    </div>
                    <div class="row flex-wrap">
                        <label class="mb-1">Informacion Personal</label>
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <input value="<?php echo $data['name']?>" type="text" class="form-control" placeholder="Nombre" id="editTeacherName">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <input value="<?php echo $data['last_name']?>" type="text" class="form-control" placeholder="Apeido Paterno" id="editTeacherLastname">
                            </div>
                        </div>
                    </div>
                    <div class="row flex-wrap">
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <input value="<?php echo $data['mothersLast_name']?>" type="text" class="form-control" placeholder="Apeido Materno" id="editTeacherMLastname">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <input value="<?php echo $data['phone']?>" type="tel" class="form-control" placeholder="Telefono" id="editTeacherPhone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="mb-1">Crendenciales</label>
                        <div class="col-12 text-center mb-3">
                            <input value="<?php echo $data['email']?>" type="email" class="form-control" placeholder="maestro@correo.com" id="editTeacherEmail">
                        </div>
                    </div>
                    <div class="row mt-5 mb-3">
                        <div class="col text-center">
                            <button class="btn btn-primary" id="editTeacherButton">Editar Profesor</button>
                        </div>
                    </div>
                </div>
            <?php

        }else{
            ?>
            <h1 class="text-danger">Error al obtener data del profesor</h1>
            <?php
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

if($_POST['function'] == 'updateTeacherInfo'){
    try {

        $query = "UPDATE user_table SET name = '".$_POST['name']."', last_name = '".$_POST['last_name']."', mothersLast_name = '".$_POST['mothersL']."', phone = ".$_POST['phone'].", email = '".$_POST['email']."' WHERE id_user = ".$_POST['id_user']."";

        $result = $conn->query($query);

        if(mysqli_affected_rows($conn) > 0){
            echo 'Success';
        }else{
            echo 'Failed';
        }



    } catch (\Throwable $th) {
        echo $th;
    }
}

?>