<?php
session_start();
session_destroy();
header("Location: ../login/login.php?message=Successfully logged out");
exit();
