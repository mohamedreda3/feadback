<?php

class Getfeadcacks
{

    private $conn;
    private $res;
    public function __construct($connection)
    {
        $this->conn = $connection;
        $this->res = new Response;
    }

    public function getfeadcacks(?array $data = [])
    {
        $feadcacks = [];
        $getQuery = mysqli_query($this->conn, "SELECT * FROM feadbacks JOIN sess WHERE feadbacks.sessionId = sess.sessionId");
        while ($getData = mysqli_fetch_assoc($getQuery)) {

            array_push($feadcacks, $getData);
        }
        echo $this->res->getResponse(1, 'success', null, $feadcacks);
    }
}
