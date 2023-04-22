
<?php

session_start();



?>

<div class="container">
    <div class="configMaxContainer">
        <div class="configCardContainer card" onmouseover="this.style.border='none';">
            <div class="col-12 col-md-7 d-flex flex-column justify-content-center align-items-center">
                <div class="row">
                    <div class="profile-pic">
                        <label class="-label" for="file">
                            <span>Cambiar Perfil</span>
                        </label>
                        <input id="file" type="file"/>
                        <img src="../../examples/userIcons/<?php echo $_SESSION['sessionUser']['id_user']?>/<?php echo $_SESSION['sessionUser']['id_user']?>.png" id="output" width="200" />
                    </div>
                </div>
                <div class="row w-100 text-center">
                    <h1><?php echo $_SESSION['sessionUser']['name'].' '.$_SESSION['sessionUser']['last_name'].' '.$_SESSION['sessionUser']['mothersLast_name']?></h1>
                </div>
                <div class="row w-100 mt-1 mt-md-5">
                    <div class="col">
                        <label for="updateProfileName">Actualizar Nombre (s)</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" id="updateProfileName" value="<?php echo $_SESSION['sessionUser']['name']?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="updateProfileName">Actualizar Apeido Paterno</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" id="updateProfileLastName" value="<?php echo $_SESSION['sessionUser']['last_name']?>">
                        </div>
                    </div>
                </div>
                <div class="row w-100 mt-2">
                    <div class="col">
                        <label for="updateProfileName">Actualizar Apeido Materno</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" id="updateProfileMothersLastName" value="<?php echo $_SESSION['sessionUser']['mothersLast_name']?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="updateProfileName">Actualizar Telefono</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" id="updateProfilePhone" value="<?php echo $_SESSION['sessionUser']['phone']?>">
                        </div>
                    </div>
                </div>
                <div class="row w-100 mt-2 mt-md-5 text-center">
                    <div class="col-12 col-sm-6">
                        <button class="btn btn-primary w-75" id="updateProfileBtn">Actualizar Perfil</button>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-md-0 mb-0 mb-sm-3">
                        <button class="btn btn-danger w-75" id="changeProfilePasswordActionBtn">Cambiar Contraseña</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>