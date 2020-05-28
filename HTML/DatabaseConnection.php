<?php
    $connectionString = sprintf("mysql:host=%s;dbname=%s","meqserver.mysql.database.azure.com","meqdb");
    try{
        $pdoconnection = new PDO($connectionString,"meqadmin@meqserver","MEq1234@000000");
    }catch (PDOException $exception){
        echo $exception,PHP_EOL;
    }