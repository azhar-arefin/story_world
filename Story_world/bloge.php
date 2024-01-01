<?php include('header.php'); ?>
<?php
    require_once('dbs.php');
    include_once 'session.php';


    if(!isset($_SESSION['users'])) {
        header("Location: login");
         exit;
    }
    if(!isset($_GET['id'])) {
        header("Location: index?failed=Access denied!");
         exit;
    }
    $id = $_GET['id'];

    $query = $dbs->prepare("SELECT * FROM stories WHERE id = $id;");
    $query->execute();
    $story = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($story)){
        header("Location: index?failed=Blog not found!");
         exit;
    }
    $content = file_get_contents($story['contents']);
?>
<style>
pre {
    overflow-x: auto;
    white-space: pre-wrap;
    white-space: -moz-pre-wrap;
    white-space: -pre-wrap;
    white-space: -o-pre-wrap;
    word-wrap: break-word;
    display: block;
    font-size: 87.5%;
    color: #212529;
}
</style>
<div class="row">
    <div class="col-md-10 mx-auto mt-2">
        <div class="card mb-3">
            <img src="<?= $story['thumbnail'] ?>" class="card-img-top"  alt="..." style="max-width: 100%;height:350px">
            <div class="card-body">
                <h5 class="card-title text-center text-info mb-2"><?= $story['title'] ?></h5> 
                <pre> <?= $content ?></pre>
                <p class="card-text"><small class="text-muted"><?= date('g:i A, d M Y', strtotime($story['publish_at'])) ?></small></p>
            </div>
        </div>
    </div>      
<?php
if(isset($_POST['submit'])){
    $comment = $_POST['comments'];
    $_SESSION['comments'] = $comment;
}
$sess = $_SESSION['comments'] ;  
?>   

<div class="col-md-10 mx-auto mt-2  mb-5">
    <div class="card mt-2 bg-dark">
        <h1 class="text-center text-info"> Comment Box</h1> <hr>
        <form action="" method="post" class="card-body">
            <input class="btn btn-outline-info" type="submit" value="comment" name="submit">
            <input class="input col-8" type="text" name="comments" id=""  placeholder="writing your Comment...">
        </form>
    </div>
<!-- Comment -->

    <div class="card mt-2 p-1">
        <p> This is some text within a card body. <?= $sess; ?> </p>
    </div>   
    <div class="card mt-2 p-1">
        <p> This is some text within a card body. <?= $sess; ?> </p>
    </div>  
    <div class="card mt-2 p-1">
        <p> This is some text within a card body. <?= $sess; ?> </p>
    </div>  


</div>        
</div>           

<?php include('footer.php') ?>

