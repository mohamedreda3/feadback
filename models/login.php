<?php

class Login
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

        if ($data['email'] == null || !filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL)) {
            echo $this->res->getResponse(0, 'Enter validate Email', null);
        } else if ($data['password'] == null) {
            echo $this->res->getResponse(0, 'Enter password', null);
        } else {
            $uemail = trim($data['email']);
            $password = md5(trim($data['password']));
            $checkDataQuery = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$uemail' AND pass = '$password'");
            $checkEmailQuery = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$uemail'");
            if (mysqli_num_rows($checkEmailQuery) > 0) {
                if (mysqli_num_rows($checkDataQuery) > 0) {

                    $getData = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT uname,phone FROM user WHERE email = '$uemail'"));

                    setcookie('Data', base64_encode($uemail), time() + 86400 * 3, '/', 1, true, true);
                    $uData =  array(
                        'uname' => $getData['uname'],
                        'phone' => $getData['phone'],
                    );
                    $token = serialize(base64_encode($uemail));
                    echo $this->res->getResponse(1, 'success', $token, $uData);
                } else {
                    echo $this->res->getResponse(0, 'Wrong email or password', null);
                }
            } else {
                echo $this->res->getResponse(0, 'Email does not exist, you can create account if you do not have one', null);
            }
        }
    }
}
