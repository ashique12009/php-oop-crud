<?php
// Check if value was posted
if ($_POST)
{
    // Include database and object file
    include_once 'includes/config/class-database.php';
    include_once 'includes/objects/class-product.php';

    // Get database connection
    $database = new ClassDatabase();
    $db       = $database->getConnection();

    // Prepare product object
    $product = new ClassProduct($db);

    // Set product id to be deleted
    $product->id = $_POST['object_id'];

    // Delete the product
    if ($product->delete())
    {
        echo "Object was deleted.";
    }
    else
    {
        echo "Unable to delete object.";
    }
}