<?php
//收藏操作  判断是否登录
if(!isset($_COOKIE["user_id"]) ||$_COOKIE["user_id"]<=0){
    $arr =array("status"=>1,"msg"=>"请登录");
    echo json_encode($arr);
    exit();
}
$uid = isset($_GET["uid"])?$_GET["uid"]:"";
$iid = isset($_GET["iid"])?$_GET["iid"]:"";
//删除
$con = mysqli_connect("localhost", "root", "111444le", "huaban");
if(!$con){
    echo "连接失败！！";die();
}
mysqli_set_charset($con, "utf8");
$sql = "delete  from collection where uid='{$uid}' and iid='{$iid}'";
$result= mysqli_query($con, $sql);

if($result){
    $arr =array("status"=>0,"msg"=>"删除成功！");
    echo json_encode($arr);
    exit();
}
else{
    $arr =array("status"=>2,"msg"=>"删除失败！");
    echo json_encode($arr);
    exit();
}