-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2022 at 12:36 AM
-- Server version: 10.6.10-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lexicalp_newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `user_id`) VALUES
(1, 'ADMINCUP', 1001),
(2, 'LP5787P', 1005),
(3, 'LPY8TH4', 1004),
(4, 'LP5RIQ3', 1006),
(5, 'LP429W7', 1007),
(6, 'LPCIS45', 1010),
(7, 'LPW9L19', 1047),
(8, 'LPKI5N9', 1013),
(9, 'LP719KT', 1012),
(10, 'LP359X3', 1008),
(11, 'LP5PO2E', 1009),
(12, 'LP51918', 1015),
(13, 'LP955V6', 1014),
(14, 'LP671RL', 1016),
(15, 'LP1Z388', 1046),
(16, 'LPKN986', 1017),
(17, 'LP65P94', 1018),
(18, 'LPI135C', 1021),
(19, 'LP57OY3', 1020),
(20, 'LP5YDT4', 1023),
(21, 'LP9R9J4', 1029),
(22, 'LP2GQAJ', 1032),
(23, 'LPR4JH5', 1019),
(24, 'LPA9T2M', 1024),
(25, 'LPW63DN', 1025),
(26, 'LP2JC63', 1026),
(27, 'LPOH4ZI', 1027),
(28, 'LP29J9M', 1022),
(29, 'LP26IAP', 1028),
(30, 'LPV5WLS', 1030),
(31, 'LPIR146', 1033),
(32, 'LPQ212J', 1036),
(33, 'LP1A55O', 1038),
(34, 'LPQ5112', 1039),
(35, 'LPVN4V6', 1031),
(36, 'LP85A9Y', NULL),
(37, 'LP1RT38', 1037),
(38, 'LP2VJ41', 1041),
(39, 'LP8924G', NULL),
(40, 'LPA34F7', 1035),
(41, 'LP615Y2', 1034),
(42, 'LP2FSYN', 1042),
(43, 'LP87497', 1043),
(44, 'LP4653F', 1045),
(45, 'LPCQV9C', NULL),
(46, 'LP58688', NULL),
(47, 'LP871U3', 1040),
(48, 'LP718N4', 1044),
(49, 'LPB5E16', NULL),
(50, 'LPAF12K', NULL),
(51, 'LPUL5A6', NULL),
(52, 'LPPJZJB', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `cover_image`, `created_at`) VALUES
(5, 'Lexicalpay Is Back Again', 'Just launched \r\nSign up today and get a bonus of N2000 into your account ðŸ¥³', 'Lexicalpay Team', '1645219335_EC13D90A-60F8-4029-BCD5-5AEBA3C34008.jpeg', '2022-02-18 21:22:15'),
(6, 'Lexicalpay-Sponsored-Post-For-20th-February-2021', 'LEXICALPAY THE FIRST SOCIAL EARNING SITE\r\nWe have everything you need to convert your phone into a source of income.\r\nLexicalpay is an online community with over 20 thousand users dedicated to making their voices heard by completing surveys. \r\nJoin today ', 'Lexicalpay Team', '1645316044_BEC84A8D-33FA-4ED6-B520-84AF855ED229.jpeg', '2022-02-20 00:14:04'),
(7, 'Lexicalpay-Sponsored-Post-For-21th-February-2022', 'Are you tired of buying data without getting your money back?\r\n  Your network is your networth \r\nJoin the Lexicalpay team today and earn huge with or without refferal.', 'Lexicalpay Team', '1645441388_C3BC8E3A-A24B-4638-8B25-2EDCA20D399E.jpeg', '2022-02-21 11:03:08'),
(8, 'Lexicalpay-Sponsored-Post-For-22-February-2022', 'Do you believe you can make millions of Naira from the comfort of your home? \r\n  Lexicalpay is here to stay forever helping earn with your smart phone instead of wasting your time chatting people who donâ€™t pay you.\r\n   REGISTER TODAY WITH ONE TIME REGIS', 'Lexicalpay Team', '1645485322_E6BE1A71-007C-4D7A-9D9D-8F3DE317D51C.jpeg', '2022-02-21 23:15:22'),
(9, 'Lexicalpay-Sponsored-Post-For-23rd-February-2022', 'There are only two rules for being successful;\r\n\r\nOne, figure out exactly what you want to do and two, Do it!\r\n\r\nJoin The First Social Earning Site Today \r\nDATA BEATS OPINION', 'Lexicalpay Team', '1645606813_194BCA57-DF0F-4709-A76B-4721AE2B2D69.jpeg', '2022-02-23 09:00:13'),
(10, 'Lexicalpay-Sponsored-Post-For-24th-February-2022', 'Life is good when youâ€™re making money\r\n\r\nAnd the people youâ€™re bringing into the system are making moneyðŸ¤‘ðŸ¤‘\r\n\r\n\r\nIf you want to make excuses, you canâ€™t find it.\r\n\r\nIf you want to make money,you can also find opportunity \r\n\r\nItâ€™s your choice ð', 'Lexicalpay Team', '1645708119_13479F9C-68BE-4730-B5C6-DE416C3F3659.jpeg', '2022-02-24 13:08:39'),
(11, 'Lexicalpay-Sponsored-Post-For-25th-February-2022', 'Proverty is easy to AcquireðŸ¤¯,,\r\n\r\nJust sit down complian about every Damn thing & and watch opportunity slide  you by dailyðŸ§ðŸ§\r\n\r\nNo matter how legit your excuse Areâœï¸âœï¸\r\nit won\'t stop Billing from coming....âœ…âœ…âœ…', 'Lexicalpay Team', '1645814971_C8654140-AFF9-44B4-98A5-63203B4AB44D.jpeg', '2022-02-25 18:49:31'),
(12, 'Lexicalpay-Sponsored-Post-For-26th-February-2022', 'It\'s a MONEY MAKING WEEKEND âœ…âœ…âœ…\r\n\r\nTake the risk...\r\nRemove the fear\r\nBelieve it will work for you\r\nAnd you see the reward...\r\n\r\nRegistration currently Ongoing....!!!\r\n\r\nREGISTER TODAY!!!', 'Lexicalpay Team', '1645835500_8F6922EA-F481-40EF-A496-28DE3B7635CA.jpeg', '2022-02-26 00:31:40'),
(14, 'Lexicalpay-Sponsored-Post-For-27th-February-2022', 'Proverty is easy to AcquireðŸ¤¯,,\r\n\r\nJust sit down complian about every Damn thing & and watch opportunity slide  you by dailyðŸ§ðŸ§\r\n\r\nNo matter how legit your excuse Areâœï¸âœï¸\r\nit won\'t stop Billing from coming....âœ…âœ…âœ…\r\n', 'Lexicalpay Team', '1645944614_33367CF7-D20C-4979-B9F2-5AB7ED00800C.jpeg', '2022-02-27 06:50:14'),
(15, 'Lexicalpay-Sponsored-Post-For-28th-February-2022', 'As we strive to grow and improve ourselves, it\'s important to choose the words we speak to ourselves carefully. \r\nMany people keep living broke life because they miss use opportunities.', 'Lexicalpay Team', '1646005461_D3E3DB39-2BD7-41A4-8DBC-DA96C9ECDDCC.jpeg', '2022-02-27 23:44:21'),
(16, 'Lexicalpay-Sponsored-Post-For-1st-March-2022', 'Successful men are known through their actions and not words.\r\n  Take the bold step and leave the rest for success.', 'Lexicalpay Team', '1646090013_7A85F2FF-6BB3-41BC-B585-C6C52F1B105B.jpeg', '2022-02-28 23:13:33'),
(17, 'Lexicalpay-Sponsored-Post-For-2nd-March-2022', 'â€œLife is what happens when youâ€™re busy making other plans.â€\r\n  JOIN LEXICALPAY TODAY', 'Lexicalpay Team', '1646176943_F4B1D6C8-E540-4933-9B1F-CB918D78688D.jpeg', '2022-03-01 23:22:23'),
(18, 'Lexicalpay-Sponsored-Post-For-3rd-March-2022', 'One thing I have learned is that in life, if you want to be successful, you need to forget things that hold you back ðŸ¤', 'Lexicalpay Team', '1646257266_AF5ACFC5-CEBB-4CD4-B107-7E1C9391579F.jpeg', '2022-03-02 21:41:06'),
(19, 'Lexicalpay-Sponsored-Post-For-4th-March-2022', 'It\'s a MONEY MAKING WEEKENDâœ…âœ…âœ…\r\n\r\nTake the risk...\r\nRemove the fear\r\nBelieve it will work for you\r\nAnd you see the reward...\r\n\r\nRegistration currently Ongoing....!!!', 'Lexicalpay Team', '1646380059_32C0B006-6D39-4D77-9488-B0966DF940E2.jpeg', '2022-03-04 07:47:39'),
(20, 'Lexicalpay-Sponsored-Post-For-5th-March-2022', 'Every body wants to make money with risk-free and free way and thatâ€™s why they end up being scammed register or not members of Lexicalpay keep earningðŸ¥³', 'Lexicalpay Team', '1646435219_2142136D-6319-4C67-B1DC-2F6093B6BAE5.jpeg', '2022-03-04 23:06:59'),
(21, 'Lexicalpay-Sponsored-For-6th-March-2022', 'Make money or make excuses but always know who you are dealing with and donâ€™t offend the wrong person. Inspire your Sunday GREAT MIND Lexicalpay', 'Lexicalpay Team', '1646521083_7E836AAE-818D-4180-B69C-8581AA048679.jpeg', '2022-03-05 22:58:03'),
(22, 'Lexicalpay-Sponsored-Post-For-7th-March-2022', 'The best preparation for tomorrow is doing your best today. ... REGISTRATION ONGOING', 'Lexicalpay Team', '1646616984_0BE01253-3A92-41EE-92B9-F91A1152DD5D.jpeg', '2022-03-07 01:36:24'),
(23, 'Lexicalpay-Sponsored-Post-For-8th-March-2022', 'Weâ€™re so happy to announce ðŸ“£ our proud 4000 members in not less than one month of launching wow ðŸ¤© LEXICALPAY TO THE WORLD ðŸ¥³ðŸ¥³', 'Lexicalpay Team', '1646696966_F5DC0030-20DA-4FDF-92DD-05A283B4AFDA.jpeg', '2022-03-07 23:49:26'),
(24, 'Lexicalpay-Sponsored-Post-For-10th-March-2022', 'As we celebrate our 4000 members, we are happy to announce that the dashboard will always be open 24hours daily for your cashouts any time any day so people can meetup with their cashout and get paid on time. Cashouts is now daily for refferals ðŸ¥³ðŸ¥³', 'Lexicalpay Team', '1646866968_FAD43075-C0D4-46BC-A07E-FD0F61E37F35.jpeg', '2022-03-09 23:02:48'),
(25, 'Lexicalpay-Sponsored-Post-For-12th-March-2022', 'If your withdrawal was canceled weâ€™re sorry for the inconvenience you must have not reached your withdrawal limitâ€¦..DONT PANIC LEXICALPAY IS HERE TO STAY FOREVER', 'Lexicalpay Team', '1647044119_D9889645-8567-48F4-9861-AE9224DD16EB.jpeg', '2022-03-12 00:15:19'),
(27, 'Lexicalpay-Sponsored-Post-For-13th-March-2022', 'WHO WE ARE.     \r\n\r\nLexicalPay is a community of millions of people who choose to earn from social media by performing tasks in exchange for payment. Every day, many people get paid through LexicalPay just for sharing our products, inviting friends and mu', 'Lexicalpay Team', '1647127686_FA0A7892-E06B-4308-9D49-1C36569D2536.jpeg', '2022-03-12 23:28:06'),
(28, 'Lexicalpay-Sponsored-Post-For-14th-March-2022', 'It\'s a MONEY MAKING MONDAYâœ…âœ…âœ… Take the risk... Remove the fear Believe it will work for you And you see the reward... Registration currently Ongoing....!!!', 'Lexicalpay Team', '1647213321_42967E3F-40E9-4B6A-BFBA-DCE3794C5E24.jpeg', '2022-03-13 23:15:21'),
(29, 'Lexicalpay-Sponsored-Post-For-15th-March-2022', 'Earning 200K monthly on lexicalpay is very possible and you would be shown how by affiliates who have earned and got paid Millions through lexicalpay Technology ðŸ˜Œâ¤ï¸  Donâ€™t miss it this Weekend âœ…ðŸš€', 'Lexicalpay Team', '1647300735_BDA6F1D9-A030-4096-82A1-8D8EC803844C.jpeg', '2022-03-14 23:32:15'),
(30, 'Lexicalpay-Sponsored-Post-For-16th-March-2022', 'As a Young person who knows the Government Doesnâ€™t Care about your financesðŸ’°\r\nYour Boss just wants you to over work yourself without increasing your salary \r\nAs a student The School bills wonâ€™t sort itselfâœ…\r\n\r\nTo Tackle all of these you need an E', 'Lexicalpay Team', '1647394382_ED334FC3-BAB5-4A67-9846-BDB97917DD5E.jpeg', '2022-03-16 01:33:02'),
(31, 'Lexicalpay-Sponsored-Post-For-17th-March-2022', 'Salary or no salary lexicalpay Technology got u coveredðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥no too much talk here if u are ready with your 3k to get registeredðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥credit alert  will surely look for you', 'Lexicalpay Team', '1647514722_3EFB758D-17D6-4386-BC53-0F688FAD3526.jpeg', '2022-03-17 10:58:42'),
(32, 'Lexicalpay-Sponsored-Post-For-18th-March-2022', 'â€œTake a risk and keep testing, because what works today won\'t work tomorrow, but what worked yesterday may work again.â€ â€“ ...LEXICALPAY FOREVER', 'Lexicalpay Team', '1647562319_E9804C3C-D179-47CF-BEDE-0B9A98A9FCE8.jpeg', '2022-03-18 00:11:59'),
(33, 'Lexicalpay-Sponsored-Post-For-19th-March-2022', 'Achieve your financial goals every day. Invest wisely for the effective path to wealth. Highlight the strongest stocks fast. Quant ratings do all the work...We also need to remind you that we are still on our 4000 members advisory as you make your withdra', 'Lexicalpay Team', '1647651544_B375782E-8F5B-4126-B277-A82492E4C0C0.jpeg', '2022-03-19 00:59:04'),
(34, 'Lexicalpay-Sponsored-Post-For-20th-March-2022', 'â€œThe best way to predict the future is to create it.â€ â€“\r\nHAPPY CASHOUT DAYðŸ¥³ðŸ¥³', 'Lexicalpay Team', '1647735153_E150F5E0-BBA1-4BD6-8AA0-72A9B626787A.jpeg', '2022-03-20 00:12:33'),
(35, 'Lexicalpay-Sponsored-Post-For-21st-March-2022', '\"How many millionaires do you know who have become wealthy by investing in savings accounts? I rest my case.\"\r\n\r\nInvesting is all about making money, and that\'s pretty tough to do if you\'re afraid to venture off the safe path. As a successful businessman ', 'Lexicalpay Team', '1647860363_950C9CCE-B95B-4FDF-B53F-E60FE5AC4B59.jpeg', '2022-03-21 10:59:23'),
(36, 'Lexicalpay-Sponsored-Post-For-22nd-March-2022', 'â€œBe courageous. Challenge orthodoxy. Stand up for what you believe in. When you are in your rocking chair talking to your grandchildren many years from now, be sure you have a good story to tell.â€\r\nLEXICALPAY FOREVER', 'Lexicalpay Team', '1647911183_Daily Post (24).jpg', '2022-03-22 01:06:23'),
(37, 'Lexicalpay-Sponsored-Post-For-24th-March-2022', 'â€œDo you want to know who you are? Donâ€™t ask. Act! Action will delineate and define you.â€ \r\n LEXICALPAY IS HERE TO STAY FOREVER', 'Lexicalpay Team', '1648079073_64286AB6-2B09-44A3-9C2C-348FFFBF67FC.jpeg', '2022-03-23 23:44:33'),
(38, 'Lexicalpay-Sponsored-Post-For-25th-March-2022', 'â€œTake a risk and keep testing, because what works today won\'t work tomorrow, but what worked yesterday may work again.â€\r\nLEXICALPAY IS HERE TO STAY', 'Lexicalpay Team', '1648170450_Daily Post (34).jpg', '2022-03-25 01:07:30'),
(39, 'Lexicalpay-Sponsored-Post-For-26th-March-2022', 'Earning Online made easy with the help of Lexicalpay by doing little or no activities on the site.\r\n\r\nI and my Downlines earn daily on the platform and we withdraw into our bank account. You should also join us and earn, clear your doubts and stop missing', 'Lexicalpay Team', '1648255780_D3592984-8DC3-4735-A29C-3BFF98D59EC7.jpeg', '2022-03-26 00:49:40'),
(40, 'Lexicalpay-Sponsored-Post-For-27th-March-2022', 'â€œWe have technology, finally, that for the first time in human history allows people to really maintain rich connections with much larger numbers of people.â€\r\n\r\nLEXICALPAY WISHES YOU A WONDERFUL MOTHERING SUNDAY', 'Lexicalpay Team', '1648373232_launchu.jpg', '2022-03-27 09:27:12'),
(41, 'Lexicalpay-Sponsored-For-28th-March-2022', 'You canâ€™t always distance yourself from negative people.\r\n        But you can always learn how to distance yourself from negativity.\r\n    LEXICALPAY FOREVER', 'Lexicalpay Team', '1648456381_5E0C3851-741C-47BF-8A05-A2D01249EA81.jpeg', '2022-03-28 08:33:01'),
(42, 'Lexicalpay-Sponsored-Post-For-3rd-April-2022', 'Tired of Being Broke?ðŸ¤”\r\nTired of Being Paid Less of What you Earn?ðŸ¤”\r\nTired of Too much stress for poor returns?ðŸ¤”\r\n\r\nâž¡ï¸Stop Doing Things that doesnâ€™t make you MONEY\r\nâž¡ï¸Change your Mentality \r\nâž¡ï¸Take Risk\r\nâž¡ï¸Join A platform that p', 'Lexicalpay Team', '1648947161_23026E83-BCE9-45DA-862E-2A3977D6CE38.jpeg', '2022-04-03 00:52:41'),
(43, 'Lexicalpay-Sponsored-Post-For-4th-April-2022', 'Most people are afraid of failing that\'s the reason why they never take any action ðŸ¤·â€â™‚ï¸,  I laugh at such people ðŸ˜¹...tell me how you want to make it when you\'re playing it safeðŸ˜•..there\'s no how you can do that.', 'Lexicalpay Team', '1649114923_3CB9F732-EF88-4C6C-AAC2-65C465F53D80.jpeg', '2022-04-04 23:28:43'),
(44, 'Lexicalpay-Sponsored-Post-For-5th-April-2022', 'To remain poor is very simple; \r\n      See an opportunity and do nothing.\r\nSome people will even be making stupid analysis while others are already taking steps to greatness.\r\n\r\nTo be successful is also simple; \r\n       See an opportunity, grab it and tak', 'Lexicalpay Team', '1649115216_9DFE22FD-645D-4A82-BBF3-A4082FA20EDD.jpeg', '2022-04-04 23:33:36'),
(45, 'Lexicalpay-Sponsored-Post-For-6th-April-2022', 'â€œBe courageous. Challenge orthodoxy. Stand up for what you believe in. When you are in your rocking chair talking to your grandchildren many years from now, be sure you have a good story to tell.â€ LEXICALPAY FOREVER', 'Lexicalpay Team', '1649197959_6DA9CC4D-C78D-4B92-B6E3-E50EEE48B01D.jpeg', '2022-04-05 22:32:39'),
(46, 'Lexicalpay-Sponsored-Post-For-7th-April-2022', 'â€œTake a risk and keep testing, because what works today won\'t work tomorrow, but what worked yesterday may work again.â€\r\n\r\n LEXICALPAY IS HERE TO STAY', 'Lexicalpay Team', '1649315643_92E974A7-5A67-4771-9AC7-C72F67A14051.jpeg', '2022-04-07 07:14:03'),
(47, 'Lexicalpay-Sponsored-Post-For-8th-April-2022', 'â€œTake a risk and keep testing, because what works today won\'t work tomorrow, but what worked yesterday may work again.â€ LEXICALPAY IS HERE TO STAY', 'Lexicalpay Team', '1649372070_9FA0984D-98B8-4AEA-8553-1C8BE230F077.jpeg', '2022-04-07 22:54:30'),
(48, 'Lexicalpay-Sponsored-Post-For-10th-April-2022', 'â€œThe best way to predict the future is to create it.â€ â€“ HAPPY CASHOUT DAYðŸ¥³ðŸ¥³', 'Lexicalpay Team', '1649543895_7931C50C-ED88-4AC6-BB76-0F5AA5EF945E.jpeg', '2022-04-09 22:38:15'),
(49, 'Lexicalpay-Sponsored-Post-For-11th-April-2022', 'Salary or no salary lexicalpay Technology got u coveredðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥no too much talk here if u are ready with your 3k to get registeredðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥ðŸ’¥credit alert will surely look for you', 'Lexicalpay Team', '1649637334_5156F957-01BE-4978-9BAB-28D0E5EB2FF4.jpeg', '2022-04-11 00:35:34'),
(50, 'Lexicalpay-Sponsored-Post-For-12th-April-2022', 'Every body wants to make money with risk-free and free way and thatâ€™s why they end up being scammed register or not members of Lexicalpay keep earningðŸ¥³', 'Lexicalpay Team', '1649716304_A50114C8-3353-4BC1-AA3A-6C49B105C65D.jpeg', '2022-04-11 22:31:44'),
(51, 'Lexicalpay-Sponsored-Post-For-7th-May-2022', 'To ignore online marketing is like opening a business without telling anyone', 'Lexicalpay Team', '1651794997_70805B1D-4B62-49F9-88B2-B3319D8C9D87.jpeg', '2022-05-05 23:56:37'),
(52, 'Lexicalpay-Sponsored-Post-For-11th-May-2022', 'Tired of Being Broke?ðŸ¤” Tired of Being Paid Less of What you Earn?ðŸ¤” Tired of Too much stress for poor returns?ðŸ¤” âž¡ï¸Stop Doing Things that doesnâ€™t make you MONEY âž¡ï¸Change your Mentality âž¡ï¸Take Risk âž¡ï¸Join A platform that pays ðŸ’µ', 'Lexicalpay Team', '1652252681_5AD01EDA-C56E-4BB4-9370-32A2FF68D95E.jpeg', '2022-05-11 07:04:41'),
(53, 'Lexicalpay-Sponsored-Post-For-12th-May-2022', 'To remain poor is very simple; See an opportunity and do nothing. Some people will even be making stupid analysis while others are already taking steps to greatness. To be successful is also simple; See an opportunity, grab it and tak', 'Lexicalpay Team', '1652301515_116BA288-2091-4C6B-9257-8A1636B7BE56.jpeg', '2022-05-11 20:38:35'),
(54, 'Lexicalpay-Sposored-Post-For-13th-May-2022', 'Tired of Being Broke?ðŸ¤” Tired of Being Paid Less of What you Earn?ðŸ¤” Tired of Too much stress for poor returns?ðŸ¤” âž¡ï¸Stop Doing Things that doesnâ€™t make you MONEY âž¡ï¸Change your Mentality âž¡ï¸Take Risk âž¡ï¸Join A platform that pays', 'Lexicalpay Team', '1652395513_FADDE305-6AF7-43FE-BA00-9A473C99AC62.jpeg', '2022-05-12 22:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `coupon_code` varchar(10) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_level` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=earner, 1=admin',
  `referrals` smallint(6) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `lastShareUpdate` datetime DEFAULT NULL,
  `task_earnings` int(11) NOT NULL DEFAULT 2300,
  `referral_earnings` int(11) NOT NULL DEFAULT 0,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `coupon_code`, `profile_image`, `user_level`, `referrals`, `created_at`, `last_login`, `lastShareUpdate`, `task_earnings`, `referral_earnings`, `state`, `country`) VALUES
