<?php

    include "database.php";

    $deleteID = $_GET['delete'];

    $sql = "DELETE FROM congolese WHERE id = $deleteID";

    if($conn->exec($sql)){
        header("location:index.php");
        exit;
    }