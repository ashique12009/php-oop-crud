<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'includes/config/class-database.php';
include_once 'includes/objects/class-product.php';
include_once 'includes/objects/class-category.php';
 
// get database connection
$database = new ClassDatabase();
$db = $database->getConnection();
 
// prepare objects
$product = new ClassProduct($db);
$category = new ClassCategory($db);
 
// Set ID property of product to be read
$product->id = $id;
 
// Read the details of product to be read
$product->readOne();

// Set page headers
$page_title = "Read One Product";
include_once "layout_header.php";
 
// Read products button
echo "<div class='right-button-margin'>
    <a href='index.php' class='btn btn-primary pull-right'>
        <span class='glyphicon glyphicon-list'></span> Read Products
    </a>
</div>";

// HTML table for displaying a product details
echo "<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Name</td>
        <td>{$product->name}</td>
    </tr> 
    <tr>
        <td>Price</td>
        <td>$ {$product->price}</td>
    </tr> 
    <tr>
        <td>Description</td>
        <td>{$product->description}</td>
    </tr> 
    <tr>
        <td>Category</td>
        <td>";
            // display category name
            $category->id=$product->category_id;
            $category->readName();
            echo $category->name;
        echo "</td>
    </tr>
</table>";
 
// set footer
include_once "layout_footer.php";