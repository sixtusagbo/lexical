<?php
include_once '../common.php';

$result = validateCashOut();

echo json_encode(
    array(
        'status' => $result['status'],
        'message' => $result['message']
    )
);
