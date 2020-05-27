<?php
    $server = 'meqserver.mysql.database.azure.com';
    $username = 'meqadmin@meqserver';
    $password = 'MEq1234@000000';
    $database = 'meqdb';

    if(!mysqli_connect($server, $username, $password)){
        exit('ERR...: could not establish database connection');
    }
    if(!mysqli_select_db($database)){
        exit('ERR...: could not select the database');
    }
?>