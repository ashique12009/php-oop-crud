<?php

class ClassCreateTable
{
    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function createDatabaseTables()
    {
        $sqlProductTable = "CREATE TABLE IF NOT EXISTS `products` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(32) NOT NULL,
            `description` text NOT NULL,
            `price` decimal(6, 2) NOT NULL,
            `category_id` int(11) NOT NULL,
            `created` datetime NOT NULL,
            `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";

        if ($this->dbConnection->query($sqlProductTable) === FALSE)
        {
            echo "Error creating table ";
        }

        $sqlCategoryTable = "CREATE TABLE IF NOT EXISTS `categories` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(256) NOT NULL,
            `created` datetime NOT NULL,
            `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

        if ($this->dbConnection->query($sqlCategoryTable) === FALSE)
        {
            echo "Error creating table ";
        }
    }
}
