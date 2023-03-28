<?php

session_start();

if(!isset($_SESSION['sessionUser'])) {
    header("Location: ../../login_screen/loginScreen.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOD mainboard</title>

    <link rel="stylesheet" href="./godMainboardStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>God Mainboard</h1>
    <button class="btn btn-primary" id="logout">Logout</button>

    <script>
        $(document).ready(function(){

            $("#logout").on('click', function(){
                $.ajax({
                    type: "POST",
                    url: "../../../controller/login_controller/loginController.php",
                    data: ({
                        function: "LOGOUT"
                    }),
                    dataType: "html",
                    async: false,
                    success: function(result){
                        if(result == 'Failed'){
                            alert('Failed to Logout');
                        }else{
                            alert('Successfully Logout');
                            location.reload();
                        }
                    }
                })
            });

        })
    </script>
</body>
</html>