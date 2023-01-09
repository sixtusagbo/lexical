<?php

/**
 * Get Page Title
 * 
 * @param string $filename
 * 
 * @return string $pageTitle
 */
function getPageTitle($filenameFromUrl)
{
    $pageTitle = '';
    $filename = strtolower($filenameFromUrl);

    switch ($filename) {
        case 'home':
            $pageTitle = 'Home';
            break;
        case 'login':
            $pageTitle = 'Log In';
            break;
        case 'signup':
            $pageTitle = 'Sign Up';
            break;
        case 'dashboard':
            $pageTitle = 'Dashboard';
            break;
        case 'testimonial':
            $pageTitle = 'Testimonials';
            break;
        case 'contact':
            $pageTitle = 'Contact Us';
            break;
        case 'faq':
            $pageTitle = 'FAQs';
            break;
        case 'payments':
            $pageTitle = 'Payments';
            break;
        default:
            $pageTitle = '';
            break;
    }

    return $pageTitle;
}

/**
 * Get DB connection
 * 
 * @param void
 * 
 * @return database connection
 */
function getDatabaseConnection()
{
    try { // connect to database and return connections
        $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        return $conn;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

/**
 * Get user with email address
 * 
 * @param string $email
 * 
 * @return array $userInfo
 */
function getUserWithEmailAddress($email)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                *
            FROM 
                users 
            WHERE 
                email = :email 
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'email' => trim($email)
    ));

    // get and return user
    $user = $stmt->fetch();
    return $user;
}

/**
 * Get user with id
 * 
 * @param int $id
 * 
 * @return array $userInfo
 */
function getUserWithId($id)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                *
            FROM 
                users 
            WHERE 
                id = :id 
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'id' => trim($id)
    ));

    // get and return user
    $user = $stmt->fetch();
    return $user;
}

/**
 * Check if user is logged in
 * 
 * @param void
 * 
 * @return boolean
 */
function isLoggedIn()
{
    if ((isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) && (isset($_SESSION['user_info']) && $_SESSION['user_info'])) { //check session variables, user is logged in
        return true;
    } else { // user is not logged in
        return false;
    }
}

/**
 * Validate sign up form
 * 
 * @return array $result
 */
function validateSignUp()
{
    $result = array(
        'status' => '',
        'message' => ''
    );

    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password']) || empty($_POST['phone_number']) || empty($_POST['coupon_code'])) {
        $result['status'] = 'fail';
        $result['message'] = 'All fields must be filled in.';
    } else { // All fields are filled
        $userInfo = getUserWithEmailAddress(trim($_POST['email']));

        if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $result['status'] = 'fail';
            $result['message'] = 'Invalid Email';
        } elseif (!empty($userInfo)) { // user already exists with that email
            $result['status'] = 'fail';
            $result['message'] = 'Email address already registered';
        } elseif (strlen($_POST['password']) < 8) { //  validate password length
            $result['status'] = 'fail';
            $result['message'] = 'Passwords must be at least 8 characters';
        } elseif (strlen($_POST['phone_number']) > 11) { //  validate phone number length
            $result['status'] = 'fail';
            $result['message'] = 'Phone number must not be more than 11 digits';
        } elseif (!isValidCoupon($_POST['coupon_code'])) { //  validate coupon code
            $result['status'] = 'fail';
            $result['message'] = 'Invalid coupon code!';
        } elseif ($_POST['password'] != $_POST['confirm_password']) { // validate password match
            $result['status'] = 'fail';
            $result['message'] = 'Passwords do not match';
        } elseif (!signUserUp($_POST)) { // validate insert into dbase
            $result['status'] = 'fail';
            $result['message'] = 'Sign up was unsuccessful. Please try again.';
        } else { // all passes
            // check for referrals
            if ($_POST['ref'] != '') {
                rewardReferrer($_POST['ref']);
            }

            $userInfo = getUserWithEmailAddress(trim($_POST['email']));

            // modify user info variable
            $modifiedUserInfo = modifyUserInfo($userInfo);

            // update coupons in db
            updateCouponUser($userInfo['id'], $_POST['coupon_code']);

            // save info to php session
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_info'] = $modifiedUserInfo;

            $result['status'] = 'ok';
            $result['message'] = 'Hey! You have successfully registered.';
        }
    }

    return $result;
}

