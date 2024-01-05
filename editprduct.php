<?php
$pageTitle = "Edit Product";
include('../header/header.php');

$id = $_GET['rn']; 
echo "$id";
$query = "SELECT 
    sv.*,
    p.p_name AS p_name,
    p.id AS p_id,
    p.cat_id AS c_id,
    p.supp_id AS s_id,
    p.subcat AS sc_id,
    c.cat_name AS cat_name,
    sc.subcat_name AS subcat_name,
    s.sup_fname AS sup_fname,
    p.p_summary AS p_summary,
    v.var_color AS var_color,
    v.id AS v_id,
    csv.p_id AS csv_p_id,
    csv.c_id AS csv_c_id
FROM 
    size_variation sv
JOIN 
    color_size_variations csv ON csv.s_id = sv.id
JOIN 
    products p ON p.id = csv.p_id
JOIN
    category c ON p.cat_id = c.id
JOIN
    sub_category sc ON p.subcat = sc.id
JOIN
    supplier s ON p.supp_id = s.id
-- JOIN
--     variations v ON v.id = csv.c_id
JOIN
    variations v ON csv.c_id = v.id

    

WHERE 
    sv.id = $id";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Fetch all categories from the database
$queryCategories = "SELECT * FROM category";
$resultCategories = mysqli_query($conn, $queryCategories);

// Fetch all sub-categories from the database
$querySubcategories = "SELECT * FROM sub_category";
$resultSubcategories = mysqli_query($conn, $querySubcategories);

// Fetch all suppliers from the database
$querySuppliers = "SELECT * FROM supplier";
$resultSuppliers = mysqli_query($conn, $querySuppliers);

// Fetch all distinct colors from the variations table
$queryColors = "SELECT * FROM variations";
$resultColors = mysqli_query($conn, $queryColors);
// fetch  all   id    

?>

