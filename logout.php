<?php
@session_start();
// *** Logout the current user.
$logoutGoTo = "index.php";
session_destroy();
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
