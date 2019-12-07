<?php

$update = $pdo->prepare("UPDATE gs_bm_table SET name=:name, title=:title, comment=:comment WHERE id=:id");

$update ->bindValue(':name',    $name,    PDO::PARAM_STR);
$update ->bindValue(':title',   $title,   PDO::PARAM_STR);
$update ->bindValue(':comment', $comment, PDO::PARAM_STR);
$update ->bindValue(':id',      $id,      PDO::PARAM_INT);

$status = $upate->execute();

header("Location: select.php");

?>