<?php
function connectDB(){
    $host = "127.0.0.1";
    $user = "tdiw-i8";
    $pass = "ociEaBKi";
    $dbname="tdiwi8";

        try {
            return new \PDO(
	       sprintf('mysql:dbname=%s;host=%s;charset=UTF8', $dbname, $host),
               $user,
	       $pass
	     );
	   } catch (\PDOException $e) {
	       echo sprintf('Connection failed: %s', $e->getMessage());
               die;
           }
}