(1001, 'Admin', 'Panel', 'khalixvibes@gmail.com', '$2y$12$Ww2NyjlCrTLAYThWAUT5G.6KNO95cs6PQSZiq0/al5wKb8nrOqaM2', '09080805050', 'ADMINCUP', '1645382891_hero-banner.jpeg', 1, 1, '2022-02-17 23:03:03', '2022-12-10 15:18:27', '2022-05-11 07:05:01', 12800, 0, 'ADAMAWA', 'Nigeria'),
(1003, 'Nwakpa ', 'Kingsley ', 'kingsman001@gmail.com', '$2y$12$dyQznaS3NuPxzZfioybug.qCz/qV9eSO9iA/fV2TvyRtBFrRghKxS', '07057975478', 'LPY8TH4', '1646435450_70A32955-DC60-4A04-B0B1-FFC9637FD55F.jpeg', 0, 2, '2022-02-18 13:43:59', '2022-03-26 09:52:32', '2022-03-04 23:08:13', 10500, 2400, 'ANAMBRA', 'Nigeria'),
(1004, 'Oduma', 'Keke', 'khalixboy@gmail.com', '$2y$12$FKhjUkWPOlIQGvp8Akq77OfAB4bxSuUptt9h8OGDvocoO.sFRwAku', '09078654577', 'LPY8TH4', NULL, 0, 0, '2022-02-18 13:46:16', '2022-02-18 12:46:16', NULL, 2300, 0, NULL, NULL),
(1005, 'Omebe', 'Nzubechukwu Anthonia ', 'adilahanabel@gmail.com', '$2y$12$VlHI97S88p3Uu239.zsrn.dujmoVg8C1o1/.7smOrvB0Xmhj1uqzW', '09063118052', 'LP5787P', '1647955892_Snapchat-71787600.mp4', 0, 9, '2022-02-18 14:41:40', '2022-04-04 20:43:30', '2022-03-25 06:17:52', 11400, 2400, 'ENUGU', 'Nigeria'),
(1007, 'Kezar', 'Martin', 'kezarmartin556@gmail.com', '$2y$12$VjGWY/A3gBlGB28EwQvDl.HdN/4EMQvRiy1aI7HjGI8X.cyRNjv/O', '09035780931', 'LP429W7', NULL, 0, 0, '2022-02-18 17:38:55', '2022-04-11 05:59:23', '2022-04-11 05:58:25', 20600, 0, 'IMO', 'Nigeria'),
(1009, 'Daniel', 'Ayibakule', 'danielayibakule20@gmail.com', '$2y$12$fabZKkENaMOJTaVEi8tSsu2WXAoL2TtVhsEO.gk6XzgFfIy8jemoS', '07088583548', 'LP5PO2E', '1645895368_IMG_20220226_145451_130.jpg', 0, 0, '2022-02-20 00:56:09', '2022-05-08 23:15:13', '2022-05-08 00:15:35', 19100, 0, 'BAYELSA', 'Nigeria'),
(1012, 'Harrison ', 'Ogaga ', 'anthonyogaga100@gmail.com', '$2y$12$kQodur2ppHdV33kqYAyaxemT2RgZeCtoyzDUBf5lnQML4uUDkZENy', '09122900767', 'LP719KT', '1651678023_Screenshot_20220405-210621.png', 0, 3, '2022-02-20 18:19:39', '2022-05-21 06:43:39', '2022-05-13 12:27:17', 21300, 0, 'EBONYI', 'Nigeria'),
(1013, 'Mubarak', 'Abdulbaki', 'mubarakayinde9@gmail.com', '$2y$12$38ldm4wvU1sBxiigCrutE.dPfA.TtD2QkK6614yDSQCvTR6Jj1v6O', '08164791085', 'LPKI5N9', NULL, 0, 0, '2022-02-20 20:36:56', '2022-05-18 05:26:38', '2022-05-14 06:54:07', 18000, 0, 'KWARA', 'Nigeria'),
(1014, 'Johnson', 'Okeke', 'johnny@gmail.com', '$2y$12$//N8d.uXk5pjortPqgOU6OBhtJfbezD6v0.rx7gCZWALhVyGJuWya', '08123459688', 'LP955V6', NULL, 0, 1, '2022-02-20 20:45:23', '2022-04-10 06:46:04', '2022-04-07 13:14:13', 8700, 1200, 'ABUJA(FCT)', 'Nigeria'),
(1015, 'Leviticus', 'Idoko', 'levitcusyahjindu@gmail.com', '$2y$12$y8o645J0jZhN6krvuEc6reIBkfU4ltIMvB7htplI5/o9DGqiyCAWq', '09137194952', 'LP51918', NULL, 0, 3, '2022-02-20 20:45:57', '2022-04-11 19:47:25', '2022-04-11 19:47:35', 8100, 3600, NULL, NULL),
(1016, 'Jenna', 'Okeke', 'jenna98@gmail.com', '$2y$12$BdtXolB27GwxpcTz3dTjYOYJLF5xe1XZJkCeW87RtqYEsBVE4rx4O', '07023562541', 'LP671RL', NULL, 0, 0, '2022-02-20 22:01:14', '2022-02-20 21:01:14', NULL, 2300, 0, NULL, NULL),
(1017, 'Promise', 'Pazola', 'promiseokoro129@gmail.com', '$2y$12$3QEmjnLt9AWw7ap4DQq5Q.ii9cI42AidvUThTrat/UpSTh3odyjbK', '08034795347', 'LPKN986', NULL, 0, 0, '2022-02-20 22:26:27', '2022-04-01 22:51:33', '2022-03-28 10:20:40', 17200, 0, NULL, NULL),
(1018, 'Princewill', 'Okike', 'princealonso32@gmail.com', '$2y$12$Z2SgHnlbyj/ETXrjZ0u7we.87yBElsd24tLbfr/lhIW7mUk4WkbT.', '08073734224', 'LP65P94', NULL, 0, 0, '2022-02-23 20:54:37', '2022-04-10 00:12:16', '2022-04-07 17:23:00', 13100, 0, NULL, NULL),
(1019, 'Igwe', 'Leonard', 'igweleonard100@gmail.com', '$2y$12$M/6EqH56jmHgcuei6gk//O3ZkjMwzytz2bUr1HtD7DwleThUqdgva', '08169177269', 'LPR4JH5', '1645816018_67B3D5FF-AAFB-4F48-A90E-19A1DEB7F554.jpeg', 0, 6, '2022-02-25 20:03:49', '2022-05-20 18:42:10', '2022-05-13 22:22:22', 20000, -16800, 'EBONYI', 'Nigeria'),
(1020, 'Kingsley', 'Eze', 'ozichukwukingsley@gmail.com', '$2y$12$47.lY9WnmlZYHHk2UMKDlu0NSoeIP39NZnbTfMPMs6CKqFs8EkeFC', '08144566172', 'LP57OY3', NULL, 0, 0, '2022-02-26 17:47:26', '2022-03-25 07:32:19', '2022-03-22 07:25:54', 13400, 0, 'EBONYI', 'Nigeria'),
(1021, 'Kingsley', 'Nwafor', 'nwaforkingsley2005@gmail.com', '$2y$12$hLRggo9GadJNWacEK4B1s.lEi7plAuNKGqymRGgeHF8BozuQK2rOi', '07047184204', 'LPI135C', '1645947993_tmp-cam-5711457511617570650.jpg', 0, 0, '2022-02-27 08:42:34', '2022-04-01 14:17:07', '2022-03-29 18:19:12', 8600, 0, 'EBONYI', 'Nigeria'),
(1023, 'Promise', 'Jewel', 'Promiseorisakwe3@gmail.com', '$2y$12$nsMC/oqlYPy6Ci4sfF2VyO1UaRIHxLMQTfXgTSeLXn5EG02y1Wrhe', '08149627154', 'LP5YDT4', NULL, 0, 0, '2022-03-05 11:07:37', '2022-04-09 05:09:26', '2022-03-05 10:16:24', 8200, 0, NULL, NULL),
(1024, 'Igwilo', 'Vincent', 'igwilovincent534@gmail.com', '$2y$12$R0EOFaH1Klakl0KeEcaHEu8WdqdUt9lUSVc3rJOyQx5XOR2MIBEri', '07031099972', 'LPA9T2M', '1646493947_a20ece1e14ed4d898c74b4c8b0405078.jpg', 0, 0, '2022-03-05 16:21:42', '2022-04-10 14:04:15', '2022-04-10 14:03:24', 16300, 0, 'IMO', 'Nigeria'),
(1025, 'Damn', 'Jeebi', 'developer@me.com', '$2y$12$anI1q8e4nxPbBvJ9kqBExeO6TnCZUzNi7tgILfeDiDy8oumeAmiCi', '08085855692', 'LPW63DN', NULL, 0, 0, '2022-03-08 16:23:27', '2022-03-08 15:23:27', '2022-03-08 15:25:43', 2500, 0, NULL, NULL),
(1026, 'Gold', 'chibuike', 'chibuikegold67@gmail.com', '$2y$12$MzUnMMJBwECx5qbkegUbVeEJyPz38dWcB9DTxV3l.i5T2CXDB6Xs6', '09135794265', 'LP2JC63', NULL, 0, 0, '2022-03-10 15:29:35', '2022-05-19 08:36:51', '2022-05-16 08:26:52', 12200, 0, 'IMO', 'Nigeria'),
(1027, 'NWAFOR', 'Chiamaka', 'nchiamaka22@gmail.com', '$2y$12$0XFUclB4TxExGpxidT/akuqIOT/x9AHpHR05w45I419L7PGeALyfm', '08109051275', 'LPOH4ZI', NULL, 0, 0, '2022-03-11 19:03:50', '2022-04-11 19:38:42', '2022-04-10 06:59:40', 13100, 0, 'EBONYI', 'Nigeria'),
(1028, 'Anthony', 'Chidera', 'anthonynwodoede@gmail.com', '$2y$12$w28N61OjvD0zkUVAa0aRgutyVf8jMuJ2ScqGFyAURhHnVTRSZLnny', '08106460223', 'LP26IAP', NULL, 0, 0, '2022-03-12 10:19:38', '2022-04-11 16:33:48', NULL, 3000, 0, NULL, NULL),
(1029, 'Chikadibia', 'Ogbonna', 'chikadibiamarthins@gmail.com', '$2y$12$q0VVyol67/ySTnnWQ1v.bOJ1IHIuSd6ajCDtYHxJ9aajZxICBjVuq', '07025949547', 'LP9R9J4', NULL, 0, 4, '2022-03-15 00:13:30', '2022-04-10 23:06:37', '2022-04-10 21:53:43', 9700, 4800, NULL, NULL),
(1030, 'Chukwudi', 'Asadu', 'shimadominic51@gmail.com', '$2y$12$ZMJuliTwd/Qc5mKWg5QWLuUpxNnGTZzmDJW/9mp7uw70ulwSltUkG', '08145714640', 'LPV5WLS', NULL, 0, 0, '2022-03-15 09:03:02', '2022-04-11 11:32:03', '2022-04-11 11:29:48', 9600, 0, NULL, NULL),
(1031, 'Nkwuda', 'Samuel', 'nkwudasamuel@gmail.com', '$2y$12$tLx1A2JMxO.sk8BBsBUSg.wQnYchUMqixD0HFUBNcBXTT247VWzRa', '08160991784', 'LPVN4V6', NULL, 0, 0, '2022-03-16 12:27:44', '2022-03-30 21:44:34', '2022-03-30 21:42:18', 7400, 0, NULL, NULL),
(1032, 'Lawrence', 'prince', 'Lawrenceprince531@gmail.com', '$2y$12$nnw6BLChpCaJJr3x2Sf/H.JNuZ/.wFgTudu2/JO5pz4n1WqbxzYpi', '09017378632', 'LP2GQAJ', NULL, 0, 0, '2022-03-18 21:03:38', '2022-04-11 23:01:26', '2022-04-11 08:05:59', 9100, 0, NULL, NULL),
(1033, 'Ikenna', 'Austin', 'udeikenna229@gmail.com', '$2y$12$DaEFYrdtqmfKMEfm3EOW2..1syNiH5YLvn41y3GuZJFAhhBaczXki', '08118824909', 'LPIR146', '1647675262_1647197821272.jpg', 0, 0, '2022-03-19 08:11:21', '2022-05-20 09:33:14', '2022-05-13 08:09:36', 9300, 0, 'ENUGU', 'Nigeria'),
(1034, 'Ngwuta', 'Favour', 'ngwutachinonso2@gmail.com', '$2y$12$X9nJq.CO5BQXRFObvDxQh./XwZ8sKeiTYyjsnALH6EaQan6gb7h8e', '07029654162', 'LP615Y2', '1647860516_62C65426-2F9C-434F-9EAE-9755345315D8.jpeg', 0, 0, '2022-03-21 11:42:00', '2022-04-10 14:05:23', '2022-04-10 14:05:43', 8500, 0, 'EBONYI', 'Nigeria'),
(1035, 'Onyegbula', 'Daniel', 'osteendaniel9@gmail.com', '$2y$12$WVEj8xnfLSpU/p9ANwg1VulK8.aZ64U8UbR9jLt5nZXwfQn687lQy', '07059264270', 'LPA34F7', '1647861009_025B8FB8-7B73-4553-9A30-F34EB7EED7A3.jpeg', 0, 0, '2022-03-21 12:09:21', '2022-04-09 21:56:56', '2022-04-09 21:57:55', 5100, 0, 'LAGOS', 'Nigeria'),
(1036, 'Chidera', 'Emmanuel', 'chideraemmanuel045@gmail.com', '$2y$12$C7SlY/V65E/NT5iq6HZ1Ye4xxKEVjIu61hMgpqqc5An4zEOQEToky', '07025126850', 'LPQ212J', NULL, 0, 0, '2022-03-22 08:26:38', '2022-05-11 13:26:54', '2022-05-11 13:27:03', 5300, 0, NULL, NULL),
(1037, 'Ezenyi', 'chidubem', 'Ezenyichidubemp@gmail.com', '$2y$12$cmYlt0OeJkFU0OT74fIxs.HVEFQk1YBb8pTcJYsbwAfdql0lshfGi', '08066876244', 'LP1RT38', NULL, 0, 0, '2022-03-23 07:44:13', '2022-04-10 18:02:05', '2022-04-10 18:02:38', 5600, 0, NULL, NULL),
(1038, 'Jedidiah', 'Chukwurah', 'phantomxl94@gmail.com', '$2y$12$KHpWsSuQQw6KxescifNIgufC0D7Os0kJOetdxYa0rHKx2kfpcMxsO', '09121651232', 'LP1A55O', NULL, 0, 0, '2022-03-23 12:10:12', '2022-05-17 20:19:13', '2022-03-26 03:33:24', 3300, 0, NULL, NULL),
(1039, 'Ekoli', 'Chinemerem', 'chinemeremekoli@gmail.com', '$2y$12$txXp7AOIJ7V.jpvqBxQHgedygPeKXwaqTU2CYRquxJmT84xuDINhC', '08073164185', 'LPQ5112', NULL, 0, 0, '2022-03-24 11:37:57', '2022-04-04 13:56:40', '2022-04-04 13:57:51', 3600, 0, 'ENUGU', 'Nigeria'),
(1040, 'Boson', 'Comfort', 'ezekelocomfort@gmail.com', '$2y$12$1uhjIntL2osBhOUrkFSFzeTNhkTmcwOqdZEuMJ2BZO9SCyQ9z8YZO', '08132672628', 'LP871U3', NULL, 0, 0, '2022-03-24 15:47:39', '2022-05-04 13:32:54', '2022-03-28 16:09:09', 3900, 0, NULL, NULL),
(1041, 'Ngwoke', 'Isabel', 'isabelngwoke@gmail.com', '$2y$12$XTcSr9mqiP230OOjhpWi6eRZ6t.n7qGWC5Wd6XyMKPBBJyM8q8ZqG', '09125099065', 'LP2VJ41', NULL, 0, 0, '2022-03-30 10:38:01', '2022-03-31 13:21:12', NULL, 2400, 0, NULL, NULL),
(1042, 'Nwankwo', 'Nelson', 'nelsonchidera1234@gmail.com', '$2y$12$zTvLhE93M6dIFP6TmPKw7.eakkKarYdS9qpap.BqqJp7/y/9xEzNK', '09154143003', 'LP2FSYN', NULL, 0, 0, '2022-03-30 20:02:37', '2022-05-15 22:39:16', '2022-05-10 00:48:06', 3800, 0, 'ANAMBRA', 'Nigeria'),
(1043, 'Olalere', 'Emmanuel', 'eolalere030@gmail.com', '$2y$12$k242sNqoPCKh4eb9VRxu.elo5fUNuWbriDMBrRcdHC4h9sSw9WivW', '09063532772', 'LP87497', '1648719935_1F647E27-0F93-4C5D-B7EC-AA1AC75BE9DF.jpeg', 0, 0, '2022-03-31 10:01:02', '2022-04-04 10:06:34', '2022-04-04 10:07:11', 3100, 0, NULL, NULL),
(1044, 'Eric', 'Chukwuebuka', 'ebukaeric152@gmail.com', '$2y$12$2FC81J6SqJEKcwtV2nab..lyjK1fkRN54ZfZwsDUBy3e2bzWt8F0K', '09031104755', 'LP718N4', NULL, 0, 0, '2022-04-08 10:50:43', '2022-05-20 15:12:19', '2022-05-13 09:22:14', 5200, 0, NULL, NULL),
(1045, 'Ebube', 'Wilson', 'wilsonenigwe@gmail.com', '$2y$12$AYgn0R1cwhymUEH0EA1RoO4tg0C7NHKOsbF8uSWx3eo7dDvsNs5U2', '09159489527', 'LP4653F', NULL, 0, 0, '2022-04-08 13:57:04', '2022-04-09 07:29:53', '2022-04-08 19:21:53', 2600, 0, NULL, NULL),
(1046, 'Agbo', 'victor', 'victorobiomaagbo19@gmail.com', '$2y$12$lz1UabwvoPoF67mfQYBdVuh3eO8Mab5AnNh47T/5k0CYT2bPe2Qs.', '09046912971', 'LP1Z388', NULL, 0, 0, '2022-05-07 20:04:48', '2022-05-10 17:16:59', '2022-05-09 21:24:29', 2900, 0, 'EBONYI', 'Nigeria'),
(1047, 'Developer', 'Test', 'devmail@lexicalpay.com', '$2y$12$WD6Jo69c1KyIoNA3ta4sXuHCmCKKvluBDShUDe3k9tyAZagtZBwPS', '0880889786', 'LPW9L19', NULL, 1, 0, '2022-12-02 23:05:49', '2022-12-12 04:30:36', '2022-12-02 22:06:32', 2600, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` tinytext NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `acc_name` varchar(1000) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `account` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=failed, 2=successful',
  `remark` varchar(255) NOT NULL DEFAULT 'Pending',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `date`, `type`, `amount`, `acc_name`, `bank`, `account`, `status`, `remark`, `user_id`) VALUES
(1, '2022-02-19 09:35:58', 'earnings', '1200', 'Rex Willie', 'UBA', '2148635122', 2, '', 1001),
(2, '2022-02-19 09:40:27', 'earnings', '2900', 'Rex Willie', 'Access Bank', '1134785786', 2, '', 1001),
(3, '2022-02-20 06:27:51', 'earnings', '1300', 'Developer Test', 'Union Bank', '0133933478', 2, 'Congratulations', 1011),
(4, '2022-02-20 06:29:39', 'earnings', '1000', 'Developer Test', 'Eco Bank', '4654467576', 2, 'congrats', 1011),
(5, '2022-02-20 06:35:22', 'earnings', '1000', 'Developer Test', 'Standard Chartered Bank', '4576768777', 2, '35sgsd', 1011),
(6, '2022-02-20 06:37:46', 'earnings', '1000', 'Developer Test', 'Keystone Bank', '3446436554', 2, '354545dfgbsf', 1011),
(7, '2022-02-20 06:41:12', 'earnings', '1000', 'Developer Test', 'Skye Bank', '4574567655', 2, 'dfbgdf', 1011),
(8, '2022-02-20 06:43:25', 'earnings', '1000', 'Developer Test', 'Skye Bank', '4654655656', 2, 'gdfhfg', 1011),
(9, '2022-02-20 12:21:31', 'earnings', '1000', 'Daniel Ayibakule', 'Union Bank', '0156651120', 1, 'Account name inconsistent', 1009),
(10, '2022-02-20 12:22:40', 'earnings', '1000', 'Daniel Ayibakule', 'UBA', '2116504274', 1, 'Account name inconsistent again(Account belongs to AYIBAKULE THANKGOD DANIEL)', 1009),
(11, '2022-02-20 13:21:48', 'earnings', '2000', 'Rex Willie', 'Kuda Bank', '1397899755', 2, 'testing', 1001),
(12, '2022-02-20 15:29:36', 'referrals', '2000', 'Rex Willie', 'Jaiz Bank', '5647658789', 1, 'test', 1001),
(13, '2022-02-20 15:30:03', 'referrals', '1000', 'Rex Willie', 'GTB', '4574657688', 2, 'test', 1001),
(14, '2022-03-09 23:57:05', 'earnings', '5000', 'Admin Panel', 'Kuda Bank', '5789999900', 1, 'Not Enough Refferal ', 1001),
(15, '2022-03-10 12:21:54', 'referrals', '5000', 'Johnson Okeke', 'FCMB', '8831103014', 1, 'Low Refferal ', 1014),
(16, '2022-03-10 12:23:15', 'referrals', '1500', 'Johnson Okeke', 'FCMB', '8831103014', 1, 'Low Refferal ', 1014),
(17, '2022-03-10 12:48:45', 'referrals', '11000', 'Omebe Nzubechukwu', 'UBA', '2192422743', 1, 'Low Refferal ', 1005),
(18, '2022-03-10 14:24:44', 'referrals', '13700', 'Evans Nwuda', 'Zenith Bank', '2369703042', 1, 'Low Refferal ', 1012),
(19, '2022-03-10 20:13:03', 'referrals', '10000', 'Nwakpa  Kingsley ', 'UBA', '2158559630', 1, '', 1003),
(20, '2022-03-10 20:13:03', 'referrals', '10000', 'Nwakpa  Kingsley ', 'UBA', '2158559630', 1, '', 1003),
(21, '2022-03-10 21:31:43', 'referrals', '10600', 'Nwakpa  Kingsley ', 'UBA', '2158559630', 1, 'Low Refferal ', 1003),
(22, '2022-03-11 21:02:08', 'referrals', '7000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 1, 'Low Refferal ', 1019),
(23, '2022-03-19 10:12:20', 'referrals', '5000', 'Admin Panel', 'Kuda Bank', '3578996534', 1, '', 1001),
(24, '2022-03-20 08:40:19', 'referrals', '15900', 'Evans Nwuda', 'Zenith Bank', '2369703042', 1, 'You must atleast have referred 3 persons before you can withdraw continuously from Lexicalpay and multiple accounts are not accepted ', 1012),
(25, '2022-03-20 10:57:56', 'referrals', '12700', 'Nwakpa  Kingsley ', 'UBA', '2158559630', 1, '2158559630', 1003),
(26, '2022-03-20 10:58:02', 'referrals', '12700', 'Nwakpa  Kingsley ', 'UBA', '2158559630', 1, 'You must atleast have referred 3 persons before you can withdraw continuously from Lexicalpay and multiple accounts are not accepted ', 1003),
(27, '2022-03-20 11:36:28', 'referrals', '3600', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, 'PAID', 1019),
(28, '2022-03-21 23:11:45', 'referrals', '4000', 'Admin Panel', 'Access Bank', '2856738382', 1, '', 1001),
(29, '2022-03-21 23:12:34', 'referrals', '11000', 'Admin Panel', 'Citibank', '83828/99/9', 1, '', 1001),
(30, '2022-03-21 23:13:52', 'referrals', '11000', 'Admin Panel', 'Eco Bank', '2992929929', 1, '', 1001),
(31, '2022-03-21 23:52:28', 'referrals', '1200', 'Admin Panel', 'Eco Bank', '3&39:93939', 1, '', 1001),
(32, '2022-03-22 02:09:31', 'referrals', '1200', 'Admin Panel', 'Parallex Bank', '8987432347', 2, 'Congrats!!!', 1001),
(33, '2022-03-22 11:58:51', 'referrals', '2400', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, '', 1019),
(34, '2022-03-22 12:43:56', 'referrals', '8400', 'Omebe Nzubechukwu Anthonia ', 'UBA', '2192422743', 2, 'PAID', 1005),
(35, '2022-04-10 09:10:01', 'referrals', '3000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, 'Ok', 1019),
(36, '2022-04-10 09:14:54', 'referrals', '3000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, 'Ok', 1019),
(37, '2022-04-10 09:16:02', 'referrals', '3000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, 'Ok', 1019),
(38, '2022-04-10 09:16:46', 'referrals', '3000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, '', 1019),
(39, '2022-04-10 09:17:33', 'referrals', '3000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, 'Ok', 1019),
(40, '2022-04-10 09:18:54', 'referrals', '3000', 'Igwe Leonard', 'Zenith Bank', '2479356572', 2, 'Ok', 1019),
(41, '2022-04-10 11:33:33', 'referrals', '3600', 'Evans Nwuda', 'Zenith Bank', '2369703042', 2, 'Ok', 1012);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
