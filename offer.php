<?php
// Include database connection
include('./includes/connect.php');

// Fetch updated offer data from the database
$query = "SELECT p.product_id, p.product_title, p.product_price, o.offer_price, o.offer_start_date, o.offer_end_date
          FROM products p
          LEFT JOIN offer_prices o ON p.product_id = o.product_id";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Offers</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #b3b3b3 ;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product Offers</h2>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Offer Price</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the fetched data and display in table rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['product_title'] . "</td>";
                    echo "<td>৳" . $row['product_price'] . "</td>";
                    echo "<td>৳" . ($row['offer_price'] ?? 'No Offer') . "</td>"; // Display offer price or 'No Offer'
                    echo "<td>" . ($row['offer_start_date'] ?? '-') . "</td>"; // Display start date or '-'
                    echo "<td>" . ($row['offer_end_date'] ?? '-') . "</td>"; // Display end date or '-'
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="index.php" style="text-decoration: none; padding: 12px 24px; background-color: #007bff; color: #fff; border-radius: 4px; font-size: 14px;">Go Back</a>
        </div>
    </div>

</body>
</html>

<?php
// Close database connection
mysqli_close($con);
?>
