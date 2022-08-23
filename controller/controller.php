<?php


class Controller
{
    private $conn;
    private $res;
    private $loggedin;
    public function __construct(ConnectToDb $DB)
    {
        $this->conn = $DB->connection();
        $this->res = new Response;
    }

    public function processRequest(?string $request, ?array $data = [], ?string $token = '')
    {
        if ($request == 'logout') {
            
                $logOut = new Logout();
                $logOut->destroy_all();
                echo $this->res->getResponse(1, 'success');
          
        } elseif ($request == 'signup') {
           
                $signup = new Signup($this->conn);
                $signup->sendData($data);
           
        } elseif ($request == 'login') {
            
                $login = new Login($this->conn);
                $login->sendData($data);
           
        } elseif ($request == 'sendfeadback') {
            
                $SendFeadback = new SendFeadback($this->conn);
                $SendFeadback->sendEmail($data);
         
        } elseif ($request == 'getusers') {
           
                $getUsers = new GetUsers($this->conn);
                $getUsers->getUsers();
           
        } elseif ($request == 'getsessions') {
          
                $getSessions = new GetSessions($this->conn);
                $getSessions->getSessions();
           
        } elseif ($request == 'getfeadbacks') {
           
                $getSessions = new Getfeadcacks($this->conn);
                $getSessions->getfeadcacks();
           
        } elseif ($request == 'sendfeadbacks') {
           
                $SendFeadback = new SendFeadbacks($this->conn);
                $SendFeadback->sendFeadback($data);
           
        }
        //sendfeadbacks
    }
}
