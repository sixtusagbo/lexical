<?php

include_once '../common.php';

session_destroy();

header('Location: ../pages/login');
