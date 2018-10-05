<?php
header("content-type:text/html;charset=utf-8");
//连接数据库
include_once "connect.php";
//接收数据
$usename=$_REQUEST["usename"];
$pwd=$_REQUEST["password"];

//先判断数据库中是否有相同的数据，如果有则插入失败，无则插入成功
$sq="select usename from users where usename=$usename";
$result=$conn->query($sq);
if ($result->num_rows>0){
    $data=array('msg'=>'注册失败','code'=>'0');
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}else{
    //插入数据库中的表
   $sq="alter table users auto_increment=1";
    $conn->query($sq);
    $sql="insert into users (usename,pwd) values
   ('$usename','$pwd')";
//执行,返回数据
    $conn->query($sql);
    $data=array('msg'=>'注册成功','code'=>'1');
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}




