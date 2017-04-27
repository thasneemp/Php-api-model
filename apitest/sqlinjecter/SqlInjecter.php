<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SqlInjecter
 *
 * @author muhammed
 */
class SqlInjecter {

    /**
     * 
     * @param type $condition
     * @return type
     */
    function injectSql($condition) {
        $sql = "SELECT * FROM user_details_table ";
//        if (isset($condition)) {
//            $json_result = json_decode($condition, true);
//            if (isset($json_result['and'])) {
//                $andCondition = $json_result['and'];
//                if (count($andCondition) > 0) {
//                    $sql .= " WHERE ";
//                    for ($x = 0; $x < count($andCondition); $x++) {
//                        foreach ($andCondition[$x] as $key => $value) {
//                            $sql .= ($x > 0 ? " AND " : "") . $key . "='" . $value . "' ";
//                        }
//                        $sql .= (count($andCondition) > $x ?  " AND " : " ");
//                    }
//                }
//            }
//
//            if (isset($json_result['or'])) {
//                $orCondition = $json_result['or'];
//                if (isset($json_result['and'])) {
//                    $andCondition = $json_result['and'];
//                    if (!(count($andCondition) > 0)) {
//                        $sql .= " WHERE ";
//                    } else {
//                        $sql .= "(";
//                    }
//                } else {
//                    $sql .= " WHERE ";
//                }
//
//                for ($x = 0; $x < count($orCondition); $x++) {
//                    foreach ($orCondition[$x] as $key => $value) {
//                        $sql .= ($x > 0 ? " OR " : "") . $key . "='" . $value . "' ";
//                    }
//                }
//                $sql .= ")";
//            }
//            if (isset($json_result['limit']) && isset($json_result['offset'])) {
//                $sql .= ($json_result['limit'] === 0 ? "" : " LIMIT " . $json_result['limit'] . " OFFSET " . $json_result['index']);
//            }
//        }
        echo '' . $sql;
        return $sql;
    }

}
