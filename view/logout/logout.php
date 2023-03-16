<?php

session_start();
session_destroy();
header('location: /project-flower/index.php');
