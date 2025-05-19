<?php
session_start();
if (!isset($_SESSION['dealer'])) {
  header("Location: index.php");
  exit;
}
$dealer = $_SESSION['dealer'];
?>
