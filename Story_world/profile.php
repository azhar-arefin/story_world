<?php 
include('header.php'); 
include_once('dbs.php');
?>

<?php
$user = $_SESSION['users'];

?>
  <title>User Profile</title>
</head>
<body>

<div class="container mt-5">
<div class="row">
    <div class="col-md-4">
      <!-- User Profile Card -->
      <div class="card">
      <?php echo "<img src='" . $user['image'] . "' class='card-img-top' alt='Profile Picture' height='300px'>"; ?>
        <div class="card-body">
          <h5 class="card-title text-danger"> <?= $user['name']; ?>	</h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div>
   

    <div class="col-md-8">
      <!-- User Details -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User Details</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Email:</strong>     <?= $user['email']  ?>      </li>
            <li class="list-group-item"><strong>Location:</strong>  <?= $user['addres']  ?>  </li>
            <li class="list-group-item"><strong>Phone:</strong>     <?= $user['number']  ?>     </li>
          </ul>
        </div>
      </div>

      <!-- User Bio 
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Bio</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
-->

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 

<?php include ("footer.php"); ?>