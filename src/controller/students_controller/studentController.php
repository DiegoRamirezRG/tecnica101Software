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

?>