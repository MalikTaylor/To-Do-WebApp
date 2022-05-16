<?php
    DEFiNE("DB_USER", "b7cf48e69993dd");
    DEFINE("DB_PASS", "6123d9b6");
    DEFINE("DB_HOST", "us-cdbr-east-05.cleardb.net");
    DEFINE("DB_NAME", "heroku_d22a93da00c438d");

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
    OR die("Could not connect to MySQL" . mysqli_connect_error());
?>