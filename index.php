<?php
    require_once "includes/config/class-database.php";
    require_once "includes/config/class-create-table.php";
    $classDatabase                  = new ClassDatabase();
    $classDatabaseConnectionObject  = $classDatabase->getConnection();
    $createTable                    = new ClassCreateTable($classDatabaseConnectionObject);

    $createTable->createDatabaseTables();
?>

<?php
// set page headers
$page_title = "Read Product";
include_once "layout_header.php";
 
// contents will be here
echo "<div class='right-button-margin'><a href='create_product.php' class='btn btn-default pull-right'>Create Product</a></div>";
 
// footer
include_once "layout_footer.php";
?>