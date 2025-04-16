<?php
session_start();
session_destroy();
$url = '../admin/index.php';
header('Location: ' . $url);

?>