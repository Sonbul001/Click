<?php
require_once '../db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $image = $_POST['image'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    if ($filename == "")
        $folder = $_SESSION['image'];
    else
        $folder = "../image/" . $filename;
    $curr_email = $_SESSION['email'];
    $sql = "UPDATE markets SET username='$username', image='$folder', email='$email', password='$password', address='$address', location='$location', phone='$phone' WHERE email='$curr_email' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($tmpname, $folder);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['address'] = $address;
        $_SESSION['location'] = $location;
        $_SESSION['phone'] = $phone;
        $_SESSION['image'] = $folder;
    } else {
        echo '<p class="result">There was error while adding record</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="marketprofile.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script type="text/javascript" src="marketprofile.js"></script>
    <title>Market Profile</title>
</head>

<body>
    <header>

        <div class="header-home">
            <a href="#" class="logo">Click</a>
            <li><a href="../homepage/defaulthome.php"><button class="btn btn-dark-outline"><strong>Log
                            Out</strong></button></a>
        </div>
    </header>

    <form action="marketprofile.php" method="post" id="personal_info" enctype="multipart/form-data">
        <div class="header-profile">
            <img src='<?php echo $_SESSION['image'] ?>' alt="market-logo" class="profile-pic">
            <h1>
                <?php echo $_SESSION['username'] ?>
            </h1>
        </div>
        <div><label for="name">Name: </label><input type="text" name="username" id="username"
                value="<?php echo $_SESSION['username'] ?>" disabled required></div>
        <div><label for="img">Image: </label><input type="file" name="image" id="img" accept="image/*" disabled>
        </div>
        <div><label for="email">Email: </label><input type="text" name="email" id="email"
                value="<?php echo $_SESSION['email'] ?>" disabled required></div>
        <div><label for="pwd">Password: </label><input type="password" name="password" id="pwd"
                value="<?php echo $_SESSION['password'] ?>" disabled required>
            <i class="far fa-eye" onclick="showpass()" id="show-btn"></i>
        </div>
        <div><label for="address">Address: </label><input type="text" name="address" id="address"
                value="<?php echo $_SESSION['address'] ?>" disabled required>
        </div>
        <div><label for="phone">Phone: </label><input type="text" name="phone" id="phone"
                value="<?php echo $_SESSION['phone'] ?>" disabled required></div>
        <div><label for="location">Location: </label><input type="text" name="location" id="location"
                value="<?php echo $_SESSION['location'] ?>" disabled></div>
        <div><label for="balance">Balance: </label><input type="number" name="balance" id="balance"
                value="<?php echo $_SESSION['balance'] ?>" disabled></div>
        <div id="edit-btn"><button type="button" onclick="allowEdit()">Edit</button></div>
    </form>

    <div class="product-list">
        <div class="product-list-head">
            <h1>Products:</h1>
            <a href="../addproduct/addProduct.php"><button type="button">Add product</button><br></a>
        </div>
        <?php
        $curr_email = $_SESSION['email'];
        $sql = "SELECT * FROM products WHERE market='$curr_email'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='item'><img src={$row["image"]} alt='item1'>" .
                "<h2 class='product-title'>{$row["name"]}</h2>" .
                "<h3 class='Brand'>{$row["brand"]}</h3>" .
                "<span class='Availability'>{$row["items_available"]} items available</span><br>" .
                "<span class='Price'>{$row["price"]} LE</span>" .
                "</div>";
        }
        ?>
    </div>
</body>

</html>