/**
 * Reward referrer
 * 
 * @param $userId
 * 
 * @return void
 */
function rewardReferrer($userId)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET referrals = referrals + 1, referral_earnings = referral_earnings + 1200
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $userId,
    ));
}

/**
 * Get coupon details from db with code
 * 
 * @param string $code
 * 
 * @return array $codeInfo
 */
function getCouponWithCode($code)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                *
            FROM 
                coupons 
            WHERE 
                coupon = :coupon 
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'coupon' => trim($code)
    ));

    // get and return coupon
    $code = $stmt->fetch();
    return $code;
}

/**
 * Check if coupon is valid
 * 
 * @param string code
 * 
 * @return boolean
 */
function isValidCoupon($code)
{
    $codeInfo = getCouponWithCode($code);

    if (empty($codeInfo) || $codeInfo['user_id'] != '') {
        return false;
    } else {
        return true;
    }
}

/**
 * Update coupon user
 * 
 * @param int $userId
 * @param string $code
 * 
 * @return void
 */
function updateCouponUser($userId, $code)
{
    $codeInfo = getCouponWithCode($code);

    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE coupons
            SET user_id = :userId
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $codeInfo['id'],
        'userId' => $userId,
    ));
}

/**
 * Update user login bonus
 * 
 * @param $userId
 * 
 * @return void
 */
function updateUserLogins($userId)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET task_earnings = task_earnings + 100
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $userId,
    ));
}

/**
 * Update user last login
 * 
 * @param $userId
 * 
 * @return void
 */
function updateUserLastLogin($userId)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET last_login = :loginTime
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $userId,
        'loginTime' => date('Y-m-d H:i:s'),
    ));
}

/**
 * Modify user info variable
 * 
 * @param array $userInfo
 * 
 * @return array $userInfo
 */
function modifyUserInfo(array $userInfo)
{
    $today = date('Y-m-d');
    $last_login = date('Y-m-d', strtotime($userInfo['last_login']));

    // update user login bonus
    if ($today > $last_login) {
        updateUserLogins($userInfo['id']);
    }

    $userInfo['full_name'] = $userInfo['first_name'] . ' ' . $userInfo['last_name'];
    $userInfo['total_earnings'] = $userInfo['referral_earnings'] + $userInfo['task_earnings'];

    updateUserLastLogin($userInfo['id']);

    return $userInfo;
}

/**
 * Automatically generate a Unique Coupon Code
 *
 * @return $coupon
 */
function generateCoupon()
{
    $coupon = '';

    for ($i = 0; $i < 5; $i++) {
        $coupon .= rand(0, 1) ? rand(1, 9) : chr(rand(ord('A'), ord('Z')));
    }
    $coupon = 'LP' . $coupon;
    addNewCoupon($coupon); // Add coupon to database

    return $coupon;
}

/**
 * Add a new user to database
 * 
 * @param array $info
 * 
 * @return int $userId
 */
function signUserUp($info)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            INSERT INTO
            users (
                first_name,
                last_name,
                email,
                password,
                phone_number,
                coupon_code
            )
            VALUES (
                :first_name,
                :last_name,
                :email,
                :password,
                :phone_number,
                :coupon_code
            )
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'first_name' => trim($_POST['first_name']),
        'last_name' => trim($_POST['last_name']),
        'email' => trim($info['email']),
        'password' => isset($info['password']) ? hashedPassword($info['password']) : '',
        'phone_number' => trim($info['phone_number']),
        'coupon_code' => trim($info['coupon_code']),
    ));

    // return id of inserted row
    return $databaseConnection->lastInsertId();
}

/**
 * Update user password
 * 
 * @param int $userId
 * @param string $newPassword
 * 
 * @return void
 */
