-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 07:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproperty`
--

CREATE TABLE `addproperty` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `Flatid` int(11) NOT NULL,
  `flat_location` varchar(20) NOT NULL,
  `flat_size` int(5) NOT NULL,
  `floor_number` int(11) NOT NULL,
  `bedrooms` int(2) NOT NULL,
  `washrooms` int(2) NOT NULL,
  `balcony` int(2) NOT NULL,
  `kitchen` int(1) NOT NULL,
  `living_room` int(1) NOT NULL,
  `dinning_room` int(1) NOT NULL,
  `flat_type` varchar(10) NOT NULL,
  `photos` blob NOT NULL,
  `rent` int(6) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending ',
  `available_status` varchar(200) NOT NULL DEFAULT 'Available '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addproperty`
--

INSERT INTO `addproperty` (`name`, `email`, `phone_number`, `Flatid`, `flat_location`, `flat_size`, `floor_number`, `bedrooms`, `washrooms`, `balcony`, `kitchen`, `living_room`, `dinning_room`, `flat_type`, `photos`, `rent`, `status`, `available_status`) VALUES
('Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', '', 8, 'Uttara-12', 2900, 3, 3, 4, 5, 1, 1, 1, 'Family', 0x75706c6f6164732f313535333238362d383030783630302e6a70672c75706c6f6164732f313535333238372d383030783630302e6a70672c75706c6f6164732f313535333238382d383030783630302e6a70672c75706c6f6164732f313535333238392d383030783630302e6a70672c75706c6f6164732f313535333239302d383030783630302e6a70672c75706c6f6164732f313535333239312d383030783630302e6a70672c75706c6f6164732f313535333239322d383030783630302e6a70672c75706c6f6164732f313535333239332d383030783630302e6a70672c75706c6f6164732f313535333239342d383030783630302e6a70672c75706c6f6164732f313535333239352d383030783630302e6a7067, 80000, 'approved', 'Available'),
('Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', '', 11, 'Baada', 900, 5, 2, 2, 2, 1, 1, 1, 'Family', 0x75706c6f6164732f313538323138322d383030783630302e6a70672c75706c6f6164732f313538323138332d383030783630302e6a70672c75706c6f6164732f313538323138342d383030783630302e6a70672c75706c6f6164732f313538323138352d383030783630302e6a70672c75706c6f6164732f313538323138362d383030783630302e6a70672c75706c6f6164732f313538323138372d383030783630302e6a70672c75706c6f6164732f313538323138382d383030783630302e6a70672c75706c6f6164732f313538323138392d383030783630302e6a70672c75706c6f6164732f313538323139302d383030783630302e6a7067, 20000, 'approved', 'Available'),
('Faisal Ahmed', 'faisalahmed@gmail.com', '', 12, 'Banasree', 2200, 6, 4, 3, 3, 1, 1, 1, 'Family', 0x75706c6f6164732f313533333233302d383030783630302e6a70672c75706c6f6164732f313533333233312d383030783630302e6a70672c75706c6f6164732f313533333233322d383030783630302e6a70672c75706c6f6164732f313533333233332d383030783630302e6a70672c75706c6f6164732f313533333233342d383030783630302e6a70672c75706c6f6164732f313533333233352d383030783630302e6a70672c75706c6f6164732f313533333233362d383030783630302e6a70672c75706c6f6164732f313533333233372d383030783630302e6a70672c75706c6f6164732f313533333233382d383030783630302e6a7067, 31000, 'approved', 'Booked'),
('kawsar Habib', 'kawsarhabib@gmail.com', '', 14, 'Baridhara', 5500, 7, 5, 6, 5, 1, 1, 1, 'Family', 0x75706c6f6164732f313630313932392d383030783630302e6a70672c75706c6f6164732f313630313933302d383030783630302e6a70672c75706c6f6164732f313630313933312d383030783630302e6a70672c75706c6f6164732f313630313933322d383030783630302e6a70672c75706c6f6164732f313630313933332d383030783630302e6a70672c75706c6f6164732f313630313933342d383030783630302e6a70672c75706c6f6164732f313630313933352d383030783630302e6a70672c75706c6f6164732f313630313933362d383030783630302e6a70672c75706c6f6164732f313630313933372d383030783630302e6a70672c75706c6f6164732f313630313933382d383030783630302e6a70672c75706c6f6164732f313630313933392d383030783630302e6a70672c75706c6f6164732f313630313934302d383030783630302e6a70672c75706c6f6164732f313630313934312d383030783630302e6a7067, 500000, 'approved', 'Booked'),
('kawsar Habib', 'kawsarhabib@gmail.com', '', 17, 'Malibag', 1185, 2, 3, 3, 2, 1, 1, 1, 'Family', 0x75706c6f6164732f313431343530392d383030783630302e6a70672c75706c6f6164732f313431343531342d383030783630302e6a70672c75706c6f6164732f313431343531372d383030783630302e6a70672c75706c6f6164732f313431343532302d383030783630302e6a70672c75706c6f6164732f313431343532312d383030783630302e6a70672c75706c6f6164732f313431343532332d383030783630302e6a7067, 28000, 'approved', 'Available'),
('Faisal Ahmed', 'faisalahmed@gmail.com', '', 21, 'gulsan', 8000, 0, 2, 3, 2, 1, 2, 1, 'Bachelor', 0x75706c6f6164732f636c656d656e742d72656d6f6e642d706457513741462d754f672d756e73706c6173682e6a7065672c75706c6f6164732f6465762e776562702c75706c6f6164732f696d672d322e6a7067, 45000, 'pending', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `content` varchar(2555) NOT NULL,
  `email` varchar(200) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `writer`, `content`, `email`, `img`, `status`) VALUES
