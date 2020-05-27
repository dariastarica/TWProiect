<?php
    /*class DB{
        private static $connectionString = sprintf("mysql:host=%s;dbname=%s","meqserver.mysql.database.azure.com","test");
        private static $dbconnection = NULL;
        private static function obtain_connection(){
            if(is_null(self::$dbconnection)){
                self::$dbconnection = new PDO($connectionString,"meqadmin@meqserver","MEq1234@000000");
            }
        }

    }*/
    $connectionString = sprintf("mysql:host=%s;dbname=%s","meqserver.mysql.database.azure.com","test");
    try{
        $pdoconnection = new PDO($connectionString,"meqadmin@meqserver","MEq1234@000000");
    }catch (PDOException $exception){
        echo $exception,PHP_EOL;
    }
    if($pdoconnection != null){

        $pdoconnection=null; //disconnect
    }
    function addComment($user, $content){
        $query = "INSERT INTO comments (comment_id, comment_content, comment_by, comment_date, comment_on_post_id) VALUES 
            ((:comment_id, :comment_content, :comment_by, :comment_date, :comment_on_post_id))";

    }
    /*
    public class myAction{
        public function addComments($user, $message){
            $sql = "INSERT INTO comments (comment_id, comment_content, comment_by, comment_date, comment_on_post_id) VALUES
                    (:comment_id, :comment_content, :comment_by, :comment_date, :comment_on_post_id)";
            $request =

        }
    }*/

?>