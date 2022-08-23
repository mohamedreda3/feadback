<?php

use PHPMailer\PHPMailer\PHPMailer;


require __DIR__ . '/../' . 'vendor/autoload.php';

class SendFeadbacks
{
    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }
    public function sendFeadback($data)
    {

        if ((!isset($data['email']) || $data['email'] == '') ||(!isset($data['message']) || $data['message'] == '') ||(!isset($data['sessionId']) || $data['sessionId'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Your_email and message and Session_Id');
        } else {

            $email = ($data['email']);
            $message = ($data['message']);
            $session_id = ($data['sessionId']);

            $checkEmailQuery = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$email'");
            $getData = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT uname,phone FROM user WHERE email = '$email'"));
            $getSData = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM sess WHERE sessionId = '$session_id'"))['sessionId'];
            if (mysqli_num_rows($checkEmailQuery) > 0) {
                    $insertQuery = mysqli_query($this->conn, "INSERT INTO feadbacks(email, mess, sessionId) VALUES('$email', '$message', '$session_id')");
                    if ($insertQuery) {
                        echo $this->res->getResponse(1, 'Success');
                    } else {
                        echo $this->res->getResponse(0, mysqli_error($this->conn));
                    }
                
            } else {
                echo $this->res->getResponse(0, 'Email does not exist, you can create account if you do not have one', null);
            }
        }
    }
    
}


