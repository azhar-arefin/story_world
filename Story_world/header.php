<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stort World</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navi Gation -->
<div class="container mt-1">
    <?php
       include_once ('session.php');
    ?>
        
        
        <nav class="navbar navbar-expand-lg navbar-light" id="navbg"> 
            <div class="navbar-collapse col-sm-11" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a style="color: #fd7e14;" class="text-uppercase font-weight-bold nav-link" href="index">Home </a>
                    </li>

                    <!-- Creat Post -->
                    <?php if(isset($_SESSION['users'])) { ?>
                    <li class="nav-item">
                        <a class="text-success nav-link" aria-current="page" href="creat">Creat Post</a>
                    </li>

                    <li class="nav-item">
                        <a class="text-warning nav-link " href="my_bloge">My Bloge</a>
                    </li>

                    <li class="nav-item">
                        <a class="text-danger font-weight-bold nav-link" href="logout">Logout</a>
                    </li>

                    <?php } else { ?>

                    <li class="nav-item">
                        <a class="text-light nav-link" href="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" href="sign_up">Sign-up</a>
                    </li>
                    <?php }?>
                </ul>
                <?php if(isset($_SESSION['users'])) { ?>
        
                <form class="form-inline text-warning  my-lg-0 searcha">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn text-danger btn-outline-success bg-warning my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php } ?>    

            </div>
              
            <!-- Profile -->
            <?php
             if(isset($_SESSION['users'])) { 
                $user = $_SESSION['users'];
            ?>
            
            <div style="text-align: center;" class="col-sm-1">
                <a href="profile.php" class="button btn-succes">
                    <img src="<?= $user['image'];?>" alt="" class=" rounded-circle" style="height: 40px; width:40px;">
                     <p class="text-danger">Profile</p>
                </a>
            </div>            
          <?php } ?>      
        </nav>
   
        <center>
            <div class="spinner-border loader" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </center>
        
