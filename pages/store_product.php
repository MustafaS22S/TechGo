<?php
session_start();

/*FOR TEST
    var_dump($_REQUEST);
   echo "<pre>";
   print_r($_FILES);
   echo "</pre>";*/
    $_REQUEST["productDescription"] = str_replace("'", "’", $_REQUEST["productDescription"]);


if (!empty($_REQUEST["productName"] && !empty($_REQUEST["productDescription"]) && !empty($_REQUEST["productCategory"]) && !empty($_REQUEST["price"]) && !empty($_FILES["productImageFile-0"]) && !empty($_FILES["productImageFile-1"]))) {
    
    require_once("../login/classes.php");
    $user = unserialize($_SESSION["user"]);
    
    $productImageFile0 = "./images/".$_FILES["productImageFile-0"]["name"];
    $productImageFile1 = "./images/".$_FILES["productImageFile-1"]["name"];

    move_uploaded_file($_FILES["productImageFile-0"]["tmp_name"],$productImageFile0);
    move_uploaded_file($_FILES["productImageFile-1"]["tmp_name"],$productImageFile1);

    $user->store_product($_REQUEST["productName"],$_REQUEST["productDescription"],$_REQUEST["productCategory"],$_REQUEST["price"],$productImageFile0,$productImageFile1);

    header ("location: ../admin/add_product.php?msg=Product added successfully!");

} else {
   header("Location: ../admin/add_product.php?error=Please fill in all fields");
}

    