<?php
header("content-type:text/html;charset=utf-8");
include_once "connect.php";

//获取购物车列表, 用户id
$uid=$_REQUEST["uid"];
/*$sql1="alter table uplink add constraint fk_pid foreign
key (pid) references protects(pid)";
$conn->query($sql1);*/
/*多表查询时，需给子表添加外键约束，如果表已经创建好，在软件的SQL面板中运行下方的代码
 *  alter table 子表明 add constraint fk_pid foreign
    key (pid) references protects(pid)
     //子表                 //主表
 * */
//两个表联合查询，先从主表中查，再从子表中查
$sql="select * from protects u 
  join uplink p on u.pid=p.pid where uid=$uid 
";

/*  //将表中的字段求和，对该栏赋个别名                 group by 分组
 * $sql="select pid,sum(numbers) as numbers from uplink where uid=$uid group by pid";*/
/*$sql="select pid,numbers from uplink where uid=$uid";*/
$result=$conn->query($sql);
if($result->num_rows){
//    $wrap=[];
    $data=[];
    $pid=[];
    while ($row=$result->fetch_assoc()){
        Array_push($data,[
            "pid"=>$row["pid"],
            "numbers"=>$row["numbers"],
            "pname"=>$row["pname"],
            "pimg"=>$row["pimg"],
            "pchar"=>$row["pchar"]
        ]);

    }
    $wrap["data"]=$data;
    $wrap["msg"]="查询成功";
    $wrap=json_encode($wrap,JSON_UNESCAPED_UNICODE);
    echo $wrap;
}else{
    echo "查询失败.$conn->error";
}