<?php
require_once("../db.php");
session_start();
$curr_email = $_SESSION['email'];
if(isset($_GET['name'])){
    $username = $_GET['name'];
    $sql = "SELECT email FROM markets WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $marketemail = $row['email'];
    $sql = "INSERT INTO usermarket(market,user) VALUES ('$marketemail','$curr_email')";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Liked Markets</title>
</head>
<body>
    <header>
        <a href="../homepage/homepage.php">
            <h1 class="logo">Click</h1>
        </a>
        <div class="right">
            <a href="favorite.php">Favorite Products</a>
            <a href="#">Liked Markets</a>
            <a href="purchased.php">Purchased Products</a>
            <a href="inprogress.php">In Progress Products</a>
            <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a>
            <a href="profile.php"><img src="<?php echo $_SESSION['image'] ?>" alt="profile-pic"
                class="header-profile-pic"></a>
        </div>
    </header>
    <div class="product-list">
        <div class="product-list-head">
            <h1>Liked Markets:</h1>
        </div>
        <?php
            $curr_email = $_SESSION['email'];
            $sql = "SELECT * FROM markets inner join usermarket on markets.email=usermarket.market where usermarket.user='$curr_email'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='item'><img src={$row["image"]} alt='item1'>" .
                    "<h2 class='product-title'>{$row["username"]}</h2>" .
                    "</div>";
            }
        ?>
    </div>
    
</body>
</html>