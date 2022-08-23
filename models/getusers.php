<?php

class GetUsers
{

    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }

    public function getUsers(?array $data = [])
    {
        $users = [];
        $getQuery = mysqli_query($this->conn, "SELECT email,uname,phone FROM user");
        while ($getData = mysqli_fetch_assoc($getQuery)) {
            array_push($users, $getData);
        }
        echo $this->res->getResponse(1, 'success', null, $users);
    }
}
