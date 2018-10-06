<?php
header("content-type:text/html;charset=utf-8");
include_once "connect.php";

//修改购物车， 用户id，商品id，修改的商品数目(>0 增加,<0 减少, =0 删除)
$uid=$_REQUEST["uid"];
$pid=$_REQUEST["pid"];
$nums=$_REQUEST["nums"];

$sql="select * from uplink where uid=$uid and pid=$pid";
$result=$conn->query($sql);
if($result->num_rows){
    $sql1="select numbers from uplink where uid=$uid and pid=$pid";
    if($nums>0){
        $res1=$conn->query($sql1);
            while ($row1=$res1->fetch_assoc()){
                $resnum1=$row1["numbers"];
            }
        $resnum1=$resnum1+$nums;
        $sql2="update uplink set numbers=$resnum1 where uid=$uid and pid=$pid";
        if($conn->query($sql2)){
            $data=["code"=>"1","msg"=>"修改成功 + "];
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }else{
            $data=["code"=>"0","msg"=>"修改失败.$conn->error"];
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }

    }else if($nums<0){
        $res1=$conn->query($sql1);
        while ($row1=$res1->fetch_assoc()){
            $resnum1=$row1["numbers"];
        }
        $resnum1=$resnum1+$nums;
        $sql2="update uplink set numbers=$resnum1 where uid=$uid and pid=$pid";
        if($conn->query($sql2)){
            $data=["code"=>"1","msg"=>"修改成功 - "];
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }

    }else if($nums==0){
        //等于0 ，直接删除该数据
        $sql3="delete from uplink where uid=$uid and pid=$pid";
        if($conn->query($sql3)){
            $data=["code"=>"1","msg"=>"修改成功,该条数据已删除"];
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }

    }

}else{
    echo "购物车还没有该商品哦";
}
