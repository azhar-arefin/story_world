<?php

include_once 'session.php';

unset($_SESSION['users']);

header('Location: login?success=Logged Out!');

?>