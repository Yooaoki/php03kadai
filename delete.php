<?php
//1. POSTデータ取得 insert.phpからコピーしてきた
$id = $_GET["id"]; //POSTではなくGET

//2. DB接続します
//*** function化する！  *****************
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql="DELETE FROM gs_bm_table WHERE id=:id"; //デリートの時はこれ、変数を直接書くのはNG

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行してstatusで

//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
   sql_error($stmt);
}else{
    //*** function化する！*****************
   redirect("select.php");
}
?>
