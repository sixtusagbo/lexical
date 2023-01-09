<?php
    include_once '../common.php';

    // Validate form

    if ( empty( $_POST['email'] ) || empty( $_POST['password'] ) ) {
        $status = 'fail';
        $message = 'All fields must be filled in';
    } else { // allFieldsFilledIn
        $userInfo = getUserWithEmailAddress( trim( $_POST['email'] ) );

        if ( empty( $userInfo ) ) {
            $status = 'fail';
            $message = 'Invalid Email or Password';
        } elseif ( !password_verify( $_POST['password'], $userInfo['password'] ) ) { // validate password
            $status = 'fail';
            $message = 'Incorrect password supplied!';
        } else { // all passes
            $status = 'ok';
            $message = '';

            // save info to php session
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_info'] = modifyUserInfo($userInfo); // modify user info variable
        }

    }

    echo json_encode(
        array(
            'status' => $status,
            'message' => $message
        )
    );

