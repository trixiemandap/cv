<?php
    include_once "../config/dbconnect.php";

    $product_id=$_POST['product_id'];
    $p_name= $_POST['p_name'];
    $p_desc= $_POST['p_desc'];
    $p_price= $_POST['p_price'];
    $category= $_POST['category'];

   // Check if a new image file is selected
if (!empty($_FILES['newImage']['tmp_name'])) {
    // File upload process
    $location = "./uploads/";
    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $dir = '../uploads/';
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    $image = uniqid() . "." . $ext;
    $final_image = $location . $image;

    if (in_array($ext, $valid_extensions)) {
        move_uploaded_file($tmp, $dir . $image);
    }
} else {
    // No new image file selected, retain the existing image path
    $final_image = $_POST['existingImage'];
}
    $updateItem = mysqli_query($conn,"UPDATE product SET 
        product_name='$p_name', 
        product_desc='$p_desc', 
        price=$p_price,
        category_id=$category,
        product_image='$final_image' 
        WHERE product_id=$product_id");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>