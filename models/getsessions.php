<?php

class GetSessions
{

    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }

    public function getSessions(?array $data = [])
    {
        $sessions = [];
        $getQuery = mysqli_query($this->conn, "SELECT * FROM sess");
        while ($getData = mysqli_fetch_assoc($getQuery)) {
            array_push($sessions, $getData);
        }
        echo $this->res->getResponse(1, 'success', null, $sessions);
    }
}
