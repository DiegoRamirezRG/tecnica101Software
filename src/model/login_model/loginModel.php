<?php

session_start();

class loginModel{

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $password){
        $passwordHashed = hash('md5', $password);
        $Auto = $this->conn->query("SELECT * FROM user_table WHERE email = '$email' AND password = '$passwordHashed'");
        if($Auto && mysqli_num_rows($Auto) > 0){
            foreach ($Auto as $row);
            if($row['id_user']!=""){
                if($row['password'] == $passwordHashed){
                    $sessionUser = array(
                        'id_user' => $row['id_user'],
                        'email' => $row['email'],
                        'name' => $row['name'],
                        'last_name' => $row['last_name'],
                        'mothersLast_name' => $row['mothersLast_name'],
                        'phone' => $row['phone'],
                        'type' => $row['type']
                    );
        
                    $_SESSION['sessionUser'] = $sessionUser;
                    return true;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function logout(){
        session_destroy();
        if($_SESSION['sessionUser']){
            return false;
        }else{
            return true;
        }
    }

}

?>