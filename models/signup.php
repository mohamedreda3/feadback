<?php

class Signup
{
    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }
    public function sendData(?array $data = [])
    {

//print_r($data);
        if ($data['email'] == null || !filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL)) {
            echo $this->res->getResponse(0, 'Enter validate Email', null);
        } else if ($data['phone'] == null || !filter_var(trim(intval($data['phone'])), FILTER_VALIDATE_INT)) {
            echo $this->res->getResponse(0, 'Enter validate Phone number', null);
        } else if ($data['password'] == null) {
            echo $this->res->getResponse(0, 'Enter password', null);
        } else if (!isset($data['userName']) || $data['userName'] == null) {
            echo $this->res->getResponse(0, 'Enter userName', null);
        }  else if (!isset($data['type']) || $data['type'] == null) {
            echo $this->res->getResponse(0, 'Enter user type', null);
        }  else {
            $uemail = trim($data['email']);
            $password = md5(trim($data['password']));
            $phonenumber = strval(trim($data['phone']));
            $uname = trim($data['userName']);
            $type = trim($data['type']);
            $checkEmailQuery = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$uemail'");
            if (!(mysqli_num_rows($checkEmailQuery) > 0)) {
            $insertQuery = mysqli_query($this->conn, "INSERT INTO user(email, pass, uname, phone, usertype) VALUES('$uemail', '$password','$uname','$phonenumber','$type')");
            if ($insertQuery) {
                //setcookie('Data', base64_encode($uemail), time() + 86400 * 3, '/', null, true, true);
                $uData =  array(
                    'uname' => $uname,
                    'phone' => $phonenumber,
                );
                $token = serialize(base64_encode($uemail));
                echo $this->res->getResponse(1, 'success', $token, $uData);
            } else {
                echo $this->res->getResponse(0, mysqli_error($this->conn), null);
            }
        }else{
        echo $this->res->getResponse(0, 'Email exists', null);
       }
       }
    }
    //Duplicate entry for key 'email'
}
