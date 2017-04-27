<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './api/ApiManager.php';
        $apiManager = new ApiManager();
        $apiManager->getAllData();
//        $json_encode = json_encode($api->getAllMobiles());
//        echo $json_encode;
        ?>
    </body>
</html>
