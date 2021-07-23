<?php 

session_start();
session_unset();
session_destroy();

header ("location: ../ui/index2.php");
exit();