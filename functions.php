<php
function calculate_summary($deals) {
  $count = count($deals);
  $total_sale = 0;
  $total_cost = 0;

  foreach ($deals as $deal) {
    $total_sale += $deal['sale_price'];
    $total_cost += $deal['cost_price'];
  }

  return [
    'monthly_pace' => $count * 30, // Simplified pace logic
    'deal_average' => $count ? round($total_sale / $count, 2) : 0,
    'total_gross'  => $total_sale - $total_cost
  ];
}
?>
