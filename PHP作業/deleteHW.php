<?php
include "./class/databaseFinal.php";
include "./class/score.php";
$score = new Score();
$score->id = $_GET["id"];
//呼叫刪除方法
if($score->deleteHW()){
// 刪除成功導回首頁
    header("Location:FinalHOME.php");

}else{
    header("Location:FinalHOME.php");

}
