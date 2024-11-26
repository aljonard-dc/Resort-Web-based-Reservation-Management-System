<?php
include 'db_connection.php';

$uploadStatus = array();

if (isset($_POST['insert-btn'])) {
    $categoryTitle = mysqli_real_escape_string($conn, $_POST['cat-title']);
    $categoryDescription = mysqli_real_escape_string($conn, $_POST['cat-description']);

    // Insert into test_category table
    $categoryInsertQuery = "INSERT INTO `resortcategory_tbl` (categorytitle, categorydescription) VALUES ('$categoryTitle', '$categoryDescription')";

    if (mysqli_query($conn, $categoryInsertQuery)) {
        $categoryId = mysqli_insert_id($conn); 
        header("Location: ./insertCategory.php");
        // Get the auto-generated category ID
        $uploadStatus[] = "Category inserted successfully.";
    } else {
        $uploadStatus[] = "Error inserting category: " . mysqli_error($conn);
    }

    // Loop through different images
    for ($id = 1; $id <= 4; $id++) {
        // Check if a new image file was uploaded
        if (isset($_FILES['new_image' . $id]) && $_FILES['new_image' . $id]['error'] === 0) {
            $new_image_file_name = mysqli_real_escape_string($conn, $_FILES['new_image' . $id]['name']);
            $new_image_tmp_name = $_FILES['new_image' . $id]['tmp_name'];

            // Define the upload directory
            $upload_directory = '../uploads/';

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($new_image_tmp_name, $upload_directory . $new_image_file_name)) {
                // Insert into test_image table with the category_id
                $imageInsertQuery = "INSERT INTO `categoryimages_tbl` (category_id, img_url) VALUES ('$categoryId', '$new_image_file_name')";

                if (mysqli_query($conn, $imageInsertQuery)) {
                    $uploadStatus[] = "Image for ID $id inserted successfully.";
                } else {
                    $uploadStatus[] = "Error inserting image for ID $id: " . mysqli_error($conn);
                }
            } else {
                $uploadStatus[] = "Error moving the uploaded file for ID $id.";
            }
        } else {
            $uploadStatus[] = "No new image file was uploaded for ID $id.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/insertCategory.css"/>
    <title>Insert Category</title>
</head>
<body>
<section class="insertSec">
    <div class="category-container">
        <!-- <div class="refresh-category">
                <a href="" onclick="reloadInsertCategory()"><h3>REFRESH</h3></a>
            </div> -->
        <form class="insertForm-container" class="insertForm" enctype="multipart/form-data" method="post" id="myForm">
            <div class="title-con">
                <h3>Category Title: *</h3>
                <input type="text" name="cat-title" class="title-inputbox" placeholder="Write a title" required maxlength="30">
            </div>

            <div class="description-con">
                <h3>Category Description: *</h3>
                <textarea name="cat-description" class="description-inputbox" placeholder="Write a description" required maxlength="250"></textarea>
            </div>

            <div class="images-con">
                <?php
                // Display the images after the update
                // Assuming you have an array of image IDs
                $imageIds = [1, 2, 3, 4];

                foreach ($imageIds as $id) {
                    echo '<div class="cat-images">';
                    echo '<img id="previewImage' . $id . '" src="../uploads/noimageavailaible.png" alt="No Image">';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="inputfile-con">
                <?php
                // Assuming you have an array of image IDs
                $imageIds = [1, 2, 3, 4];

                foreach ($imageIds as $id) {
                    echo '<input class="inputfile" type="file" name="new_image' . $id . '" accept="image/*" onchange="previewImage(this, ' . $id . ')" required>';
                }
                ?>
            </div>

            <input type="submit" name="insert-btn" class="insert-btn" value="ADD CATEGORY">
        </form>
    </div>
</section>

<script>
    function previewImage(input, imageId) {
        var previewId = 'previewImage' + imageId;
        var preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '../uploads/noimageavailaible.png';
        }
    }
</script>

</body>
</html>
