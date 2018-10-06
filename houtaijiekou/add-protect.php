<?php

header("content-type:text/html;charset=utf-8");
include_once "connect.php";

//添加商品，用户id，商品id，商品数量

$uid=$_REQUEST["uid"];
$pid=$_REQUEST["pid"];
$numbers=$_REQUEST["numbers"];

$data1=["code"=>"1","msg"=>"加入成功"];
$data1=json_encode($data1,JSON_UNESCAPED_UNICODE);
$data2=["code"=>"0","msg"=>"加入失败".$conn->error];
$data2=json_encode($data2,JSON_UNESCAPED_UNICODE);
//先判断数据库中是否有这条数据
$sql1="select * from uplink where uid=$uid and pid=$pid";
$result=$conn->query($sql1);
//如果有这条数据，只需修改数据值，无，则新插入进去
if($result->num_rows){
    $sql3="select numbers from uplink where uid=$uid and pid=$pid";
    $res=$conn->query($sql3);
    while ($row1=$res->fetch_assoc()){
        $resnum=$row1["numbers"];
    }
    $numbers=$numbers+$resnum;
    $sql2="update uplink set numbers=$numbers where uid=$uid and pid=$pid";
    if ($conn->query($sql2)){
        echo $data1;
    }else{
        echo $data2;
    }
}else{
    $sq="alter table users auto_increment=0";
    $conn->query($sq);
 //字段值用 , 分开，再错锤死你
    $sql="insert into uplink (uid,pid,numbers) values
    ('$uid','$pid','$numbers')";
    if($conn->query($sql)){
        echo $data1;
    }else{
        echo $data2;
    }
}