-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 07:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkiua`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_up`
--

CREATE TABLE `admin_up` (
  `id` int(255) NOT NULL,
  `union_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_up`
--

INSERT INTO `admin_up` (`id`, `union_id`, `name`, `phone`, `address`, `pass`, `password`, `file`) VALUES
(1, 1, 'নুরুল হক', '0123456789', 'Dhaka,Bangladesh', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'grahok.png');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টওয়ার্ড', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', '22.7180905', '89.0687033', 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', '22.6422689', '90.2003932', 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', '22.5781398', '89.9983909', 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', '22.7004179', '90.3731568', 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', '22.159182', '90.125581', 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', '23.2060195', '90.3477725', 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.264145', '89.918029', 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', '23.8602262', '90.0018293', 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', '23.5435742', '90.5354327', 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', '25.9165451', '89.4532409', 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িওয়ার্ড', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
(1, 'Chattagram', 'চট্টওয়ার্ড', 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `mail_setting`
--

CREATE TABLE `mail_setting` (
  `id` int(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` int(255) NOT NULL,
  `smtp_user_name` varchar(255) NOT NULL,
  `smtp_user_pass` varchar(255) NOT NULL,
  `smtp_security` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_replay_email` varchar(255) NOT NULL,
  `sms_token` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail_setting`
--

INSERT INTO `mail_setting` (`id`, `smtp_host`, `smtp_port`, `smtp_user_name`, `smtp_user_pass`, `smtp_security`, `site_email`, `site_replay_email`, `sms_token`) VALUES
(1, 'mail.xdomainhost.com', 465, 'store@xdomainhost.com', 'DTk^=PgMp7_V', 'ssl', 'store@xdomainhost.com', 'store@xdomainhost.com', 'xxxxx xxxxx xxxxx xxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `terms` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about`, `terms`) VALUES
(1, '<div><br></div><div><h1 style=\"text-align: center;\">আমাদের সম্পর্কে</h1><div>বাংলাদেশ সরকারের কর সংগ্রাহক হিসেবে, দেশের আর্থিক স্থিতিশীলতা ও প্রবৃদ্ধি নিশ্চিত করতে আপনার ভূমিকা অত্যন্ত গুরুত্বপূর্ণ। আপনি ব্যক্তি, ব্যবসা এবং অন্যান্য সংস্থার কাছ থেকে কর সংগ্রহ করে দেশের অর্থনৈতিক উন্নয়নে একটি অপরিহার্য ভূমিকা পালন করেন।</div><div><br></div><div>কর সংগ্রহ করা একটি জটিল কাজ যার মধ্যে উল্লেখযোগ্য পরিমাণে দায়িত্ব, জবাবদিহিতা এবং পেশাদারিত্ব জড়িত। এটি কেবল অর্থ সংগ্রহের বিষয়ে নয় বরং কর আইন এবং প্রবিধানগুলির সাথে সম্মতি নিশ্চিত করা, করদাতাদের তাদের বাধ্যবাধকতা সম্পর্কে শিক্ষিত করা এবং যাদের এটি প্রয়োজন তাদের সহায়তা প্রদানের বিষয়েও।</div><div><br></div><div>সরকার বিভিন্ন জনসেবা, যেমন অবকাঠামো উন্নয়ন, শিক্ষা, স্বাস্থ্যসেবা, এবং সামাজিক কল্যাণ কর্মসূচির অর্থায়নের জন্য কর সংগ্রহের উপর নির্ভর করে। কর সংগ্রাহক হিসাবে, আপনি নিশ্চিত করতে সাহায্য করেন যে এই প্রয়োজনীয় পরিষেবাগুলিকে অর্থায়ন করার জন্য সরকারের কাছে পর্যাপ্ত সংস্থান রয়েছে।</div><div><br></div><div>আপনার কাজ শুধু কর আদায়ের মধ্যেই সীমাবদ্ধ নয়; ট্যাক্স কমপ্লায়েন্স এবং সচেতনতা বৃদ্ধিতেও আপনার গুরুত্বপূর্ণ ভূমিকা রয়েছে। এর মধ্যে রয়েছে করদাতাদের তাদের অধিকার ও দায়িত্ব সম্পর্কে শিক্ষিত করা, কর আইন ও প্রবিধানের বিষয়ে নির্দেশনা প্রদান এবং যাদের প্রয়োজন তাদের সহায়তা প্রদান করা।</div><div><br></div><div>উপরন্তু, আপনার কাজ কর ফাঁকি এবং জালিয়াতি মোকাবেলায় সহায়তা করে, যা বাংলাদেশ সহ অনেক উন্নয়নশীল দেশে উল্লেখযোগ্য চ্যালেঞ্জ। কর ফাঁকি এবং জালিয়াতি সনাক্ত এবং প্রতিরোধ করে, আপনি নিশ্চিত করতে সাহায্য করেন যে প্রত্যেকে তাদের ন্যায্য অংশের করের প্রদান করে, যা ফলস্বরূপ একটি ন্যায্য এবং আরও ন্যায়সঙ্গত সমাজে অবদান রাখে।</div><div><br></div><div>সংক্ষেপে, বাংলাদেশ সরকারের কর সংগ্রাহক হিসাবে, আপনি দেশের অর্থনৈতিক উন্নয়ন ও প্রবৃদ্ধিতে গুরুত্বপূর্ণ ভূমিকা পালন করেন। আপনার কাজ শুধু অর্থ সংগ্রহের বিষয়ে নয়, সম্মতি নিশ্চিত করা, করদাতাদের শিক্ষিত করা, সহায়তা প্রদান এবং কর ফাঁকি ও জালিয়াতির বিরুদ্ধে লড়াই করা। আমরা এই অপরিহার্য কাজের জন্য আপনার উত্সর্গের প্রশংসা করি এবং আপনার গুরুত্বপূর্ণ কাজে সাফল্য কামনা করি।</div><div><br></div><div><div>নিশ্চয়ই বাংলাদেশে কর আদায়কারীদের কাজের আরও অনেক কিছু আছে। এখানে বিবেচনা করার জন্য কিছু অতিরিক্ত পয়েন্ট রয়েছে:</div><div><br></div><div>কর সংগ্রহ একটি চলমান প্রক্রিয়া যার জন্য ক্রমাগত পর্যবেক্ষণ এবং মূল্যায়ন প্রয়োজন। যেমন, কর সংগ্রাহকদের অবশ্যই ট্যাক্স আইন এবং প্রবিধান, অর্থনৈতিক প্রবণতা এবং কর সংগ্রহকে প্রভাবিত করতে পারে এমন অন্যান্য কারণগুলির পরিবর্তনগুলি সম্পর্কে অবগত থাকতে হবে। তারা তাদের লক্ষ্য এবং উদ্দেশ্য পূরণ করছে তা নিশ্চিত করার জন্য তাদের সংগ্রহের কৌশলগুলিকে সেই অনুযায়ী সামঞ্জস্য করতে প্রস্তুত থাকতে হবে।</div><div><br></div><div>কর সংগ্রহকারীদের অবশ্যই করদাতা, সরকারী কর্মকর্তা এবং অন্যান্য সংস্থা সহ স্টেকহোল্ডারদের একটি বিস্তৃত পরিসরের সাথে কার্যকরভাবে যোগাযোগ করতে সক্ষম হতে হবে। তারা অবশ্যই জটিল ট্যাক্স সমস্যাগুলিকে স্পষ্ট এবং বোধগম্য ভাষায় ব্যাখ্যা করতে সক্ষম হবেন এবং পেশাদার এবং বিনয়ী পদ্ধতিতে প্রশ্ন এবং উদ্বেগের উত্তর দিতে সক্ষম হবেন।</div><div><br></div><div>ট্যাক্স সংগ্রহ প্রায়ই একটি চ্যালেঞ্জিং এবং চাহিদাপূর্ণ কাজ যার জন্য বিশদ, নির্ভুলতা এবং সততার প্রতি উচ্চ স্তরের মনোযোগ প্রয়োজন। ট্যাক্স সংগ্রহকারীদের অবশ্যই প্রচুর পরিমাণে ডেটা এবং তথ্য পরিচালনা করতে সক্ষম হতে হবে, সম্ভাব্য ত্রুটি এবং অসঙ্গতিগুলি সনাক্ত করতে সক্ষম হতে হবে এবং নিশ্চিত করতে হবে যে সমস্ত লেনদেন সঠিকভাবে নথিভুক্ত এবং নথিভুক্ত করা হয়েছে।</div><div><br></div><div>কর সংগ্রহের পাশাপাশি, কর আদায়কারীরা কর আইন ও প্রবিধানের সাথে সম্মতি নিশ্চিত করার জন্য করদাতাদের নিরীক্ষা ও তদন্তের সাথে জড়িত হতে পারে। এর জন্য অ্যাকাউন্টিং, আর্থিক বিশ্লেষণ এবং ডেটা ব্যাখ্যায় উচ্চ স্তরের দক্ষতা এবং দক্ষতা প্রয়োজন।</div><div><br></div><div>কর সংগ্রাহকদের অবশ্যই একটি দলের অংশ হিসাবে কার্যকরভাবে কাজ করতে সক্ষম হতে হবে, সাধারণ উদ্দেশ্য অর্জনের জন্য সহকর্মী, উর্ধ্বতন এবং অন্যান্য স্টেকহোল্ডারদের সাথে সহযোগিতা করতে হবে। তারা তাদের লক্ষ্য অর্জনে তথ্য শেয়ার করতে, প্রতিক্রিয়া প্রদান করতে এবং একে অপরকে সমর্থন করতে সক্ষম হতে হবে।</div><div><br></div><div><span style=\"font-weight: 700;\">সংক্ষেপে,</span>&nbsp;বাংলাদেশে কর সংগ্রহ একটি বহুমুখী এবং চ্যালেঞ্জিং কাজ যার জন্য উচ্চ স্তরের দক্ষতা, পেশাদারিত্ব এবং নিষ্ঠার প্রয়োজন। জনসংখ্যাকে প্রয়োজনীয় সেবা প্রদানের জন্য সরকারের প্রয়োজনীয় সংস্থান রয়েছে তা নিশ্চিত করে কর সংগ্রহকারীরা দেশের অর্থনৈতিক উন্নয়নে গুরুত্বপূর্ণ ভূমিকা পালন করে। আমরা এই গুরুত্বপূর্ণ কাজের জন্য আপনার কঠোর পরিশ্রম এবং উত্সর্গকে অভিনন্দন জানাই।</div><div><br></div><div><br></div></div></div>', '<br><div><div><h1 style=\"text-align: center;\">নিতিমালা</h1></div><div>আপনার সংস্থা যে ধরনের ব্যক্তিগত তথ্য সংগ্রহ করে তা স্পষ্টভাবে সংজ্ঞায়িত করুন। এর মধ্যে নাম, ঠিকানা, সামাজিক নিরাপত্তা নম্বর, ট্যাক্স শনাক্তকরণ নম্বর এবং ট্যাক্স সংগ্রহের উদ্দেশ্যে প্রয়োজনীয় অন্যান্য ব্যক্তিগত তথ্য অন্তর্ভুক্ত থাকতে পারে।</div><div><br></div><div>ব্যাক্তিগত তথ্য কিভাবে সংগ্রহ করা হয়, সংরক্ষণ করা হয় এবং ব্যবহার করা হয় তা ব্যাখ্যা করুন। এতে ব্যক্তিগত তথ্য সংগ্রহের জন্য ব্যবহৃত পদ্ধতি, ব্যক্তিগত তথ্য সঞ্চয় করতে ব্যবহৃত স্টোরেজ সুবিধা এবং সিস্টেমের ধরন এবং ব্যক্তিগত তথ্য যে উদ্দেশ্যে ব্যবহার করা হয় তার বিবরণ অন্তর্ভুক্ত করা উচিত।</div><div><br></div><div>কোন পরিস্থিতিতে ব্যক্তিগত তথ্য শেয়ার করা বা প্রকাশ করা যেতে পারে তার রূপরেখা দিন। এতে এমন পরিস্থিতির একটি বিবরণ অন্তর্ভুক্ত করা উচিত যার অধীনে ব্যক্তিগত তথ্য তৃতীয় পক্ষের সাথে ভাগ করা যেতে পারে, যেমন অন্যান্য সরকারী সংস্থা, কর কর্তৃপক্ষ, বা ট্যাক্স সংগ্রহ এবং প্রয়োগের সাথে জড়িত অন্যান্য সংস্থা।</div><div><br></div><div>ব্যক্তিগত তথ্য রক্ষা করার জন্য নিরাপত্তা ব্যবস্থা বর্ণনা করুন। এটিতে অননুমোদিত অ্যাক্সেস, চুরি, ক্ষতি বা ধ্বংসের বিরুদ্ধে ব্যক্তিগত তথ্য রক্ষা করার জন্য ব্যবহৃত পদ্ধতিগুলির একটি বিবরণ অন্তর্ভুক্ত করা উচিত।</div><div><br></div><div>ব্যাখ্যা করুন কিভাবে ব্যক্তিরা তাদের ব্যক্তিগত তথ্য অ্যাক্সেস এবং আপডেট করতে পারে। এটিতে ব্যক্তিদের তাদের ব্যক্তিগত তথ্য অ্যাক্সেস করতে, কোনো ত্রুটি বা ভুলত্রুটি সংশোধন করতে এবং তাদের ব্যক্তিগত তথ্য আপডেট করার অনুমতি দেওয়ার জন্য ব্যবহৃত পদ্ধতিগুলির একটি বিবরণ অন্তর্ভুক্ত করা উচিত।</div><div><br></div><div>গোপনীয়তা সম্পর্কিত অভিযোগ এবং উদ্বেগগুলি পরিচালনা করার পদ্ধতিগুলি রূপরেখা করুন৷ এটিতে গোপনীয়তা সম্পর্কিত অভিযোগ এবং উদ্বেগগুলি পরিচালনা করার জন্য ব্যবহৃত পদ্ধতিগুলির একটি বিবরণ অন্তর্ভুক্ত করা উচিত, যার মধ্যে একটি অভিযোগ দায়ের করার পদ্ধতি, অভিযোগের প্রতিক্রিয়া জানানোর সময়সীমা এবং গোপনীয়তার উদ্বেগ সম্পর্কে ব্যক্তিদের সাথে যোগাযোগ করার জন্য ব্যবহৃত পদ্ধতিগুলি অন্তর্ভুক্ত করা উচিত।</div><div><br></div><div>এগুলি কেবল কয়েকটি সাধারণ নির্দেশিকা যা আপনাকে আপনার নিজস্ব গোপনীয়তা নীতি বিকাশে সহায়তা করতে পারে৷ আপনার গোপনীয়তা নীতি ব্যাপক, নির্ভুল এবং আইনগতভাবে প্রয়োগযোগ্য তা নিশ্চিত করতে আইনি পরামর্শ এবং অন্যান্য বিশেষজ্ঞদের সাথে ঘনিষ্ঠভাবে কাজ করা গুরুত্বপূর্ণ।</div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `admin_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `id_no` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `division_id` int(255) NOT NULL,
  `district_id` int(255) NOT NULL,
  `upazila_id` int(255) NOT NULL,
  `union_id` int(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `word_no` varchar(255) NOT NULL,
  `family_member` varchar(255) NOT NULL,
  `male` varchar(255) NOT NULL,
  `female` varchar(255) NOT NULL,
  `holding_no` varchar(255) NOT NULL,
  `nid_no` varchar(300) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL,
  `net_worth` int(255) NOT NULL,
  `annual_tax` int(255) NOT NULL,
  `ablable_tax` int(255) NOT NULL,
  `due_tax` int(255) NOT NULL,
  `present_year` varchar(255) NOT NULL,
  `mobile_no` varchar(300) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `obostha` varchar(255) NOT NULL DEFAULT 'বহাল',
  `file_name` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`admin_id`, `id`, `id_no`, `name`, `guardian_name`, `division_id`, `district_id`, `upazila_id`, `union_id`, `ward`, `word_no`, `family_member`, `male`, `female`, `holding_no`, `nid_no`, `profession`, `home`, `net_worth`, `annual_tax`, `ablable_tax`, `due_tax`, `present_year`, `mobile_no`, `status`, `obostha`, `file_name`, `time`) VALUES
(345345, 1, 36992266, 'কেএম মনিরুল  ইসলাম (মনির)', 'মৃত আব্দর রহমান খান', 2, 12, 104, 1, '19', '১', '৭', '৪', '৩', '৩৪', '৮৮১১১৪০৭৬৫৩', 'ব্যবসা', 'আধাপাকা', 60000, 200, 200, 0, '2020 - 2021', '০১৭৬২৫৮৯৬১৫', 'Success', 'বহাল', 'monir.jpg', 1686113659),
(345345, 74, 89008225, 'বারেক', 'তারেক', 2, 12, 104, 1, '22', '৭', '৫', '৩', '২', '১৬৫৮৫৮', '২৫৬৪৫৮৪১২', 'কৃষি', 'আধাপাকা', 200000, 200, 199, 0, '2020 - 2021', '012498525521', 'Success', 'বহাল', 'barek.jpg', 1686117700),
(345345, 75, 10741993, 'নবাব', 'শফিক', 2, 12, 104, 1, '22', '৭', '৩', '২', '১', '৫৮৪৫৫৫', '২৬২৪১৫৬৪১৩', 'দিন-মজুর', 'কাঁচা', 100000, 100, 50, 50, '2020 - 2021', '019556552821', 'Success', 'বহাল', 'nobab.jpg', 1686117771),
(345345, 76, 1576890, 'মোঃ শাহ আলম সরকার', 'মোঃ শাজেদ সরকার', 2, 12, 104, 1, '22', '৭', '৫', '২', '৩', '৬৪৬৪', '২৬৪১১৬', 'ব্যবসা', 'আধাপাকা', 500000, 5000, 300, 200, '2021 - 2022', '014187555', 'Success', 'বহাল', 'shahalom.jpg', 1686118093),
(345345, 77, 34385199, 'মোঃ কুদ্দুস আলি', 'মোঃ কাদের আলি', 2, 12, 104, 1, '22', '৭', '৩', '২', '১', '৪৩৪৩৪৩৩', '৩৪৩৪৩৪৩৪৩', 'দিন-মজুর', 'কাঁচা', 10000, 100, 100, 0, '2021 - 2022', '01254185415245', 'Success', 'বহাল', 'kuddus.jpg', 1686118241),
(345345, 78, 72577602, 'মোঃ বরকত  আলি', 'মোঃ শাহজাহান  আলি', 2, 12, 104, 1, '22', '৭', '৮', '৪', '৪', '৫৪৫৬৪৬', '৪৮৫৪২৬১৬২', 'প্রবাসী', 'টিনসেট', 700000, 700, 500, 199, '2021 - 2022', '018748445', 'Success', 'বহাল', 'borkot.jpg', 1686118306),
(345345, 79, 27295580, 'মোঃ আনোয়ার হোসেন', 'মোঃ আনসার হোসেন', 2, 12, 104, 1, '22', '৭', '৬', '৩', '৩', '৫৬৬৫৬৫', '৪৬৫৬৫৬৫', 'কৃষি', 'কাঁচা', 99998, 100, 100, 0, '2021 - 2022', '019234234234', 'Success', 'বহাল', 'anowar.jpg', 1686118382),
(345345, 80, 98583791, 'মোঃ জব্বার মিয়া', 'মোঃ জহুরুল মিয়া', 2, 12, 104, 1, '22', '৭', '৫', '২', '৩', '৪১৫৪৬৪১', '২৬৪৫৬৪১৬৪', 'চাকুরি', 'আধাপাকা', 500000, 500, 400, 100, '2022 - 2023', '019514541251', 'Success', 'বহাল', 'jobbar.jpg', 1686118483),
(345345, 81, 16290319, 'মোঃ জাবেদ করিম', 'মোঃ শাহাবুদ্দিহন', 2, 12, 104, 1, '22', '৭', '৫', '৪', '১', '৬৪৫৬৬৫২', '৬১৫৬১৫৬৪৫৬৪', 'চাকুরি', 'আধাপাকা', 300000, 300, 300, 0, '2022 - 2023', '019822662656', 'Success', 'বহাল', 'korim.jpg', 1686118561),
(345345, 82, 25010155, 'মোঃ রফিক শেখ', 'মোঃ মজনু শেখ', 2, 12, 104, 1, '22', '৭', '৬', '৩', '৩', '৩৪৩৪৩৪', '৪৩৪৩৪৩৪', 'চাকুরি', 'আধাপাকা', 800000, 800, 800, 0, '2022 - 2023', '0195234523523', 'Success', 'বহাল', 'rofik.jpg', 1686118679),
(345345, 83, 60030117, 'মোঃ এনায়েত চৌধুরি', 'মোঃ পরশ চৌধুরি', 2, 12, 104, 1, '22', '৭', '৭', '৪', '৩', '৫২২৩৫২৩৫', '২৩৫২৩৫৩২৫২৩৫', 'ব্যবসা', 'বিল্ডিং', 3000000, 3000, 3000, 0, '2022 - 2023', '0175256121251', 'Success', 'বহাল', 'kamal.jpg', 1686119323),
(345345, 84, 71463003, 'মোঃ আমজাদ হোসেন', 'মোঃ রফিকুল হোসেন', 2, 12, 104, 1, '22', '৭', '৫', '৩', '২', '১৬৫৮৫২৩৪২৮', '২৩৪২৩৪৩৫২৩৫', 'ব্যবসা', 'বিল্ডিং', 9000000, 8999, 8999, 0, '2022 - 2023', '018454545454', 'Success', 'বহাল', 'amzad.jpg', 1686119441),
(345345, 85, 42404152, 'মোঃ রাকিবুল হাসান', 'মোঃ আসমাউল হোসেন', 2, 12, 104, 1, '22', '2', '6', '2', '4', '56', '8811140216395', 'চাকুরি', 'আধাপাকা', 50000, 200, 200, 0, '2022 - 2023', '01755359565', 'Pending', 'বহাল', 'avatar.jpg', 1686452620),
(345345, 86, 98400955, 'মোঃ হুমায়ন পারভেজ', 'মোঃ করিম ‍উদ্দিন', 2, 12, 104, 1, '22', '3', '8', '5', '3', '52', '8811140216633', 'ব্যবসা', 'বিল্ডিং', 100000, 399, 300, 100, '2022 - 2023', '01922958459', 'Pending', 'বহাল', 'avatar.jpg', 1686452825);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `name`, `email`, `address`, `pass`, `file`, `time`) VALUES
(1, 'MD Habibur Rahman', 'admin@gmail.com', 'Sirajganj, Bangladesh', '6b6acc4aed6bc112661496490721d660', 'habib.jpg', 1686038347);

-- --------------------------------------------------------

--
-- Table structure for table `union_name`
--

CREATE TABLE `union_name` (
  `id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `upazila_id` int(255) NOT NULL,
  `bn_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `union_name`
--

INSERT INTO `union_name` (`id`, `admin_id`, `upazila_id`, `bn_name`, `pass`, `time`) VALUES
(1, 345345, 104, 'বেলকুচি সদর ইউনিয়ন', '1e34f33db22bb2947b7fd607263246fa', 1680868115),
(3, 345435, 104, 'ভাঙ্গাবাড়ী ইউনিয়ন', '1e34f33db22bb2947b7fd607263246fa', 1680868115),
(5, 345435, 104, 'ধুকুরিয়াবেড়া ইউনিয়ন', '1e34f33db22bb2947b7fd607263246fa', 1680868115),
(6, 4564536, 104, 'বড়ধুল ইউনিয়ন', '1e34f33db22bb2947b7fd607263246fa', 1680868115),
(9, 41172567, 104, 'রাজাপুর ইউনিয়ন', '1e34f33db22bb2947b7fd607263246fa', 1680868115),
(10, 78415440, 104, 'দৌলতপুর ইউনিয়ন', '1e34f33db22bb2947b7fd607263246fa', 1680868123),
(19, 23581913, 19, 'ফেনি', 'e13ddec56439342cd8805feca3035011', 1685193797);

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(3) NOT NULL,
  `district_id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd'),
(5, 1, 'Chauddagram', 'চৌদ্দওয়ার্ড', 'chauddagram.comilla.gov.bd'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    '),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd'),
(128, 14, 'Nondigram', 'নন্দিওয়ার্ড', 'nondigram.bogra.gov.bd'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd'),
(145, 16, 'Baraigram', 'বড়াইওয়ার্ড', 'baraigram.natore.gov.bd'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd'),
(355, 45, 'Austagram', 'অষ্টওয়ার্ড', 'austagram.kishoreganj.gov.bd'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd'),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd'),
(420, 55, 'Patgram', 'পাটওয়ার্ড', 'patgram.lalmonirhat.gov.bd'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd'),
(448, 60, 'Kurigram Sadar', 'কুড়িওয়ার্ড সদর', 'kurigramsadar.kurigram.gov.bd'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd'),
(492, 9, 'Eidgaon', 'ঈদগাঁও', 'null'),
(493, 39, 'Madhyanagar', 'মধ্যনগর', 'null'),
(494, 50, 'Dasar', 'ডাসার', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `admin_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `union_id` int(255) NOT NULL,
  `bn_name` varchar(255) NOT NULL,
  `edit_permision` varchar(255) NOT NULL DEFAULT 'OFF',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`admin_id`, `id`, `union_id`, `bn_name`, `edit_permision`, `time`) VALUES
(345345, 19, 1, 'চালা', 'ON', 0),
(345345, 22, 1, 'মুকন্দগাতী', 'ON', 0),
(345435, 24, 1, 'দুকুরিয়া', 'OFF', 0),
(345435, 25, 1, 'ভেন্নাগাছি', 'OFF', 0),
(345345, 35, 1, 'চন্দনগাতী', 'OFF', 1683970469);

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE `website_setting` (
  `id` int(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_setting`
--

INSERT INTO `website_setting` (`id`, `favicon`, `logo`, `name`, `email`, `address`, `time`, `footer_text`) VALUES
(1, 'mortgage.png', 'logo.png', 'mkiua', 'example@gmail.com', 'Sirajganj, Banlgadesh', 1665301857, 'mkiua software');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_up`
--
ALTER TABLE `admin_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_setting`
--
ALTER TABLE `mail_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `union_name`
--
ALTER TABLE `union_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_up`
--
ALTER TABLE `admin_up`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mail_setting`
--
ALTER TABLE `mail_setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `union_name`
--
ALTER TABLE `union_name`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
