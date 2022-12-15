<?php
    include '../admin/database.php';

        // CAPTURER LES INPUTS DU FORMULAIRE ET LES SECURISER

    if(isset($_POST['Send']))
    {   
        $name = htmlspecialchars(stripslashes(trim(strtolower($_POST['Name']))));
        $surname  = htmlspecialchars(stripslashes(trim(strtolower($_POST['Surname']))));
        $email = htmlspecialchars(stripslashes(trim(strtolower($_POST['Email']))));
        $password = htmlspecialchars(stripslashes(trim(strtolower($_POST['Password']))));
        $isSuccess = true;

        // CONDITIONS POUR QUE LES INPUTS SOIENT REMPLIES CORRECTEMENT AVANT LA VALIDATION

        if(empty($name))
        {
            $nameError = "Ce champ ne peut pas etre vide!";
            $isSuccess = false;
        }
        elseif(!preg_match_all("/^[a-zA-Z ]*$/", $name))
        {
            $nameError = "Ce champ ne doit contenir que des lettres!";
            $isSuccess = false;
        }
        if(empty($surname))
        {
            $surnameError = "Ce champ ne peut pas etre vide!";
            $isSuccess = false;
        }
        elseif(!preg_match_all("/^[a-zA-Z ]*$/", $surname))
        {
            $surnameError = "Ce champ ne doit contenir que des lettres!";
            $isSuccess = false;
        }
        if(empty($email))
        {
            $emailError = "Ce champ ne peut pas etre vide!";
            $isSuccess = false;
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $emailError = "Ecrivez votre email correctement!";
            $isSuccess = false;
        }
        if(empty($password))
        {
            $passwordError = "Ce champ ne peut pas etre vide!";
            $isSuccess = false;
        }
        elseif((preg_match("/^[0-9 ]* $/", $password)) || (preg_match_all("/^[a-zA-Z ]* $/", $password)))
        {
            $passwordError = "Ce champ ne doit contenir que des chiffres ou des lettres";
            $isSuccess = false;
        }

        // VALIDATION DES INPUTS DU FORMULAIRE POUR L'ENREGISTREMENT
        // INSERER LES DONNEES DANS LA DATABASE

        if($isSuccess)
        { 
            if( isset($name) && isset($surname) && isset($email) && isset($password))
            {
                $sql = "INSERT INTO personal_registration(name, surname, email, password) VALUES ('$name','$surname','$email','password')";
                $conn->exec($sql);
                
                if($conn->exec($sql))
                {
                    echo "Registration successfully";
                }
            }
        }
    }

?>