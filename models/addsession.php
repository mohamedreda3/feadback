<?php

class AddSession
{
    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }
    public function addsession($data)
    {
    if ((!isset($data['sessiontitle']) || $data['sessiontitle'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Session Title');
    
    }else if ((!isset($data['instructorname']) || $data['instructorname'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Instructor Name');
    
    }else{
    $sessionTitle = $data['sessiontitle'];
     $instructorName = $data['instructorname'];
         $checkExists = mysqli_query($this->conn, "SELECT * FROM sess WHERE session_title = '$sessionTitle'");
         
         if (mysqli_num_rows($checkExists) > 0) {
         echo $this->res->getResponse(0, 'This session exists', null);
         }else{
           $insertQuery = mysqli_query($this->conn, "INSERT INTO sess(session_title, instructor_name) VALUES('$sessionTitle', '$instructorName')");
           if ($insertQuery) {
                  echo $this->res->getResponse(1, 'Success');
              } else {
                  echo $this->res->getResponse(0, mysqli_error($this->conn));
             }
         }
    
    }
}
}