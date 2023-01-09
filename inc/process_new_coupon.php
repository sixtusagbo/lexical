<?php

include_once '../common.php';

generateCoupon();

header('Location: ../auth/coupons');
