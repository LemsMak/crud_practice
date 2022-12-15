<?php
    include 'database.php';

    if(isset($_POST['Send']))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];

        $sql = $conn->prepare("INSERT INTO congolese(first_name, last_name, email, ville) VALUES ('$first_name','$last_name','$email','$ville')");
        $statement = $sql->execute();

        if($statement)
        {
            echo "Registration successfully";
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
                    <h3>Enregistrement des congolais</h3>
                 </div>
              </div>
           </div>
           <div class="row">
            
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 offset-md-3">
                 <div class="contact">
                    
                    <form method="POST">
                       <div class="row">
                           
                          <div class="col-sm-12">
                              <input class="contactus" placeholder="First Name" type="text" name="first_name" >
                          </div>

                          <div class="col-sm-12">
                            <input class="contactus" placeholder="Last Name" type="text" name="last_name" >
                         </div>
                         
                          <div class="col-sm-12">
                             <input class="contactus" placeholder="Email" type="text" name="email" >
                          </div>
                          
                          <div class="col-sm-12">
                            <input class="contactus" placeholder="Ville" type="text" name="ville" >
                         </div>
                          
                          <div class="col-sm-12">
                             <button class="send" name="Send">Registration</button>
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