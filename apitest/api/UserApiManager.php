<?php

include_once '..\connection\DbManager.php';
include_once '..\sqlinjecter\SqlInjecter.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiManager
 *
 * @author muhammed
 */
class UserApiManager {

    private $initConnection;

//put your code here
    function __construct() {
        $dbManager = new DbManager();
        $this->initConnection = $dbManager->initConnection();
    }

    /**
     * 
     * @param type $condition
     */
    public function getAllData($condition) {
        try {
            $sqlInjecter = new SqlInjecter();
            $result = $this->initConnection->query($sqlInjecter->injectSql($condition));
            if ($result->num_rows > 0) {
                $rows = array();
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                echo json_encode(['reslut' => "succes", 'count' => $result->num_rows, "message" => "updated list", 'users' => $rows]);
            } else {
                echo json_encode(['reslut' => "succes", 'count' => "0", 'message' => "No results found", 'users' => array()]);
            }
        } catch (Exception $e) {
            echo json_encode(['reslut' => "failed", 'count' => "0", 'message' => "Servere error", 'users' => array()]);
        }
    }

    /**
     * 
     * @param type $username
     * @param type $password
     */
    public function login($username, $password) {
        try {
            $sql = "SELECT usertype FROM user_login_table WHERE username='" . $username . "' AND password ='" . $password . "'";
            $result = $this->initConnection->query($sql);
            if ($result->num_rows > 0) {
                $usertype = $result->fetch_row();
                if ($usertype[0] === 'u') {
                    $data = array('reslut' => "succes", 'usertype' => $usertype[0], "message" => "User exist");
                    echo json_encode($data);
                } elseif ($usertype[0] === 'a') {
                    $data = array('reslut' => "succes", 'usertype' => $usertype[0], "message" => "User exist");
                    echo json_encode($data);
                } else {
                    $this->reslutError();
                }
            } else {
                $this->reslutError();
            }
        } catch (Exception $e) {
            $data = array('reslut' => "failed", 'usertype' => "unknown", "message" => "Server error");
            echo json_encode($data);
        }
    }

    /**
     * 
     * @param type $username
     * @param type $password
     * @param type $name
     * @param type $email
     * @param type $phone
     * @param type $address
     * @param type $img_url
     */
    public function register($username, $password, $name, $email, $phone, $address, $img_url) {
        try {
            $sql = "INSERT INTO user_login_table (username, password, usertype)
VALUES ('" . $username . "', '" . $password . "', 'u')";

            if ($this->initConnection->query($sql) === TRUE) {
                $queryinsertDetails = "INSERT INTO user_details_table (username, name, email, phone, address, image_url)
VALUES ('" . $username . "', '" . $name . "', '" . $email . "','" . $phone . "','" . $address . "','" . $img_url . "')";
                if ($this->initConnection->query($queryinsertDetails) === TRUE) {
                    $usersdetails = ['username' => $username, 'name' => $name,
                        'email' => $email, 'phone' => $phone,
                        'address' => $address, 'img_url' => $img_url];
                    $data = array('reslut' => "succes", 'usertype' => "u", "message" => "Successfully registered", 'users' => $usersdetails);
                    echo json_encode($data);
                }
            } else {
                $success = ['reslut' => "failed", 'usertype' => "unknown", "message" => "Username already exist"];
                echo json_encode($success);
            }
        } catch (Exception $e) {
            $success = ['reslut' => "failed", 'usertype' => "unknown", "message" => "Failed to register"];
            echo json_encode($success);
        }
    }

    /**
     * 
     */
    public function reslutError() {
        $data = array('reslut' => "error", "message" => "User not exist");
        echo json_encode($data);
    }

}
