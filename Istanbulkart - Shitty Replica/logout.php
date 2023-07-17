<?php

session_start();
session_destroy();

header("Location: indexMine.php");
exit;