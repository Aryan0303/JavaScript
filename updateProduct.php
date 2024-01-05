<?php
$pageTitle = "Update Product";

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'pos';

// Connection
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Sorry Connection Fail:" . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    echo "$id";
    $v_id = $_POST['v_id'];
    echo "$v_id";
    $csv_c_id = $_POST['csv_c_id'];
    echo "$csv_c_id";
    $p_id = $_POST['p_id'];
    echo "$p_id";
    $c_id = $_POST['c_id'];
    echo "$c_id";
    $s_id = $_POST['s_id'];
    echo "$s_id";
    $sc_id = $_POST['sc_id'];
    echo "$sc_id";
    $p_name = $_POST['p_name'];
    $p_summary = $_POST['p_summary'];
    $size = $_POST['size'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];
    $quant_limit = $_POST['quant_limit'];
    $price = $_POST['price'];

    // Handle file uploads
    $newImageName = null;

    $newImageName = null;

// Loop through each uploaded file


if (isset($_FILES['image']) && $_FILES['image']['name']) {
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $tempName = $_FILES['image']['tmp_name'];

    // Validate and upload the new image
    $validImageExtensions = ['webp', 'png', 'jpg', 'jpeg'];
    $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($imageExtension, $validImageExtensions) && $fileSize <= 1000000) {
        $newImageName = uniqid() . '.' . $imageExtension;
        $uploadPath = '../../assets/images/' . $newImageName;

        if (move_uploaded_file($tempName, $uploadPath)) {
            // If the upload is successful, update the image column
            $updateImageQuery = "UPDATE size_variation SET images = ? WHERE id = ?";
            $stmtUpdateImage = $conn->prepare($updateImageQuery);
            $stmtUpdateImage->bind_param("si", $newImageName, $id);
            $stmtUpdateImage->execute();
            $stmtUpdateImage->close();
            
          
            
        } else {
            echo 'Error uploading new image';
        }
    } else {
        echo 'Invalid image format or size';
    }
}



// Update the product variation in the database
$updateVariationQuery = "UPDATE size_variation 
                        SET  
                            sizes = ?,
                            price = ?,
                            quantity = ?,
                            sku = ?, 
                            quant_limit = ?,  
                            images = ? 
                        WHERE
                            id = ?";

$stmt2 = $conn->prepare($updateVariationQuery);
$stmt2->bind_param("siisisi", $size, $price, $quantity, $sku, $quant_limit, $newImageName, $id);
$stmt2->execute();

    // Update product details including the new image name
    $updateProductQuery = "UPDATE products 
                            SET
                                p_name = ?, 
                                p_summary = ?, 
                                cat_id = ?,  
                                supp_id = ?,
                                subcat = ? 
                            WHERE
                                id = ?";

    $stmt1 = $conn->prepare($updateProductQuery);
    $stmt1->bind_param("ssiiii", $p_name, $p_summary, $c_id, $s_id, $sc_id, $p_id);
    $stmt1->execute();

   

    // Update the color_size_variations table
    $updatecolor_size_variationsQuery = "UPDATE color_size_variations 
                                        SET  
                                            c_id = ?
                                        WHERE
                                            c_id = ?
                                            AND
                                            s_id = ?
                                            AND
                                            p_id = ?";

    $stmt3 = $conn->prepare($updatecolor_size_variationsQuery);
    $stmt3->bind_param("iiii", $v_id, $csv_c_id, $id, $p_id);
    $stmt3->execute();

    exit();
} else {
    echo "error";
}
?>
