<?php
session_start();
if ($_SESSION['isConnected'] == "false") {
}
if (!isset($_SESSION['isConnected'])) {
    // Redirect to signup.php
    header("Location: http://localhost/Gestion%20Pharmacie/signUp.php");
    exit();
}




?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SwiftCure Pharmacye</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/templatemo-medic-care.css" rel="stylesheet">

</head>

<body id="top">

    <main>
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
                            <a class="nav-link" href="index.php#review"></a>
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
                            function logout()
                            {
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
                                echo "<a class='nav-link' href=''>Logout</a>";
                                echo "<a class='nav-link' href='?logout'>Logout</a>";
                            }

                            ?>
                        </li>

                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <section class="hero" id="hero">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/slider/portrait-successful-mid-adult-doctor-with-crossed-arms.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/young-asian-female-dentist-white-coat-posing-clinic-equipment.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="images/slider/doctor-s-hand-holding-stethoscope-closeup.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="heroText d-flex flex-column justify-content-center">

                            <h1 class="mt-auto mb-2">
                                Better
                                <div class="animated-info">
                                    <span class="animated-item">health</span>
                                    <span class="animated-item">days</span>
                                    <span class="animated-item">lives</span>
                                </div>
                            </h1>

                            <p class="mb-4">
                                SwiftCure Pharmacy is not just a place to pick up prescriptions; it's a destination dedicated to your well-being. Our mission at SwiftCure is to provide prompt and efficient healthcare solutions, delivering a swift remedy to your health concerns. With a commitment to excellence, we strive to be your trusted partner on your journey to optimal health.</p>

                            <div class="heroLinks d-flex flex-wrap align-items-center">
                                <a class="custom-link me-4" href="#about" data-hover="Learn More">Learn More</a>

                                <p class="contact-phone mb-0"><i class="bi-phone"></i> +216 98147936</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">
                    <?php

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
                        $sqlQuery = "select * from pharmacien";
                        $requete = $db->prepare($sqlQuery);
                        $requete->execute();
                        $res = $requete->fetchAll();

                        $x = rand(0, 2);
                        echo "<div class='col-lg-6 col-md-6 col-12'>
                                        <h2 class='mb-lg-3 mb-3'>Meet " . $res[$x]['nom'] . "</h2>
                                        
            
                                        
                                    </div>
            
                                    <div class='col-lg-4 col-md-5 col-12 mx-auto'>
                                        <div class='featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center'>
                                            <p class='featured-text'><span class='featured-number'>" . $res[$x]['experience'] . "</span> Years<br> of Experiences</p>
                                        </div>
                                    </div>";
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }


                    ?>


                </div>
            </div>
        </section>

        <section class="gallery">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-6 ps-0">
                        <img src="images/gallery/medium-shot-man-getting-vaccine.jpg" class="img-fluid galleryImage" alt="get a vaccine" title="get a vaccine for yourself">
                    </div>

                    <div class="col-lg-6 col-6 pe-0">
                        <img src="images/gallery/female-doctor-with-presenting-hand-gesture.jpg" class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding pb-0" id="cured">
            <div class="container">
                <div class="row">

                    <h2 class="text-center mb-lg-5 mb-4">Get Cured</h2>
                    <h6 class="text-center describee">Describe your illness</h6>
                    <div class="booking-form">
                        <div class="containerL">
                            <form role="form" action="index.php" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" id="submit-button">Search for Medication</button>
                                    </div>
                                </div>
                            </form>
                            <br><br><br>

                            <?php
                            if (!isset($_POST['acheterMed'])) {
                                if (!empty($_POST)) {
                                    $varmessage = $_POST['message'];
                                    $tabMessage = explode(" ", $varmessage);
                                    $tabFinal = [];

                                    echo "<table class='table'>
                                <thead class='thead-dark'>
                                  <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>code_medicament</th>
                                    <th scope='col'>description</th>
                                    <th scope='col'>treatedFor</th>
                                    <th scope='col'>prix_unitaire</th>
                                    <th scope='col'></th> 
                                  </tr>
                                </thead>
                                <tbody>";

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
                                        $sqlQuery = "SELECT * FROM medicament";
                                        $requete = $db->prepare($sqlQuery);
                                        $requete->execute();
                                        $res = $requete->fetchAll();
                                        $c = 1;

                                        foreach ($res as $element) {
                                            $x = explode(" ", $element['treatedFor']);
                                            foreach ($x as $value) {
                                                if (in_array($value, $tabMessage)) {
                                                    echo "
                                                <form method='post' action=''>
                                                    <tr>
                                                        <th scope='row'>" . $c . "</th>
                                                        <td>" . $element['code_medicament'] . "</td>
                                                        <td>" . $element['description'] . "</td>
                                                        <td>" . $element['treatedFor'] . "</td>
                                                        <td>" . $element['prix_unitaire'] . "$</td>
                                                        <td>
                                                            <input type='hidden' name='code_medicament' value='" . $element['code_medicament'] . "'>
                                                            <button type='submit' name='acheterMed'>Acheter medicament</button>
                                                        </td>
                                                    </tr>
                                                </form>";
                                                    $c++;
                                                }
                                            }
                                        }

                                        echo "</tbody></table>";
                                    } catch (Exception $e) {
                                        die('Erreur : ' . $e->getMessage());
                                    }
                                }
                            }

                            if (isset($_POST['acheterMed'])) {
                                $codeMedicament = $_POST['code_medicament'];
                                $codeClient = $_SESSION['code_client'];

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
                                    $sqlQuery = "INSERT INTO vente (id_client, code_medicament) VALUES ($codeClient, $codeMedicament)";
                                    $requete = $db->prepare($sqlQuery);
                                    $requete->execute();
                                    echo "Medicament Achete!";
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }
                            }
                            if (isset($_POST["Review-button"])) {
                                // Retrieve form data
                                $codeClient = $_SESSION['code_client'];
                                $review = $_POST["review"];
                                $nbrstart = $_POST["nbrstart"];
                                $status = $_POST["status"];
                                // Check connection
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
                                    $sqlQuery = "INSERT INTO review (code_client, review, nbrstart, status)
                                    VALUES ('$codeClient', '$review', '$nbrstart', '$status')";
                                    $requete = $db->prepare($sqlQuery);
                                    $requete->execute();
                                    echo "Medicament Achete!";
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }
                            
                                // SQL INSERT statement (replace 'your_table_name' with your actual table name)
                                
                            
                                
                            
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-padding pb-0" id="reviews">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center mb-lg-5 mb-4">Our Patients Reviews</h2>
                        <div class='owl-carousel reviews-carousel'>
                            <?php
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
                                $sqlQuery = "SELECT * FROM client AS c JOIN review AS r ON r.code_client = c.code_client";
                                $requete = $db->prepare($sqlQuery);
                                $requete->execute();
                                $res = $requete->fetchAll();

                                foreach ($res as $ele) {
                                    echo "
                                            <figure class='reviews-thumb d-flex flex-wrap align-items-center rounded'>
                                                <div class='reviews-stars'>
                                        ";

                                    for ($i = 0; $i < $ele['nbrStart']; $i++) {
                                        echo "<i class='bi-star-fill'></i>";
                                    }

                                    while ($i < 5) {
                                        echo "<i class='bi-star'></i>";
                                        $i++;
                                    }

                                    echo "
                                                </div>
                                                <p class='text-primary d-block mt-2 mb-0 w-100'><strong>Best Health Care</strong></p>
                                                <p class='reviews-text w-100'>" . $ele['review'] . "</p>
                                                <img src='".$ele['photo']."' class='img-fluid reviews-image' alt=''>
                                                <figcaption class='ms-4'>
                                                    <strong>" . $ele['prenom'] . " " . $ele['nom'] . "</strong>
                                                    <strong>" . $ele['tel'] . "</strong>
                                                    <span class='text-muted'>" . $ele['status'] . "</span></figcaption>
                                            </figure>
                                        ";
                                }
                            } catch (Exception $e) {
                                die('Erreur : ' . $e->getMessage());
                            }
                            ?>
                            


                        </div>

                    </div>
                </div>
        </section>

        <section class="section-padding" id="booking">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="booking-form">

                            <h2 class="text-center mb-lg-3 mb-2">Review Our Services</h2>

                            <form role="form" action="#booking" method="post">
                                <div class="row">
                                
                                    
                                    <div class="col-lg-6 col-12">
                                        <input type="text" name="review" id="description" class="form-control" placeholder="review" required>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <input type="text" name="nbrstart" id="tel" class="form-control" placeholder="0" required>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <input type="text" name="status" id="Status" class="form-control" placeholder="status" required>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                        <button type="submit" class="form-control" id="Review-button " name="Review-button">Review</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer section-padding" id="contact">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 me-auto col-12">
                    <h5 class="mb-lg-4 mb-3">Opening Hours</h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            Sunday : Closed
                        </li>

                        <li class="list-group-item d-flex">
                            Monday, Tuesday - Firday
                            <span>8:00 AM - 3:30 PM</span>
                        </li>

                        <li class="list-group-item d-flex">
                            Saturday
                            <span>10:30 AM - 5:30 PM</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                    <h5 class="mb-lg-4 mb-3">Our Pharmacye</h5>

                    <p><a href="mailto:swiftcure@gmail.com">swiftcure@gmail.com</a>
                    <p>

                    <p>Siliana dawla </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12 ms-auto">
                    <h5 class="mb-lg-4 mb-3">Socials</h5>

                    <ul class="social-icon">
                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-12 ms-auto mt-4 mt-lg-0">
                    <p class="copyright-text">Copyright © SwiftCure Pharmacye 2021

                </div>

            </div>
            </section>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/custom.js"></script>
    <!--

TemplateMo 566 SwiftCure Pharmacye

https://templatemo.com/tm-566-medic-care

-->
</body>

</html>