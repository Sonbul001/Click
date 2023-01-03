<?php
require_once("../db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "profile.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Favorite</title>
</head>
<body>
    <header>
        <a href="../homepage/homepage.php">
            <h1 class="logo">Click</h1>
        </a>
        <div class="right">
            <a href="favorite.php">Favorite Products</a>
            <a href="markets.php">Liked Markets</a>
            <a href="#">Purchased Products</a>
            <a href="inprogress.php">In Progress Products</a>
            <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a>
            <a href="profile.php"><img src="<?php echo $_SESSION['image'] ?>" alt="profile-pic"
                class="header-profile-pic"></a>
        </div>
    </header>
    <div class="product-list">
        <div class="product-list-head">
            <h1>Purchased Products:</h1>
        </div>
        <?php
        $curr_email = $_SESSION['email'];
        $sql = "SELECT * FROM products inner join userproduct on products.name=userproduct.product where userproduct.user='$curr_email' and userproduct.type='purchased'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            echo "<a href='../homepage/product.php?image={$row["image"]}&name={$row["name"]}&brand={$row["brand"]}&items={$row["items_available"]}&price={$row["price"]}'>" .
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