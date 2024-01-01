<?php include('header.php') ?>

<?php
#session_start();
if(!isset($_SESSION['users'])) {
    header("Location: login.php");
}

 require_once("dbs.php");
 
   # $query = $dbs->prepare("SELECT * FROM stories WHERE id = $story_id");
   # $query->execute();
   # $stories = $query->fetchAll(PDO::FETCH_ASSOC);

   
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
<?php
require_once('dbs.php');
$author = $_SESSION['users']['id'];

if(isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
}
$query = $dbs->prepare("SELECT * FROM stories WHERE author = $author AND title LIKE '%$search%';");
$query->execute();
$stories = $query->fetchAll(PDO::FETCH_ASSOC);
?>





<div class="row">
<?php foreach($stories as $story) { ?>
    <div class="col-md-4 mt-4">
        <div class="card mb-3">
            <img src="<?= $story['thumbnail'] ?>" class="card-img-top"  alt="..."  style="width: 100%; height:300px">
            <div class="card-body">
                <h5 class="card-title btn-link cursor-pointer" 
                    onclick='{location.href="bloge?id=<?= $story['id'] ?>"}'"><?= $story['title'] ?></h5>

                <div class="d-flex justify-content-between">
                     <p><a class="text-success" href="edit?id=<?= $story['id'] ?>">Edit</a></p>
                     <p><a onclick="deleteStory(<?= $story['id'] ?>)" class="btn btn-sm text-danger">Delete</a></p>

                </div>
                
                <p class="card-text"><small class="text-muted"><?= date('g:i A, d M Y', strtotime($story['publish_at'])) ?></small></p>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<script>
     function deleteStory(id) {
         let confirmed = confirm('Are you sure?');

        if(confirmed) {
            location.href = "delete?id="+id;
        }
     }
</script>
<?php include('footer.php') ?>
