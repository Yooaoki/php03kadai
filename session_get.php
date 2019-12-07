<?php
session_start();

echo session_id();

?>

<br>

<?php
echo $_SESSION['name'];

?>

<br>

<?php
echo $_SESSION['value'];

?>

