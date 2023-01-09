<?php
    include_once '../common.php';

    $result = validateSignUp();

    echo json_encode(
        array(
            'status' => $result['status'],
            'message' => $result['message']
        )
    );
