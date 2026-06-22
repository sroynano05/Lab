<?php
include 'db.php';

$result_data = "";

if (isset($_GET['coupon'])) {

    $coupon = $_GET['coupon'];

    $query = "SELECT * FROM coupons WHERE code = '$coupon'";

    try {

        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                $result_data .= "<p>Coupon: " . htmlspecialchars($row['code']) . "</p>";
                $result_data .= "<p>Reward: " . htmlspecialchars($row['discount']) . "</p><hr>";
            }

        } else {

            $result_data = "<p>No coupon found.</p>";
        }

    } catch (Exception $e) {

        $result_data = "<p>Invalid coupon query.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PixelKart Coupons</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🎮 PixelKart Coupon Checker</h1>

<form method="GET">
    <input type="text" name="coupon" placeholder="Enter coupon code">
    <button type="submit">Check</button>
</form>

<div>
    <?= $result_data ?>
</div>

</body>
</html>