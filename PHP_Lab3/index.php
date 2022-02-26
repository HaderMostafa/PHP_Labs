<?php

require_once "vendor/autoload.php";
session_start();

echo "Counted Unique Visitors: ";

if (!isset($_SESSION["is_counted"])) {

    Counter::increase();
    $_SESSION["is_counted"] = true;

}

echo (file("count.txt")[0]);