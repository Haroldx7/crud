<?php
session_destroy();
$sesion = true;
header("Location: ../../view/index.php?s=".urldecode($sesion));
