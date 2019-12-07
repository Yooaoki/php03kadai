<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>データ登録</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<nav class="navbar navbar-default">
   <div class="container-fluid">
   <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
   </div>
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
<div class="jumbotron">
<fieldset>
   <legend>読書メモ</legend>
   <label>アカウント名：<input type="text" name="name"></label><br>
   <label>タイトル：<input type="text" name="title"></label><br>
   <label>読書日：<input type="text" name="date"></label><br>
   <label><textArea name="comment" rows="4" cols="40"></textArea></label><br>
   <input type="submit" value="送信">
   </fieldset>
</div>
</form>
<!-- Main[End] -->


</body>
</html>
