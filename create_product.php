<?php
// set page headers
$page_title = "Create Product";
include_once "layout_header.php";
include_once "includes/config/class-database.php";
include_once "includes/objects/class-product.php";
include_once "includes/objects/class-category.php";

// Get database connection
$db = new ClassDatabase();
$dbConnection = $db->getConnection();

// Pass database connectio to objects
$product = new ClassProduct($dbConnection);
$category = new ClassCategory($dbConnection);
 
// Contents will be here
echo "<div class='right-button-margin'>
        <a href='index.php' class='btn btn-default pull-right'>Read Products</a>
    </div>";
 
?>
<!-- 'create product' html form will be here -->

<!-- PHP post code will be here -->
<?php 
// If the form was submitted - PHP OOP CRUD Tutorial
if ($_POST) 
{ 
    // Set product property values
    $product->name          = $_POST['name'];
    $product->price         = $_POST['price'];
    $product->description   = $_POST['description'];
    $product->category_id   = $_POST['category_id'];
 
    // Create the product
    if ($product->create())
    {
        echo "<div class='alert alert-success'>Product was created.</div>";
    }
 
    // If unable to create the product, tell the user
    else
    {
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>

<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
            <!-- categories from database will be here -->
            <?php
                // Read the product categories from the database
                $stmt = $category->read();
                
                // Put them in a select drop-down
                echo "<select class='form-control' name='category_id'>";
                    echo "<option>Select category...</option>";
                
                    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row_category);
                        echo "<option value='{$id}'>{$name}</option>";
                    }
                
                echo "</select>";
            ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
    </table>
</form>

<?php 
// footer
include_once "layout_footer.php";
?>