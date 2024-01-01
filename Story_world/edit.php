<?php include('header.php') ?>
<?php
    require_once('dbs.php');

    if(!isset($_SESSION['users'])) {
        header("Location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("Location: index?failed=Access denied!");
    }

    // session ar user ar id author a rakha
    $author = $_SESSION['users']['id'];
    $id = $_GET['id'];

    if (isset($_POST['title'], $_GET['id'], $_POST['content'])) {
        $title = $_POST['title'];
        $query = $dbs->prepare("SELECT * FROM stories WHERE id = $id AND author = $author;");
        $query->execute();
        $story = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($_FILES['thumbnail']['name'])) {
            $thumbnailExt = explode('/', $_FILES['thumbnail']['type']);
            $thumbnail = 'uploades/thumbnail/'.uniqid().'.'.$thumbnailExt[1];
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail);
            unlink($story['thumbnail']);
        } else {
            $thumbnail = $story['thumbnail'];
        }

        
        $content = $_POST['content'];
        $path = 'uploades/story/'.uniqid().'.txt';
        file_put_contents($path, $content);
        unlink($story['path']);

        $query = $dbs->prepare("
                UPDATE stories SET 	title='$title', thumbnail='$thumbnail', contents='$path' WHERE id = $id AND author = $author;
            ");
        $result = $query->execute();

        if($result) {
            header("Location: my_bloge?success=Blog updated Successfully!");
        } else {
            echo '
                <div class="alert alert-warning">Something Went wrong!</div>
            ';
        }
    }

    $query = $dbs->prepare("SELECT * FROM stories WHERE id = $id AND author = $author;");
    $query->execute();
    $story = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($story)) {
        header("Location: my_bloge?failed=Blog not found!");
    }
    $content = file_get_contents($story['contents']);
?>

<form class="row g-3 p-5" method="post" action="edit.php?id=<?= $id ?>" enctype="multipart/form-data">
  <div class="col-md-12">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value="<?= $story['title'] ?>" placeholder="The dark night" required>
  </div>
  <div class="col-md-12">
    <label class="form-label">Thumbnail <img src="<?= $story['thumbnail'] ?>" width="300"></label>
    <input type="file" accept=".jpeg, .png, .jpg" class="form-control" name="thumbnail">
  </div>
  <div class="col-md-12">
    <label class="form-label">Blog Description</label>
    <textarea  class="form-control" rows="10" name="content" placeholder="Content" required> <?= $content ?> </textarea>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary mt-2">Update</button>
  </div>
</form>
<?php include('footer.php') ?>
