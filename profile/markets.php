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
            $sql = "SELECT * FROM markets inner join usermarket on markets.username=usermarket.market where usermarket.user='$curr_email'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='item'><img src={$row["image"]} alt='item1'>" .
                    "<h2 class='product-title'>{$row["username"]}</h2>" .
                    "</div>";
            }
        ?>
        <!-- <div class="item"><img src="https://img.freepik.com/free-icon/intel_318-674238.jpg?w=2000"
                alt="item1">
            <h2 class="product-title">Intel</h2>
        </div>
        <div class="item"><img src="https://www.amd.com/system/files/2020-06/amd-default-social-image-1200x628.jpg"
                alt="item1">
            <h2 class="product-title">AMD</h2>
        </div>
        <div class="item"><img src="https://dlcdnimgs.asus.com/websites/global/Sno/79183.jpg"
                alt="item1">
            <h2 class="product-title">Asus</h2>
        </div>
        <div class="item"><img src="https://logoeps.com/wp-content/uploads/2011/08/acer-logo-vector-01.png"
                alt="item1">
            <h2 class="product-title">Acer</h2>
        </div>
        <div class="item"><img src="https://i.pinimg.com/originals/4b/60/68/4b6068930b33de4d477f77718ec21c4d.jpg"
                alt="item1">
            <h2 class="product-title">Toshiba</h2>
        </div>
        <div class="item"><img src="https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png"
                alt="item1">
            <h2 class="product-title">Apple</h2>
        </div>
        <div class="item"><img src="https://companieslogo.com/img/orig/MSFT-a203b22d.png?t=1633073277"
                alt="item1">
            <h2 class="product-title">Microsoft</h2>
        </div>
        <div class="item"><img src="https://1000logos.net/wp-content/uploads/2021/05/Souq.com-logo.png"
                alt="item1">
            <h2 class="product-title">Souq</h2>
        </div> -->
    </div>
    
</body>
</html>