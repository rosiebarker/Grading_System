<?php
//start the sess to ger  variables
session_start();

//end session variables
session_unset();

//end session
session_destroy();

header('Location: logout.php');  
exit();
?>