<?php
require_once('../db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="../styles.css">
    <script src="homepage.js"></script>
    <title>HomePage</title>
</head>

<body>
    <div class="sidebar">
        <a href="#">
            <div class="profile">
                <img src="../image/profilepic.jpg" alt="profile_picture">
                <h3></h3>
            </div>
        </a>
        <div class="search">
            <input type="text" id="search-bar" class="input" placeholder="Search..." onkeyup="searchBar()">
        </div>
        <ul>
            <li>
                <a href="defaulthome.php">
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="brands.php?status=false">
                    <span>Brands</span>
                </a>
            </li>
            <li>
                <a href="markets.php?status=false">
                    <span>Markets</span>
                </a>
            </li>
        </ul>
    </div>

    <nav class="navbar">
        <h1 class="logo" id="click-logo">Click</h1>

        <ul class="navbar-nav-right">

            <li><a href="../login/login.php"><button class="btn btn-dark-outline"><strong>Log
                            In</strong></button></a>
            <li><a href="../signup/signup.php"><button class="btn btn-dark-outline"><strong>Sign
                            Up</strong></button></a>
        </ul>
    </nav>
    <div class="main-div">
        <div class="product-list">
        <?php
        $curr_email = $_SESSION['email'];
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<a href='product.php?image={$row["image"]}&name={$row["name"]}&brand={$row["brand"]}&items={$row["items_available"]}&price={$row["price"]}'>" .
                "<div class='item'>" .
                "<img src={$row["image"]} alt='item1'>" .
                "<h2 class='product-title'>{$row["name"]}</h2>" .
                "<h3 class='Brand'>{$row["brand"]}</h3>" .
                "<span class='Availability'>{$row["items_available"]} items available</span><br>" .
                "<span class='Price'>{$row["price"]} LE</span>" .
                "</div>" .
                "</a>";
        }
        ?>
        </div>
</body>

</html>