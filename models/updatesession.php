<?php

class UpdateSession
{
    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }
    public function updatesession($data)
    {
    if ((!isset($data['sessiontitle']) || $data['sessiontitle'] == '') || (!isset($data['sessionid']) || $data['sessionid'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Session Title and its id');
    
    } else if ((!isset($data['instructorname']) || $data['instructorname'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Instructor Name');
    
    }else{
    $sessionTitle = $data['sessiontitle'];
    $sessionId = $data['sessionid'];
    $instructorName = $data['instructorname'];
         $checkExists = mysqli_query($this->conn, "SELECT * FROM sess WHERE sessionId = '$sessionId'");
         $checkTitleExists = mysqli_query($this->conn, "SELECT * FROM sess WHERE session_title = '$sessionTitle' AND sessionId <> '$sessionId'");
         
         if (mysqli_num_rows($checkExists) > 0) {
         if (!(mysqli_num_rows($checkTitleExists) > 0)) {
         $updateQuery = mysqli_query($this->conn, "UPDATE sess SET session_title = '$sessionTitle', instructor_name = '$instructorName' WHERE sessionId = '$sessionId'");
           if ($updateQuery) {
                  echo $this->res->getResponse(1, 'Success');
              } else {
                  echo $this->res->getResponse(0, mysqli_error($this->conn));
             }
             }else{
         echo $this->res->getResponse(0, 'This title is exist choose another title', null);
         }
         }else{
         echo $this->res->getResponse(0, 'This session deos not exist', null);
         }
    
    }
}
}