(1, 'বাসা ভাড়া নেওয়ার সময় যে বিষয়গুলো খেয়াল রাখা উচিত', 'Md. Roger D Zero', 'নগরায়ন ও বিশ্বায়নের এ যুগে মানুষ শহরমুখী হচ্ছে। তুলনামূলক উন্নত জীবনযাপন অথবা জীবিকার তাগিদে নিজের বসতভিটা ছেড়ে সবাই পাড়ি জমায় শহরে। দেশের রাজধানীসহ বিভিন্ন জেলা শহরে মানুষ থাকতে শুরু করেছে ভাড়া বাড়িতে। বাসা ভাড়া পেতে মুখাপেক্ষী হতে হয় নানান ঝামেলার। নিজের কর্মস্থল থেকে বাসাটি কতদূর, যাতায়ত ব্যবস্থা কেমন, সন্তানদের জন্য শিক্ষা প্রতিষ্ঠান কতদূর, নিরাপত্তা ব্যবস্থা কেমন ইত্যাদি বিষয়গুলো নিয়ে চিন্তা করতে হয়। তাই বাসা ভাড়া নেওয়ার পূর্বে ভাড়াটিয়া হিসেবে কি কি বিষয়গুলো খেয়াল রাখা উচিত, চলুন জেনে নেয়া যাক।\r\n\r\nবাসার ভিতর ও বাহির পর্যবেক্ষণ করাঃ একনজরে বাসার ভিতরের অবস্থা দেখতে হবে, আপনার চাহিদানুযায়ী রুমগুলো ঠিক আছে কিনা। বাথরুমের অবস্থা এবং দেয়াল স্যাঁতস্যাঁতে কিনা খেয়াল রাখতে হবে। জানালা দেখুন, ঘরে পর্যাপ্ত আলোবাতাস আসে কিনা খেয়াল করুন। আমাদের জীবনযাপনে সবচেয়ে গুরুত্বপর্ণ চাহিদার মধ্যে রয়েছে পানি, বিদ্যুৎ ও গ্যাস। বাড়িতে সব সময় পানি থাকে কি না এবং বাসার সব সংযোগ থেকে পানি আসে কি না পরীক্ষা করে নিন। দুর্ঘটনা এড়ানোর জন্য বাসায় কতগুলো বৈদ্যুতিক সকেট আছে, লাইট, ফ্যান লাগানোর পর্যাপ্ত ব্যবস্থা আছে কিনা দেখতে হবে। নিজস্ব গাড়ি থাকলে পার্কিংয়ের জন্য গ্যারেজ আছে কিনা দেখে নিতে পারেন। বাসায় ওঠার আগে বেসিনের কল নষ্ট বা দেয়ালের রঙ নষ্ট হয়ে হয়েছে কিনা দেখুন। নষ্ট থাকলে বাড়িওয়ালাকে দিয়ে এগুলো মেরামত করিয়ে নিতে পারেন।\r\n\r\nবাসার মালিক সম্পর্কে ভালোভাবে জানাঃ আপনি যার সাথে কথা বলছেন তিনি আসলেই বাসার মালিক কিনা ভালোভাবে জেনে নিন। বাসার মালিক যদি ঐ বাড়িতেই থাকেন তাহলে অনেক সুবিধা পাওয়া যায়। বাড়িটি কিছুদিনের মধ্যে বিক্রি হয়ে যাবে কিনা জানুন, বিক্রি হলে হয়তো আবার বাসা পাল্টানোর ঝামেলায় পড়তে হবে।\r\n\r\nযাতায়াত ব্যবস্থাঃ বাসা নেওয়ার পূর্বে অবশ্যই খেয়ালা রাখা উচিত বাসাটি থেকে আপনার কর্মস্থলে বা অন্যান্য গুরুত্বপূর্ণ জায়গায় যাতায়াত করা কতটা সহজ। পাশাপাশি আপনার পরিবারের অন্যান্য সদস্যদের যাতায়াতের কথাও মাথায় রাখতে হবে। বাজার, শপিংমল, স্কুল-কলেজ ইত্যাদি স্থান ও প্রতিষ্ঠানগুলো কতটুকু কাছাকাছি সেদিকে খেয়াল রাখতে হবে।\r\n\r\nনিরাপত্তা ব্যবস্থাঃ বাসাটি নেওয়ার পূর্বে ঐ এলাকার পরিবেশ কেমন জেনে নেওয়া উচিত। সকাল সন্ধ্যা অথবা রাতে যেকোনো সময় যেন নিরাপত্তার সাথে চলাচল করা যায় এমন পরিবেশ আছে কিনা যাচাই করুন। বাসাটি সিসি ক্যামেরার আওতাধীন হলে ভালো হয়। তাছাড়া গেইটে নিরাপত্তা প্রহরী আছে কিনা, হাঁটার রাস্তায় পর্যাপ্ত লাইট আছে কিনা দেখে নেওয়া উচিত।\r\n\r\nআশেপাশের পরিবেশঃ আপনার পাশের ফ্ল্যাটের প্রতিবেশী থেকে শুরু করে উপর তলার ফ্ল্যাটে অথবা নিচ তলার ফ্ল্যাটে কারা থাকছে জেনে নিতে পারেন। আশেপাশের রাস্তায় বা গলিতে ময়লার স্তূপ থাকলে ঐ এলাকায় বাসা না নেওয়াটাই উত্তম।', '', 'tolet.jpg', 'approve'),
(2, 'কেন THE TOLET এ বাসা ভাড়ার বিজ্ঞাপন দিবেন?', 'Whitebeard', 'একজন বাড়িওয়ালা হিসেবে THE TOLET এ বাসা ভাড়ার বিজ্ঞাপন দিলে আপনি যেসকল সুবিধা পাবেন। বিস্তারিত পড়তে পারেন এখানে-\r\n\r\nমাত্র পাঁচ টাকার বিনিময়ে THE TOLET এ বাড়ি ভাড়ার বিজ্ঞাপন দেওয়া যায়।\r\nদেয়ালে পোস্টার বা লিফলেট লাগানো অস্বস্তিকর এই ডিজিটাল যুগে। অস্বস্তিকর এমন কাজ করার চেয়ে আপনার হাতের স্মার্টফোনটির মাধ্যমে আপনার বাসার ভাড়ার বিজ্ঞাপন দিতে পারেন দুই মিনিটেই।\r\nবাড়ি ভাড়ার জন্য ফেসবুকে পোস্ট করলে অনেকেই অযথায় ইনবক্স অথবা ফোন করে। THE TOLET এ যেহেতু পেমেন্ট করে বাসার মালিকের যোগাযোগের তথ্য এবং ঠিকানা নিতে হয়, তাই প্রয়োজন ব্যতীত বিরক্ত করার সম্ভাবনা নেই।\r\nTHE TOLET এ যেহেতু প্রতিদিন অসংখ্য ভাড়াটিয়া বাসা খুঁজে থাকে তাই বাসাটি দ্রুত ভাড়া হওয়ার সম্ভাবনা থাকে। তাছাড়া THE TOLET এর ওয়েবসাইট অথবা অ্যাপে লোকেশন (যেমন- মিরপুর-১, মিরপুর, ঢাকা) ও ক্যাটাগরি (যেমন- ফ্যামিলি, ব্যাচেলর) অনুযায়ী বাসা খোঁজা যায় তাই নির্দিষ্ট এলাকায় এবং নির্দিষ্ট প্রয়োজনে যারা বাসা খুঁজছে তারাই আগ্রহী হয়ে বাসার মালিকের সাথে যোগাযোগের তথ্য সংগ্রহ করবে।\r\nবাসা ভাড়ার বিজ্ঞাপনে বাসার ছবি সংযুক্ত থাকলে, যাদের বাসাটি পছন্দ হবে তারাই শুধু যোগাযোগ করবে। এমনকি আপনার বাসাটি সরাসরি ভাড়াটিয়াকে দেখানোর প্রয়োজন কম হবে কারণ ছবি দেখেই বাসা পছন্দ করার একটা সুযোগ থাকছে।\r\nআপনার বাসা ভাড়ার বিজ্ঞাপনের তথ্য সঠিক থাকলে দ্রুতই পোস্টটি THE TOLET এর ওয়েবসাইট এবং অ্যাপে দেখা যাবে।\r\nআপনার বাসাটি দ্রুত ভাড়া হওয়ার জন্য THE TOLET টিম বিজ্ঞাপনটি সোশ্যাল মিডিয়া এবং অন্যান্য মাধ্যমে শেয়ার করবে।\r\nবাসা ভাড়া দেওয়ার জন্য এবং ভাড়া হওয়ার পর বাসার মালিকের কাছ থেকে কোনো অতিরিক্ত টাকা নেওয়া হবে না।\r\nআপনার বাসাটি ভাড়া হয়ে গেলে বিজ্ঞাপনটি নিষ্ক্রিয় করে রাখতে পারবেন, পরবর্তীতে চাইলে আবার সচল করতে পারবেন। ফলে বাড়ি ভাড়া হওয়ার পরও অযথা কল আসার সম্ভাবনা নেই।\r\nTHE TOLET এ আপনার প্রোফাইলে গিয়ে বাড়ি ভাড়ার বিজ্ঞাপনটি কতজন দেখেছে, কতগুলো ক্লিক হয়েছে এবং কতজন ভাড়াটিয়া নাম্বার সংগ্রহ করেছে সেগুলো দেখতে পারবেন।\r\nTHE TOLET এ পোস্ট করতে বেশি সময় লাগে না। এমনকি এখানে পোস্ট করার পর ভাড়ার জন্য অন্য কোথাও পোস্ট করতে হয় না। যার ফলে সময় নষ্ট হবে না। THE TOLET এ বাড়ি ভাড়ার বিজ্ঞাপন দেওয়ার পর দোকানে গিয়ে লিফলেট বানানোরও প্রয়োজন নেই। নিজের নাম্বার অনেক মানুষের সাথে শেয়ার হওয়ার সম্ভাবনাও থাকছে না। অর্থ, সময় ও তথ্যের নিরাপত্তা রক্ষা হবে আপনার।\r\nসময়, অর্থ, তথ্যের নিরাপত্তা ও সুন্দর পরিবেশ সৃষ্টির লক্ষ্যে একজন বাড়িওয়ালা হিসেবে THE TOLET এর অগ্রযাত্রায় আপনিও অংশগ্রহণ করুন সানন্দে।', '', 'tolet2.jpg', 'approve'),
(3, 'Important things to notice!', 'Azrail Islam', 'The House owner or agent of any house who posts his/her advertisement to The Tolet he/she is fully responsible for ensuring that advertising content, text, images uploaded for inclusion on The Tolet complies with all applicable laws and real content.\r\n\r\nAccount Information\r\nAny person can create an account on The Tolet. All account info should be real. If anyone creates a fake account and our team verifies that as a fake then the account will be permanently disabled in this platform. So ensure that all account information is real.\r\n\r\nName: Every user must add their valid name on their profile.\r\nPhone Number: The phone number is the most important information for profile and advertisement also, so this should also be real information. If anyone uses any fake number and our team verifies this number as a fake for this profile or advertisement then the profile and post can be blocked, paid, or non-paid post is the same process for blocking or breaking any rules.\r\nEmail: Users can add an email address on their profile. The email address of the User shall not be publicly displayed. The Tolet is permitted to send emails to the User through The Tolet.\r\nGender: Your gender information will be kept secure and will not be shared with third parties without your explicit consent. You have the right to access, correct, or delete your gender information by contacting us.\r\nDistrict: As a primary location you can add district name on your profile. Your district information will be handled in accordance with our privacy policy.\r\nAccount Image\r\nEveryone should add their face image to their profile. This is not compulsory to add an image to your profile picture. But if anyone uses them they should use their original face image. Images can be deleted anytime, and the account also can be blocked.\r\n\r\nCredit System\r\nAs a tenant you must have 10 credits in your account for viewing one house\'s details (such as phone number, short address) information.\r\nAs a house owner you must have 5 credits in your account to post a house rent.\r\n\r\nPost as an Owner\r\nIf you are the owner of any house and you want to post your ads in The Tolet then you should follow the rules for publishing your post in The Tolet. It is important to carefully read and understand all of the terms and conditions before posting your house on The Tolet. If you have any questions, please feel free to contact us.\r\n\r\nProperty Listing\r\nBy listing a property on \"The Tolet,\" you acknowledge that you are the rightful owner or have the necessary authorization to rent out ', '', 'tolet3.jpg', 'pending '),
(37, 'Theugiug', 'Tasmin Ahmed Oni', 'efeewrewr', 'kawsarhabib@gmail.com', '3900-Screenshot 2024-01-14 184430.png', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `Flatid` int(11) NOT NULL,
  `checkin_date` varchar(30) NOT NULL,
  `checkout_date` varchar(30) NOT NULL,
  `amount` int(8) NOT NULL,
  `mafia_amount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `pay_status` varchar(200) NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `name`, `email`, `phone`, `Flatid`, `checkin_date`, `checkout_date`, `amount`, `mafia_amount`, `total_amount`, `pay_status`) VALUES
(15, 'kawsar Habib', 'kawsarhabib@gmail.com', '01783384722', 8, '2024-04-20', '2024-06-21', 80000, 4000, 84000, 'Paid'),
(16, 'kawsar Habib', 'kawsarhabib@gmail.com', '01783384722', 11, '2024-05-01', '2025-01-01', 20000, 1000, 21000, 'Paid'),
(17, 'kawsar Habib', 'kawsarhabib@gmail.com', '01783384722', 12, '2024-04-27', '2026-10-27', 31000, 1550, 32550, 'Paid'),
(18, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', '01783384722', 14, '2024-04-20', '2024-05-10', 500000, 25000, 525000, 'Paid'),
(19, 'kawsar Habib', 'kawsarhabib@gmail.com', '01783384722', 8, '2024-05-02', '2024-06-12', 80000, 4000, 84000, 'Paid'),
(20, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', '01783384722', 17, '2024-04-17', '2024-04-23', 28000, 1400, 29400, 'Paid'),
(21, 'kawsar Habib', 'kawsarhabib@gmail.com', '01783384722', 11, '2024-04-26', '2024-06-05', 20000, 1000, 21000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subjects` varchar(25) NOT NULL,
  `query` varchar(255) NOT NULL,
  `who` text NOT NULL,
  `city` text NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `names`, `email`, `subjects`, `query`, `who`, `city`, `file`) VALUES
