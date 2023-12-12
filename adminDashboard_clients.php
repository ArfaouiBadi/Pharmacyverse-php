<style>
    /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

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
                            <i class="bi bi-bookmarks"></i>
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
                            Pharmacien
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
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="adminDashvoard_edit_client.php" class="btn  btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                
                                <a href="adminDashvoard_delete_client.php" class="btn  btn-sm btn-danger mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-trash"></i>
                                    </span>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item ">
                            <a href="adminDashboard.php" class="nav-link ">Medicament</a>
                        </li>
                        <li class="nav-item">
                            <a href="adminDashboard_clients.php" class="nav-link font-regular active ">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a href="adminDashboard_vente.php" class="nav-link font-regular ">Vente</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Profit</span>
                                    <?php
                                    echo "
                                    <span class='h3 font-bold mb-0'>$".$pu.".00</span>
                                    ";
                                    ?>
                                        
                                        
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Clients</span>
                                        <span class="h3 font-bold mb-0"><?php echo $nbrclient?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Medicament</span>
                                        <span class="h3 font-bold mb-0"><?php echo $nbrmed?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Vente</span>
                                        <span class="h3 font-bold mb-0"><?php echo $nbrvent?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-minecart-loaded"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                    <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Applications</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">code_client</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date Naissance</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">CIN</th>
                                    <th scope="col">Adress</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    $sqlQuery = "select * from client";
                                    $requete = $db->prepare($sqlQuery);
                                    $requete->execute();
                                    $res = $requete->fetchAll();
                                    foreach($res as $element){
                                        echo "
                                <tr>
                                    <td>
                                        ".$element['code_client']."
                                    </td>
                                    <td>
                                        <img alt='...' src='".$element['photo']."' class='avatar avatar-xs rounded-circle me-2'>
                                        <a class='text-heading font-semibold' href='#'>
                                            ".$element['prenom']." ".$element['nom']."
                                        </a>
                                    </td> 
                                    <td>
                                        ".$element['dateNais']."
                                    </td>
                                    <td>
                                        <a class='text-heading font-semibold' href='#'>
                                        ".$element['email']."
                                        </a>
                                    </td>
                                    <td>
                                    ".$element['CIN']."
                                    </td>
                                    <td>
                                    ".$element['adress']."
                                    </td>
                                </tr>";
                                    }
                                     
                                    
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }
                                
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>