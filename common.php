<?php
// access php session
session_start();

// include config (creds)
include_once __DIR__ . (PHP_OS == 'Linux' ? '' : '/') . '/config/config.php';

// include global functions
include_once __DIR__ . '/inc/functions.php';
