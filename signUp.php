

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
                                
                                session_destroy();
                            
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
            <div class="booking-form" id="review">
                
                <h2 class="text-center mb-lg-3 mb-2">Sign In</h2>
            
                <div class="containerL">
                    <form role="form" action="signUp.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-5 mx-auto">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-12">
                                
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                               
                                <?php
                                    
                                    if (!empty($_POST)) {
                                        $varemail = $_POST['email'];
                                        $varpassword = $_POST['password'];
                                    try {
                                        $db = new PDO(
                                            'mysql:host=localhost;dbname=bd_pharmacy;charset=utf8',
                                            'root',
                                            ''
                                        );
                                    } catch (Exception $e) {
                                        die('Erreur : ' . $e->getMessage());
                                    }
                                    try {
                                        $sqlQuery = "select code_client,email,mdp,isAdmin from client";
                                        $requete = $db->prepare($sqlQuery);
                                        $requete->execute();
                                        $res = $requete->fetchAll();
                                        
                                        foreach($res as $element){
                                            if(strtolower($element['email'])==strtolower($varemail) && $element['mdp']==$varpassword){
                                                session_start();
                                                $_SESSION['isConnected'] = true;
                                                $_SESSION['code_client']=$element['code_client'];
                                                $_SESSION['isAdmin']=$element['isAdmin'];
                                                if($element['isAdmin']==1){
                                                    header("Location: http://localhost/Gestion%20Pharmacie/adminDashboard.php");
                                                }
                                                else{
                                                    header("Location: http://localhost/Gestion%20Pharmacie/index.php");
                                                }
                                                
                                                
                                            }
                                        }
                                        echo "<div class='alert alert-danger' role='alert'>
                                        Client not Found!
                                        </div>"; 
                                        
                                    } catch (Exception $e) {
                                        die('Erreur : ' . $e->getMessage());
                                    }
                                    }

                                ?>
                                 <button type="submit" class="form-control" id="submit-button">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
                
        
            </div>
        </div>
    </body>
    </html>