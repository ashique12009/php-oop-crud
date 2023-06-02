<?php
    require_once "includes/config/class-database.php";
    require_once "includes/config/class-create-table.php";
    require_once "includes/objects/class-product.php";
    require_once "includes/objects/class-category.php";
    $classDatabase                  = new ClassDatabase();
    $classDatabaseConnectionObject  = $classDatabase->getConnection();
    $createTable                    = new ClassCreateTable($classDatabaseConnectionObject);

    $createTable->createDatabaseTables();
?>

<?php
// Set page headers
$page_title = "Read Product";
include_once "layout_header.php";
 
// Contents will be here
echo "<div class='right-button-margin'><a href='create_product.php' class='btn btn-default pull-right'>Create Product</a></div>";

// Page given in URL parameter, default page is one
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// Set number of records per page
$records_per_page = 5;
 
// Calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $current_page) - $records_per_page;
 
// Retrieve records here

// Query products
$product    = new ClassProduct($classDatabaseConnectionObject);
$category   = new ClassCategory($classDatabaseConnectionObject);
$stmt       = $product->readAll($from_record_num, $records_per_page);
$num        = $stmt->rowCount();

// Display the products if there are any
if ($num > 0)
{ 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Product</th>";
            echo "<th>Price</th>";
            echo "<th>Description</th>";
            echo "<th>Category</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
 
            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>$" . "{$price}</td>";
                echo "<td>{$description}</td>";
                echo "<td>";
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                echo "</td>";
 
                echo "<td>";
                    // Read one, edit and delete button will be here
                    // Read, edit and delete buttons
                    echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>
                    <span class='glyphicon glyphicon-list'></span> Read
                    </a>

                    <a href='update_product.php?id={$id}' class='btn btn-info left-margin'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                    </a>

                    <a delete-id='{$id}' class='btn btn-danger delete-object'>
                    <span class='glyphicon glyphicon-remove'></span> Delete
                    </a>";
                echo "</td>";
 
            echo "</tr>";
        }
 
    echo "</table>"; 

    // Specify the page where paging is used
    $page_url = "index.php?";

    // Count all products in the database to calculate total pages
    $total_rows = $product->countAll();
    // Paging buttons will be here
    include_once "paging.php";
}
else
{
    echo "<div class='alert alert-info'>No products found.</div>";
}
 
// footer
include_once "layout_footer.php";
?>