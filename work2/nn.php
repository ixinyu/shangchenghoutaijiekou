<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/5
 * Time: 15:56
 *
*/
//后台系统获取数据库商品信息数据
header('Content-Type:application/json');
include_once "conn.php";
$sql = "select * from good_list";
$result = $conn->query($sql);
if($result->num_rows>0){
    $tmp = [];
    $data = [];
    while($row=$result->fetch_assoc()){
        Array_push($data,["gid" => $row["gid"],"gname" => $row
        ["gname"],"gprice" => $row["gprice"],"gimg" => $row["gimg"],"gdesc" => $row["gdesc"]]);
    }
    $tmp["data"] = $data;
    $tmp["msg"] = "查询成功";
    $tmp = json_encode($tmp);
    echo $tmp;
}else{
    $tmp["msg"] = "查询失败";
    $tmp = json_encode($tmp);
    echo $tmp;
}