<div class="container card p-3">
    <form action="../database/products/updateProduct.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="row  col-md-6">
                <div class="d-flex">
                    <!-- product Name  -->
                    <input type="hidden" name="user" value="1">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                    <input type="hidden" name="csv_c_id" value="<?php echo $row['csv_c_id']; ?>">
                    <!-- <input type="hidden" name="s_id" value="<?php  // echo $row['s_id']; ?>"> -->
                    <!-- <input type="hidden" name="c_id" value="<?php //echo $row['c_id']; ?>"> -->
                    <!-- <input type="hidden" name="sc_id" value="<?php //echo $row['sc_id']; ?>"> -->

                    <input type="text" class="form-control me-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="p_name" value="<?php echo $row['p_name']; ?>" style="width:40%">
                    <!-- Category Dropdown -->
                    <select class="form-select mx-2" aria-label="Default select example" name="c_id">
                        <?php 
                        // Display each category as an option
                        while ($category = mysqli_fetch_assoc($resultCategories)) {
                            // Check if the current category is the selected category
                            $selected = ($category['cat_name'] == $row['cat_name']) ? 'selected' : '';
                            echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['cat_name'] . '</option>';
                        }
                        ?>
                    </select>


                    <!-- Sub-Category Dropdown -->
                    <select class="form-select mx-2" aria-label="Default select example" name="sc_id">
                        <?php
                        // Display each sub-category as an option
                        while ($subcategory = mysqli_fetch_assoc($resultSubcategories)) {
                            $selected = ($subcategory['subcat_name'] == $row['subcat_name']) ? 'selected' : '';

                            echo '<option value="' . $subcategory['id'] . '" ' . $selected . '>' . $subcategory['subcat_name'] . '</option>';
                        }
                        ?>
                    </select>

                    <!-- Supplier Dropdown -->
                    <select class="form-select mx-2" aria-label="Default select example" name="s_id">
                    <?php
                        // Display each supplier as an option
                        while ($supplier = mysqli_fetch_assoc($resultSuppliers)) {
                            $selected = ($supplier['sup_fname'] == $row['sup_fname']) ? 'selected' : '';

                            echo '<option value="' . $supplier['id'] . '" ' . $selected . '>' . $supplier['sup_fname'] . '</option>';
                        }
                        ?>
                    </select>

                </div>
        </div>

        <!-- summary  -->
        <div class="row col-md-6">
            <div class="d-flex">
                <div class="col-6 me-2">
                    <textarea class="form-control  mb-1 p-2" id="exampleFormControlTextarea1" rows="1" name="p_summary" style="width: 30rem;"><?php echo $row['p_summary']; ?></textarea>
                </div>
            </div>
        </div>
    </div>

        <!-- Row for Existing Variation Input Fields -->
        <div class="row">
            <div id="variationInputs">
                <!-- Existing variation input fields go here -->
                <!-- You might want to display existing variations for editing -->
            </div>
        </div>

        <!-- Row for Color, Size, SKU, Quantity, Max Quantity, Price, and Image Upload -->
        <div class="row mt-2">
            <div class="d-flex">
              <!-- Color Dropdown -->
                        <select class="form-select me-2" aria-label="Default select example" style="width: 10rem !important;" name="v_id">
                         <?php
                        // Display each supplier as an option
                        while ($Colors  = mysqli_fetch_assoc($resultColors )) {
                            $selected = ($Colors ['var_color'] == $row['var_color']) ? 'selected' : '';

                            echo '<option value="' . $Colors['id'] . '" ' . $selected . '>' . $Colors['var_color'] . '</option>';
                        }
                        ?>
                        
                        </select>



                <!-- Add other input fields as needed -->
                <input type="text" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Size" style="width:10%" name="size" value="<?php echo $row['sizes']; ?>">
                <input type="text" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="SKU" style="width:10%" name="sku" value="<?php echo $row['sku']; ?>">
                <input type="number" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Quantity" style="width:10%" name="quantity" value="<?php echo $row['quantity']; ?>">
                <input type="number" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Max Quantity" style="width:10%" name="quant_limit" value="<?php echo $row['quant_limit']; ?>">
                <input type="number" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Price" style="width:10%" name="price" value="<?php echo $row['price']; ?>">
                <input type="file" class="form-control mx-2" id="inputGroupFile01" style="width:20%" name="image" placeholder="<?php echo $row['images']; ?>" value="<?php echo $row['images']; ?>">
            </div>
        </div>

        <!-- Row for Submit Button -->
        <div class="row">
            <div class="d-flex justify-content-center mt-2">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </form>
</div>


<script>
    const addInput = document.getElementById("variationInputs");

    const addRows = () => {
        const rowCount = document.getElementById("inputRowCount").value;
        
        for (let i = 0; i < rowCount; i++) {
            const field = document.createElement("div");
            field.innerHTML = `<div class="row mt-2">
                <div class="d-flex">
                    <select class="form-select me-2" aria-label="Default select example" name="color[]" style="width: 10rem !important;">
                        <option selected>Select Colors</option>
                        <?php foreach ($row4 as $row) { ?>
                            <option value="<?php echo $row['id']; ?>" style="background-color:<?php echo $row['var_color']; ?>;"><?php echo $row['var_color']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Size" style="width:10%" name="size[]">
                    <input type="text" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="SKU" style="width:10%" name="sku[]">
                    <input type="number" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Quantity" style="width:10%" name="quantity[]">
                    <input type="number" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Max Quantity" style="width:10%" name="quant_limit[]">
                    <input type="number" class="form-control mx-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Price" style="width:10%" name="price[]">
                    <input type="file" class="form-control mx-2" id="inputGroupFile01" style="width:20%" name="image[]">
                    <i class="fa-regular fa-circle-xmark btn" style="color:red;" onclick="deleteInput()"></i>
                </div>
            </div>`;

            // Insert the new field at the end
            addInput.insertBefore(field, addInput.firstChild);
            
        }
        
    };
        const deleteInput = () => {
                // Remove the last child from addInput
                addInput.removeChild(addInput.firstChild);
            };

</script>