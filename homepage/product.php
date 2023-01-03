<?php
require_once("../db.php");
session_start();
$image = $_GET["image"];
$name = $_GET["name"];
$brand = $_GET["brand"];
$items = $_GET["items"];
$price = $_GET["price"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Product</title>
</head>

<body>
    <nav class="navbar">

        <h1 class="logo" id="click-logo"><a href="homepage.php" style="color: black;">Click</a></h1>

    </nav>
    <div class="item product"><img src="<?php echo $image ?>" alt="item1">
        <h2 class="product-title"><?php echo $name ?></h2>
        <h3 class="Brand"><?php echo $brand ?></h3>
        <span class="Availability"><?php echo $items ?> Available</span><br>
        <span class="Price"><?php echo $price ?>LE</span>
        <br>
        <br>
        <?php
    $curr_email = $_SESSION['email'];
    $sql = "SELECT * FROM userproduct WHERE user='$curr_email' and product='$name'";
    $result = mysqli_query($conn, $sql);
    $isPresent = false;
    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
        $isPresent = true;
    }
    if (array_key_exists('buy', $_POST)) {
        if($isPresent)
            $sql = "UPDATE userproduct SET user='$curr_email', product='$name', type='inprocess' WHERE user='$curr_email' and product='$name'";
        else
            $sql = "INSERT INTO userproduct(user,product,type) VALUES ('$curr_email','$name','inprocess')";
        $result = mysqli_query($conn, $sql);
        header('Location:../profile/inprogress.php');
    } else if (array_key_exists('cart', $_POST)) {
        if($isPresent)
            $sql = "UPDATE userproduct SET user='$curr_email', product='$name', type='cart' WHERE user='$curr_email' and product='$name'";
        else
            $sql = "INSERT INTO userproduct(user,product,type) VALUES ('$curr_email','$name','cart')";
        $result = mysqli_query($conn, $sql);
        header('Location:../profile/cart.php');
    } else if (array_key_exists('fav', $_POST)) {
        if($isPresent)
            $sql = "UPDATE userproduct SET user='$curr_email', product='$name', type='favorite' WHERE user='$curr_email' and product='$name'";
        else
            $sql = "INSERT INTO userproduct(user,product,type) VALUES ('$curr_email','$name','favorite')";
        $result = mysqli_query($conn, $sql);
        header('Location:../profile/favorite.php');
    }
    if(!isset($_GET['status'])){
            echo "<form method='post'><button type='submit' name='buy'>Buy now</button></form>" .
                "<br>" .
                "<br>" .
                "<form action='' method='post'><button type='submit' name='cart'>Add to cart</button></form>" .
                "<br>" .
                "<br>" .
                "<form action='' method='post'><button type='submit' name='fav'>Add to favorites</button></form>";
    }
    ?>
    </div>
</body>

</html>