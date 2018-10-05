<?php
header("content-type:text/html;charset=utf-8");
//连接数据库和表
$conn=new mysqli("localhost","root","","work2");
//判断是否连接成功
if($conn->connect_error){
    die("连接失败".$conn->connect_error);
}