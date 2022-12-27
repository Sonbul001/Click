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
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script type="text/javascript" src="cart.js"></script>
    <title>Cart</title>
</head>

<body>
    <header>
        <a href="../homepage/homepage.php">
            <h1 class="logo">Click</h1>
        </a>
        <div class="right">
            <a href="favorite.php">Favorite Products</a>
            <a href="markets.php">Liked Markets</a>
            <a href="purchased.php">Purchased Products</a>
            <a href="inprogress.php">In Progress Products</a>
            <a href="#"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a>
            <a href="profile.php"><img src="<?php echo $_SESSION['image'] ?>" alt="profile-pic"
                    class="header-profile-pic"></a>
        </div>
    </header>
    <div class="container">
        <div class="products" id="prdct">
        <?php
        $curr_email = $_SESSION['email'];
        $sql = "SELECT * FROM products inner join userproduct on products.name=userproduct.product where userproduct.user='$curr_email' and userproduct.type='cart'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='item'><img src={$row["image"]} alt='item1'>" .
                "<div class='item-text'>" .
                "<h2 class='product-title'>{$row["name"]}</h2>" .
                "<span class='Price'>{$row["price"]} LE</span>" .
                "</div>" .
                "</div>";
        }
        if (array_key_exists('buy', $_POST)) {
            $curr_email = $_SESSION['email'];
            $sql = "UPDATE userproduct SET type='inprocess' WHERE user='$curr_email' and type='cart'";
            $result = mysqli_query($conn, $sql);
            header('Location:inprogress.php');
        }
        ?>
        </div>
        <div class="order">
            <div>
                <h3>Order Total:</h3>
                <h4 id="total"></h4>
                <form method="post"><button type="submit" class="buy" name="buy">Buy Now</button></form>
            </div>
        </div>
</body>

</html>