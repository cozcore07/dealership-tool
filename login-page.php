<?php session_start(); include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dealer Login</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <form method="POST">
    <h2>Dealer Login</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login">Login</button>
  </form>

  <?php
  if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);
    $q = $conn->query("SELECT * FROM dealers WHERE username='$u' AND password='$p'");
    if ($q->num_rows > 0) {
      $_SESSION['dealer'] = $q->fetch_assoc();
      header("Location: dashboard.php");
    } else {
      echo "<p>Invalid login</p>";
    }
  }
  ?>
</body>
</html>
