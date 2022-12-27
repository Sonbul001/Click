<?php
require_once '../db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = $_POST['pname'];
    $image = $_POST['image'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $brief = $_POST['brief'];
    $full = $_POST['full'];
    $items = $_POST['items'];
    $filename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    if ($filename == "")
        $folder = "../image/profilepic.jpg";
    else
        $folder = "../image/" . $filename;
    $curr_email = $_SESSION['email'];
    $sql = "INSERT INTO products(image,name,brand,price,brief_description,full_description,items_available,market) VALUES ('$folder','$productname','$brand','$price','$brief','$full','$items','$curr_email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($tmpname, $folder);
        header('Location:../marketprofile/marketprofile.php');
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
<link rel="stylesheet" href="addProduct.css">
<link rel="stylesheet" href="../styles.css">
<script type="text/javascript" src="addProduct.js"></script>
<title>Add product page</title>
</head>
<body>
    <header>
       <a href="../homepage/homepage.html"><h2 class="logo">Click</h2> </a>
    </header>
    <form method="post" action="addProduct.php" class="addproductform" id="formid" enctype="multipart/form-data">
        <h3>Add your product</h3>
        <div class="required">
            <label> Fields with * are <i>required</i></label>
          </div>
        <div>Product Image: <br><input type="file" name="image" id="image" accept="image/*" alt="no image" onchange="previewImage(event)"></div>
        <br>
        <div><input class="addForm" type="text" id="pname" name="pname" placeholder="Product name" required><span class="astrisk">*</span></div>
        <br>
        <div><input class =addForm type="text" id="brand" name="brand" placeholder="Brand" required><span class="astrisk">*</span></div>
        <br>
        <div> <input class="addForm" type="text" id="price" name="price" placeholder="Price" required><span class="astrisk">*</span></div>
        <br>
        <div><textarea class="addForm" name="brief" id="brief" form="formid" rows="3" placeholder="Brief description" ></textarea></div>
        <br>
        <div><textarea class="addForm" name="full" id="full" form="formid" rows="5" placeholder="Full description" ></textarea></div>
        <br>
        <div> <input class="addForm" type="text" name="items" id="items" placeholder="No. of items" required><span class="astrisk">*</span></div>
        <br>
        <div> <button type="submit">add product</button> </div>
        <br>
    </form>
</body>
</html>