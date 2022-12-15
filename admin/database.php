<?php
    // SE CONNECTER A LA DATABASE

    $servername = "localhost";
    $dbname = "embassy_drc";
    $username = "root";
    $password = "";

    // UTILISATION DE LA METHODE PDO

    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "connected";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    



// CREATION DE LA DATABASE avec la methode dela programmation orientee

// class Database
// {
//     private static $dbHost = "localhost";
//     private static $dbName = "embassy_drc";
//     private static $dbUser = "root";
//     private static $dbPassword = "";

//     private static $connection = null;

//     public static function connect()
//     {
//         try
//         {
//             self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,self::$dbUser,self::$dbPassword);
//         }
//         catch(PDOException $e)
//         {
//             die($e->getMessage());
//         }
//         return self::$connection;
//     }
//     public static function disconnect()
//     {
//         self::$connection = null;
//     }
// }
// Database::connect();
//     echo "database connected";

