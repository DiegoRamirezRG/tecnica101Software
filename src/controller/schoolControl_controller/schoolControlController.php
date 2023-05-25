<?php

include_once('../../config/database/conexion.php');

if ($_POST['function'] == 'schoolControlLoadTable') {
    try {
        $nameFilter = "";
        $typeFilter = "";

        if (isset($_POST['name']) and $_POST['name'] != "") {
            $nameFilter = " AND CONCAT(ut.name, ' ', ut.last_name, ' ', ut.mothersLast_name) LIKE '%" . $_POST['name'] . "%'";
        }

        if (isset($_POST['type']) and $_POST['type'] != "") {
            $typeFilter = " AND ut.type LIKE '"."%".$_POST['type']."%"."' ";
        }

        $query = "SELECT DISTINCT ut.id_user, CONCAT(ut.name, ' ', ut.last_name, ' ', ut.mothersLast_name) as name, ut.type
        FROM user_table as ut 
        WHERE ut.type NOT IN ('Maestro', 'GOD')".$nameFilter.$typeFilter;

        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            foreach ($result as $row) {
?>
                <tr id="<?php echo $row['id_user'] ?>">
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td>No existen administrativos aun</td>
            </tr>
        <?php
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

if ($_POST['function'] == 'createNewSchoolControl') {
    try {

        $encrypted_password = md5($_POST['password']);

        $query = "INSERT INTO user_table (email, password, name, last_name, mothersLast_name, phone, type) VALUE ('" . $_POST['email'] . "', '" . $encrypted_password . "', '" . $_POST['name'] . "', '" . $_POST['lastname'] . "', '" . $_POST['mothersLN'] . "', " . $_POST['phone'] . ", '" . $_POST['type'] . "')";

        $result = $conn->query($query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

if ($_POST['function'] == 'loadSchoolControlDetails') {
    try {

        $query = "SELECT CONCAT(name, ' ', last_name, ' ', mothersLast_name) as name from user_table WHERE id_user = " . $_POST['id_user'] . "";

        $result = $conn->query($query);
        foreach ($result as $data)

        ?>
        <div class="container">
            <div class="col">
                <div class="row text-center mt-3 mb-3 d-flex justify-content-center">
                    <h1><?php echo $data['name'] ?></h1>
                    <div class="col-5">
                        <span class="badge rounded-pill bg-info">Administrativo</span>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-8 col-md-12">
                                <div class="row">
                                    <button class="btn btn-primary" id="editSchoolControlBtn">Editar información</button>
                                </div>
                            </div>
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

if ($_POST['function'] == 'loadUpdateModalSchoolControl') {
    try {

        $query = "SELECT name, last_name, mothersLast_name, phone, email FROM user_table WHERE id_user = " . $_POST['id_user'] . "";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            foreach ($result as $data)

        ?>
            <div class="col-12 col-md-10 d-flex flex-column justify-content-center mx-auto">
                <div class="row mt-3 mb-3 text-center">
                    <h2>Editar administrativo</h2>
                </div>
                <div class="row flex-wrap">
                    <label class="mb-1">Información personal</label>
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input value="<?php echo $data['name'] ?>" type="text" class="form-control" placeholder="Nombre" id="editSchoolControlName">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input value="<?php echo $data['last_name'] ?>" type="text" class="form-control" placeholder="Apellido Paterno" id="editSchoolControlLastname">
                        </div>
                    </div>
                </div>
                <div class="row flex-wrap">
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input value="<?php echo $data['mothersLast_name'] ?>" type="text" class="form-control" placeholder="Apellido Materno" id="editSchoolControlMLastname">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input value="<?php echo $data['phone'] ?>" type="tel" class="form-control" placeholder="Teléfono" id="editSchoolControlPhone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="mb-1">Crendenciales</label>
                    <div class="col-12 text-center mb-3">
                        <input value="<?php echo $data['email'] ?>" type="email" class="form-control" placeholder="control@correo.com" id="editSchoolControlEmail">
                    </div>
                </div>
                <div class="row mt-5 mb-3">
                    <div class="col text-center">
                        <button class="btn btn-primary" id="editSchoolControlButton">Editar administrativo</button>
                    </div>
                </div>
            </div>
        <?php

        } else {
        ?>
            <h1 class="text-danger">Error al obtener data del administrador</h1>
<?php
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

if ($_POST['function'] == 'updateSchoolControlInfo') {
    try {

        $query = "UPDATE user_table SET name = '" . $_POST['name'] . "', last_name = '" . $_POST['last_name'] . "', mothersLast_name = '" . $_POST['mothersL'] . "', phone = " . $_POST['phone'] . ", email = '" . $_POST['email'] . "' WHERE id_user = " . $_POST['id_user'] . "";

        $result = $conn->query($query);

        if (mysqli_affected_rows($conn) > 0) {
            echo 'Success';
        } else {
            echo 'Failed';
        }
    } catch (\Throwable $th) {
        echo $th;
    }
}

?>