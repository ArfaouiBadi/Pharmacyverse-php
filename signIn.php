

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>SwiftCure Pharmacye</title>
  
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">

    </head>
    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#cured">Get Cured</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#review">Review</a>
                        </li>
                        <a class="navbar-brand d-none d-lg-block" href="index.php">
                            SwiftCure Pharmacye
                            <strong class="d-block">Health Specialist</strong>
                        </a>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="signUp.php">Sign In</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="signIn.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            function logout() {
                                // Unset all session variables
                                $_SESSION = array();
                            
                                // Destroy the session
                                session_destroy();
                            
                                // Redirect to the login page (adjust the location as needed)
                                header("Location: signUp.php");
                                exit();
                            }
                            if (isset($_GET['logout'])) {
                                logout();
                            }
                            if (isset($_SESSION['isConnected'])) {

                                echo "<a class='nav-link' href='?logout'>Logout</a>";
                                
                            }
                            
                            ?>
                        </li>

                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    <body id="">
        <div class="col-lg-8 col-12 mx-auto">
            <div class="booking-form">
                
                <h2 class="text-center mb-lg-3 mb-2">Sign Up</h2>
            
                <div class="containerL">
                    <form role="form" action="signIn.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-5 mx-auto">
                                
                                <input type="text" name="cin" id="cin" class="form-control" placeholder="Cin" required>
                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required>
                                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" required>
                                <input type="text" name="adress" id="adress" class="form-control" placeholder="Adress" required>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                <input type="tel" name="tel" id="tel" pattern="[0-9]{8}" class="form-control" placeholder="Phone: 123-456-7890">
                                <input type="date" name="date" id="date" value="" class="form-control">
                                <input type="text" name="photo" id="photo" value="" class="form-control">

                                <?php
                                
                                if (!empty($_POST)) {
                                    $varcin = $_POST['cin'];
                                    $varnom = $_POST['nom'];
                                    $varprenom = $_POST['prenom'];
                                    $vardate = $_POST['date'];
                                    $varadress = $_POST['adress'];
                                    $varemail = $_POST['email'];
                                    $varpassword = $_POST['password'];
                                    $vartel = $_POST['tel'];
                                    $varphoto = $_POST['photo'];
                                    
                                try {
                                    $db = new PDO(
                                        'mysql:host=localhost;dbname=bd_pharmacy;charset=utf8',
                                        'root',
                                        ''
                                    );
                                } catch (Exception $e) {
                                    echo 'Erreur : ' . $e->getMessage();
                                } 
                                try {
                                    
                                    $sqlQuery1 = "select count(*) from client where email='$varemail'";
                                    
                                    $requete1 = $db->prepare($sqlQuery1);
                                    
                                    $requete1->execute();
                                    
                                    $res1 = $requete1->fetchAll();
                                    
                                    if($res1[0]['count(*)']!=0){
                                        echo "<div class='alert alert-danger' role='alert'>
                                        User Already Exists!
                                        </div>"; 
                                        
                                    }
                                    else{
                                        try{
                                            $sqlQuery = "INSERT INTO client(cin,nom,prenom,dateNais,email,adress,tel,mdp,photo)
                                            VALUES('$varcin','$varnom','$varprenom','$vardate','$varemail','$varadress','$vartel','$varpassword','$varphoto')";
                                            $requete = $db->prepare($sqlQuery);
                                            $requete->execute();
                                            echo "<br><br>";
                                            
                                            echo "<div class='alert alert-succes' role='alert'>
                                                    Insertion d'un Client Affectuee avec Succes!
                                                    </div>"; 
                                            
                                            
                                        }catch (Exception $e) {
                                            echo 'Erreur : ' . $e->getMessage(); 
                                        }
                                    }

                                }catch(Exception $e){
                                    echo 'Erreur : ' . $e->getMessage(); 
                                }}

                                ?>
                            </div>
                            <div class="col-12">
                                
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control" id="submit-button">Sign Up</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
                            