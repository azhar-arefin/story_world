<?php
include_once ('header.php');
?>

    <?php
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

 require_once("dbs.php");

    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    } else {
        $search = '';
    }
    $query = $dbs->prepare("SELECT * FROM stories WHERE title LIKE '%$search%';");
    $query->execute();
    $stories = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row contents">
    <?php foreach($stories as $story) { ?>
        <div class="col-md-4">
            <div class="card mb-3" style="height: 420px;">
                <img src="<?= $story['thumbnail'] ?>" class="card-img-top"  alt="..." style="width: 100%; height:300px">
                <div class="card-body" >
                 <h6 class="card-title btn-link cursor-pointer" style="max-width: 100%;max-height: 80px;"
                  onclick='{location.href="bloge?id=<?= $story['id'] ?>"}'> <?= $story['title'] ?> </h6>
                 <p class="card-text"><small class="text-muted text-info"><?= date('g:i A, d M Y', strtotime($story['publish_at'])) ?></small></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<?php
require_once('footer.php');
?>