(77, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', 'on', 'sdsdsd', 'on', '2', '7208-'),
(78, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', 'on', 'dfdfd', 'on', '2', '3909-'),
(79, 'kawsar habib', 'tasminahmedoni909@gmail.com', 'on', 'rrtretr', 'on', '2', '8788-'),
(80, 'kawsar habib', 'tasminahmedoni909@gmail.com', 'on', 'rrtretr', 'on', '2', '8781-'),
(81, 'kawsar habib', 'tasminahmedoni909@gmail.com', 'on', 'rrtretr', 'on', '2', '3164-'),
(82, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', 'on', 'dgdgf', 'on', '3', '5632-'),
(83, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', 'on', 'sdsfdsf', 'on', '1', '4496-Screenshot 2024-03-25 203201.png');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(25) NOT NULL,
  `question` varchar(2556) NOT NULL,
  `answer` varchar(2556) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'How to create an account in The Tolet?', 'To create an account on The Tolet, follow these steps:\r\n\r\n\r\n\r\n\r\n\r\n\r\n1. Visit The Tolet website.\r\n2. Look for the \"Sign Up\" or \"Create Account\" option. Click on it.\r\n3. You will be prompted to provide your email address for verification purposes. Enter your valid ma'),
(3, 'What are the benefit of joining The Tolet?', 'Benefits for Landlords:\r\n\r\n1. Increased Visibility: By joining The Tolet, landlords can significantly increase the visibility of their rental properties. The platform has a large user base, ensuring that your listing reaches a wider audience of potential tenants.\r\n\r\n2. Targeted Audience: The Tolet specifically caters to the rental market, meaning that landlords can connect with individuals and families actively searching for rental properties. This increases the chances of finding suitable and interested tenants.\r\n\r\n3. Convenient Listing Process: The Tolet provides a user-friendly interface and tools that make it easy for landlords to create and manage their property listings. You can upload photos, provide detailed descriptions, set rental prices, and update availability with ease.\r\n\r\nBenefits for Tenants:\r\n\r\n1. Extensive Rental Options: The Tolet provides a wide range of rental properties, giving tenants a diverse selection to choose from based on their preferences, budget, and location.\r\n\r\n2. Convenient Search and Filtering: The Tolet offers search and filtering options that enable tenants to narrow down their search based on specific criteria such as location, rental price, number of rooms, and amenities. This saves time and helps find the most suitable options.\r\n\r\n3. Verified Listings: The Tolet verifies the authenticity of listings and provides ratings and reviews from previous tenants. This helps tenants make informed decisions and increases trust in the rental properties listed on the platform.'),
(4, 'How do I post my house for rent on The Tolet?', 'To post your house for rent on The Tolet, please follow these steps:\r\n\r\n1. Visit The Tolet website.\r\n\r\n2. If you don\'t have an account, create one by providing the required information and completing the verification process.\r\n\r\n3. Once you\'re logged in, navigate to your account dashboard.\r\nLook for the option to \"Add Property.\"\r\n\r\n4. Fill out the necessary details about your house, including location, property type, number of bedrooms, amenities, rental price, and any other relevant information.\r\n\r\n5. Upload high-quality photos of your house to attract potential tenants.\r\nProvide contact information through which interested tenants can reach you.\r\n\r\n9. Review the listing information for accuracy and completeness.\r\n\r\n6. Submit your listing for review.\r\nThe Tolet team will review your listing to ensure it meets their guidelines and standards.\r\n7. Once approved, your house rental listing will be visible to potential tenants on The Tolet platform.\r\n*Remember to regularly check your account for inquiries from interested tenants and respond promptly to their queries.');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(25) NOT NULL,
  `name` varchar(34) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` int(22) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `name`, `address`, `number`, `link`) VALUES
(1, 'Head Office', 'Bay’s Park Heights, C-5, Located at Plot No. 522 (Old) 2 (New), Road No-8 (Old), 9 (New), Dhanmondi), Dhak 1212.', 1531518750, 'https://goo.gl/maps/4ZiqL3yXU4bLxhpk9'),
(2, 'Chittagang Office', '4th Floor, Road-3, Zakir Hossain Road,South Khulshi Chattogram, 7//A/1, Chattogram, Chittagong 4000, BD', 1269556000, 'https://goo.gl/maps/Mjf9NoDgDQGeSRb87'),
(3, 'Rajshahi Office', 'Khan Tower,Floor 3, 14 & 16 Sonargoan Janopath, Model Town, Rajshahi', 1130048276, 'https://goo.gl/maps/8mH4hqbarxiyr5H3A'),
(4, 'Sylhet Office', 'Islam Tower,Level 5, 464/H Malua R/A, Majortila, Islampur Sylhet.', 836863529, 'https://goo.gl/maps/Ubv6YsptZvMAYwFW6'),
(5, 'New Office', 'Green Avenue Park,Floor 4, Plot 1, Road 3, Block A, Section 6,Mirpur, Dhaka 1216', 1931518750, 'https://goo.gl/maps/8mH4hqbarxiyr5H3A');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentMethod` varchar(200) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `userMobileNo` varchar(200) NOT NULL,
  `ownerPhoneNo` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `Flatid` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentMethod`, `paymentID`, `userMobileNo`, `ownerPhoneNo`, `amount`, `Flatid`, `status`) VALUES
('bkash', 1, '01783384722', '01648242618', 482222, 16, 'Paid'),
('nagad', 2, '01783384722', '01648242618', 32550, 8, 'Paid'),
('bkash', 3, '01783384722', '01648242618', 545454545, 14, 'Paid'),
('bkash', 4, '01783384722', '01648242618', 7545544, 8, 'Paid'),
('bkash', 5, '01783384722', '01648242618', 255555, 8, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rvid` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `Flatid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `timeslot` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rvid`, `name`, `Flatid`, `date`, `timeslot`, `status`) VALUES
(27, 'kawsar Habib', 12, '2024-04-27', '11:00', 'approve'),
(28, 'kawsar Habib', 12, '2024-05-02', '11:00', 'approve'),
(29, 'kawsar Habib', 8, '2024-05-07', '11:00', 'approve'),
(30, 'Tasmin Ahmed Oni', 21, '2024-05-01', '12:00', 'approve'),
(31, 'kawsar Habib', 8, '2024-05-02', '13:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reviews_ratings`
--

CREATE TABLE `reviews_ratings` (
  `id` int(11) NOT NULL,
  `Flatid` int(11) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `review` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews_ratings`
--

INSERT INTO `reviews_ratings` (`id`, `Flatid`, `username`, `review`, `rating`) VALUES
(5, 21, 'oni', 'sdf', 1),
(7, 8, 'oni', 'better', 4),
(8, 8, 'admin', 'gdgd', 4),
(11, 17, 'Tasmin Ahmed Oni', 'hjug', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password_hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(16, 'Tasmin Ahmed Oni', 'tasminahmedoni909@gmail.com', '$2y$10$MjgyJ9Cjv5CZcnBBl5xCbOMuw0hMjyktKVamA2Iowt6qAXdBOpsq.'),
(17, 'kawsar Habib', 'kawsarhabib@gmail.com', '$2y$10$LOOn6ELWDyvH/Lin.tQVY.wRkp0oDtbuzAVPC3Wj94cBcE2zCPGxy');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `email`) VALUES
(1, 'Tasminahmedoni92f9@gmail.com'),
(2, 'Tasminahmedoni92f9@gmail.com'),
(3, 'Tasminahmedoni92f9@gmail.com'),
(4, 'Tasminahmedoni92f9@gmail.com'),
(5, 'Tasminahmedoni92f9@gmail.com'),
(6, 'Tasminahmedoni92f9@gmail.com'),
(7, 'Tasminahmedoni92f9@gmail.com'),
(8, 'Tasminahmedoni92f9@gmail.com'),
(9, 'nafinbhuiya2021@gmail.com'),
(10, 'nafinbhuiya2021@gmail.com'),
(11, 'Tasminahmedoni92f9@gmail.com'),
(12, 'kawsarhabib123@gmail.com'),
(13, 'nafinkhan@gmail.com'),
(14, 'Tasminahmedoni92f9@gmail.com'),
(15, 'Tasminahmedoni92f9@gmail.com'),
(16, 'Tasminahmedoni92f9@gmail.com'),
(17, 'Tasminahmedoni92f9@gmail.com'),
(18, 'Tasminahmedoni92f9@gmail.com'),
(19, 'Tasminahmedoni92f9@gmail.com'),
(20, 'Tasminahmedoni92f9@gmail.com'),
(21, 'Tasminahmedoni92f9@gmail.com'),
(22, 'nafinbhuiya2021@gmail.com'),
(23, 'Admin16@gmail.com'),
(24, 'Tasminahmedoni92f9@gmail.com'),
(25, 'Tasminahmedoni92f9@gmail.com'),
(26, 'Tasminahmedoni92f9@gmail.com'),
(27, 'nafinrahman340@gmail.com'),
(28, 'nafinrahman340@gmail.com'),
(29, 'nafinrahman340@gmail.com'),
(30, 'Tasminahmedoni92f9@gmail.com'),
(31, 'tasminahmedoni909@gmail.com'),
(32, 'tasminahmedoni909@gmail.com'),
(33, 'kawsarhabib@gmail.com'),
(34, 'kawsarhabib@gmail.com'),
(35, 'kawsarhabib@gmail.com'),
(36, 'kawsarhabib@gmail.com'),
(37, 'tasminahmedoni909@gmail.com'),
(38, 'kawsarhabib@gmail.com'),
(39, 'kawsarhabib@gmail.com'),
(40, 'kawsarhabib@gmail.com'),
(41, 'kawsarhabib@gmail.com'),
(42, 'kawsarhabib@gmail.com'),
(43, 'kawsarhabib@gmail.com'),
(44, 'kawsarhabib@gmail.com'),
(45, 'kawsarhabib@gmail.com'),
(46, 'tasminahmedoni909@gmail.com'),
(47, 'kawsarhabib@gmail.com'),
(48, 'kawsarhabib@gmail.com'),
(49, 'kawsarhabib@gmail.com'),
(50, 'kawsarhabib@gmail.com'),
(51, 'kawsarhabib@gmail.com'),
(52, 'tasminahmedoni909@gmail.com'),
(53, 'kawsarhabib@gmail.com'),
(54, 'kawsarhabib@gmail.com'),
(55, 'kawsarhabib@gmail.com'),
(56, 'kawsarhabib@gmail.com'),
(57, 'tasminahmedoni909@gmail.com'),
(58, 'kawsarhabib@gmail.com'),
(59, 'tasminahmedoni909@gmail.com'),
(60, 'tasminahmedoni9019@gmail.com'),
(61, 'kawsarhabib@gmail.com'),
(62, 'nafinbhuiya2021@gmail.com'),
(63, 'kawsarhabib@gmail.com'),
(64, 'kawsarhabib@gmail.com'),
(65, 'kawsarhabib@gmail.com'),
(66, 'kawsarhabib@gmail.com'),
(67, 'kawsarhabib@gmail.com'),
(68, 'ragib@gmail.com'),
(69, 'kawsarhabib@gmail.com'),
(70, 'kawsarhabib@gmail.com'),
(71, 'kawsarhabib@gmail.com'),
(72, 'kawsarhabib@gmail.com'),
(73, 'kawsarhabib@gmail.com'),
(74, 'tasminahmedoni909@gmail.com'),
(75, 'kawsarhabib@gmail.com'),
(76, 'tasnimulhassan02@gmail.com'),
(77, 'kawsarhabib@gmail.com'),
(78, 'kawsarhabib@gmail.com'),
(79, 'kawsarhabib@gmail.com'),
(80, 'tasminahmedoni909@gmail.com'),
(81, 'kawsarhabib@gmail.com'),
(82, 'tasminahmedoni909@gmail.com'),
(83, 'kawsarhabib@gmail.com'),
(84, 'kawsarhabib@gmail.com'),
(85, 'kawsarhabib@gmail.com'),
(86, 'faisalahmed@gmail.com'),
(87, 'kawsarhabib@gmail.com'),
(88, 'kawsarhabib@gmail.com'),
(89, 'kawsarhabib@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproperty`
--
ALTER TABLE `addproperty`
  ADD PRIMARY KEY (`Flatid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rvid`),
  ADD KEY `Flatid` (`Flatid`);

--
-- Indexes for table `reviews_ratings`
--
ALTER TABLE `reviews_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Flatid` (`Flatid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproperty`
--
ALTER TABLE `addproperty`
  MODIFY `Flatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews_ratings`
--
ALTER TABLE `reviews_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Flatid`) REFERENCES `addproperty` (`Flatid`);

--
-- Constraints for table `reviews_ratings`
--
ALTER TABLE `reviews_ratings`
  ADD CONSTRAINT `reviews_ratings_ibfk_1` FOREIGN KEY (`Flatid`) REFERENCES `addproperty` (`Flatid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
