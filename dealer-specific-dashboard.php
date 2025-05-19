<?php include 'session.php'; include 'db.php'; include 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $dealer['dealer_name'] ?> Dashboard</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h2>Welcome, <?= $dealer['dealer_name'] ?></h2>
  <form method="POST">
    <input type="number" name="sale_price" placeholder="Sale Price" required>
    <input type="number" name="cost_price" placeholder="Cost Price" required>
    <input type="text" name="salesperson" placeholder="Salesperson" required>
    <button type="submit" name="submit">Add Deal</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $sale = $_POST['sale_price'];
    $cost = $_POST['cost_price'];
    $sp   = $_POST['salesperson'];
    $did  = $dealer['id'];
    $conn->query("INSERT INTO deals (dealer_id, sale_price, cost_price, salesperson) VALUES ($did, $sale, $cost, '$sp')");
  }

  $res = $conn->query("SELECT * FROM deals WHERE dealer_id = " . $dealer['id']);
  $deals = $res->fetch_all(MYSQLI_ASSOC);
  echo "<h3>Total Deals: " . count($deals) . "</h3>";

  $summary = calculate_summary($deals);
  echo "<p>Monthly Pace: {$summary['monthly_pace']}</p>";
  echo "<p>Deal Average: {$summary['deal_average']}</p>";
  echo "<p>Gross Profit: {$summary['total_gross']}</p>";
  ?>
</body>
</html>