function updateUserPassword($userId, $newPassword)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET password = :new_password
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $userId,
        'new_password' => hashedPassword($newPassword),
    ));
}

/**
 * Update user personal details
 * 
 * @param int $userId
 * @param array $info
 * 
 * @return void
 */
function updateUserPersonalDetails($userId, $info)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number, state = :state, country = :country
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $userId,
        'first_name' => $info['first_name'],
        'last_name' => $info['last_name'],
        'email' => $info['email'],
        'phone_number' => $info['phone_number'],
        'state' => $info['state'],
        'country' => $info['country'],
    ));
}

/**
 * Add a new coupon to database
 * 
 * @param array $info
 * 
 * @return int $userId
 */
function addNewCoupon(string $code)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            INSERT INTO
            coupons (
                coupon
            )
            VALUES (
                :code
            )
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'code' => $code,
    ));

    // return id of inserted row
    return $databaseConnection->lastInsertId();
}

/**
 * Update user profile image
 * 
 * @param array $userId
 * 
 * @return void
 */
function updateUserProfileImage($userId, $imageUrl)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET profile_image = :pp
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $userId,
        'pp' => $imageUrl,
    ));
}

/**
 * Get all unused coupons
 * 
 * @return array $coupons
 */
function getUnusedCoupons()
{
    // get database connection
    $databaseConnection = getDatabaseConnection();
    $databaseConnection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                coupon
            FROM 
                coupons 
            WHERE 
                user_id <=> :unusedCoupons
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'unusedCoupons' => null
    ));

    // get and return coupons
    $coupons = $stmt->fetchAll();
    return $coupons;
}

/**
 * Check if today is withdrawal day
 * 
 * @param string $file
 * 
 * @return boolean
 */
function isWithdrawalDay(string $file)
{
    $isCashOutDay = (bool) file_get_contents($file);

    // var_dump($isCashOutDay);
    return $isCashOutDay;
}

/**
 * Set cashout day
 * 
 * @param string $file
 * @param bool $value
 * 
 * @return void
 */
function setCashOutDay(string $file, bool $value)
{
    file_put_contents($file, (string) $value);
}

/**
 * Validate cash out form
 * 
 * @return array $result
 */
function validateCashOut()
{
    $result = array(
        'status' => '',
        'message' => ''
    );

    if (empty($_POST['withdrawalType']) || empty($_POST['date']) || empty($_POST['amount']) || empty($_POST['bankName']) || empty($_POST['accountNumber'])) {
        $result['status'] = 'fail';
        $result['message'] = 'All fields must be filled in.';
    } else { // All fields are filled

        if (strlen($_POST['accountNumber']) != 10) { //  validate account number length
            $result['status'] = 'fail';
            $result['message'] = 'Account number must be 10 digits';
        } elseif ($_POST['amount'] < 1000) { //  validate amount
            $result['status'] = 'fail';
            $result['message'] = 'Cannot withdraw less than &#8358;1000';
        } elseif ($_POST['withdrawalType'] == 'referrals' && $_POST['amount'] > $_SESSION['user_info']['referral_earnings']) { //  validate amount
            $result['status'] = 'fail';
            $result['message'] = 'Insufficient funds!';
        } elseif ($_POST['withdrawalType'] == 'earnings' && $_POST['amount'] > $_SESSION['user_info']['task_earnings']) { //  validate amount
            $result['status'] = 'fail';
            $result['message'] = 'Insufficient funds!';
        } elseif (!placeCashOut($_POST)) { // validate insert into dbase
            $result['status'] = 'fail';
            $result['message'] = 'Network error. Please try again.';
        } else { // all passes
            $result['status'] = 'ok';
            $result['message'] = 'Cash out placed.';
        }
    }

    return $result;
}

/**
 * Add a new withdrawal to database
 * 
 * @param array $info
 * 
 * @return int $userId
 */
