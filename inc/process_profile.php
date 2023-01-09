<?php

$msg = "";
$css_class = "";

$msg2 = "";
$css_class2 = "";

$msg3 = "";
$css_class3 = "";

if (isset($_POST['save-profile-image'])) {
  $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
  $target = '../auth/assets/images/faces/' . $profileImageName;

  if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)) {
    // delete already existing image if any
    if (!empty($_SESSION['user_info']['profile_image'])) {
      unlink('../auth/assets/images/faces/' . $_SESSION['user_info']['profile_image']);
    }

    updateUserProfileImage($_SESSION['user_info']['id'], $profileImageName); // update db

    // refresh session user info variable
    $userInfo = getUserWithEmailAddress($_SESSION['user_info']['email']); // fetch updated info
    $_SESSION['user_info'] = modifyUserInfo($userInfo); // modify user info variable

    $msg = 'Image uploaded successfully';
    $css_class = 'alert-success';
  } else {
    $msg = 'Upload failed. Please try again.';
    $css_class = 'alert-danger';
  }
}

if (isset($_POST['save-personal-details'])) {
  if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['state']) || empty($_POST['country'])) {
    $msg2 = 'All fields must be filled in.';
    $css_class2 = 'alert-danger';
  } else { // All fields are filled

    updateUserPersonalDetails($_SESSION['user_info']['id'], $_POST); // update db

    $userInfo = getUserWithId($_SESSION['user_info']['id']);

    // save info to php session
    $_SESSION['is_logged_in'] = true;
    $_SESSION['user_info'] = modifyUserInfo($userInfo);

    $msg2 = 'Personal details updated successfully';
    $css_class2 = 'alert-success';
  }
}

if (isset($_POST['update-password'])) {
  if (empty($_POST['password']) || empty($_POST['confirm_password'])) {
    $msg = 'All fields must be filled in.';
    $css_class = 'alert-danger';
  } else { // All fields are filled

    if (strlen($_POST['password']) < 8) { //  validate password length
      $msg3 = 'Passwords must be at least 8 characters';
      $css_class3 = 'alert-danger';
    } elseif ($_POST['password'] != $_POST['confirm_password']) { // validate password match
      $msg3 = 'Passwords do not match';
      $css_class3 = 'alert-danger';
    } else { // all passes
      updateUserPassword($_SESSION['user_info']['id'], $_POST['password']); // update db

      $userInfo = getUserWithId($_SESSION['user_info']['id']);

      // save info to php session
      $_SESSION['is_logged_in'] = true;
      $_SESSION['user_info'] = modifyUserInfo($userInfo);

      $msg3 = 'Password updated successfully';
      $css_class3 = 'alert-success';
    }
  }
}
