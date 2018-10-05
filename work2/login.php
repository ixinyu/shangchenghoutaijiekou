<?php
header("content-type:text/html;charset=utf-8");
include_once "connect.php";
$usename=$_REQUEST["usename"];
$sql="select usename from users where usename=$usename";
$result=$conn->query($sql);
$sql1="select id from users where usename=$usename";
$result1=$conn->query($sql1);
if($result->num_rows>0){
    while ($row=$result1->fetch_assoc()) {
        $oid = $row["id"];
    }

   $data=array("code"=>"1",
        "msg"=>"ok",
        "data"=>array("token"=>"$oid")
    );
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}else{
    echo "0";  //登录失败，先注册再登录
}

