<style>
    /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");


.booking-form{
  margin-top: 50px;
}
.booking-form .form-control {
  
  background: #eee;
  border-radius: 0;
  border: 0;
  border-bottom: 1px solid white;
  color: #6c757d;
  font-weight: var(--font-weight-normal);
  padding-top: 12px;
  padding-bottom: 12px;
  margin-top: 15px;
  transition: all 0.3s;
}

.booking-form #submit-button {
  background: #6c757d;
  border-bottom: 0;
  font-weight: 700;
  color: white;
  text-transform: uppercase;
  margin-top: 35px;
}

.booking-form #submit-button:hover {
  background: black;
}
</style>
<!-- Banner -->
<?php
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
                                            $sqlQuery = "select sum(prix_unitaire)as pu from vente as v ,client as c,medicament as m where v.id_client=c.code_client and v.code_medicament=m.code_medicament";
                                            $requete = $db->prepare($sqlQuery);
                                            $requete->execute();
                                            $res = $requete->fetchAll();
                                            $pu=$res[0]['pu'];
                                            $sqlQuery = "select count(*)as nbrclient from client";
                                            $requete = $db->prepare($sqlQuery);
                                            $requete->execute();
                                            $res = $requete->fetchAll();
                                            $nbrclient=$res[0]['nbrclient'];

                                            $sqlQuery = "select count(*) as nbrmed from medicament";
                                            $requete = $db->prepare($sqlQuery);
                                            $requete->execute();
                                            $res = $requete->fetchAll();
                                            $nbrmed=$res[0]['nbrmed'];

                                            $sqlQuery = "select count(*) as nbrvent from vente";
                                            $requete = $db->prepare($sqlQuery);
                                            $requete->execute();
                                            $res = $requete->fetchAll();
                                            $nbrvent=$res[0]['nbrvent'];

                                            $sqlQuery = "select * from pharmacien";
                                            $requete = $db->prepare($sqlQuery);
                                            $requete->execute();
                                            $tabpharmacien = $requete->fetchAll();
                                            
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        if(isset($_POST['submit-button-editer'])) {
                                            // Retrieve form data
                                            try{
                                                $code_client = $_POST['code_client'];
                                                $cin = $_POST['cin'];
                                                $nom = $_POST['nom'];
                                                $prenom = $_POST['prenom'];
                                                $adress = $_POST['adress'];
                                                $Mdp = $_POST['password'];
                                                $email = $_POST['email'];
                                                $tel = $_POST['tel'];
                                                $date = $_POST['date'];
                                                $photo = $_POST['photo'];
                                                
                                                $sqlQuery = "UPDATE client SET cin='$cin', nom='$nom', prenom='$prenom', adress='$adress', Mdp='$Mdp', email='$email', tel='$tel', dateNais='$date', photo='$photo' WHERE code_client='$code_client'";
                                                $requete = $db->prepare($sqlQuery);
                                                $requete->execute();
                                            }catch (Exception $e) {
                                                die('Erreur : ' . $e->getMessage());
                                            }
                                            
                                        }
                                        ?>


<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bar-chart"></i> Analitycs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat"></i> Messages
                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bookmarks"></i> Collections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-4">
                    <li>
                        <div class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                            Contacts
                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-4">13</span>
                        </div>
                    </li>
                    <?php
                        foreach($tabpharmacien as $ele){
                            echo "
                            <li>
                            <a href='#' class='nav-link d-flex align-items-center'>
                                <div class='me-4'>
                                    <div class='position-relative d-inline-block text-white'>
                                        <img alt='Image Placeholder' src='".$ele['photo']."' class='avatar rounded-circle'>
                                        <span class='position-absolute bottom-2 end-2 transform translate-x-1/2 translate-y-1/2 border-2 border-solid border-current w-3 h-3 bg-success rounded-circle'></span>
                                    </div>
                                </div>
                                <div>
                                    <span class='d-block text-sm font-semibold'>
                                        ".$ele['nom']."
                                    </span>
                                    
                                    <span class='d-block text-xs text-muted font-regular'>
                                    ".$ele['tel2']."
                                    </span>
                                </div>
                                <div class='ms-auto'>
                                    <i class='bi bi-chat'></i>
                                </div>
                            </a>
                            </li>
                            ";
                        }
                    ?>
                </ul>
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">SwiftCure Admin Dashboard</h1>
                        </div>
                        <!-- Actions -->
                        
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item ">
                            <a href="adminDashboard.php" class="nav-link ">Medicament</a>
                        </li>
                        <li class="nav-item">
                            <a href="adminDashboard_clients.php" class="nav-link font-regular active">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a href="adminDashboard_vente.php" class="nav-link font-regular ">Vente</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <div class="booking-form" id="review">
                
                <h2 class="text-center mb-lg-3 mb-2">Editer Client</h2>
            
                <div class="containerL">
                    <form role="form" action="adminDashvoard_edit_client.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-5 mx-auto">
                                <input type="text" name="code_client" id="email"  class="form-control" placeholder="Code Client" required>
                                <input type="text" name="cin" id="cin" class="form-control" placeholder="Cin" required>
                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required>
                                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" required>
                                <input type="text" name="adress" id="adress" class="form-control" placeholder="Adress" required>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                <input type="tel" name="tel" id="tel" pattern="[0-9]{8}" class="form-control" placeholder="Phone: 123-456-7890">
                                <input type="date" name="date" id="date" value="" class="form-control">
                                <input type="text" name="photo" id="photo" value="" class="form-control" placeholder="Photo">
                            </div>
                            <div class="col-12">
                                
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                 <button type="submit" class="form-control" id="submit-button-editer" name="submit-button-editer">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
        
            </div>
    </div>
</div>