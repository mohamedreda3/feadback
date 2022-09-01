<?php

class DeleteSession
{
    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }
    public function deletesession($data)
    {

    if ((!isset($data['sessiontitle']) || $data['sessiontitle'] == '') && (!isset($data['sessionid']) || $data['sessionid'] == '')) {
            echo $this->res->getResponse(0, 'You Should Enter Session Title and its id');    
    }else{
    $sessionTitle = '';
    $sessionId = '';
    if((isset($data['sessiontitle']) && $data['sessiontitle'] != null)){
    $sessionTitle = $data['sessiontitle'];
}
if((isset($data['sessionid']) && $data['sessionid'] != null)){
    $sessionId = $data['sessionid'];
}
$checkExists = mysqli_query($this->conn, "SELECT * FROM sess WHERE sessionId = '$sessionId' OR session_title = '$sessionTitle'");
         
         if (mysqli_num_rows($checkExists) > 0) {
           $updateQuery = mysqli_query($this->conn, "DELETE FROM sess WHERE sessionId = '$sessionId' OR session_title = '$sessionTitle'");
           if ($updateQuery) {
                  echo $this->res->getResponse(1, 'Success');
              } else {
                  echo $this->res->getResponse(0, mysqli_error($this->conn));
             }
         }else{
         echo $this->res->getResponse(0, 'This session deos not exist', null);
         }
    
    }
}
}