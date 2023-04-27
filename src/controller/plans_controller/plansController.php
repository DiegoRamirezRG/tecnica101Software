<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('../../config/database/conexion.php');
include_once('../../components/card/card.php');

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
        
        $query = "SELECT ctt.id_class_teacher, ctt.teacher_fk, ct.name as class_name, gt.name as grade_name, gr.name as group_name, st.name as shift_name
        FROM class_teacher_table ctt
        JOIN class_table ct ON ctt.class_fk = ct.id_class
        JOIN grade_table gt ON ctt.grade_fk = gt.id_grade
        JOIN group_table gr ON ctt.group_fk = gr.id_group
        JOIN shift_table st ON ctt.shift_fk = st.id_shift ".$where.$gradoWhere.$grupoWhere.$turnoWhere;

        $result = $conn->query($query);
        if($result && mysqli_num_rows($result) > 0){
            createClassCardDownload(array(
                'id_class_teacher' => 'downloadAll',
                'class_name' => 'Descargar Todas',
                'shift_name' => 'Planeaciones',
                'grade_name' => '*',
                'group_name' => '*',
                'teacher_fk' => '*'
            ));
            foreach ($result as $data) {
                createClassCardDownload($data);
            }
        }else{
            echo "No existen materias con los filtros seleccionados";
        }

    } catch (\Throwable $th) {
        echo $th;
    }
}

?>