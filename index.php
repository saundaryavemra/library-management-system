<?php
session_start();
// print($_SERVER['PHP_SELF']); exit;
define("DIR_CORE", "core/");

include (DIR_CORE . "constants.php");
include (DIR_CORE . "functions.php");


include (DIR_MODULES . "router.php");
include (DIR_MODULES . "db.php");

include (DIR_TEMPLATES . "head.php");
include (DIR_TEMPLATES . "header.php");
include (DIR_TEMPLATES . "page_{$page}.php");
include (DIR_TEMPLATES . "footer.php");


mysqli_close($connect);