function placeCashOut($info)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            INSERT INTO
            withdrawals (
                type,
                amount,
                acc_name,
                bank,
                account,
                user_id
            )
            VALUES (
                :type,
                :amount,
                :account_name,
                :bank,
                :account,
                :user_id
            )
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'type' => trim($_POST['withdrawalType']),
        'amount' => trim($_POST['amount']),
        'account_name' => $_SESSION['user_info']['full_name'],
        'bank' => trim($info['bankName']),
        'account' => trim($info['accountNumber']),
        'user_id' => $_SESSION['user_info']['id'],
    ));

    // return id of inserted row
    return $databaseConnection->lastInsertId();
}

/**
 * Validate new post
 * 
 * @return array $result
 */
function validateNewPost()
{
    $msg = '';

    if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['body'])) {
        $msg = "All fields must be filled in";
    } else { // All fields are filled
        $coverImageName = time() . '_' . $_FILES['coverImage']['name'];
        $target = '../auth/assets/images/covers/' . $coverImageName;

        if (move_uploaded_file($_FILES['coverImage']['tmp_name'], $target)) {
            $_POST['image'] = $coverImageName;
            $msg = saveNewPost($_POST);

            Header('Location: blog');
        } else {
            $msg = 'Upload failed. Please try again.';
        }
    }

    return $msg;
}

/**
 * Validate post update
 * 
 * @return array $result
 */
function validatePostUpdate()
{
    $msg = '';

    if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['body'])) {
        $msg = "All fields must be filled in";
    } else { // All fields are filled

        $pdo = getDatabaseConnection();

        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $body = $_POST['body'];

        $sql = 'UPDATE posts SET title = :title, author = :author, body = :body WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'author' => $author, 'body' => $body, 'id' => $id]);

        $msg = 'Post Updated';

        Header('Location: blog');
    }

    return $msg;
}

/**
 * Add a new post to database
 * 
 * @param array $info
 * 
 * @return string $postId
 */
function saveNewPost($info)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            INSERT INTO
            posts (
                title,
                body,
                author,
                cover_image
            )
            VALUES (
                :title,
                :body,
                :author,
                :cover_pic
            )
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'title' => trim($info['title']),
        'body' => trim($info['body']),
        'author' => trim($info['author']),
        'cover_pic' => trim($info['image'])
    ));

    // return id of inserted row
    return 'Post created successfully';
}

/**
 * Get user withdrawals
 * 
 * @param int $userId
 * 
 * @return array $userWithdrawals
 */
function getUserWithdrawals($userId)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                *
            FROM 
                withdrawals 
            WHERE 
                user_id <=> :userId
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'userId' => $userId
    ));

    // get and return coupons
    $userWithdrawals = $stmt->fetchAll();
    return $userWithdrawals;
}

/**
 * Get all pending withdrawals
 * 
 * @return array $allPendingWithdrawals
 */
function getAllPendingWithdrawals()
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->query('
            SELECT 
                *
            FROM 
                withdrawals
            WHERE
                status = 0
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // get and return coupons
    $allWithdrawals = $stmt->fetchAll();
    return $allWithdrawals;
}

/**
 * Get all blog posts
 * 
 * @return array $allPosts
 */
function getAllPosts()
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->query('
            SELECT 
                *
            FROM 
                posts
            ORDER BY created_at DESC
        ');

    // set pdo fetch mode
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // get and return coupons
    $allPosts = $stmt->fetchAll();
    return $allPosts;
}

/**
 * Get all users
 * 
 * @return array $allUsers
 */
function getAllUsers()
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->query('
            SELECT 
                *
            FROM 
                users
        ');

    // set pdo fetch mode
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // get and return coupons
    $allUsers = $stmt->fetchAll();
    return $allUsers;
}

/**
 * Get single blog post
 * 
 * @param $id
 * 
 * @return array $post
 */
function getSinglePost($id)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                *
            FROM 
                posts
            WHERE
                id = :id
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'id' => $id
    ));

    // get and return post
    $post = $stmt->fetch();

    return $post;
}

/**
 * Get single withdrawal
 * 
 * @param int $id
 * 
 * @return array $withdrawal
 */
