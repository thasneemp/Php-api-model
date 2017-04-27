<?php

include '.\UserApiManager.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Api
 *
 * @author muhammed
 */
$view;
header("Content-Type:application/json");
$authkey = "oi22x9y8ZahVkUbkE4kOnIFzflMu8Z7K";
if (NULL != (filter_input(INPUT_GET, "method"))) {
    $view = filter_input(INPUT_GET, "method");
    $apiManager = new UserApiManager();


    if (in_array($authkey, getallheaders())) {
        switch ($view) {
            case "userlist":
                // to handle REST Url /mobile/list/
                $condition = filter_input(INPUT_GET, "condition");
                $apiManager->getAllData($condition);
                break;

            case "login":
                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");

                $apiManager->login($username, $password);
                break;

            case "register":


                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");
                $name = filter_input(INPUT_POST, "name");
                $email = filter_input(INPUT_POST, "email");
                $phone = filter_input(INPUT_POST, "phone");
                $img_url = filter_input(INPUT_POST, "img_url");
                $adsress = filter_input(INPUT_POST, "address");

                $apiManager->register($username, $password, $name, $email, $phone, $adsress, $img_url);
                break;
            case "" :
                //404 - not found;
                break;
        }
    } else {
        $data = ['reslut' => "failed", "message" => "Unauthorized access"];
        echo json_encode($data);
    }
} else {
    $data = ['reslut' => "failed", "message" => "Unauthorized access"];
    echo json_encode($data);
}

