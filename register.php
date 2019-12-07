<?php
session_start();
// 即にログインしている場合にはメインページに遷移  
if(isset($_SESSION['USERID'])){
   header('Location: index.php');
   exit;
}
$db['host']='localhost';
$db['user']='root';
$db['pass']='root';
$db['dbname']='pkadai_db';
$error='';

// ログインボタンが押されたら

if(isset($_POST['signUp'])){
if(empty($_POST['username'])){
$error = 'ユーザーID未入力です';
}else if (empty($_POST['password'])){
$error = 'パスワードが未入力です';
}
if(!empty($_POST['username']) && !empty($_POST['password'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
   $dsn = sprintf('mysql: host = localhost; dbname=pkadai_db; charset=utf8', $db['host'], $db['dbname']);
   $pdo = new PDO ($dsn, $db['user'], $db['pass'], array(PDO::ATTER_ERRMODE=>PDO::ERRORMODE_EXCEPTION));
   // 下のtryの中から引数を渡してIDの重複とパスワードの桁数をチェック。エラーの場合にはthrow new Exception()で例外が出たことを投げ、エラー文をあとのcatchで表示。
   function check($id, $count){
      if($count > 0){
         throw new Exception('そのユーザーIDは即に登録されています');
      }
      if($count > 8){
         throw new Exception('パスワードは8桁以上で入力してください');
      }
      }
      try{
      $sqlname = "SELECT COUNT(*) FROM user WHERE `name` = '$username'" ;
      $ss = $pdo->query($sqlname);
      $count = $ss->fetchColum();

      $id = strlen($_POST['password']);
      cheak($id,$count);

      // 実行はパラメータに値が入るまで待機

      $stmt = $pdo->parepare('INSERT INTO `user`(`name`,`password`)VALUES (:username, :password');
      $pass = password_hash($password, PASSWORD_DEFAULT);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();

      $_SESSION['USERID'] = $username;
      echo '<script>
      alert("登録が完了しました");
      location href="index.php;
      </script>';
      } catch(Exception $e){
         $error = $e -> getMessage();   
   }
   }
   }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>新規登録</title>
   <style>
   
   </style>
</head>
<body>
   <main>
   <form id = "loginForm" name="loginForm" action="" method="POST">
   <p style="color:red;"><?php echo $error ?></p>
   <label for="username">ユーザーID<br>
   <input type ="text" id="username" name="username" value="" placehoder="ユーザー名を入力してください" value="<?php  if(!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
   </label></br>
   <label for="password">パスワード<br>
   <input type ="password" id="password" name="password" value="" placehoder="パスワードを入力してください">
   </label>  
   </main>
   <input type="submit" id="signUp" name="signUp" value="新規登録" class="btn up">
   </form>
</body>
</html>

