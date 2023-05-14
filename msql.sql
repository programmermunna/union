-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 09:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `union`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `permision` varchar(255) NOT NULL DEFAULT 'Pending',
  `join_date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `email`, `address`, `pass`, `file`, `permision`, `join_date`) VALUES
(1, 'User Name', 'admin@gmail.com', 'Dhaka,Bangladesh', '81dc9bdb52d04dc20036dbd8313ed055', '255357887_1202178876970986_919055617754994409_n.jpg', 'Pending', 1668441841),
(28, 'sohan', 'sohan@gmail.com', 'sirajganj Bangladesh', '81dc9bdb52d04dc20036dbd8313ed055', 'bag.png', 'Success', 1669566539),
(29, 'MIM', 'mim@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 'IMG_20230226_151221_250-01 (1).jpeg', 'Pending', 1680075043);

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
  `village` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `word_no` varchar(255) NOT NULL,
  `family_member` int(255) NOT NULL,
  `male` int(255) NOT NULL,
  `female` int(255) NOT NULL,
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
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `admin_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `vlg_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`admin_id`, `id`, `vlg_id`, `name`, `time`) VALUES
(345345, 19, 22, 'মুকন্দগাতী পুর্ব পাড়া', 0),
(345345, 22, 22, 'মুকন্দগাতী পশ্চিম পাড়া', 0),
(345345, 24, 19, 'চালা পুর্ব পাড়া', 0),
(345345, 25, 19, 'চালা পশ্চিম পাড়া', 0),
(345435, 27, 25, 'ভেন্নাগাছি পুর্ব পাড়া', 0),
(345435, 28, 25, 'ভেন্নাগাছি পশ্চিম পাড়া', 0),
(345435, 29, 24, 'দুকুরিয়া পুর্ব পাড়া', 0);

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
(1, 'Munna Hasan', 'admin@gmail.com', 'Dinajpur, Bangladesh', '81dc9bdb52d04dc20036dbd8313ed055', 'munna.jpg', 1684048394);

-- --------------------------------------------------------

--
-- Table structure for table `union_name`
--

CREATE TABLE `union_name` (
  `id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `union_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `union_name`
--

INSERT INTO `union_name` (`id`, `admin_id`, `union_name`, `pass`, `time`) VALUES
(1, 345345, 'বেলকুচি সদর ইউনিয়ন', '81dc9bdb52d04dc20036dbd8313ed055', 1680868115),
(3, 345435, 'ভাঙ্গাবাড়ী ইউনিয়ন', '81dc9bdb52d04dc20036dbd8313ed055', 1680868115),
(5, 345435, 'ধুকুরিয়াবেড়া ইউনিয়ন', '81dc9bdb52d04dc20036dbd8313ed055', 1680868115),
(6, 4564536, 'বড়ধুল ইউনিয়ন', '81dc9bdb52d04dc20036dbd8313ed055', 1680868115),
(9, 41172567, 'রাজাপুর ইউনিয়ন', '81dc9bdb52d04dc20036dbd8313ed055', 1680868115),
(10, 78415440, 'দৌলতপুর ইউনিয়ন', '81dc9bdb52d04dc20036dbd8313ed055', 1680868123);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `admin_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `edit_permision` varchar(255) NOT NULL DEFAULT 'OFF',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`admin_id`, `id`, `name`, `edit_permision`, `time`) VALUES
(345345, 19, 'চালা', 'ON', 0),
(345345, 22, 'মুকন্দগাতী', 'ON', 0),
(345435, 24, 'দুকুরিয়া', 'OFF', 0),
(345435, 25, 'ভেন্নাগাছি', 'OFF', 0),
(345345, 35, 'চন্দনগাতী', 'OFF', 1683970469);

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
(1, 'mortgage.png', 'google-logo-transparent.png', 'mkiua', 'example@gmail.com', 'Sirajganj, Banlgadesh', 1665301857, '�2023 all rights reserved.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
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
-- Indexes for table `section`
--
ALTER TABLE `section`
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
-- Indexes for table `village`
--
ALTER TABLE `village`
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
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `union_name`
--
ALTER TABLE `union_name`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
