<?php
@session_start();
session_destroy();
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../telas/home.php'>";
?>