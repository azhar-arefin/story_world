<?php include_once('header.php'); ?>

<?php
    require_once('dbs.php');#$dbs

  
    if (isset($_POST['title'], $_FILES['tm_image'], $_POST['content'])){
    $title       =  $_POST['title'];
    $author      =  $_SESSION['users']['id'];

  
    #image Up
    $images      = explode('/', $_FILES['tm_image']['type']);
    $imagesup    = 'uploades/thumbnail/'.uniqid(). '.' .$images[1];

    move_uploaded_file($_FILES['tm_image']['tmp_name'], $imagesup);


    #text
    $contents    =    $_POST['content'];
    $path        =  'uploades/story/'.uniqid().'.txt';

    file_put_contents($path, $contents);

    $query = $dbs->prepare(" INSERT INTO  stories ( title, thumbnail, contents, author)
            VALUES ('$title', '$imagesup', '$path', '$author');");
    
    $result = $query->execute();
    
        if($result) {
           echo '<script> alert("Data Sent Succes");
           </script>'.
           header("Location: index?success=Blog Published Successfully!");
        
        } else {
            echo '
                <div class="alert alert-warning">Something Went wrong!</div>
            ';
        }
}

?>

<style>
     button{
        color: #0000; 
        height: 50px;
        width: 150px;
        font-size:x-large;
     }
</style>

    <!-- CReat Post -->
    <form class="p-5  border border-success rounded-2 creats" method="post" action="creat.php" enctype="multipart/form-data">

            <div class="col-md-12 mt-3">
                <label class="form-label" style="font-size: x-large;
                    font-style: italic;">Story Title:</label>
                <input type="text" class="form-control" name="title"
                 placeholder="Story Title (maximum 50 words)...." required>
            </div>

            <div class="col-md-12 mt-3">
                <label class="form-label" style="font-size: x-large;
                     font-style: italic;">Story Image/ Thumbnail:</label>
                <input type="file" accept=".jpeg, .png, .jpg" class="form-control" name="tm_image">
            </div>

            <div class="col-md-12 mt-3">
                <label class="form-label"style="font-size: x-large;
                 font-style: italic;"> STORY:</label>

                <textarea  style="background-color: rgb(237 239 243); color: #093e26;" 
                    class="form-control"  rows="10" name="content" placeholder="start content writing" required></textarea>
            </div>

            <div class="col-12 mt-5 fs-2">
                <button type="submit" name="submit" class="btn btn-primary"> Publish </button>
            </div>

        
    </form>


<?php include ("footer.php"); ?>