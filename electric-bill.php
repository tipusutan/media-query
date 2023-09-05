<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $units = $_POST["units"];
    
    // Define the rates for different slabs
    $ratePerUnitSlab1 = 7.5;
    $ratePerUnitSlab2 = 9.5;
    $ratePerUnitSlab3 = 11.5;
    
    $totalBill = 0;
    
    if ($units <= 50) {
        $totalBill = $units * $ratePerUnitSlab1;
    } elseif ($units <= 150) {
        $totalBill = 50 * $ratePerUnitSlab1 + ($units - 50) * $ratePerUnitSlab2;
    } else {
        $totalBill = 50 * $ratePerUnitSlab1 + 100 * $ratePerUnitSlab2 + ($units - 150) * $ratePerUnitSlab3;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
</head>
<body>
    <h2>Electricity Bill Calculator</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Enter Consumed Units: <input type="number" name="units" required>
        <button type="submit">Calculate</button>
    </form>
    
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Bill Details:</h3>
        <p>Consumed Units: <?php echo $units; ?></p>
        <p>Total Bill: <?php echo $totalBill; ?></p>
    <?php endif; ?>
</body>
</html>






