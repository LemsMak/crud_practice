<?php
    include '../admin/database.php';

            // CAPTURER LES INPUTS DU FORMULAIRE ET LES SECURISER

   if(isset($_POST['Send']))
   {   
      $email = htmlspecialchars(stripslashes(trim(strtolower($_POST['Email']))));
      $password = htmlspecialchars(stripslashes(trim(strtolower($_POST['Password']))));
         
            // CONDITIONS

      if(empty($email))
      {
         $emailError = "Ce champ ne peut pas etre vide!";
      }
      elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
      {
         $emailError = "Ecrivez votre email correctement!";
      }
      if(empty($password))
      {
         $passwordError = "Ce champ ne peut pas etre vide!";
      }
      elseif((preg_match("/^[0-9 ]* $/", $password)) || (preg_match_all("/^[a-zA-Z ]* $/", $password)))
      {
         $passwordError = "Ce champ ne doit contenir que des chiffres ou des lettres";
      }
            // RECUPERER LES DONNEES DE LA DATABASE LORS DU LOGIN

      if(isset($email) && isset($password))
      {
         $sql = $conn->prepare("SELECT * FROM personal_registration");
         $sql->execute();

         $statement = $sql->setFetchMode(PDO::FETCH_ASSOC);
         $result= $sql->fetchAll();

        
         if($email === $result[0]['email'] || $email === $result[1]['email'])
         {
            if($password === $result[0]['password'] || $password === $result[1]['password'])
            {
                 //CONNECTER L'UTILISATEUR

               $_SESSION[0]['email'] = $result[0]['email']; 
               $_SESSION[1]['email'] = $result[1]['email']; 

                 // REDIRIGER LA PAGE

               header("Location:index.php");
            }
            else
            {
                 echo "Verifier votre mot de passe!"; 
            }
         }
         else
         {
             echo "Verifier votre email ou mot de passe!"; 
         }
        
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Boocic</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="../css/sign_up.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>

   <body>
        
    <div id="contact" class="contact">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h3>Login personal</h3>
                 </div>
              </div>
           </div>
           <div class="row">
            
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 offset-md-3">
                 <div class="contact">
                    
                    <form method="POST" action="">
                       <div class="row">
                           
                          <div class="col-sm-12">
                          <?php
                                 if (isset($emailError)):

                                       echo "<p style='color:red;'>" . $emailError . "</p>";
                                 endif; 
                              ?>
                             <input class="contactus" placeholder="Email" type="text" name="Email" >
                          </div>
                          
                          <div class="col-sm-12">
                          <?php
                                 if (isset($passwordError)):

                                       echo "<p style='color:red;'>" . $passwordError . "</p>";
                                 endif; 
                              ?>
                            <input class="contactus" placeholder="Password" type="password" name="Password" >
                         </div>
                          
                          <div class="col-sm-12">
                             <button class="send" name="Send">Login</button>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </div>
</body>
        
</html>