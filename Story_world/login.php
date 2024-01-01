<?php require("header.php"); ?>

<?php

#include('session.php');
include_once("dbs.php");#$dvs


    if(isset($_SESSION['users'])) {

        header("Location: index");

    }




if(isset($_POST['email'], $_POST['password'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = $dbs->prepare("SELECT * FROM users_form WHERE email = '$email' ;");
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);


        if(empty($user)) {
            echo '
                <div class="alert alert-warning">User not exists, please register first!</div>
            ';
        } else {
            if($user['password'] == $pass) {
                $_SESSION['users'] = $user;
                header("Location: index?success=Login Successfull!");

            } else {
                echo '
                    <div class="alert alert-warning">Invalid password!</div>
                ';
            }
        }

}


if(isset($_GET['success'])) {
    echo '
        <div class="alert alert-success">'.$_GET['success'].'</div>
    ';
} if(isset($_GET['failed'])) {
    echo '
        <div class="alert alert-danger">'.$_GET['failed'].'</div>
    ';
}

?>



<div class="login-container">

  <form class="px-4 mt-5 py-3" method="post" action="">
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control"
       name="email" placeholder="email@example.com">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password"
       placeholder="********">
    </div>

    <button type="submit" class="btn btn-primary"><a class="text-light" >Login</a></button>
  </form>

  <div class="dropdown-divider"></div>
    <a class="badge badge-secondary" href="sign_up.php">New around here? Sign up</a>
    <!--a class="dropdown-item" href="#">Forgot password?</a-->
</div>

<?php include_once( "footer.php"); ?>
