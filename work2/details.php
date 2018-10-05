<?php
header("content-type:text/html;charset=utf-8");
include_once "connect.php";
$id=$_REQUEST["id"];
//获取一整条数据，select 字段 where 获取的就是一个字段值
$sql="select * from protects where pid=$id";
$result=$conn->query($sql);
if($result->num_rows){
    $data=[];
    while($row=$result->fetch_assoc()){
        Array_push($data,[
            "pid"=>$row["pid"],
            "pname"=>$row["pname"],
            "pimg"=>$row["pimg"],
            "pchar"=>$row["pchar"]
        ]);
    }
    $data=json_encode($data,JSON_UNESCAPED_UNICODE);
    echo $data;
}
