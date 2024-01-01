<?php
  require_once 'dbs.php';
  
  if(!isset($_GET['id'])) {
     echo '<script>location.href="./"</script>';
  }

  $id = $_GET['id'];

  $query = $dbs->prepare("DELETE FROM stories WHERE id = $id;");
  $result = $query->execute();

  if($result) {
    echo '<script>location.href="./?success=Deleted successfully!"</script>';
  } else {
    echo '<script>location.href="./?failed=Failed to delete!"</script>';
  }
?>