function getWithdrawal($id)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            SELECT 
                *
            FROM 
                withdrawals 
            WHERE 
                id <=> :id
        ');

    // execute sql with actual values
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(
        'id' => $id
    ));

    // get and return withdrawal
    $withdrawal = $stmt->fetch();
    return $withdrawal;
}

/**
 * Update coupon user
 * 
 * @param int $userId
 * @param int $newStatus
 * @param string $remark
 * @param string $type
 * @param int $wihdrawalId
 * 
 * @return string
 */
function updateWithdrawalStatus($userId, $newStatus, $remark, $type, $amount, $withdrawalId)
{
    if ($newStatus == 2) {

        switch ($type) {
            case 'earnings':
                reduceEarningsBalance($userId, $amount);
                break;
            case 'referrals':
                reduceReferralsBalance($userId, $amount);
                break;
        }
    }

    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE withdrawals
            SET status = :status, remark = :remark
            WHERE id = :id
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'id' => $withdrawalId,
        'status' => $newStatus,
        'remark' => $remark,
    ));


    return 'Cashout Status Updated Successfully';
}

/**
 * Reduce earnings balance on withdrawal
 * 
 * @param int $id
 * @param int $amount
 * 
 * @return void
 */
function reduceEarningsBalance($id, $amount)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET task_earnings = task_earnings - :amount
            WHERE id = :userId
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'userId' => $id,
        'amount' => $amount,
    ));
}

/**
 * Reduce referrals balance on withdrawal
 * 
 * @param int $id
 * @param int $amount
 * 
 * @return void
 */
function reduceReferralsBalance($id, $amount)
{
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create sql statement
    $stmt = $databaseConnection->prepare('
            UPDATE users
            SET referral_earnings = referral_earnings - :amount
            WHERE id = :userId
        ');

    // execute sql with actual values
    $stmt->execute(array(
        'userId' => $id,
        'amount' => $amount,
    ));
}

/**
 * Update user shares
 * 
 */
function increaseUserShares($info)
{
    $userInfo = getUserWithEmailAddress($info['user_mail']);

    $today = date('Y-m-d');
    $last_share = date('Y-m-d', strtotime($userInfo['lastShareUpdate']));

    if ($userInfo['lastShareUpdate'] == 'NULL' || $today > $last_share) {
        // get database connection
        $databaseConnection = getDatabaseConnection();
        $databaseConnection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);

        // create sql statement
        $stmt = $databaseConnection->prepare('
                UPDATE users
                SET task_earnings = task_earnings + 200, lastShareUpdate = :LSU
                WHERE id = :userId
            ');

        // execute sql with actual values
        $stmt->execute(array(
            'userId' => $info['user_id'],
            'LSU' => date('Y-m-d H:i:s'),
        ));
    } else {
        return;
    }
}

/**
 * Hash password
 *
 * @param String $password plain text password
 * @param String $salt to hash passoword with set to false auto gen one
 *
 * @return String of password now hashed
 */
function hashedPassword($password)
{
    $random = openssl_random_pseudo_bytes(18);
    $salt = sprintf(
        '$2y$%02d$%s',
        12, // 2^n cost factor, hackers got nothin on this!
        substr(strtr(base64_encode($random), '+', '.'), 0, 22)
    );

    // hash password with salt
    $hash = crypt($password, $salt);

    // return hash
    return $hash;
}

if (!function_exists('password_verify')) { // if version of php does not have password_verify function we need to define it
    /**
     * password_verify()
     *
     * @link	http://php.net/password_verify
     * @param	string	$password
     * @param	string	$hash
     * @return	bool
     */
    function password_verify($password, $hash)
    {
        if (strlen($hash) !== 60 or strlen($password = crypt($password, $hash)) !== 60) {
            return FALSE;
        }

        $compare = 0;

        for ($i = 0; $i < 60; $i++) {
            $compare |= (ord($password[$i]) ^ ord($hash[$i]));
        }

        return ($compare === 0);
    }
}
