<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/Job%20for%20All/Job-for-All/index.php");
    die();