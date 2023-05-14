<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Welcome to PHP CRUD in OOP way:.</title>
</head>
<body>

    <?php
        require_once "includes/config/class-database.php";
        require_once "includes/config/class-create-table.php";
        $classDatabase                  = new ClassDatabase();
        $classDatabaseConnectionObject  = $classDatabase->getConnection();
        $createTable                    = new ClassCreateTable($classDatabaseConnectionObject);

        $createTable->createDatabaseTables();
    ?>

</body>
</html>