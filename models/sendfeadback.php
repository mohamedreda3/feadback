<?php

use PHPMailer\PHPMailer\PHPMailer;


require __DIR__ . '/../' . 'vendor/autoload.php';

class SendFeadback
{
    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }
    public function sendEmail($data)
    {

        if ((!isset($data['email']) || $data['email'] == '') ||(!isset($data['message']) || $data['message'] == '') ||(!isset($data['sessionId']) || $data['sessionId'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Your_email and message and Session_Id');
        } else {

            $email = ($data['email']);
            $message = ($data['message']);
            $session_id = ($data['sessionId']);


            $uData = $this->getUserData($data);
            $checkEmailQuery = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '$email'");
            $getData = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT uname,phone FROM user WHERE email = '$email'"));
            $getSData = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM sess WHERE sessionId = '$session_id'"))['sessionId'];
            if (mysqli_num_rows($checkEmailQuery) > 0) {
                $mail = new PHPMailer(true);

                // Set Email to be Sent Settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth   = false;
                $mail->Username   = 'mmoh33650@gmail.com';
                $mail->Password   = 'pdtldkhyujgosjuc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                // Set Email to be Sent Data
                $mail->setFrom($uData['from'], $getData['uname']);
                $mail->addAddress($uData['to']);
                $mail->isHTML(true);
                $mail->Subject = $uData['subject'];
                $mail->Body = $uData['body'];

                if ($mail->send()) {
                    $insertQuery = mysqli_query($this->conn, "INSERT INTO feadbacks(email, mess, sessionId) VALUES('$email', '$message', '$session_id')");
                    if ($insertQuery) {
                        echo $this->res->getResponse(1, 'Success');
                    } else {
                        echo $this->res->getResponse(0, mysqli_error($this->conn));
                    }
                } else {
                    echo $this->res->getResponse(0, 'Failed');
                }
            } else {
                echo $this->res->getResponse(0, 'Email does not exist, you can create account if you do not have one', null);
            }
        }
    }
    public function getUserData($data)
    {
        return array(
            'to' => 'mmoh33650@gmail.com',
            'subject' => 'Give Feadback',
            'body' => $data['message'],
            'from' => $data['email'],
        );
    }
}


// margin: 30px auto; text-decoration: none; color: white !important; background: #db4979; display: block; width: 150px; min-height: 22px; padding: 23px; cursor: pointer; font-size: 18px; text-align: center; border-radius: 7px;box-shadow: 3px 6.5px 29px -2.5px grey;