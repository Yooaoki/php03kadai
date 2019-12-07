<?php
//必ずsession_startは最初に記述
session_start();

//現在のセッションIDを取得
$old_sessionid = session_id();
// 中身はクッキーの記号

//新しいセッションIDを発行（前のSESSION IDは無効）
session_regenerate_id(true);
// trueを入れることでキーを上書きしてくれてたくさんたまらずに済む

//新しいセッションIDを取得
$new_sessionid = session_id();

//旧セッションIDと新セッションIDを表示
echo "古いセッション: $old_sessionid<br />";
echo "新しいセッション: $new_sessionid<br />";


?>
