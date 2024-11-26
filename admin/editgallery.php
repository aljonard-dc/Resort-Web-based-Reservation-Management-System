<?php
include 'db_connection.php';

$uploadStatus = array();

// Delete Category
if (isset($_POST['delete-category'])) {
    if (isset($_POST['category_id'])) {
        $categoryId = mysqli_real_escape_string($conn, $_POST['category_id']);

        // Delete from categoryimages_tbl
        $deleteImageQuery = "DELETE FROM categoryimages_tbl WHERE category_id = $categoryId";
        mysqli_query($conn, $deleteImageQuery);

        // Delete from resortcategory_tbl
        $deleteCategoryQuery = "DELETE FROM resortcategory_tbl WHERE id = $categoryId";
        if (mysqli_query($conn, $deleteCategoryQuery)) {
            header("Location: ./editgallery.php");
            $uploadStatus[] = "Category with ID $categoryId deleted successfully.";
        } else {
            $uploadStatus[] = "Error deleting category with ID $categoryId: " . mysqli_error($conn);
        }
    } else {
        $uploadStatus[] = "No category ID provided for deletion.";
    }
}
// Update categories
if (isset($_POST['update-category'])) {
    if (isset($_POST['categoryTitle']) && isset($_POST['categoryDescription'])) {
        foreach ($_POST['categoryTitle'] as $categoryId => $categoryTitle) {
            $categoryDescription = $_POST['categoryDescription'][$categoryId];

            $sql = "UPDATE `resortcategory_tbl` SET categorytitle = '$categoryTitle', categorydescription = '$categoryDescription' WHERE id = $categoryId";

            if (mysqli_query($conn, $sql)) {
                header("Location: ./editgallery.php");
                $uploadStatus[] = "Category with ID $categoryId updated successfully.";
            } else {
                $uploadStatus[] = "Error updating category with ID $categoryId: " . mysqli_error($conn);
            }
        }
    } else {
        $uploadStatus[] = "No category details provided for updating.";
    }
}
// Update images
if (isset($_POST['update'])) {
    // Check if image IDs are set
    if (isset($_POST['image_id'])) {
        foreach ($_POST['image_id'] as $id) {
            // Check if a new image file was uploaded for the current ID
            if (isset($_FILES['new_image' . $id]) && $_FILES['new_image' . $id]['error'] === 0) {
                $new_image_file_name = mysqli_real_escape_string($conn, $_FILES['new_image' . $id]['name']);
                $new_image_tmp_name = $_FILES['new_image' . $id]['tmp_name'];

                // Define the upload directory
                $upload_directory = '../uploads/';

                // Move the uploaded file to the upload directory
                if (move_uploaded_file($new_image_tmp_name, $upload_directory . $new_image_file_name)) {
                    // Update the image record in the database with the new file name
                    $sql = "UPDATE `categoryimages_tbl` SET img_url = '$new_image_file_name' WHERE id = $id";

                    if (mysqli_query($conn, $sql)) {
                        $uploadStatus[] = "Image for ID $id updated successfully.";
                    } else {
                        $uploadStatus[] = "Error updating image for ID $id: " . mysqli_error($conn);
                    }
                } else {
                    // Log the move_uploaded_file error
                    $uploadStatus[] = "Error moving the uploaded file for ID $id. " . $_FILES['new_image' . $id]['error'];
                }
            } else {
                // Log that no new image file was uploaded for ID $id
                $uploadStatus[] = "No new image file was uploaded for ID $id.";
            }
        }
    } else {
        // Log that no image IDs were provided for updating
        $uploadStatus[] = "No image IDs provided for updating.";
    }
}
// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editgallery.css">
    <title>EDIT Gallery</title>
</head>
<body>

<section class="gallery-sec">
        <div class="refresh-category">
            <a href="" onclick="reloadInsertCategory()"><h3>REFRESH</h3></a>
        </div>
    <div class="resort-details-container">
        <div class="category-container">
            <?php
            include 'db_connection.php';
           
            $sql = "SELECT id, categorytitle, categorydescription FROM `resortcategory_tbl` ORDER BY id ASC";
            $res = mysqli_query($conn, $sql);

           
            if (mysqli_num_rows($res) > 0) {
               
                while ($category = mysqli_fetch_assoc($res)) {
                    echo '<form method="post" class="updateForm">';
                    echo '<div class="title-description-container">';
                    echo '<div class="cat-title"><h1>';
                    echo '<input type="text" class="title-input" name="categoryTitle[' . $category['id'] . ']" value="' . $category['categorytitle'] . '">';
                    echo '</h1></div>';
                    echo '<div class="hr-one"></div>';
                    echo '<div class="h50"></div>';
                    echo '<div class="cat-description">';
                    echo '<p>';
                    echo '<textarea type="text" class="description-input" name="categoryDescription[' . $category['id'] . ']" oninput="autoExpand(this)">' . $category['categorydescription'] . '</textarea>';
                    echo '</p></div>';
                    echo '<input class="updateDetails" type="submit" name="update-category" class="update-btn" value="UPDATE DETAILS">';
                    echo '</div>';
                    echo '</form>';
                    
                    echo '<form method="post" class="deleteForm">';
                    echo '<input type="hidden" name="category_id" value="' . $category['id'] . '">';
                    echo '<input class="deleteDetails" type="submit" name="delete-category" value="Delete Category" id="deleteButton">';
                    echo '</form>';
                }
            } else {
                
                echo '<p>No categories found</p>';
            }

         
            mysqli_close($conn);
            ?>
        </div>

        <div class="cards-images">
        <?php
    // Include the database connection
    include './db_connection.php';

    $sql = "SELECT * FROM categoryimages_tbl ORDER BY id ASC";
    $res = mysqli_query($conn, $sql);

    while ($image = mysqli_fetch_assoc($res)) {
        $imageId = $image['id'];
        echo '<div class="cat-images">';
        // Adjust the image source path
        echo '<img src="../uploads/' . $image['img_url'] . '" alt="Image">';
        echo '<form method="post" class="uploadForm" enctype="multipart/form-data" id="myForm' . $imageId . '">';
        echo '<input type="hidden" name="image_id[]" value="' . $imageId . '">';
        echo '<input class="inputfile" type="file" name="new_image' . $imageId . '" accept="image/*">';
        echo '<input type="submit" name="update" value="Update Image" id="submitButton" required>';
        echo '</form>';
        echo '</div>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
        </div>
    </div>
</section>
</body>
<script>
    function autoExpand(element) {
        // Only auto-expand for category description textareas
        if (element.name.includes("categoryDescription")) {
            element.style.height = "30px"; // Set a default height
            element.style.height = (element.scrollHeight) + "px";
        }
    }
    function reloadInsertCategory() {
        // Reload the insertCategory.php page in the iframe
        document.getElementById('insertCategory-content').contentWindow.location.reload();
        return false; // Prevent the default behavior of the anchor tag
    }
</script>

</html>
