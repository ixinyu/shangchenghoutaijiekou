<?php
header("content-type:text/html;charset=utf-8");
include_once "connect.php";
/*$olink="alter table protects add constraint fk_sid foreign key
(uid) references users(uid)";*/
$sql ="select * from protects";
$result=$conn->query($sql);
if($result->num_rows){
    $prot=[];
    $data=[];  //不用多个数组嵌套只能获取到一组数组
    while ($row=$result->fetch_assoc()){
        //将数据库中的数据添加到data数组中
        Array_push($data,[
            "pid"=>$row["pid"],
            "pname"=>$row["pname"],
            "pimg"=>$row["pimg"],
            "pchar"=>$row["pchar"]
        ]);
    }
    //循环完之后，再将data添加到最外层prot数组中
    $prot["msg"]="查询成功";
    $prot["data"]=$data;

  echo json_encode($prot,JSON_UNESCAPED_UNICODE);
}