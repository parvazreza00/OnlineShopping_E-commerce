-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2024 at 03:42 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returnorder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alluser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminuserrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `product`, `slider`, `coupons`, `shipping`, `blog`, `setting`, `returnorder`, `review`, `orders`, `stock`, `reports`, `alluser`, `adminuserrole`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-02-17 20:48:31', '$2y$10$/yoAm91fFlgmk8NJAJX2kupewGO3DYqiUWEfWY9dwVHj.B2qbGyOm', '34324344', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'byAY3EXyWCKlCUCUlIgTLNPiuomGbiGL88zi01pSioTUBRv1krLYUorJk7b7', NULL, '202304290301335132573_1403628147050777_7586850071839064652_n.jpg', '2023-02-17 20:48:31', '2023-04-28 21:01:12'),
(3, 'test', 'test@gmail.com', NULL, '$2y$10$fizpSMe142vi0DoFqv74VOPRiPWK4TLpJhwDrPlWhsrty/1t.H8hy', '01738920277', '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 2, NULL, NULL, 'upload/admin_images/1767560541216488.jpg', '2023-06-01 21:38:16', NULL),
(4, 'hello1111', 'hello1111@gmail.com', NULL, '$2y$10$uMC3VLWGGi7h18WulrYq..3THSiFP3YNaMmieXLMFJQqVD7SLW1YK', '784858494511111', '1', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'upload/admin_images/1767569364147131.jpg', '2023-06-01 23:07:35', '2023-06-01 23:58:25'),
(6, 'Hello89', 'hello89@gmail.com', NULL, '$2y$10$Rz5Oj1EqIGZKpX7ompoj4eg5.2sMX2nvDJiRcm5AP72jkzrWFOYee', '32343354', NULL, '1', NULL, '1', '1', '1', NULL, NULL, NULL, '1', '1', NULL, NULL, '1', '1', 2, NULL, NULL, 'upload/admin_images/1767592634664432.jpg', '2023-06-02 04:05:20', '2023-06-02 06:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `post_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `post_title_en`, `post_title_hin`, `post_slug_en`, `post_slug_hin`, `post_image`, `post_details_en`, `post_details_hin`, `created_at`, `updated_at`) VALUES
(1, 3, 'OpenAI\'s ChatGPT', 'ओपनर के चटगापंत', '', '', 'upload/blogPost/1766949729504097.jpeg', '<p>The latest analysis by an app intelligence provider&nbsp;data.ai&nbsp;stated that the Open AI&#39;s ChatGPT app surpassed five lakh downloads within the first six days of its launch. As per a report, OpenAI&#39;s ChatGPT app outpaced most of its rivals, including other AI and chatbot apps, as an addition to Microsoft Bing ad Edge apps that offered a few of the first significant third-party integrations of Open AI&#39;s GPT-4 technology.</p>\r\n\r\n<p>Though Bing and Microsoft Edge certainly benefited from the interest in ChatGPT at their debut, seeing a respective 340,000 and 335,000 downloads across iOS and Android in their best five-day periods in February, OpenAI&#39;s ChatGPT app easily topped them, generating 480,000 installs in the first five days of its U.S. launch, when the app was iOS-only, TC reported.</p>\r\n\r\n<p>In statistical comparison with just Bing and Edge&#39;s iOS downloads alone, ChatGPT was reportedly even further ahead with its 480,000 installs versus Bing&#39;s 250,000 and Edge&#39;s 195,000. However, Bing and Edge were still ahead of ChatGPT when looking at all U.S. downloads in May across both app stores &mdash; but not when comparing only iOS installs for the month.</p>\r\n\r\n<p>Data.ai&#39;slysis also found the app outperformed other top AI chatbot apps in the U.S., many of which were generically named in order to capitalize on consumer searches for keywords like &quot;AI&quot; and &quot;chatbot&quot; on the App Store. Here, OpenAI&#39;s ChatGPT found itself in the top five by downloads, when ranked against other apps&#39; best five-day periods in 2023 across the App Store and Google Play.</p>\r\n\r\n<p>Nearly a week after OpenAI announced the launch of the iOS app for ChatGPT in the US, the company has rolled it out in 11 more countries. The app will now be available in nations such as France, the UK, Jamaica, Korea, Ireland, Nicaragua, Albania, Croatia, etc. Reportedly, India is absent from the list of nations. The San Francisco-based AI powerhouse rolled out ChatGPT Plus in India in March but it seems the app launch may take some time.</p>\r\n\r\n<p>On May 18, the company announced the launch of its iOS app for ChatGPT. According to the company, the app will sync user history across devices and will feature the latest improvements in the OpenAI model.</p>', '<pre>\r\nऐप इंटेलीजेंस प्रोवाइडर data.ai के नवीनतम विश्लेषण में कहा गया है कि ओपन एआई के चैटजीपीटी ऐप ने लॉन्च के पहले छह दिनों के भीतर पांच लाख डाउनलोड को पार कर लिया है। एक रिपोर्ट के अनुसार, OpenAI के ChatGPT ऐप ने अपने अधिकांश प्रतिद्वंद्वियों को पीछे छोड़ दिया, जिसमें अन्य AI और चैटबॉट ऐप शामिल हैं, Microsoft बिंग एड एज ऐप के अतिरिक्त, जिसने Open AI की GPT-4 तकनीक के पहले महत्वपूर्ण तृतीय-पक्ष एकीकरण की पेशकश की।\r\n\r\nहालांकि बिंग और माइक्रोसॉफ्ट एज निश्चित रूप से अपनी शुरुआत में चैटजीपीटी में रुचि से लाभान्वित हुए, फरवरी में अपनी सर्वश्रेष्ठ पांच-दिवसीय अवधि में आईओएस और एंड्रॉइड पर संबंधित 340,000 और 335,000 डाउनलोड को देखते हुए, ओपनएआई के चैटजीपीटी ऐप ने उन्हें आसानी से शीर्ष पर रखा, पहले में 480,000 इंस्टाल किए। यूएस लॉन्च के पांच दिन, जब ऐप आईओएस-ओनली था, टीसी ने बताया।\r\n\r\nअकेले बिंग और एज के आईओएस डाउनलोड के साथ सांख्यिकीय तुलना में, चैटजीपीटी अपने 480,000 इंस्टॉल बनाम बिंग के 250,000 और एज के 195,000 के साथ कथित तौर पर और भी आगे था। हालांकि, बिंग और एज अभी भी चैटजीपीटी से आगे थे जब दोनों ऐप स्टोरों में मई में सभी यूएस डाउनलोड को देखते थे - लेकिन महीने के लिए केवल आईओएस इंस्टॉल की तुलना करते समय नहीं।\r\n\r\nData.ai के विश्लेषण ने यह भी पाया कि ऐप ने यू.एस. में अन्य शीर्ष एआई चैटबॉट ऐप्स को बेहतर प्रदर्शन किया, जिनमें से कई को ऐप स्टोर पर &quot;एआई&quot; और &quot;चैटबॉट&quot; जैसे कीवर्ड के लिए उपभोक्ता खोजों को भुनाने के लिए सामान्य रूप से नामित किया गया था। यहां, ऐप स्टोर और Google Play पर 2023 में अन्य ऐप की सर्वश्रेष्ठ पांच-दिवसीय अवधि के मुकाबले ओपनएआई के चैटजीपीटी ने खुद को डाउनलोड के मामले में शीर्ष पांच में पाया।\r\n\r\nOpenAI द्वारा US में ChatGPT के लिए iOS ऐप लॉन्च करने की घोषणा के लगभग एक हफ्ते बाद, कंपनी ने इसे 11 और देशों में रोल आउट कर दिया है। ऐप अब फ्रांस, यूके, जमैका, कोरिया, आयरलैंड, निकारागुआ, अल्बानिया, क्रोएशिया आदि देशों में उपलब्ध होगा। कथित तौर पर, भारत राष्ट्रों की सूची से अनुपस्थित है। सैन फ्रांसिस्को स्थित एआई पावरहाउस ने भारत में चैटजीपीटी प्लस को मार्च में लॉन्च किया था, लेकिन ऐसा लगता है कि ऐप लॉन्च होने में कुछ समय लग सकता है।\r\n\r\n18 मई को कंपनी ने ChatGPT के लिए अपने iOS ऐप को लॉन्च करने की घोषणा की। कंपनी के अनुसार, ऐप यूजर हिस्ट्री को सभी डिवाइस में सिंक करेगा और OpenAI मॉडल में नवीनतम सुधारों को प्रदर्शित करेगा।</pre>', '2023-05-26 03:49:35', NULL),
(2, 6, 'Search Engine Land222333', 'खोज इंजन भूमि112222333', 'search-engine-land222333', 'खोज-इंजन-भूमि112222333', 'upload/blogPost/1767013525794680.jpg', '<p>which has been used for 9 years, is among the best tech blogs to read today.<br />\r\nIf you have knowledge of the French language, this site is for you.</p>\r\n\r\n<p>Byothe.fr&nbsp;is a great French tech blog that covers a wide range of topics including startups, social media, and marketing.</p>\r\n\r\n<p>In addition to tech news, the site has tips and tricks, infographics, quizzes, and categories of extra great websites for you.</p>\r\n\r\n<p>Byothe.fr, &nbsp;today the Web is visited by nearly 4 billion Internet users worldwide.</p>', '<pre>\r\nसर्च इंजन लैंड ब्लॉग सर्च इंजन ऑप्टिमाइजेशन (SEO), पे-पर-क्लिक (PPC) विज्ञापन और अन्य ऑनलाइन मार्केटिंग क्षेत्रों में नवीनतम समाचारों और रुझानों की गहन कवरेज प्रदान करता है।11111111\r\n\r\nब्लॉग में विशेषज्ञ लेखकों की एक टीम है, जो Google एल्गोरिथम अपडेट से लेकर पीपीसी सर्वोत्तम प्रथाओं तक हर चीज पर अपनी अंतर्दृष्टि, विश्लेषण और व्यावहारिक सलाह साझा करते हैं, जिससे यह उन विपणक के लिए एक संसाधन बन जाता है जो हमेशा बदलते समय में वक्र से आगे रहना चाहते हैं। डिजिटल मार्केटिंग की दुनिया।</pre>', '2023-05-26 19:02:02', '2023-05-26 20:43:42'),
(3, 6, 'Good Financial Cents', 'अच्छा वित्तीय सेंट', '', '', 'upload/blogPost/1766950436453174.jpg', '<p>Good Financial Cents was launched by Jeff Rose back in 2008. Unlike most of the bloggers on this list, Jeff is a Certified Financial Planner. He also runs a YouTube channel and has written a book titled&nbsp;<em>Soldier of Finance</em>. This personal finance blog provides tons of helpful information about budgeting, savings, paying off debt, and building wealth. Jeff writes plenty of posts himself, and other top personal finance writers contribute many articles.</p>', '<pre>\r\n2008 में जेफ रोज़ द्वारा अच्छा वित्तीय सेंट लॉन्च किया गया था। इस सूची के अधिकांश ब्लॉगर्स के विपरीत, जेफ एक प्रमाणित वित्तीय योजनाकार है। वह एक यूट्यूब चैनल भी चलाते हैं और सोल्जर ऑफ फाइनेंस नाम से एक किताब भी लिख चुके हैं। यह व्यक्तिगत वित्त ब्लॉग बजट, बचत, कर्ज चुकाने, और संपत्ति निर्माण के बारे में बहुत उपयोगी जानकारी प्रदान करता है। जेफ बहुत सारे पोस्ट स्वयं लिखते हैं, और अन्य शीर्ष व्यक्तिगत वित्त लेखक कई लेखों का योगदान करते हैं।</pre>', '2023-05-26 04:00:50', NULL),
(4, 5, 'Health & Fitness Guide', 'स्वास्थ्य और फिटनेस गाइड', '', '', 'upload/blogPost/1766950761415089.jpeg', '<p>Fitness involves activity of some sort that stimulates various systems of the body and maintains a certain condition within the body. Health, on the other hand, involves every system of the body and is only achieved through a lifestyle that supports health.</p>\r\n\r\n<p>Fitness involves activity of some sort that stimulates various systems of the body and maintains a certain condition within the body. Health, on the other hand, involves every system of the body and is only achieved through a lifestyle that supports health.</p>\r\n\r\n<p>Fitness involves activity of some sort that stimulates various systems of the body and maintains a certain condition within the body. Health, on the other hand, involves every system of the body and is only achieved through a lifestyle that supports health.</p>', '<pre>\r\nफिटनेस में किसी प्रकार की गतिविधि शामिल होती है जो शरीर की विभिन्न प्रणालियों को उत्तेजित करती है और शरीर के भीतर एक निश्चित स्थिति बनाए रखती है। दूसरी ओर, स्वास्थ्य में शरीर की हर प्रणाली शामिल होती है और यह केवल एक ऐसी जीवन शैली के माध्यम से प्राप्त की जाती है जो स्वास्थ्य का समर्थन करती है।\r\nफिटनेस में किसी प्रकार की गतिविधि शामिल होती है जो शरीर की विभिन्न प्रणालियों को उत्तेजित करती है और शरीर के भीतर एक निश्चित स्थिति बनाए रखती है। दूसरी ओर, स्वास्थ्य में शरीर की हर प्रणाली शामिल होती है और यह केवल एक ऐसी जीवन शैली के माध्यम से प्राप्त की जाती है जो स्वास्थ्य का समर्थन करती है। फिटनेस में किसी प्रकार की गतिविधि शामिल होती है जो शरीर की विभिन्न प्रणालियों को उत्तेजित करती है और शरीर के भीतर एक निश्चित स्थिति बनाए रखती है। दूसरी ओर, स्वास्थ्य में शरीर की हर प्रणाली शामिल होती है और यह केवल एक ऐसी जीवन शैली के माध्यम से प्राप्त की जाती है जो स्वास्थ्य का समर्थन करती है।</pre>', '2023-05-26 04:05:59', NULL),
(6, 1, 'Byothere Byothefr', 'ब्योथेरे बायोथेफ्र', 'byothere-byothefr', 'ब्योथेरे-बायोथेफ्र', 'upload/blogPost/1766953782055156.jpg', '<p>which has been used for 9 years, is among the best tech blogs to read today.<br />\r\nIf you have knowledge of the French language, this site is for you.</p>\r\n\r\n<p>Byothe.fr&nbsp;is a great French tech blog that covers a wide range of topics including startups, social media, and marketing.</p>\r\n\r\n<p>In addition to tech news, the site has tips and tricks, infographics, quizzes, and categories of extra great websites for you.</p>\r\n\r\n<p>Byothe.fr, &nbsp;today the Web is visited by nearly 4 billion Internet users worldwide.</p>', '<pre>\r\nजो 9 वर्षों से उपयोग किया जा रहा है, आज पढ़ने के लिए सबसे अच्छे तकनीकी ब्लॉगों में से एक है।\r\nअगर आपको फ्रेंच भाषा का ज्ञान है तो यह साइट आपके लिए है।\r\n\r\nByothe.fr एक बेहतरीन फ्रेंच टेक ब्लॉग है जो स्टार्टअप्स, सोशल मीडिया और मार्केटिंग सहित कई विषयों को कवर करता है।\r\n\r\nतकनीकी समाचारों के अलावा, साइट में आपके लिए टिप्स और ट्रिक्स, इन्फोग्राफिक्स, क्विज़ और अतिरिक्त बेहतरीन वेबसाइटों की श्रेणियां हैं।\r\n\r\nByothe.fr, आज दुनिया भर में लगभग 4 अरब इंटरनेट उपयोगकर्ता वेब पर जाते हैं।</pre>', '2023-05-26 04:54:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

DROP TABLE IF EXISTS `blog_post_categories`;
CREATE TABLE IF NOT EXISTS `blog_post_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `blog_category_name_en`, `blog_category_name_hin`, `blog_category_slug_en`, `blog_category_slug_hin`, `created_at`, `updated_at`) VALUES
(1, 'Tech', 'तकनीक', 'tech', 'तकनीक', NULL, NULL),
(3, 'Technology', 'तकनीकी', 'technology', 'तकनीकी', '2023-05-25 20:46:06', NULL),
(4, 'Inspirer', 'प्रेरित करना', 'inspirer', 'प्रेरित-करना', '2023-05-25 20:46:30', '2023-05-25 21:04:34'),
(5, 'Health and fitness', 'आरोग्य और स्वस्थता', 'health-and-fitness', 'आरोग्य-और-स्वस्थता', '2023-05-25 21:05:32', NULL),
(6, 'Wealth', 'संपत्ति', 'wealth', 'संपत्ति', '2023-05-25 21:06:44', NULL),
(7, 'Marketing', 'विपणन', 'marketing', 'विपणन', '2023-05-26 03:57:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hin`, `brand_slug_en`, `brand_slug_hin`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'सैमसंग', 'samsung', 'सैमसंग', 'upload/brand/1759709672930832.png', NULL, '2023-03-07 05:51:59'),
(3, 'Xiaomi', 'Xiaomi', 'xiaomi', 'Xiaomi', 'upload/brand/1759709748200017.png', NULL, '2023-03-07 05:53:11'),
(4, 'Vivo', 'विवो', 'vivo', 'विवो', 'upload/brand/1759709713813316.jpg', NULL, '2023-03-07 05:52:38'),
(5, 'Apple', 'सेब', 'apple', 'सेब', 'upload/brand/1759709583019543.png', NULL, '2023-03-07 05:50:33'),
(6, 'Huawai', 'हुवाई', 'huawai', 'हुवाई', 'upload/brand/1759709631973637.jpg', NULL, '2023-03-07 05:51:20'),
(7, 'Balckberry', 'ब्लैकबेरी', 'balckberry', 'ब्लैकबेरी', 'upload/brand/1759708676363581.jpg', NULL, NULL),
(10, 'Oppo', 'विपक्ष', 'oppo', 'विपक्ष', 'upload/brand/1759709815013860.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hin`, `category_slug_en`, `category_slug_hin`, `category_icon`, `created_at`, `updated_at`) VALUES
(9, 'Fashion', 'पहनावा', 'fashion', 'पहनावा', 'fa fa-briefcase', NULL, NULL),
(10, 'Electronics', '(इलेक्ट्रानिक्स', 'electronics', '(इलेक्ट्रानिक्स', 'fa fa-cogs', NULL, NULL),
(11, 'Sweet Home', 'प्यारा घर', 'sweet-home', 'प्यारा-घर', 'fa fa-envira', NULL, '2023-03-18 23:38:57'),
(12, 'Appliances', 'उपकरण', 'appliances', 'उपकरण', 'fa fa-bar-chart', NULL, NULL),
(13, 'Beauty', 'सुंदरता', 'beauty', 'सुंदरता', 'fa fa-eye', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(3, 'WELCOME TO RAMADAN', 40, '2023-05-17', 1, '2023-05-10 00:10:47', NULL),
(4, '14 APRIL, THE BANGLA NEW YEAR', 30, '2023-04-30', 1, '2023-05-10 00:12:37', '2023-05-10 00:12:37'),
(5, 'HAPPY NEW YEAR', 20, '2023-05-20', 1, '2023-05-10 00:21:48', NULL),
(6, 'HAPPY EID-UL-FITAR', 50, '2023-05-30', 1, '2023-05-10 00:22:29', NULL),
(7, 'THE FIRST MAY', 5, '2023-05-15', 1, '2023-05-10 00:23:01', NULL),
(8, '21ST FEBRUARY', 30, '2023-02-20', 1, '2023-05-10 00:23:40', NULL),
(9, '17TH AUGUST', 10, '2023-08-02', 1, '2023-05-10 00:24:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_05_191543_create_sessions_table', 1),
(7, '2023_02_18_023148_create_admins_table', 2),
(8, '2023_03_04_104200_create_brands_table', 3),
(9, '2023_03_07_170400_create_categories_table', 4),
(10, '2023_03_08_061814_create_subcategories_table', 5),
(11, '2023_03_09_045403_create_sub_sub_categories_table', 6),
(12, '2023_03_09_095111_create_products_table', 7),
(13, '2023_03_09_101904_create_multi_imgs_table', 7),
(14, '2023_03_14_103445_create_sliders_table', 8),
(15, '2023_05_06_101816_create_wish_lists_table', 9),
(16, '2023_05_09_054706_create_coupons_table', 10),
(17, '2023_05_10_085816_create_ship_divisions_table', 11),
(18, '2023_05_10_102823_create_ship_districts_table', 12),
(19, '2023_05_10_122152_create_ship_states_table', 13),
(20, '2023_05_18_094406_create_shippings_table', 14),
(21, '2023_05_20_063402_create_orders_table', 15),
(22, '2023_05_20_063419_create_order_items_table', 15),
(23, '2023_05_26_015010_create_blog_post_categories_table', 16),
(24, '2023_05_26_033851_create_blog_posts_table', 17),
(25, '2023_05_28_020507_create_site_settings_table', 18),
(26, '2023_05_29_013920_create_seos_table', 19),
(27, '2023_05_29_014743_create_seos_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

DROP TABLE IF EXISTS `multi_imgs`;
CREATE TABLE IF NOT EXISTS `multi_imgs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(5, 2, 'upload/products/multi_img/1760129229943466.png', '2023-03-11 21:00:41', NULL),
(6, 2, 'upload/products/multi_img/1760129231084054.png', '2023-03-11 21:00:42', NULL),
(7, 2, 'upload/products/multi_img/1760129232589204.png', '2023-03-11 21:00:44', NULL),
(23, 7, 'upload/products/multi_img/1760595058359847.jpg', '2023-03-17 00:24:49', NULL),
(24, 7, 'upload/products/multi_img/1760595058834201.jpg', '2023-03-17 00:24:49', NULL),
(25, 7, 'upload/products/multi_img/1760595059224217.jpg', '2023-03-17 00:24:49', NULL),
(26, 7, 'upload/products/multi_img/1760595059672350.jpg', '2023-03-17 00:24:50', NULL),
(27, 7, 'upload/products/multi_img/1760595060062495.jpg', '2023-03-17 00:24:50', NULL),
(28, 8, 'upload/products/multi_img/1760846690902463.jpg', '2023-03-19 19:04:24', NULL),
(29, 8, 'upload/products/multi_img/1760846691234928.jpg', '2023-03-19 19:04:24', NULL),
(30, 8, 'upload/products/multi_img/1760846691564489.jpg', '2023-03-19 19:04:25', NULL),
(31, 8, 'upload/products/multi_img/1760846691916165.jpg', '2023-03-19 19:04:25', NULL),
(32, 9, 'upload/products/multi_img/1760847174452850.jpg', '2023-03-19 19:12:05', NULL),
(33, 9, 'upload/products/multi_img/1760847174847980.jpg', '2023-03-19 19:12:06', NULL),
(34, 9, 'upload/products/multi_img/1760847175314477.jpg', '2023-03-19 19:12:06', NULL),
(35, 9, 'upload/products/multi_img/1760847175706765.jpg', '2023-03-19 19:12:07', NULL),
(36, 9, 'upload/products/multi_img/1760847176146487.jpg', '2023-03-19 19:12:07', NULL),
(37, 10, 'upload/products/multi_img/1760847620552003.jpg', '2023-03-19 19:19:11', NULL),
(38, 10, 'upload/products/multi_img/1760847620990676.jpg', '2023-03-19 19:19:11', NULL),
(39, 10, 'upload/products/multi_img/1760847621361016.jpg', '2023-03-19 19:19:12', NULL),
(40, 10, 'upload/products/multi_img/1760847621850941.jpg', '2023-03-19 19:19:12', NULL),
(41, 11, 'upload/products/multi_img/1760848104680660.jpg', '2023-03-19 19:26:53', NULL),
(42, 11, 'upload/products/multi_img/1760848105187759.jpg', '2023-03-19 19:26:53', NULL),
(43, 11, 'upload/products/multi_img/1760848105580663.jpg', '2023-03-19 19:26:53', NULL),
(44, 11, 'upload/products/multi_img/1760848105950920.jpg', '2023-03-19 19:26:54', NULL),
(45, 12, 'upload/products/multi_img/1760848704988298.jpg', '2023-03-19 19:36:25', NULL),
(46, 12, 'upload/products/multi_img/1760848705369454.jpg', '2023-03-19 19:36:25', NULL),
(47, 12, 'upload/products/multi_img/1760848705735466.jpg', '2023-03-19 19:36:26', NULL),
(48, 12, 'upload/products/multi_img/1760848706193588.png', '2023-03-19 19:36:27', NULL),
(49, 13, 'upload/products/multi_img/1760848979640120.jpg', '2023-03-19 19:40:47', NULL),
(50, 13, 'upload/products/multi_img/1760848980043433.jpg', '2023-03-19 19:40:47', NULL),
(51, 13, 'upload/products/multi_img/1760848980411818.jpg', '2023-03-19 19:40:48', NULL),
(52, 13, 'upload/products/multi_img/1760848980843075.jpg', '2023-03-19 19:40:48', NULL),
(53, 14, 'upload/products/multi_img/1760849194745494.jpg', '2023-03-19 19:44:12', NULL),
(54, 14, 'upload/products/multi_img/1760849195097701.jpg', '2023-03-19 19:44:12', NULL),
(55, 14, 'upload/products/multi_img/1760849195436119.jpg', '2023-03-19 19:44:13', NULL),
(56, 14, 'upload/products/multi_img/1760849195843812.jpg', '2023-03-19 19:44:13', NULL),
(57, 15, 'upload/products/multi_img/1760849637921149.jpg', '2023-03-19 19:51:15', NULL),
(58, 15, 'upload/products/multi_img/1760849638601439.jpg', '2023-03-19 19:51:16', NULL),
(59, 15, 'upload/products/multi_img/1760849639420456.jpg', '2023-03-19 19:51:16', NULL),
(60, 15, 'upload/products/multi_img/1760849640144234.jpg', '2023-03-19 19:51:17', NULL),
(61, 15, 'upload/products/multi_img/1760849640619746.jpg', '2023-03-19 19:51:17', NULL),
(62, 16, 'upload/products/multi_img/1760849981451629.jpg', '2023-03-19 19:56:42', NULL),
(63, 16, 'upload/products/multi_img/1760849981910744.jpg', '2023-03-19 19:56:43', NULL),
(64, 16, 'upload/products/multi_img/1760849982574302.jpg', '2023-03-19 19:56:43', NULL),
(65, 16, 'upload/products/multi_img/1760849983052574.jpg', '2023-03-19 19:56:44', NULL),
(66, 17, 'upload/products/multi_img/1760850331105503.jpg', '2023-03-19 20:02:16', NULL),
(67, 17, 'upload/products/multi_img/1760850331533745.jpg', '2023-03-19 20:02:16', NULL),
(68, 17, 'upload/products/multi_img/1760850331922059.jpg', '2023-03-19 20:02:17', NULL),
(69, 17, 'upload/products/multi_img/1760850332604033.jpg', '2023-03-19 20:02:17', NULL),
(70, 18, 'upload/products/multi_img/1760850715436757.jpg', '2023-03-19 20:08:22', NULL),
(71, 18, 'upload/products/multi_img/1760850715833299.jpg', '2023-03-19 20:08:23', NULL),
(72, 18, 'upload/products/multi_img/1760850716418064.jpg', '2023-03-19 20:08:24', NULL),
(73, 18, 'upload/products/multi_img/1760850717253395.jpg', '2023-03-19 20:08:24', NULL),
(74, 19, 'upload/products/multi_img/1760851033462345.jpg', '2023-03-19 20:13:26', NULL),
(75, 19, 'upload/products/multi_img/1760851034580054.jpg', '2023-03-19 20:13:27', NULL),
(76, 19, 'upload/products/multi_img/1760851035008021.jpg', '2023-03-19 20:13:27', NULL),
(77, 19, 'upload/products/multi_img/1760851035433492.jpg', '2023-03-19 20:13:27', NULL),
(78, 20, 'upload/products/multi_img/1760853706688845.jpg', '2023-03-19 20:55:55', NULL),
(79, 20, 'upload/products/multi_img/1760853707269829.jpg', '2023-03-19 20:55:56', NULL),
(80, 20, 'upload/products/multi_img/1760853708072369.jpg', '2023-03-19 20:55:57', NULL),
(81, 20, 'upload/products/multi_img/1760853709616060.jpg', '2023-03-19 20:55:58', NULL),
(82, 21, 'upload/products/multi_img/1768111387856257.jpeg', '2023-06-07 23:33:39', NULL),
(83, 21, 'upload/products/multi_img/1768111388371640.jpeg', '2023-06-07 23:33:39', NULL),
(84, 21, 'upload/products/multi_img/1768111388759521.jpeg', '2023-06-07 23:33:40', NULL),
(85, 21, 'upload/products/multi_img/1768111389108065.jpeg', '2023-06-07 23:33:40', NULL),
(86, 22, 'upload/products/multi_img/1768193195219888.png', '2023-06-08 21:13:57', NULL),
(87, 22, 'upload/products/multi_img/1768193195811117.jpeg', '2023-06-08 21:13:57', NULL),
(88, 22, 'upload/products/multi_img/1768193196157340.jpeg', '2023-06-08 21:13:57', NULL),
(89, 22, 'upload/products/multi_img/1768193196494785.jpeg', '2023-06-08 21:13:58', NULL),
(90, 23, 'upload/products/multi_img/1768193459139564.jpeg', '2023-06-08 21:18:08', NULL),
(91, 23, 'upload/products/multi_img/1768193459478443.jpeg', '2023-06-08 21:18:09', NULL),
(92, 23, 'upload/products/multi_img/1768193459888444.jpeg', '2023-06-08 21:18:09', NULL),
(93, 23, 'upload/products/multi_img/1768193460246737.jpeg', '2023-06-08 21:18:09', NULL),
(94, 24, 'upload/products/multi_img/1768193783514372.jpeg', '2023-06-08 21:23:18', NULL),
(95, 24, 'upload/products/multi_img/1768193783918599.png', '2023-06-08 21:23:18', NULL),
(96, 24, 'upload/products/multi_img/1768193784624868.jpeg', '2023-06-08 21:23:19', NULL),
(97, 24, 'upload/products/multi_img/1768193785037058.jpeg', '2023-06-08 21:23:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirm_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_order`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 24, 7, 'user', 'user@gmail.com', '01738920277', 423424, 'notes', 'card_1NA4g7Abbh1GuqN2eD3RIANO', 'Stripe', 'txn_3NA4gAAbbh1GuqN21AJX9FwW', 'usd', 436.00, '6469a9e883d4e', 'EOS36079929', '01 June 2023', 'June', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '29 May 2023', '1', 'Broken Product', 'delivered', '2023-05-20 23:19:39', '2023-05-29 00:01:25'),
(2, 6, 2, 9, 2, 'user', 'user@gmail.com', '01738920277', 232323, 'Delivered Products', 'card_1NA4wZAbbh1GuqN2CZ3gHKWw', 'Stripe', 'txn_3NA4wcAbbh1GuqN21bbrIiJQ', 'usd', 762.00, '6469ade460adc', 'EOS11216851', '01 June 2023', 'June', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-05-20 23:36:39', '2023-06-03 19:18:22'),
(3, 6, 1, 24, 7, 'user', 'user@gmail.com', '01738920277', 23243243, 'sdfsadasd', 'card_1NA64EAbbh1GuqN2iggXlJOr', 'Stripe', 'txn_3NA64IAbbh1GuqN21DwxZPp7', 'usd', 109.00, '6469bec3c5050', 'EOS86269642', '21 May 2023', 'May', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-05-21 00:48:39', '2023-05-24 19:33:20'),
(4, 6, 7, 8, 3, 'user', 'user@gmail.com', '01738920277', 53454, 'Notes', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 327.00, NULL, 'EOS38683884', '23 May 2023', 'May', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'cancel', '2023-05-22 19:39:29', NULL),
(5, 6, 1, 24, 8, 'user', 'user@gmail.com', '01738920277', 3434334, 'sfdsdd', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 24200.00, NULL, 'EOS68623386', '23 May 2023', 'May', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '29 May 2023', '2', 'Wrong Product', 'delivered', '2023-05-22 19:47:51', '2023-05-29 10:45:04'),
(6, 6, 7, 8, 3, 'user', 'user@gmail.com', '01738920277', 121212, 'notesssss', 'card_1NAkNuAbbh1GuqN2zwpZOV4b', 'Stripe', 'txn_3NAkNzAbbh1GuqN20PHMIshY', 'usd', 363.00, '646c1c29b5de6', 'EOS22465395', '23 May 2023', 'May', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-05-22 19:51:47', '2023-06-03 05:05:12'),
(7, 6, 1, 24, 11, 'user', 'user@gmail.com', '01738920277', 565656, 'oweejfsdffs', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 436.00, NULL, 'EOS99146408', '23 May 2023', 'May', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'confirm', '2023-05-22 19:57:02', '2023-05-24 11:22:11'),
(8, 3, 1, 24, 9, 'parvaz', 'parvaz@gmail.com', '01738920277', 12121212, 'iurewoiruwe', 'card_1NE0XhAbbh1GuqN28hShMO4J', 'Stripe', 'txn_3NE0XnAbbh1GuqN20S4qIuMB', 'usd', 283.00, '6477f7b169214', 'EOS34645598', '01 June 2023', 'June', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'pending', '2023-05-31 19:43:25', NULL),
(9, 3, 1, 24, 10, 'parvaz', 'parvaz@gmail.com', '01738920277', 43434343, 'rwerfsdfsdfdfs', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 653.00, NULL, 'EOS36954008', '01 June 2023', 'June', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'delivered', '2023-05-31 19:46:52', '2023-06-01 04:13:03'),
(10, 6, 1, 24, 10, 'user', 'user@gmail.com', '01738920277', 3434343, 'digital product', 'Cash On Delivery', 'Cash On Delivery', NULL, 'usd', 242.00, NULL, 'EOS11951977', '08 June 2023', 'June', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'confirm', '2023-06-08 02:39:33', '2023-06-08 03:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 'red', 'small', '1', 100.00, '2023-05-20 23:19:39', NULL),
(2, 1, 12, 'red', 'small', '1', 300.00, '2023-05-20 23:19:39', NULL),
(3, 2, 16, 'red', 'small', '1', 100.00, '2023-05-20 23:36:39', NULL),
(4, 2, 12, 'red', 'small', '1', 300.00, '2023-05-20 23:36:39', NULL),
(5, 2, 2, 'red', 'small', '1', 300.00, '2023-05-20 23:36:39', NULL),
(6, 3, 16, 'red', 'small', '1', 100.00, '2023-05-21 00:48:45', NULL),
(7, 4, 12, 'red', 'small', '1', 300.00, '2023-05-22 19:39:39', NULL),
(8, 5, 13, 'red', NULL, '1', 40000.00, '2023-05-22 19:47:58', NULL),
(9, 6, 16, 'red', 'small', '1', 100.00, '2023-05-22 19:51:54', NULL),
(10, 6, 15, 'red', 'small', '1', 200.00, '2023-05-22 19:51:54', NULL),
(11, 7, 7, 'red', 'small', '1', 60.00, '2023-05-22 19:57:09', NULL),
(12, 7, 2, 'red', 'small', '1', 300.00, '2023-05-22 19:57:09', NULL),
(13, 8, 7, 'red', 'small', '1', 60.00, '2023-05-31 19:43:36', NULL),
(14, 8, 15, 'red', 'small', '1', 200.00, '2023-05-31 19:43:36', NULL),
(15, 9, 16, 'red', 'small', '1', 100.00, '2023-05-31 19:46:59', NULL),
(16, 9, 15, 'red', 'small', '1', 200.00, '2023-05-31 19:46:59', NULL),
(17, 9, 12, 'red', 'small', '1', 300.00, '2023-05-31 19:46:59', NULL),
(18, 10, 21, '--Choose Color--', '--Choose Size--', '1', 200.00, '2023-06-08 02:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `subsubcategory_id` int NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_prize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_prize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int DEFAULT NULL,
  `featured` int DEFAULT NULL,
  `special_offer` int DEFAULT NULL,
  `special_deals` int DEFAULT NULL,
  `digital_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_hin`, `product_slug_en`, `product_slug_hin`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hin`, `product_size_en`, `product_size_hin`, `product_color_en`, `product_color_hin`, `selling_prize`, `discount_prize`, `short_desc_en`, `short_desc_hin`, `long_desc_en`, `long_desc_hin`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `digital_file`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 12, 28, 42, 'Large Television', 'बड़ा टेलीविजन', 'large-television', 'बड़ा-टेलीविजन', 'tv321', '1', 'nice and beautiful', 'अच्छा और सुंदर', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '32600', '300', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', 'लोरेम इप्सम के परिच्छेद के कई रूप उपलब्ध हैं, लेकिन बहुसंख्यकों को अंतःक्षेपित हास्य, या यादृच्छिक शब्दों द्वारा किसी न किसी रूप में परिवर्तन का सामना करना पड़ा है, जो थोड़ा सा भी विश्वसनीय नहीं लगता', '<p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet</p>', '<pre>\r\nयहाँ लोरेम इप्सम के अंशों के कई रूप उपलब्ध हैं, लेकिन बहुसंख्यकों को अंतःक्षेपित हास्य, या यादृच्छिक शब्दों द्वारा किसी न किसी रूप में परिवर्तन का सामना करना पड़ा है, जो थोड़ा सा भी विश्वसनीय नहीं लगता है। यदि आप लोरेम इप्सम के एक मार्ग का उपयोग करने जा रहे हैं, तो आपको यह सुनिश्चित करने की आवश्यकता है कि पाठ के बीच में कुछ भी शर्मनाक छिपा नहीं है। इंटरनेट पर सभी लोरेम इप्सम जेनरेटर आवश्यकतानुसार पूर्वनिर्धारित हिस्सों को दोहराते हैं, जिससे यह इंटरनेट पर पहला सच्चा जनरेटर बन जाता है।</pre>', 'upload/products/thambnail/1760129227804907.png', 1, 1, NULL, NULL, NULL, 1, '2023-03-11 21:00:40', '2023-06-03 19:18:22'),
(7, 3, 13, 31, 52, 'Lip makeup with Lipstick', 'लिपस्टिक से लिप मेकअप', 'lip-makeup-with-lipstick', 'लिपस्टिक-से-लिप-मेकअप', 'lop111', '24', 'nice and beautiful', 'अच्छा और सुंदर', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '560', '60', 'Meet Super Stay Vinyl Ink liquid lipstick for budge-resistant vinyl color and up to 16 hour wear. This longwear lipstick’s Color Lock formula defies smudging and transfer and provides an instant shine finish', 'बज-प्रतिरोधी विनाइल रंग और 16 घंटे तक पहनने के लिए मिलिए सुपर स्टे विनाइल इंक लिक्विड लिपस्टिक से। यह लॉन्गवियर लिपस्टिक का कलर लॉक फॉर्मूला स्मजिंग और ट्रांसफर को धता बताता है और तुरंत चमक प्रदान करता है। साफ, सूखे होठों पर लगाने से पहले हिलाएं।', '<p>Meet Super Stay Vinyl Ink liquid lipstick for budge-resistant vinyl color and up to 16 hour wear. This longwear lipstick&rsquo;s Color Lock formula defies smudging and transfer and provides an instant shine finish. Shake before applying on clean, dry lips. Now available in 10 additional Nude Shock shades inspired by the bold electric attitude of New York. Choose from a total of 20 high-impact vinyl shades for your every lip look.</p>', '<pre>\r\nबज-प्रतिरोधी विनाइल रंग और 16 घंटे तक पहनने के लिए मिलिए सुपर स्टे विनाइल इंक लिक्विड लिपस्टिक से। यह लॉन्गवियर लिपस्टिक का कलर लॉक फॉर्मूला स्मजिंग और ट्रांसफर को धता बताता है और तुरंत चमक प्रदान करता है। साफ, सूखे होठों पर लगाने से पहले हिलाएं। अब न्यूयॉर्क के बोल्ड इलेक्ट्रिक एटिट्यूड से प्रेरित 10 अतिरिक्त न्यूड शॉक शेड्स में उपलब्ध है। अपने हर लिप लुक के लिए कुल 20 हाई-इम्पैक्ट विनाइल शेड्स में से चुनें।</pre>', 'upload/products/thambnail/1760595056858641.jpg', NULL, 1, 1, 1, NULL, 1, '2023-03-17 00:24:48', '2023-04-07 04:58:54'),
(8, 7, 9, 21, 22, 'women shoes', 'महिलाओं के जूते', 'women-shoes', 'महिलाओं-के-जूते', 'shoes12', '3', 'nice and beautiful', 'अच्छा और सुंदर', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '600', '50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760846689812144.jpg', 1, NULL, NULL, 1, NULL, 1, '2023-03-19 19:04:24', '2023-04-07 04:57:42'),
(9, 3, 9, 20, 20, 'Mans formal shoes', 'पुरुषों के औपचारिक जूते', 'mans-formal-shoes', 'पुरुषों-के-औपचारिक-जूते', 'mans12', '2', 'nice and beautiful', 'अच्छा और सुंदर', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '3000', '200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760847173920627.jpg', 1, NULL, 1, NULL, NULL, 1, '2023-03-19 19:12:05', '2023-04-07 04:56:50'),
(11, 5, 11, 25, 34, 'sleeping bed', 'सोने का बिस्तर', 'sleeping-bed', 'सोने-का-बिस्तर', 'bed12', '3', 'comfortable', 'आरामदायक', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '141000', '1500', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760848104161062.jpg', NULL, NULL, 1, 1, NULL, 1, '2023-03-19 19:26:52', '2023-04-07 04:55:56'),
(12, 1, 11, 27, 40, 'rice cooker', 'चावल का कुकर', 'rice-cooker', 'चावल-का-कुकर', 'cook12', '-2', 'nice and beautiful', 'अच्छा और सुंदर', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '7200', '300', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>\r\n\r\n<p>...</p>', 'upload/products/thambnail/1760848704460544.jpg', NULL, 1, 1, NULL, NULL, 1, '2023-03-19 19:36:24', '2023-06-03 19:18:22'),
(13, 1, 11, 27, 39, 'home lighting', 'घर की रोशनी', 'home-lighting', 'घर-की-रोशनी', 'light12', '100', 'comfortable', 'आरामदायक', NULL, NULL, 'red, green, blue', 'लाल, हरा, नीला', '40000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760848979129367.jpg', 1, 1, NULL, NULL, NULL, 1, '2023-03-19 19:40:46', '2023-05-01 22:00:09'),
(14, 1, 11, 27, 41, 'wall decoration', 'दीवार के सजावट का सामान', 'wall-decoration', 'दीवार-के-सजावट-का-सामान', 'wall12', '50', 'comfortable', 'आरामदायक', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '30000', '2000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम</pre>', 'upload/products/thambnail/1760849194272376.jpg', NULL, NULL, 1, 1, NULL, 1, '2023-03-19 19:44:12', '2023-04-07 04:52:43'),
(15, 1, 12, 29, 45, 'washing cloths', 'कपड़े धोना', 'washing-cloths', 'कपड़े-धोना', 'washing123', '1', 'comfortable', 'आरामदायक', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '55000', '200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760849637232817.jpg', NULL, 1, NULL, 1, NULL, 1, '2023-03-19 19:51:14', '2023-06-03 05:05:12'),
(16, 5, 13, 33, 57, 'baby wipes', 'बेबी वाइप्स', 'baby-wipes', 'बेबी-वाइप्स', 'babywipes21', '27', 'comfortable', 'आरामदायक', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '3000', '100', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760849980692779.jpg', 1, 1, NULL, NULL, NULL, 1, '2023-03-19 19:56:42', '2023-06-03 19:18:22'),
(17, 5, 13, 33, 59, 'baby food item', 'बच्चे के भोजन की वस्तु', 'baby-food-item', 'बच्चे-के-भोजन-की-वस्तु', 'babyfood 12', '10', 'testy', 'चिड़चिड़ा', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '10000', '300', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760850330650916.jpg', NULL, NULL, 1, NULL, NULL, 1, '2023-03-19 20:02:15', '2023-04-07 04:50:15'),
(18, 4, 13, 33, 57, 'baby diapers', 'बच्चे के डायपर', 'baby-diapers', 'बच्चे-के-डायपर', 'babydiapers 12', '50', 'comfortable', 'आरामदायक', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '500', '40', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum.', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1760850714362699.jpg', 1, NULL, NULL, 1, NULL, 1, '2023-03-19 20:08:22', '2023-04-07 04:49:30'),
(19, 3, 13, 32, 54, 'soft drinks', 'शीतल पेय', 'soft-drinks', 'शीतल-पेय', 'softdrinks12', '500', 'testy', 'चिड़चिड़ा', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '50000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम।', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget gravida ipsum. Maecenas lobortis tellus semper tellus ornare, eu convallis leo vulputate. Maecenas tempor sollicitudin sapien quis suscipit. Praesent dignissim, lacus a dignissim consectetur, lacus risus euismod justo, eget molestie metus sem vel quam.&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटुर एडिपिसिंग एलीट। नाम एगेट ग्रेविडा इप्सम। मेकेनास लॉबोर्टिस टेलस सेम्पर टेलस ऑर्नारे, ईयू कॉन्वलिस लियो वल्पुटेट। माकेनास टेम्पोर सॉलिसिट्यूडिन सैपियन क्विस ससिपिट। प्रेसेंट डिग्निसिम, लैकस ए डिग्निसिम कॉन्सेक्टेटर, लैकस रिसस ईयूस्मोड जस्टो, एगेट मोलेस्टी मेटस सेम वेल क्वाम।</pre>', 'upload/products/thambnail/1762172790631143.jpg', NULL, NULL, 1, NULL, NULL, 1, '2023-03-19 20:13:25', '2023-04-07 04:47:36'),
(21, 1, 10, 23, 27, 'Mobile accessory, plain cases', 'मोबाइल सहायक, सादे मामले', 'mobile-accessory,-plain-cases', 'मोबाइल-सहायक,-सादे-मामले', '423423', '3', 'Lorem,Amet', 'लोरेम, आमेट', 'small,large', 'छोटा, बड़ा', 'red, blue', 'लाल, नीला', '3000', '200', 'Mobile accessory, plain cases', 'मोबाइल सहायक, सादे मामले', '<p>Mobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain casesMobile accessory, plain cases</p>', '<pre>\r\nमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल एक्सेसरी, प्लेन केसमोबाइल </pre>', 'upload/products/thambnail/1768111385554366.jpeg', NULL, NULL, NULL, NULL, '20230608053336.pdf', 1, '2023-06-07 23:33:38', NULL),
(22, 1, 10, 23, 28, 'rwererwerw', 'rwererww', 'rwererwerw', 'rwererww', 're454', '34', 'Lorem,Ipsum,Amet', 'लोरेम, इप्सम, आमेट', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '400', '20', 'ewroeiwruewondncvxo', 'fsdfdsfsduiof sdfsdiofudsio ssdfoisdfudsoi', '<p>kfhksdfj fs</p>', '<p>fsfsfdsfsd fdsfsdfsdf sfsdf</p>', 'upload/products/thambnail/1768193193825643.jpeg', 1, 1, NULL, NULL, '20230609031355.png', 1, '2023-06-08 21:13:56', NULL),
(23, 1, 10, 23, 29, 'Mobile screen guards', 'मोबाइल स्क्रीन गार्डस', 'mobile-screen-guards', 'मोबाइल-स्क्रीन-गार्डस', 'wds33', '20', 'Lorem,Ipsum,Amet', 'लोरेम, इप्सम, आमेट', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '200', '30', 'Mobile screen guardsw', 'मोबाइल स्क्रीन गार्डस', '<p>Mobile screen guardsw Mobile screen guardsw Mobile screen guardsw Mobile screen guardsw Mobile screen guardsw Mobile screen guardsw</p>', '<p>मोबाइल स्क्रीन गार्डस मोबाइल स्क्रीन गार्डस मोबाइल स्क्रीन गार्डस मोबाइल स्क्रीन गार्डस मोबाइल स्क्रीन गार्डस मोबाइल स्क्रीन गार्डस मोबाइल स्क्रीन गार्डस</p>', 'upload/products/thambnail/1768193458646929.jpeg', 1, NULL, 1, NULL, '20230609031807.jpeg', 1, '2023-06-08 21:18:08', NULL),
(24, 4, 10, 23, 28, 'Mobile Design Case', 'मोबाइल डिजाइन का मामला', 'mobile-design-case', 'मोबाइल-डिजाइन-का-मामला', 'ew343', '30', 'Lorem,Ipsum,Amet', 'लोरेम, इप्सम, आमेट', 'small,medium,large', 'छोटा, मध्यम, बड़ा', 'red, green, blue', 'लाल, हरा, नीला', '700', '50', 'Mobile Design Case', 'मोबाइल डिजाइन का मामला', '<p>Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case Mobile Design Case</p>', '<p>मोबाइल डिजाइन का मामला&nbsp; मोबाइल डिजाइन का मामला&nbsp; मोबाइल डिजाइन का मामला&nbsp; मोबाइल डिजाइन का मामला मोबाइल डिजाइन का मामला मोबाइल डिजाइन का मामला मोबाइल डिजाइन का मामला मोबाइल डिजाइन का मामला मोबाइल डिजाइन का मामला</p>', 'upload/products/thambnail/1768193783091415.jpeg', 1, 1, 1, 1, '20230609032317.png', 1, '2023-06-08 21:23:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` smallint UNSIGNED NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comments`, `summery`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 6, 'Really its a nice and attractive product.', 'Nice Product.', NULL, '0', '2023-05-30 00:13:44', NULL),
(2, 16, 6, 'baby wipes is so comfortable and dry.\r\nMy baby is calm slept wearing this nice wipes.', 'baby wipes is so comfortable', NULL, '1', '2023-05-30 00:18:38', '2023-05-30 19:56:42'),
(3, 12, 6, 'Its a josh and nice for me. And the rice is very soon.', 'this rice cooker is nice', NULL, '1', '2023-05-30 00:20:52', '2023-05-30 19:52:56'),
(5, 14, 6, 'Nice Design Nice Design Nice Design', 'Nice Design.', 4, '1', '2023-06-07 08:47:03', '2023-06-07 08:48:13'),
(6, 14, 6, 'Nice design but not good', 'Nice design but.', 2, '1', '2023-06-07 09:07:50', '2023-06-07 09:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
CREATE TABLE IF NOT EXISTS `seos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'easy online shop', 'easy shop', 'best online shop, best product, best ecommerce site, best ecommerce product', 'In This Course, You Will Learn Laravel 8 Fundamentals With Project and Complete Advance School Management System Project', 'In This Course, You Will Learn Laravel 8 Fundamentals ', '2023-05-28 21:10:22', '2023-05-28 21:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Srh7BcarUDfIPehC5rbZAu27wRHwM5mNvIfIfWor', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDU1cmh1M3R2S1dWWUc1OTZoVE9sRlBBUjJpbzNob1hQb0l5WFVxdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1725605396);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

DROP TABLE IF EXISTS `ship_districts`;
CREATE TABLE IF NOT EXISTS `ship_districts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gazipur', '2023-05-10 05:03:23', NULL),
(2, 1, 'Faridpur', '2023-05-10 05:03:37', NULL),
(3, 2, 'Rangamati', '2023-05-10 05:03:52', NULL),
(6, 7, 'Jhalokati', '2023-05-11 01:32:34', NULL),
(7, 7, 'Pirozpur', '2023-05-11 01:32:55', NULL),
(8, 7, 'Potuakahli', '2023-05-11 01:33:14', NULL),
(9, 2, 'Cumilla', '2023-05-11 01:33:35', NULL),
(10, 1, 'Munshiganj', '2023-05-11 01:33:50', NULL),
(12, 6, 'Hobiganj', '2023-05-11 01:34:23', NULL),
(13, 6, 'Sunamganj', '2023-05-11 01:35:01', NULL),
(14, 6, 'Moulvibazar', '2023-05-11 01:35:18', NULL),
(15, 5, 'Bagherhat', '2023-05-11 01:36:40', NULL),
(16, 5, 'Sathkhira', '2023-05-11 01:36:55', NULL),
(17, 5, 'Jessore', '2023-05-11 01:37:13', NULL),
(18, 5, 'Kushtia', '2023-05-11 01:37:31', NULL),
(19, 8, 'Bogra', '2023-05-11 01:38:09', NULL),
(20, 8, 'Joypurhat', '2023-05-11 01:38:29', NULL),
(21, 8, 'Pabna', '2023-05-11 01:38:48', NULL),
(22, 8, 'Natore', '2023-05-11 01:39:01', NULL),
(23, 8, 'Nawabganj', '2023-05-11 01:39:12', NULL),
(24, 1, 'Dhaka', '2023-05-18 10:29:48', NULL),
(25, 1, 'Narayanganj', '2023-05-18 10:37:06', NULL),
(26, 1, 'Tangail', '2023-05-18 10:37:24', NULL),
(27, 1, 'Narsingdi', '2023-05-18 10:39:32', NULL),
(28, 1, 'Manikganj', '2023-05-18 10:40:00', NULL),
(29, 1, 'Kishoreganj', '2023-05-18 10:40:17', NULL),
(30, 1, 'Madaripur', '2023-05-18 10:40:35', NULL),
(31, 1, 'Shariatpur', '2023-05-18 10:40:50', NULL),
(32, 1, 'Gopalganj', '2023-05-18 10:41:05', NULL),
(33, 1, 'Rajbari', '2023-05-18 10:41:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

DROP TABLE IF EXISTS `ship_divisions`;
CREATE TABLE IF NOT EXISTS `ship_divisions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2023-05-10 03:28:58', NULL),
(2, 'Chattagram', '2023-05-10 03:46:22', '2023-05-10 03:46:22'),
(4, 'Mymanshing', '2023-05-10 03:56:47', NULL),
(5, 'Khulna', '2023-05-10 03:57:00', NULL),
(6, 'Shylet', '2023-05-10 03:57:22', NULL),
(7, 'Barisal', '2023-05-10 03:57:37', NULL),
(8, 'Rajshahi', '2023-05-10 03:57:55', NULL),
(9, 'Rangpur', '2023-05-10 03:58:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

DROP TABLE IF EXISTS `ship_states`;
CREATE TABLE IF NOT EXISTS `ship_states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` smallint UNSIGNED NOT NULL,
  `district_id` smallint UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'Gajaria', '2023-05-11 05:48:56', NULL),
(2, 2, 9, 'Laksham', '2023-05-11 05:51:00', NULL),
(3, 7, 8, 'ZijaTala', '2023-05-11 05:51:39', NULL),
(6, 7, 6, 'Banaripara', '2023-05-11 23:26:40', NULL),
(7, 1, 24, 'Dohar', '2023-05-18 10:30:41', NULL),
(8, 1, 24, 'Keraniganj', '2023-05-18 10:31:11', NULL),
(9, 1, 24, 'Dhamrai', '2023-05-18 10:32:05', NULL),
(10, 1, 24, 'Nawabganj', '2023-05-18 10:34:51', NULL),
(11, 1, 24, 'Savar', '2023-05-18 10:35:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1767126170974716.png', '01738920277', '01575049978', 'admin@gmail.com', 'SoftDevBangla', 'kha-41, Shikder Bari, Kuril, Dhaka', 'http://www.facebook.com', 'https://twitter.com/home', 'inkedin.com/feed/', 'https://www.youtube.com/', '2023-05-28 02:35:04', '2023-05-28 02:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1760342192991676.jpg', 'Slider One', 'Slider One test', 1, '2023-03-14 05:25:38', '2023-03-16 21:26:39'),
(2, 'upload/slider/1760344332882729.jpg', 'Slider towtwo', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demon', 1, '2023-03-14 05:29:10', '2023-03-14 05:59:38'),
(4, 'upload/slider/1760583008528514.jpg', 'Slider three', 'In publishing and graphic design,', 1, '2023-03-16 21:13:19', '2023-03-19 00:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_hin`, `subcategory_slug_en`, `subcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(18, 9, 'Mans Top Ware', 'मैंस टॉप वेयर', 'mans-top-ware', 'मैंस-टॉप-वेयर', NULL, NULL),
(19, 9, 'Mans Bottom Ware', 'मैन्स बॉटम वेयर', 'mans-bottom-ware', 'मैन्स-बॉटम-वेयर', NULL, NULL),
(20, 9, 'Mans Footwear', 'पुरुषों के जूते', 'mans-footwear', 'पुरुषों-के-जूते', NULL, NULL),
(21, 9, 'Women Footwear', 'महिलाओं के जूते', 'women-footwear', 'महिलाओं-के-जूते', NULL, NULL),
(22, 10, 'Computer Peripherals', 'कंप्यूटर सहायक उपकरण', 'computer-peripherals', 'कंप्यूटर-सहायक-उपकरण', NULL, NULL),
(23, 10, 'Mobile Accessory', 'मोबाइल सहायक', 'mobile-accessory', 'मोबाइल-सहायक', NULL, NULL),
(24, 10, 'Gaming', 'जुआ', 'gaming', 'जुआ', NULL, NULL),
(25, 11, 'Home Furnishings', 'घर सजाने का सामान', 'home-furnishings', 'घर-सजाने-का-सामान', NULL, NULL),
(26, 11, 'Living Room', 'बैठक', 'living-room', 'बैठक', NULL, NULL),
(27, 11, 'Home Decor', 'गृह सजावट', 'home-decor', 'गृह-सजावट', NULL, NULL),
(28, 12, 'Televisions', 'टेलीविजन', 'televisions', 'टेलीविजन', NULL, NULL),
(29, 12, 'Washing Machines', 'वाशिंग मशीन', 'washing-machines', 'वाशिंग-मशीन', NULL, NULL),
(30, 12, 'Refrigerators', 'रेफ्रिजरेटर', 'refrigerators', 'रेफ्रिजरेटर', NULL, NULL),
(31, 13, 'Beauty and Personal Care', 'सौंदर्य और व्यक्तिगत देखभाल', 'beauty-and-personal-care', 'सौंदर्य-और-व्यक्तिगत-देखभाल', NULL, NULL),
(32, 13, 'Food and Drinks', 'खाद्य और पेय', 'food-and-drinks', 'खाद्य-और-पेय', NULL, NULL),
(33, 13, 'Bady Care', 'शरीर की देखभाल', 'bady-care', 'शरीर-की-देखभाल', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

DROP TABLE IF EXISTS `sub_sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_hin`, `subsubcategory_slug_en`, `subsubcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(12, 9, 18, 'Mans T-shirt', 'मैन्स टी-शर्ट', 'mans-t-shirt', 'मैन्स-टी-शर्ट', NULL, NULL),
(13, 9, 18, 'Mans Casual Shirts', 'मैन्स कैजुअल शर्ट्स', 'mans-casual-shirts', 'मैन्स-कैजुअल-शर्ट्स', NULL, NULL),
(14, 9, 18, 'Mans Kurtas', 'मानस कुर्ते', 'mans-kurtas', 'मानस-कुर्ते', NULL, NULL),
(15, 9, 19, 'Mans Jeans', 'पुरुषों की जींस', 'mans-jeans', 'पुरुषों-की-जींस', NULL, NULL),
(16, 9, 19, 'Mans Trousers', 'पुरुषों की पतलून', 'mans-trousers', 'पुरुषों-की-पतलून', NULL, NULL),
(17, 9, 19, 'Mans Cargos', 'मेन्स कार्गो', 'mans-cargos', 'मेन्स-कार्गो', NULL, NULL),
(18, 9, 20, 'Mans Sports Shoes', 'पुरुषों के खेल के जूते', 'mans-sports-shoes', 'पुरुषों-के-खेल-के-जूते', NULL, NULL),
(19, 9, 20, 'Mans Casual Shoes', 'पुरुषों के आरामदायक जूते', 'mans-casual-shoes', 'पुरुषों-के-आरामदायक-जूते', NULL, NULL),
(20, 9, 20, 'Mans Formal Shoes', 'मैंस औपचारिक जूते', 'mans-formal-shoes', 'मैंस-औपचारिक-जूते', NULL, NULL),
(21, 9, 21, 'Women Flats', 'महिला फ्लैट', 'women-flats', 'महिला-फ्लैट', NULL, NULL),
(22, 9, 21, 'Women Heels', 'महिला ऊँची एड़ी के जूते', 'women-heels', 'महिला-ऊँची-एड़ी-के-जूते', NULL, NULL),
(23, 9, 21, 'Woman Sheakers', 'महिला स्नीकर्स', 'woman-sheakers', 'महिला-स्नीकर्स', NULL, NULL),
(24, 10, 22, 'Printers', 'प्रिंटर', 'printers', 'प्रिंटर', NULL, NULL),
(25, 10, 22, 'Monitors', 'पर नज़र रखता है', 'monitors', 'पर-नज़र-रखता-है', NULL, NULL),
(26, 10, 22, 'Projectors', 'प्रोजेक्टर', 'projectors', 'प्रोजेक्टर', NULL, NULL),
(27, 10, 23, 'Plain Cases', 'सादा मामले', 'plain-cases', 'सादा-मामले', NULL, NULL),
(28, 10, 23, 'Designer Cases', 'डिजाइनर मामले', 'designer-cases', 'डिजाइनर-मामले', NULL, NULL),
(29, 10, 23, 'Screen Guards', 'स्क्रीन गार्ड', 'screen-guards', 'स्क्रीन-गार्ड', NULL, NULL),
(30, 10, 24, 'Gaming Mouse', 'गेमिंग माउस', 'gaming-mouse', 'गेमिंग-माउस', NULL, NULL),
(31, 10, 24, 'Gaming Keyboars', 'गेमिंग कीबोर्ड', 'gaming-keyboars', 'गेमिंग-कीबोर्ड', NULL, NULL),
(32, 10, 24, 'Gaming Mousepads', 'गेमिंग माउसपैड', 'gaming-mousepads', 'गेमिंग-माउसपैड', NULL, NULL),
(33, 11, 25, 'Bed Liners', 'बेड लाइनर्स', 'bed-liners', 'बेड-लाइनर्स', NULL, NULL),
(34, 11, 25, 'Bedsheets', 'चादरें', 'bedsheets', 'चादरें', NULL, NULL),
(35, 11, 25, 'Blankets', 'कम्बल', 'blankets', 'कम्बल', NULL, NULL),
(36, 11, 26, 'Tv Units', 'टीवी इकाइयां', 'tv-units', 'टीवी-इकाइयां', NULL, NULL),
(37, 11, 26, 'Dining Sets', 'डाइनिंग सेट', 'dining-sets', 'डाइनिंग-सेट', NULL, NULL),
(38, 11, 26, 'Coffee Tables', 'कॉफ़ी मेज़', 'coffee-tables', 'कॉफ़ी-मेज़', NULL, NULL),
(39, 11, 27, 'Lightings', 'रोशनी', 'lightings', 'रोशनी', NULL, NULL),
(40, 11, 27, 'Clocks', 'घड़ियों', 'clocks', 'घड़ियों', NULL, NULL),
(41, 11, 27, 'Wall Decor', 'दीवार की सजावट', 'wall-decor', 'दीवार-की-सजावट', NULL, NULL),
(42, 12, 28, 'Big Screen TVs', 'बिग स्क्रीन टीवी', 'big-screen-tvs', 'बिग-स्क्रीन-टीवी', NULL, NULL),
(43, 12, 28, 'Smart TVs', 'स्मार्ट टीवी', 'smart-tvs', 'स्मार्ट-टीवी', NULL, NULL),
(44, 12, 28, 'OLED TVs', 'ओएलईडी टीवी', 'oled-tvs', 'ओएलईडी-टीवी', NULL, NULL),
(45, 12, 29, 'Washer Dryers', 'वॉशर ड्रायर', 'washer-dryers', 'वॉशर-ड्रायर', NULL, NULL),
(46, 12, 29, 'Washer Only', 'केवल वॉशर', 'washer-only', 'केवल-वॉशर', NULL, NULL),
(47, 12, 29, 'Energy Efficient', 'कुशल ऊर्जा', 'energy-efficient', 'कुशल-ऊर्जा', NULL, NULL),
(48, 12, 30, 'Single Door', 'सिंगल डोर', 'single-door', 'सिंगल-डोर', NULL, NULL),
(49, 12, 30, 'Double Door', 'दोहरा दरवाज़ा', 'double-door', 'दोहरा-दरवाज़ा', NULL, NULL),
(50, 12, 30, 'Mini Rerigerators', 'मिनी रिगरेटर', 'mini-rerigerators', 'मिनी-रिगरेटर', NULL, NULL),
(51, 13, 31, 'Eys Makeup', 'आँख मेकअप', 'eys-makeup', 'आँख-मेकअप', NULL, NULL),
(52, 13, 31, 'Lip Makeup', 'लिप मेकअप', 'lip-makeup', 'लिप-मेकअप', NULL, NULL),
(53, 13, 31, 'Hair Care', 'बालों की देखभाल', 'hair-care', 'बालों-की-देखभाल', NULL, NULL),
(54, 13, 32, 'Beverages', 'पेय', 'beverages', 'पेय', NULL, NULL),
(55, 13, 32, 'Chocolates', 'चॉकलेट', 'chocolates', 'चॉकलेट', NULL, NULL),
(56, 13, 32, 'Snacks', 'नाश्ता', 'snacks', 'नाश्ता', NULL, NULL),
(57, 13, 33, 'Baby Diapers', 'बच्चे के डायपर', 'baby-diapers', 'बच्चे-के-डायपर', NULL, NULL),
(58, 13, 33, 'Baby Wipes', 'बच्चे के डायपर', 'baby-wipes', 'बच्चे-के-डायपर', NULL, NULL),
(59, 13, 33, 'Baby Food', 'शिशु भोजन', 'baby-food', 'शिशु-भोजन', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'parvaz', 'parvaz@gmail.com', '01738920277', '2023-06-01 01:47:10', NULL, '$2y$10$2zT8XZDHmoEsaVoKKEIYVukoMY9sAhyBW3YhPZSa/jIjxm5ZzfsTa', NULL, NULL, NULL, 'wkYala7TJe5hrTKIq5GCAQLxl6RyWEo1RcG2qiO5BgOcasTXSd78gyZ6W7pd', NULL, '202303030506female6.jpg', '2023-03-02 01:56:39', '2023-05-31 19:47:10'),
(6, 'user', 'user@gmail.com', '01738920277', '2023-06-08 09:12:54', NULL, '$2y$10$p1evayDH9znyzSFZJwvWE.pc23b/90I.xX3MW9d6a0IXvzSNNwR.O', NULL, NULL, NULL, 'sKdvfYCbBSUrBXxGY2oMUzrP6thydfKt5ZalMfFHL9CCS9cggwHrnqcIuA0J', NULL, '202305210556Screenshot 2022-07-01 202958.png', '2023-05-06 23:54:15', '2023-06-08 03:12:54'),
(7, 'Nayem', 'nayem@gmail.com', '01738920288', '2023-05-29 08:41:24', NULL, '$2y$10$HHZTUyVlkY3pD6EUSC2kUuUIjCd4uTDTIi8CN/1d5L7VTRwE4V6um', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-06 23:56:13', '2023-05-29 02:41:24'),
(8, 'Yeasin', 'yeasinahmed740@gmail.com', '4234234544', '2023-06-06 06:40:36', NULL, '$2y$10$E7aJLXZsaqgYpqoAWb3XAOrsTsLz24rG1QNIF/ZseytFHoU5acaOy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 00:16:57', '2023-06-06 00:40:36'),
(9, 'Liza', 'liza@gmail.com', '34243454', '2023-06-06 06:43:03', NULL, '$2y$10$oqbuU5Owr6kDZmSMzt5oRODEVP6hHUUbxzjTYLO2m8NmUZOQuE2ni', NULL, NULL, NULL, NULL, NULL, '202306060642female7.jpg', '2023-06-06 00:23:53', '2023-06-06 00:43:03'),
(10, 'Mamun', 'mamun@gmail.com', '653342343', '2023-06-06 06:39:40', NULL, '$2y$10$1.cBja88AQJKsFzpGU3uwu.skGRYfL3lpw.qkX9nL5yu7MW60vB7K', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 00:25:54', '2023-06-06 00:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

DROP TABLE IF EXISTS `wish_lists`;
CREATE TABLE IF NOT EXISTS `wish_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 3, 7, '2023-05-06 22:21:18', NULL),
(7, 6, 16, '2023-05-08 00:45:42', NULL),
(8, 6, 13, '2023-05-08 00:45:52', NULL),
(9, 3, 16, '2023-05-10 00:33:18', NULL),
(10, 3, 15, '2023-05-10 00:33:30', NULL),
(11, 3, 13, '2023-05-10 00:33:35', NULL),
(12, 3, 12, '2023-05-10 00:33:39', NULL),
(13, 3, 2, '2023-05-10 00:33:47', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
