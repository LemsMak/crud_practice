<?php
    include 'database.php';

    $sql = $conn->prepare("SELECT * FROM congolese");
    $sql->execute();
    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    $result = $sql->fetchAll();

        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
        
        <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;

    width: 100%;

    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    h1, h2{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    </style>
    </head>
    <body>
        <h1>DASHBOARD</h1>
        <br>

    <h2>Liste des congolais en Russie</h2>

        <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Ville</th>
            <th>Action</th>
        </tr>

        <?php

            if($result)
            {
                foreach($result  as $value)
                {
                    $valueId = $value['id'];
                    $value['first_name']; 
                    $value['last_name']; 
                    $value['email']; 
                    $value['ville'];

                    echo "<tr>".
                            "<td>".$value['first_name']."</td>".
                            "<td>".$value['last_name']."</td>".
                            "<td>".$value['email']."</td>".
                            "<td>".$value['ville']."</td>".
                            "<td>"
                                .'<a href="update.php?update='.$valueId.'">'."<button>". "Modifier" ."</button>"."</a>".
                                '<a href="delete.php?delete='.$valueId.'">'."<button>". "Supprimer" ."</button>"."</a>".
                            "</td>".
                          "</tr>";
                
                }
            }

        ?>

        </table>
    </body>
</html>