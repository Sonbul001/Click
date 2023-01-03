<?php
require_once('../db.php');
session_start();
if(isset($_GET['status'])){
    $link = "defaulthome.php";
    $link2 = "markets.php?status=false";
    $image = "../image/profilepic.jpg";
}else{
    $link = "homepage.php";
    $link2 = "markets.php";
    $image = $_SESSION['image'];
    $name = $_SESSION['username'];
}
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
    <title>Brands</title>
</head>

<body>
    <div class="sidebar">
        <a href="../profile/profile.php">
            <div class="profile">
                <img src="<?php echo $image ?>" alt="profile_picture">
                <h3><?php echo $name ?></h3>
            </div>
        </a>
        <div class="search">
            <input type="text" id="search-bar" class="input" placeholder="Search..." onkeyup="searchBar()">
        </div>
        <ul>
            <li>
                <a href="<?php echo $link ?>">
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span>Brands</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $link2 ?>">
                    <span>Markets</span>
                </a>
            </li>
        </ul>
    </div>

    <nav class="navbar">
        <h1 class="logo" id="click-logo">Click</h1>

        <ul class="navbar-nav-right">
            <?php 
                if(isset($_GET['status'])){
                echo "<li><a href='../login/login.php'><button class='btn btn-dark-outline'><strong>Log In</strong></button></a>" .
                    "<li><a href='../signup/signup.php'><button class='btn btn-dark-outline'><strong>Sign Up</strong></button></a>";
                }
                else{
                echo "<li><a href='../homepage/defaulthome.php'><button class='btn btn-dark-outline'><strong>Log Out</strong></button></a>";
                }
            ?>
        </ul>
    </nav>
    <div class="main-div">
        <div class="product-list">
        <?php
        $curr_email = $_SESSION['email'];
        $sql = "SELECT DISTINCT brand FROM products";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='item'>" .
                "<h2 class='Brand'>{$row["brand"]}</h2>" .
                "</div>";
        }
        ?>
        </div>
</body>

</html>