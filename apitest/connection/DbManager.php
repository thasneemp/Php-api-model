<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbManager
 *
 * @author muhammed
 */
class DbManager {
    private $servername = "localhost";
    private $username="root";
    private  $password = "";
    //put your code here
    public function initConnection() {
        $conn = new mysqli($this->servername, $this->username, $this->password);
        if($conn->connect_error){
//            $onSuccesMade->onConnectionFailed(); 
            die("Connection failed".$conn->connect_error);
        } else {
            $conn->select_db('fashiondkart');
        }
        return $conn;
    }
}
