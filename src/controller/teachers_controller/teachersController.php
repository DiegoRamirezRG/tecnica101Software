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
            $classFilter = " AND (ct.name LIKE '%".$_POST['class']."%'";
        }

        if(isset($_POST['name']) AND $_POST['name'] != ""){
            $nameFilter = " AND CONCAT(ut.name, ' ', ut.last_name, ' ', ut.mothersLast_name) LIKE '%".$_POST['name']."%'";
        }

        $query = "SELECT ut.id_user, CONCAT(ut.name, ' ', ut.last_name, ' ', ut.mothersLast_name) as name
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

?>