<?php

class ConnectToDb
{
    public function connection()
    {
       return mysqli_connect('fdb33.awardspace.net', '4148415_reg', 'mohamedreda012', '4148415_reg');
    }
}
