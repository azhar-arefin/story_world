<?php require_once('header.php'); ?>
<!-- Insert Sign up page -->
<?php
include_once('dbs.php');//$dbs

include_once 'session.php';
if(isset($_SESSION['users'])) {
    header("Location: index");
}

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    
    $name      =  $_POST['name'];
    $number    =  $_POST['number'];
    $addres    =  $_POST['addres']; 
    $email     =  $_POST['email'];
    $gender    =  $_POST['gender']; 
    $password  =  $_POST['password'];

    #image Up
    $image = explode(".", $_FILES['image_up']['name']);
    $imageup = 'images/' .uniqid() . '.' .$image[1];
    move_uploaded_file($_FILES['image_up']['tmp_name'], $imageup);



    $query = $dbs->prepare("SELECT  * FROM users_form WHERE email='$email';");
    $query->execute();
    $existingUser = $query->fetch(PDO::FETCH_ASSOC);


    if(!empty($existingUser)){
        echo '
        <div class="alert alert-warning">Email alreay exists!</div>
    ';
    }else {
        
        $query = $dbs->prepare("INSERT INTO users_form (name, number, addres, email, gender, password, image)
        VALUES ('$name', '$number', '$addres', '$email', '$gender', '$password', '$imageup');");

        $result = $query->execute();

        if($result) {
            header("Location: login?success=Registration Successfull!");
        } else {
            echo '
                <div class="alert alert-warning">Something Went wrong!</div>
            ';
        }
    }


}
?>

    <form class="mt-5 g-3 p-4 bg-warning bg-gradient"
     method="post"  enctype="multipart/form-data" action="sign_up.php">
        <!-- Name-->
        <div class="col-md-12">
            <label class="form-label">Full Name:</label>
            <input type="text" class="form-control"
             name="name" placeholder="Enter Your Full Name" required>
        </div>

        <!-- Number-->
        <div class="col-md-12">
            <label class="form-label">Number:</label>
            +88  <input type="number" name="number" 
            class="form-control" placeholder="01*********" required>
        </div>

        <!-- Addres -->
        <div class="col-md-12">
            <label class="form-label">Addres:</label>
           <input type="text" name="addres"  
            class="form-control" placeholder="Enter Your Addres">
        </div>

        <!-- E-mail -->
        <div class="col-md-12">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" 
             name="email" placeholder="******@gmail.com" required>
        </div>
        <!--5 select --> 
        <div class="col-md-12">
         <label for="Gender" class="form-label">Gender:</label>
            <select  name="gender" required style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="select">select</option>
                <option> Male </option>
                <option> Female </option>
            </select>
        </div>
        <!--6 Image-->
        <div class="col-md-12">
            <label for="Image" class="form-label">Image:</label>
            <input type="file" accept=".jpeg, .png, .jpg" class="form-control"
             name="image_up" required>
        </div>  
        <!-- Password-->
        <div class="col-md-12">
            <label class="form-label">Password:</label>
            <input type="password" class="form-control" 
             name="password" placeholder="******" required>
        </div>

        <!-- Button-->
        <div class="col-12">
         <button style="width: 130px; height: 60px;" type="submit" 
          class="font-weight-bold btn mt-3 btn-primary">Sign Up</button>
        </div>

    </form>



<?php include_once ("footer.php"); 