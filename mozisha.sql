-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 12:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mozisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_auth`
--

CREATE TABLE `admin_auth` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_auth`
--

INSERT INTO `admin_auth` (`id`, `email`, `password`, `date`) VALUES
(0, 'ogundeyitaoheed@gmail.com', '1234567', '2020-11-06 01:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_code` varchar(225) NOT NULL,
  `cat_image` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_title`, `cat_code`, `cat_image`, `date`) VALUES
(3, 'Graphic design', '52032906', 'icons8-adobe-dreamweaver-64.png', '2020-11-06 01:13:58'),
(4, 'Engineering', '50950709', 'icons8-nuclear-power-plant-50.png', '2020-11-06 01:14:17'),
(5, 'Music', '68482146', 'icons8-music-record-64.png', '2020-11-06 01:14:32'),
(9, 'Programming', '52160138', 'icons8-laptop-coding-64.png', '2020-11-05 20:31:25'),
(10, 'Marketing', '74435144', 'icons8-marketing-64.png', '2020-11-05 20:31:55'),
(11, 'Fashion design', '61888510', 'icons8-tailors-dummy-64.png', '2020-12-02 14:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_title` varchar(225) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `course_overview` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL,
  `language` varchar(225) NOT NULL,
  `top_course` varchar(225) NOT NULL,
  `course_price` varchar(225) NOT NULL,
  `discount_percentage` varchar(225) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `course_picture` varchar(225) NOT NULL,
  `instructor` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `quiz` varchar(225) NOT NULL,
  `duration` varchar(225) NOT NULL,
  `assignment` varchar(225) NOT NULL,
  `paid_status` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `short_description`, `description`, `course_overview`, `category`, `level`, `language`, `top_course`, `course_price`, `discount_percentage`, `course_code`, `course_picture`, `instructor`, `status`, `quiz`, `duration`, `assignment`, `paid_status`, `date`) VALUES
(1, 'The Ultimate 2021 Digital Marketing Bundle: 33-Courses-In-1!', 'Welcome to The Ultimate 2021 Digital Marketing Bundle: The Most Value Packed 33-Courses-In-1 Training On Udemy.\r\n\r\nWhether you want to grow your traffic, customers, and sales of your own brand. Get a high paid Digital Marketing job, or start your own Digital Marketing agency - you are in the perfect place.', '<p>We have cut through the noise and created a down to earth, value packed, comprehensive and easy to understand course.</p><p> With all of the value you get from this course you will take your online business into 2021 ahead of the game.</p>\r\n\r\n<p>WE give your EVERYTHING YOU NEED to build a strong foundation in digital marketing: If you are new to digital marketing or need to upgrade your skills this is the course for you..</p>\r\n\r\n<p>With over 30+ hours of Priceless Knowledge you will crush the Digital Marketing world: The measures of success will be how clear you will be in your ability to implement your online presence. You will have the skills to market yourself as a professionals who seek to exceed in the digital space.</p>\r\n\r\n<p>This Digital Marketing course will take you on the journey of designing a Digital Marketing Strategy from the ground up.</p>\r\n<p>You will learn how to find and understand your audience and how to assess and achieve your goals and objectives.</p> \r\n\r\n<h5>In This Course We Cover:</h5>\r\n\r\n<p>Finding Your Target Audience</p>\r\n\r\n<p>Your Product And Services</p>\r\n\r\n<p>Creating A Websites With Shopify</p>\r\n\r\n<p>Creating A Websites With Clickfunnel</p>\r\n\r\n<p>Your Marketing Content</p>\r\n\r\n<p>Starting A Youtube Channel</p>\r\n\r\n<p>Instagram: Growing Your Audience</p>\r\n\r\n<p>Ecommerce With Amazon FBA</p>\r\n\r\n<li>Tiktok</li>\r\n\r\n<li>Udemy</li>\r\n\r\n<li>Etsy</li>\r\n\r\n<li>Pinterest</li>\r\n\r\n<li>Facebook</li>\r\n\r\n<li>Email</li>\r\n\r\n<li>Messenger</li>\r\n\r\n<li>Text</li>\r\n\r\n<li>Google Trends</li>\r\n\r\n<li>Webinars</li>\r\n\r\n<li>Podcast</li>\r\n\r\n<li>SEO</li>\r\n\r\n<li>Reddit</li>\r\n\r\n<li>Snapchat</li>\r\n\r\n<li>Twitter</li>\r\n\r\n<li>App Store</li>\r\n\r\n<li>Analytics</li>\r\n\r\n<li>Entrepreneurship</li>\r\n\r\n<li>and more</li>\r\n\r\n<p>We have designed this Digital Marketing Course to give you the core tools, knowledge, and skills to create your personalized and successful  campaigns no matter which platforms you choose. You will learn how to adapt in the ever-changing environment of Digital Marketing.</p>\r\n\r\n<p>We introduce you to all of the tools and processes designed to take the ‘fear factor’ out of digital marketing.</p>\r\n\r\n<p>This course will empower you to not only run your campaigns with the maximum chance of success, but give you the skills to review and adjust for improvements.</p>\r\n\r\n<p>By the end of course, you will have gained the practical digital marketing knowledge and skills to:</p>\r\n\r\n<p>Implement effective digital marketing campaigns that achieve business objectives</p>\r\n\r\n<p>Create a compelling digital market campaign for your audience and channels</p>\r\n\r\n<p>Connect with an audience through effective social media</p>\r\n\r\n<p>Make data-driven decisions based on insights from campaign performance</p>\r\n\r\n<p>Understand innovative digital marketing trends</p>\r\n\r\n<h5>Plus these bonuses:</h5>\r\n\r\n<p>*Lifetime access to the course</p>\r\n\r\n<p>*So Much Value that will bring you results</p>\r\n\r\n<p>* Support in the Q&A section</p>\r\n\r\n<p>*Udemy certification of completion.</p>\r\n\r\n<p>I am looking forward to joining you on your digital marketing journey.</p>\r\n<p>- Benj</p>\r\n\r\n<h5>Who this course is for:</h5>\r\n<p>Increase Your Online Presence And Take Your Digital Marketing Strategies in 2021</p>\r\n<p>Brand Owners Who Want To Reach New Audiences, and Create Lifelong Customers With Social Media</p>\r\n<p>People Looking to Get A High Paid Digital Marketing Job at A StartUp</p>\r\n<p>People Who Want To Create A Digital Marketing Agency</p>', '1. React Concepts.mp4', 'Marketing', 'Beginner', 'English', 'True', '14000', '10', '57980683', 'digital_marketing.jpg', 'Benjamin Wilson', 'pending', 'Yes', '30 hours', 'Yes', 'paid', '2020-11-05 23:53:51'),
(2, 'The Web Developer Bootcamp 2020', 'COMPLETELY REDONE ON OCTOBER 12th 2020, WITH OVER 500 NEW VIDEOS!\r\n\r\nHi! Welcome to the Web Developer Bootcamp, the only course you need to learn web development. There are a lot of options for online developer training, but this course is without a doubt the most comprehensive and effective on the market.  Here\'s why:', 'This is the only online course taught by a professional bootcamp instructor.\r\n\r\n94% of my in-person bootcamp students go on to get full-time developer jobs. Most of them are complete beginners when I start working with them.\r\n\r\nThe previous 2 bootcamp programs that I taught cost $14,000 and $21,000.  This course is just as comprehensive but with brand new content for a fraction of the price.\r\n\r\nEverything I cover is up-to-date and relevant to today\'s developer industry. No PHP or other dated technologies. This course does not cut any corners.\r\n\r\nThis is the only complete beginner full-stack developer course that covers NodeJS.\r\n\r\nWe build 13+ projects, including a gigantic production application called YelpCamp. No other course walks you through the creation of such a substantial application.\r\n\r\nThe course is constantly updated with new content, projects, and modules.  Think of it as a subscription to a never-ending supply of developer training.\r\n\r\nYou get to meet my dog Rusty!\r\n\r\nWhen you\'re learning to program you often have to sacrifice learning the exciting and current technologies in favor of the \"beginner friendly\" classes.  With this course, you get the best of both worlds.  This is a course designed for the complete beginner, yet it covers some of the most exciting and relevant topics in the industry.\r\n\r\nThroughout the course we cover tons of tools and technologies including:\r\n\r\nHTML5\r\n\r\nCSS3\r\n\r\nFlexbox\r\n\r\nResponsive Design\r\n\r\nJavaScript (all 2020 modern syntax, ES6, ES2018, etc.)\r\n\r\nAsynchronous JavaScript - Promises, async/await, etc.\r\n\r\nAJAX and single page apps\r\n\r\nBootstrap 4 and 5 (alpha)\r\n\r\nSemanticUI\r\n\r\nBulma CSS Framework\r\n\r\nDOM Manipulation\r\n\r\nUnix(Command Line) Commands\r\n\r\nNodeJS\r\n\r\nNPM\r\n\r\nExpressJS\r\n\r\nTemplating\r\n\r\nREST\r\n\r\nSQL vs. NoSQL databases\r\n\r\nMongoDB\r\n\r\nDatabase Associations\r\n\r\nSchema Design\r\n\r\nMongoose\r\n\r\nAuthentication From Scratch\r\n\r\nCookies & Sessions\r\n\r\nAuthorization\r\n\r\nCommon Security Issues - SQL Injection, XSS, etc.\r\n\r\nDeveloper Best Practices\r\n\r\nDeploying Apps\r\n\r\nCloud Databases\r\n\r\nImage Upload and Storage\r\n\r\nMaps and Geocoding\r\n\r\nThis course is also unique in the way that it is structured and presented. Many online courses are just a long series of \"watch as I code\" videos.  This course is different. I\'ve incorporated everything I learned in my years of teaching to make this course not only more effective but more engaging. The course includes:\r\n\r\nLectures\r\n\r\nCode-Alongs\r\n\r\nProjects\r\n\r\nExercises\r\n\r\nResearch Assignments\r\n\r\nSlides\r\n\r\nDownloads\r\n\r\nReadings\r\n\r\nToo many pictures of my dog Rusty\r\n\r\nIf you have any questions, please don\'t hesitate to contact me.  I got into this industry because I love working with people and helping students learn.  Sign up today and see how fun, exciting, and rewarding web development can be!\r\n\r\nWho this course is for:\r\nThis course is for anyone who wants to learn about web development, regardless of previous experience\r\nIt\'s perfect for complete beginners with zero experience\r\nIt\'s also great for anyone who does have some experience in a few of the technologies(like HTML and CSS) but not all\r\nIf you want to take ONE COURSE to learn everything you need to know about web development, take this course', '1. React Concepts.mp4', 'Programming', 'Beginner', 'English', 'True', '13000', '15', '62342972', 'javascript.jpg', 'Amri Maliky', 'pending', 'Yes', '60 hours', 'Yes', 'paid', '2020-11-06 18:59:59'),
(3, 'Machine Learning A-Z™: Hands-On Python & R In Data Science', 'Interested in the field of Machine Learning? Then this course is for you!\r\n\r\nThis course has been designed by two professional Data Scientists so that we can share our knowledge and help you learn complex theory, algorithms, and coding libraries in a simple way.', 'We will walk you step-by-step into the World of Machine Learning. With every tutorial, you will develop new skills and improve your understanding of this challenging yet lucrative sub-field of Data Science.\r\n\r\nThis course is fun and exciting, but at the same time, we dive deep into Machine Learning. It is structured the following way:\r\n\r\nPart 1 - Data Preprocessing\r\n\r\nPart 2 - Regression: Simple Linear Regression, Multiple Linear Regression, Polynomial Regression, SVR, Decision Tree Regression, Random Forest Regression\r\n\r\nPart 3 - Classification: Logistic Regression, K-NN, SVM, Kernel SVM, Naive Bayes, Decision Tree Classification, Random Forest Classification\r\n\r\nPart 4 - Clustering: K-Means, Hierarchical Clustering\r\n\r\nPart 5 - Association Rule Learning: Apriori, Eclat\r\n\r\nPart 6 - Reinforcement Learning: Upper Confidence Bound, Thompson Sampling\r\n\r\nPart 7 - Natural Language Processing: Bag-of-words model and algorithms for NLP\r\n\r\nPart 8 - Deep Learning: Artificial Neural Networks, Convolutional Neural Networks\r\n\r\nPart 9 - Dimensionality Reduction: PCA, LDA, Kernel PCA\r\n\r\nPart 10 - Model Selection & Boosting: k-fold Cross Validation, Parameter Tuning, Grid Search, XGBoost\r\n\r\nMoreover, the course is packed with practical exercises that are based on real-life examples. So not only will you learn the theory, but you will also get some hands-on practice building your own models.\r\n\r\nAnd as a bonus, this course includes both Python and R code templates which you can download and use on your own projects.\r\n\r\nImportant updates (June 2020):\r\n\r\nCODES ALL UP TO DATE\r\n\r\nDEEP LEARNING CODED IN TENSORFLOW 2.0\r\n\r\nTOP GRADIENT BOOSTING MODELS INCLUDING XGBOOST AND EVEN CATBOOST!\r\n\r\n\r\n\r\nWho this course is for:\r\nAnyone interested in Machine Learning.\r\nStudents who have at least high school knowledge in math and who want to start learning Machine Learning.\r\nAny intermediate level people who know the basics of machine learning, including the classical algorithms like linear regression or logistic regression, but who want to learn more about it and explore all the different fields of Machine Learning.\r\nAny people who are not that comfortable with coding but who are interested in Machine Learning and want to apply it easily on datasets.\r\nAny students in college who want to start a career in Data Science.\r\nAny data analysts who want to level up in Machine Learning.\r\nAny people who are not satisfied with their job and who want to become a Data Scientist.\r\nAny people who want to create added value to their business by using powerful Machine Learning tools.', '1. React Concepts.mp4', 'Programming', 'Beginner', 'English', 'True', 'free', '0', '46267175', 'machine_learning.jpg', 'Jose Portilla', 'pending', 'Yes', '60 hours', 'Yes', 'free', '2020-11-06 19:21:27'),
(4, 'Angular - The Complete Guide (2020 Edition)', 'This course starts from scratch, you neither need to know Angular 1 nor Angular 2!\r\n\r\nAngular 10 simply is the latest version of Angular 2, you will learn this amazing framework from the ground up in this course!', 'Join the most comprehensive, popular and bestselling Angular course on Udemy and benefit not just from a proven course concept but from a huge community as well! \r\n\r\nFrom Setup to Deployment, this course covers it all! You\'ll learn all about Components, Directives, Services, Forms, Http Access, Authentication, Optimizing an Angular App with Modules and Offline Compilation and much more - and in the end: You\'ll learn how to deploy an application!\r\n\r\nBut that\'s not all! This course will also show you how to use the Angular CLI and feature a complete project, which allows you to practice the things learned throughout the course!\r\n\r\nAnd if you do get stuck, you benefit from an extremely fast and friendly support - both via direct messaging or discussion. You have my word! ;-)\r\n\r\nAngular is one of the most modern, performance-efficient and powerful frontend frameworks you can learn as of today. It allows you to build great web apps which offer awesome user experiences! Learn all the fundamentals you need to know to get started developing Angular applications right away.\r\n\r\nHear what my students have to say\r\n\r\nAbsolutely fantastic tutorial series. I cannot thank you enough. The quality is first class and your presentational skills are second to none. Keep up this excellent work. You really rock!﻿ - Paul Whitehouse\r\n\r\nThe instructor, Max, is very enthusiastic and engaging. He does a great job of explaining what he\'s doing and why rather than having students just mimic his coding. Max was also very responsive to questions. I would recommend this course and any others that he offers. Thanks, Max!\r\n\r\nAs a person new to both JavaScript and Angular 2 I found this course extremely helpful because Max does a great job of explaining all the important concepts behind the code. Max has a great teaching ability to focus on what his audience needs to understand.\r\n\r\nThis Course uses TypeScript\r\n\r\nTypeScript is the main language used by the official Angular team and the language you\'ll mostly see in Angular tutorials. It\'s a superset to JavaScript and makes writing Angular apps really easy. Using it ensures, that you will have the best possible preparation for creating Angular apps. Check out the free videos for more information.\r\n\r\nTypeScript knowledge is, however, not required - basic JavaScript knowledge is enough.\r\n\r\nWhy Angular?\r\n\r\nAngular is the next big deal. Being the successor of the overwhelmingly successful Angular.js framework it’s bound to shape the future of frontend development in a similar way. The powerful features and capabilities of Angular allow you to create complex, customizable, modern, responsive and user friendly web applications.\r\n\r\nAngular 10 simply is the latest version of the Angular framework and simply an update to Angular 2.\r\n\r\nAngular is faster than Angular 1 and offers a much more flexible and modular development approach. After taking this course you’ll be able to fully take advantage of all those features and start developing awesome applications immediately.\r\n\r\nDue to the drastic differences between Angular 1 and Angular (=Angular 10) you don’t need to know anything about Angular.js to be able to benefit from this course and build your futures projects with Angular.\r\n\r\nGet a very deep understanding of how to create Angular applications\r\n\r\nThis course will teach you all the fundamentals about modules, directives, components, databinding, routing, HTTP access and much more! We will take a lot of deep dives and each section is backed up with a real project. All examples showcase the features Angular offers and how to apply them correctly.\r\n\r\nSpecifically you will learn:\r\n\r\nWhich architecture Angular uses\r\n\r\nHow to use TypeScript to write Angular applications\r\n\r\nAll about directives and components, including the creation of custom directives/ components\r\n\r\nHow databinding works\r\n\r\nAll about routing and handling navigation\r\n\r\nWhat Pipes are and how to use them\r\n\r\nHow to access the Web (e.g. RESTful servers)\r\n\r\nWhat dependency injection is and how to use it\r\n\r\nHow to use Modules in Angular\r\n\r\nHow to optimize your (bigger) Angular Application\r\n\r\nAn introduction to NgRx and complex state management\r\n\r\nWe will build a major project in this course so that you can practice all concepts\r\n\r\nand so much more!\r\n\r\nPay once, benefit a lifetime!\r\n\r\nDon’t lose any time, gain an edge and start developing now!\r\n\r\nWho this course is for:\r\nNewcomer as well as experienced frontend developers interested in learning a modern JavaScript framework\r\nThis course is for everyone interested in learning a state-of-the-art frontend JavaScript framework\r\nTaking this course will enable you to be amongst the first to gain a very solid understanding of Angular', '1. React Concepts.mp4', 'Programming', 'Beginner', 'English', 'True', '20000', '10', '65688029', 'angular.jpg', 'Jose Portilla', 'pending', 'Yes', '24 hours', 'No', 'paid', '2020-11-06 19:28:09'),
(5, 'Character Art School: Complete Character Drawing Course', 'With over 6500 5-Star reviews, join thousands of Artists in training in the best Character Drawing Course in the world!', 'What is Character Art School?\r\n\r\nCharacter Art School is a learn-anywhere video course where you learn how to draw professional characters for books, games, animation, manga, comics and more. I’ve hand-crafted the Character Art School: Complete Character Drawing course to be the only course you need to learn all the core fundamentals and advanced techniques to drawing and sketching characters well. If you’re an absolute beginner or you’re already at an intermediate level, the course will advance your current drawing ability to a professional level. The course is a comprehensive 10 module guided video course, where the only limit to your progression is your determination and engagement in the rewarding assignments.\r\n\r\nWhether you want to draw character design concept art for films and games, illustrations, comics, manga, Disney style or other styles, this is the course you need to get you there.\r\n\r\nI’ll teach you to draw without fear, and I’ll teach you to draw well - quickly.\r\n\r\nFinally, Learn Character Drawing Well\r\n\r\nWhether you’re a complete beginner, or intermediate at character drawing, you’ll learn things you never knew you never knew. Seriously. Inspired by masters and built on the theory of giants, Character Drawing Academy is one of, if not the most comprehensive character drawing course out there. I’m so convinced of this, I’ll give you a no-questions asked refund if you’re not satisfied.\r\n\r\nClear, Easy to Understand Lessons\r\n\r\nCrystal clear in fact. Learning character drawing and how to draw people effectively means having information presented in a logical and coherent way. The Character Academy Course is modular by design, easy to grasp, and allows you to learn in a well paced, structured way. Engage in the course chronologically, then revise each module at your leisure. Grasp concepts, such as how to draw lips, eyes, faces, and more, faster than you ever have before – there’s no fluff here.\r\n\r\nAssignments that are Rewarding\r\n\r\nBridging the gap between theory and practice, each module’s assignments have been designed to both reinforce theory, and feel rewarding. I’ve taken the core of the theory, and purpose built each assignment to help you rapidly progress, and you’ll see the difference in your own work almost immediately. Art is about doing, so let’s get started- let’s draw something awesome!\r\n\r\nWhat\'s Your Style?\r\n\r\nWhether you want to learn Character Drawing to draw for games, comics, cartoons, manga, animation and more, this course has you covered. I\'m not teaching you a \'method\' or a \'way\' to draw, I\'m teaching you to be fundamentally good at drawing characters, whether you prefer traditional pencil drawing or draw digitally.\r\n\r\nWhat are Students Saying about the Course?\r\n\r\n\"Probably the best art course I\'ve ever taken -- online or in college. Wonderfully presented, it helped me correct mistakes I\'d been making that were really holding my artwork back. I\'ve seen phenomenal progress after 30 days practice of the course material. Highly recommended.\" \r\n\r\nDan Rahmel ★★★★★\r\n\r\n\"Just a perfect 5 stars rating. It\'s really complete and filled with advice, theories and concrete examples. As he said, it\'s probably the last character drawing course you\'ll take. It\'s all I wanted. Thank you so much Scott Harris!\" \r\n\r\nMario ★★★★★\r\n\r\n\"Amazing course. I haven\'t even started drawing yet because I\'m in awe of how simple the instructor makes even the most complicated techniques look. At last, drawing like a pro is within my grasp! I also like the fact that the instructor allows me to just watch the first time through without worrying about drawing until I\'m familiar with the concepts. My next time through the course, I\'ll be prepared and more confident than ever to begin drawing. Even so, I\'ve already used some of the concepts in this course for a sketch here and there when I feel inspired to draw, and I can tell worlds of difference between my former drawings and newer ones. Laid back instructor, but very knowledgeable. I highly recommend this course.\"\r\n\r\nEric Beaty ★★★★★\r\n\r\nWho this course is for:\r\nAnyone who wants to learn to draw characters well, in any style\r\nIndividuals who love character art, from Video Game Art, to Animation, Comics, Manga and more', '1. React Concepts.mp4', 'Graphic design', 'Beginner', 'English', 'True', '16000', '5', '57350192', 'character_drawing.jpg', 'Entrepreneur  Academy', 'pending', 'Yes', '24 hours', 'No', 'paid', '2020-11-23 16:17:35'),
(6, 'Instagram Marketing 2020: Complete Guide To Instagram Growth', '**BRAND NEW CONTENT & UP TO DATE  2020! -  COMPLETE UDEMY COURSE!**\r\n\r\n\r\n\r\nInstagram is a powerful and fun social tool that allows you to market your business to hundreds of new customers everyday! There are over 1 Billion Instagram users, and learning simple strategies to gain targeted followers can significantly increase your businesses revenue.', 'Instagram is a simple & effective way to connect to new customers:\r\n\r\nCreate an attractive, powerful and professional Instagram business profile\r\n\r\nConnect with 500+ targeted users every day on Instagram\r\n\r\nBuild strong trustworthy relationships with your Instagram followers\r\n\r\nUse the proven marketing skills and the follower funnel technique to convert followers to paying customers\r\n\r\nKeep up with all the new features Instagram are continuously implementing to grow your business and account\r\n\r\n OVER 50,000 amazing HAPPY students have taken THIS course\r\n\r\nInstagram is a small time investment for a huge customer return!\r\n\r\nOnce you spend just a few hours learning the powerful proven Instagram marketing techniques, you will see why we are the recommend course. We have easy to follow step by step techniques to grow your followers and market your business.\r\n\r\nYour time will pay off by reaching thousands of new customers, and building a strong, trustworthy relationship through Instagram will skyrocket your brand awareness to a level beyond your expectations. You will have the tools to create quality content, grow your Instagram followers and market your business to these hyper-targeted customers.\r\n\r\nWhen making a purchasing decision, people online use your social media presence as a measure of the quality, and trustworthiness of your business. Nothing speaks trust and quality louder than having a thousands of targeted, real, and loving Instagram followers on your profile (of which you can contact at any time!) Your profile will be professional and compelling and you will be using stories, live streaming and all the other new features Instagram releases.\r\n\r\nInstagram for Business Contents and Overview\r\n\r\nThis Instagram course is designed for anyone  who want to learn how to use Instagram to grow their followers and business. We are constantly keeping up with all of the new features and changes implemented and you have lifetime access to the course.\r\n\r\nIn this course, we start with the very basics and you will learn how to create a powerful, professional Instagram profile for your business designed to effectively appeal your target customer. Even for people who have already established an account, it is imperative to know that you have done this in the optimal way for Instagram growth and marketing!\r\n\r\nYou\'ll then learn, using the incredible Instagram promotional marketing strategies, how to gain hundreds of followers, comments and likes for your business account every single day. All the time we are here to answer questions.\r\n\r\nWhat sets this apart from other Instagram management & marketing courses is that by the end of this course - you will know all the strategies for you to grow your followers and convert your successful Instagram statistics into sales, customers and loyal fans!\r\n\r\nBy the end of this course, you\'ll have valuable skills that will help you effectively build a strong community of Instagram followers, convert them to paying customers, and finally sell them your products and services.\r\n\r\nYou\'ll also receive practice activities, live demonstrations, and helpful resources to guide you through the entire process. From setting up your Instagram account, gathering a strong relevant following, to increasing the profit of your business.\r\n\r\nLooking forward to seeing you on the inside ;)\r\n\r\n- Benji\r\n\r\nEntrepreneur Academy\r\n\r\nWho this course is for:\r\nThis Instagram course is suitable for Businesses and Personal users who are new to Instagram or those who have less than 10,000 Instagram followers.\r\nIn this course you will conquer and implement all the powerful and proven marketing strategies available. You will grow your Instagram account through our clear step by step strategies converting your followers to paying customers.\r\nThis course is necessary for everyone who want to grow their Instagram followers, become proficient at all the marketing tools available and keep up to date with all of the new Instagram features.', '1. React Concepts.mp4', 'Marketing', 'Beginner', 'English', 'True', '12000', '5', '52526311', 'instagram_marketing.jpg', 'Benjamin Wilson', 'pending', 'Yes', '60 hours', 'No', 'paid', '2020-11-06 19:44:16'),
(7, 'Facebook Ads & Facebook Marketing MASTERY 2020 | Coursenvy ', 'Want to become a Facebook Ads expert? JOIN THE 500+ COMPANIES I HAVE CONSULTED ON SOCIAL MEDIA MARKETING AND INCREASED CONVERSIONS FOR VIA FACEBOOK AND INSTAGRAM ADS! Facebook Marketing is a REQUIRED skill for anyone with a business, product, service, brand, or public figure they need to PROMOTE! Join our 300,000+ modMBA students who have MASTERED Facebook advertising with this COMPLETE Facebook Marketing Mastery Course! ', 'Three reasons to TAKE THIS COURSE right now! \r\n\r\nYou get lifetime access to lectures!\r\n\r\nYou can ask me questions and see me respond to every single one of them thoughtfully!\r\n\r\nWhat you will learn in this course is original, tested, and very detailed! Learn the Social Media Marketing strategies I implement for my clients daily, including what social media pages are right for you and content management options that will streamline your posting process. This course will also layout how to optimize your Facebook page and Facebook ads therefore enabling you to reach any type of target market! Make the most of social media marketing and make it easy... so you can  get back to what you do best, running your business!\r\n\r\nIn this course, you will learn Facebook Marketing from beginner level to advanced! We delve deep into EVERY aspect of Facebook and the Facebook Ads Manager. Learn how to use and optimize every type of Facebook campaign, Facebook custom audience, Facebook pixel... the things you will learn about Facebook are truly amazing and will instantly help advance your presence online!\r\n\r\nYou will be able to optimize your Facebook ads for increased conversions and decreased costs. You will be able to create and make use of EVERY type of Facebook ad. You will be able to grow your Facebook page likes and post engagement. You will be able to find new customers that will drive your brand to new heights via online marketing. Join this course now to learn how to take your brand, product, service, or public figure to the next level with the power of Facebook Marketing!\r\n\r\nTAKE A STEP IN THE RIGHT DIRECTION WITH YOUR LIFE AND BUSINESS... LEARN HOW FACEBOOK MARKETING, FACEBOOK ADS, AND SOCIAL MEDIA MARKETING WILL MAKE YOUR BUSINESSES A HOUSEHOLD NAME!\r\n\r\nENROLL NOW!\r\n\r\nWho this course is for:\r\nSmall business owners\r\nBloggers, Influencers, Public Figures\r\nOnline marketers and marketing reps\r\nAdvertising managers\r\nCorporations\r\nANYONE looking to MASTER Facebook Marketing!\r\nANYONE looking to MASTER Facebook Ads!\r\nANYONE looking for the most highly targeted and cheapest advertising strategies via Facebook Ads!', '1. React Concepts.mp4', 'Marketing', 'Beginner', 'English', 'True', '13000', '2', '73515711', 'facebook_ads.jpg', 'Entrepreneur  Academy', 'pending', 'Yes', '60 hours', 'No', 'paid', '2020-11-23 16:21:22'),
(8, 'The Complete Business Plan Course (Includes 50 Templates)', 'Welcome to the Complete Business Plan Course, which will help you make an incredible business plan from scratch. Everything that you need to make your awesome business plan is included in this course, including 50 business plan templates and an incredibly detailed 13 step process to help you make an entire business plan from scratch!', 'I guarantee that this is THE most thorough business plan course available ANYWHERE on the market. This course and the many exercises in this course are for beginner or advanced users in any country and in any business sector!\r\n\r\nBy an Award Winning MBA professor who is a top selling online business teacher, top selling author, former Goldman Sachs employee, Columbia MBA and venture capitalist who has invested in and sat on the boards of many companies. He is also the author of the #1 best selling business course on Udemy. He has also written many business plans and read hundreds of business plans too and has raised/managed over $1bn in his career. \r\n\r\n\r\n\r\nTHIS COMPLETE BUSINESS PLAN COURSE teaches you everything you need to know in order to make an incredible business plan, including an easy and fun to use 13 STEP program:      \r\n\r\nSTEP 1 of 13: General Business Plan Inputs Questions and Analysis\r\n\r\nSTEP 2 of 13: Creating Your Cover Page: Input Questions, Analysis and Outputs\r\n\r\nSTEP 3 of 13: Executive Summary: Input Questions, Analysis and Outputs\r\n\r\nSTEP 4 of 13: Your Management Team: Input Questions, Analysis and Outputs\r\n\r\nSTEP 5 of 13: Your Product and/or Service: Input Questions, Analysis and Outputs\r\n\r\nSTEP 6 of 13: Your Customer & Market: Input Questions, Analysis and Outputs\r\n\r\nSTEP 7 of 13: Your Competition: Input Questions, Analysis and Outputs\r\n\r\nSTEP 8 of 13: Your Go-to Market Strategy: Input Questions, Analysis and Outputs\r\n\r\nSTEP 9 of 13: Your Sales+Marketing Strategy: Input Questions, Analysis & Outputs\r\n\r\nSTEP 10 of 13: Your Milestones: Input Questions, Analysis and Outputs\r\n\r\nSTEP 11 of 13: Your Other / Misc. / Risks: Input Questions, Analysis and Outputs\r\n\r\nSTEP 12 of 13: Your Financials: Input Questions, Analysis and Outputs\r\n\r\nSTEP 13 of 13: Your Appendix: Input Questions, Analysis and Outputs\r\n\r\nCreating Your Final Business Plan Output (with 50 Business Plan Templates included)\r\n\r\n[Optional] Creating Your Final Presentation Slides Output (with 25 Presentation Templates included)\r\n\r\n\r\n\r\nAlso included in this course is a very comprehensive Excel spreadsheet that will help you create your business plan using an easy to use and very comprehensive 13 step methodology. No prior business or finance or accounting or Excel experience is required to take this course. \r\n\r\nI have also provided 50 business plan templates and, as an added bonus, 25 business presentations specifically made for startups.\r\n\r\nYou can use the comprehensive Excel exercise document in this course on a Mac or on a PC (I recommend having Excel version 2013 or later in order to complete all of the exercises in this course).\r\n\r\nThis course and the included comprehensive Business Plan Dashboard Excel business plan maker file is a roadmap for your business plan success.\r\n\r\nAll the tools you need to create an amazing business plan from scratch are included in this course and the entire course is based on real life Practical Knowledge & Experience and not based on theory.\r\n\r\nPlease click the take this course button so you can take your business and your business plan to the next level. \r\n\r\n\r\n\r\n*** Again, I guarantee that this is THE most thorough business plan course available ANYWHERE on the market.***\r\n\r\nThanks,  \r\nChris Haroun\r\n\r\nWho this course is for:\r\nAnyone interested in starting any type of company in any country and in any industry (no prior business experience is required).\r\nAnyone that has already started a company, but wants to take their business to the next level.\r\nAnyone working at a company that wants to launch a new product and or a new service.', '1. React Concepts.mp4', 'Marketing', 'Beginner', 'English', 'True', '5000', '10', '73277678', 'business_plan.jpg', 'Jose Portilla', 'pending', 'Yes', '7 hours', 'No', 'paid', '2020-11-09 06:07:21'),
(9, 'NodeJS - The Complete Guide (MVC, REST APIs, GraphQL, Deno)', 'Join the most comprehensive Node.js course on Udemy and learn Node in both a practical as well as theory-based way!\r\n\r\n---\r\n\r\nThis course was updated to also include sections on Deno.js - in addition to more than 30 hours of content on Node.js!', 'Node.js is probably THE most popular and modern server-side programming language you can dive into these days!\r\n\r\nNode.js developers are in high demand and the language is used for everything from traditional web apps with server-side rendered views over REST APIs all the way up to GraphQL APIs and real-time web services. Not to mention its applications in build workflows for projects of all sizes.\r\n\r\nThis course will teach you all of that! From scratch with zero prior knowledge assumed. Though if you do bring some knowledge, you\'ll of course be able to quickly jump into the course modules that are most interesting to you.\r\n\r\nHere\'s what you\'ll learn in this course:\r\n\r\nNode.js Basics & Basic Core Modules\r\n\r\nParsing Requests & Sending Responses\r\n\r\nRendering HTML Dynamically (on the Server)\r\n\r\nUsing Express.js\r\n\r\nWorking with Files and generating PDFs on the Server (on-the-fly)\r\n\r\nFile Up- and Download\r\n\r\nUsing the Model-View-Controller (MVC) Pattern\r\n\r\nUsing Node.js with SQL (MySQL) and Sequelize\r\n\r\nUsing Node.js with NoSQL (MongoDB) and Mongoose\r\n\r\nWorking with Sessions & Cookies\r\n\r\nUser Authentication and Authorization\r\n\r\nSending E-Mails\r\n\r\nValidating User Input\r\n\r\nData Pagination\r\n\r\nHandling Payments with Stripe.js\r\n\r\nBuilding REST APIs\r\n\r\nAuthentication in REST APIs\r\n\r\nFile Upload in REST APIs\r\n\r\nBuilding GraphQL APIs\r\n\r\nAuthentication in GraphQL APIs\r\n\r\nFile Upload in GraphQL APIs\r\n\r\nBuilding a Realtime Node.js App with Websockets\r\n\r\nAutomated Testing (Unit Tests)\r\n\r\nDeploying a Node.js Application\r\n\r\nUsing TypeScript with Node.js\r\n\r\nExploring Deno.js\r\n\r\nAnd Way More!\r\n\r\nDoes this look like a lot of content? It certainly is!\r\n\r\nThis is not a short course but it is the \"Complete Guide\" on Node.js after all. We\'ll dive into a lot of topics and we\'ll not just scratch the surface.\r\n\r\nWe\'ll also not just walk through boring theory and some slides. Instead, we\'ll build two major projects: An online shop (including checkout + payments) and a blog.\r\n\r\nAll topics and features of the course will be shown and used in these projects and you\'ll therefore learn about them in a realistic environment.\r\n\r\n\r\n\r\nIs this course for you?\r\n\r\nIf you got no Node.js experience, you\'ll love this course because it starts with zero knowledge assumed. It\'s the perfect course to become a Node.js developer.\r\n\r\nIf you got basic Node.js experience, this course is also a perfect match because you can go through the basic modules quickly and you\'ll benefit from all the deep dives and advanced topics the course covers.\r\n\r\nAre you an advanced Node.js user? Check the curriculum then. Maybe you found no other course that shows how to use SQL with Node.js. Or you\'re interested in GraphQL. Chances are, that you\'ll get a lot of value out of this course, too!\r\n\r\n\r\n\r\nPrerequisites\r\n\r\nNO Node.js knowledge is required at all!\r\n\r\nNO other programming language knowledge (besides JavaScript, see next point) is required\r\n\r\nBasic JavaScript knowledge is assumed though - you should at least be willing to pick it up whilst going through the course. A JS refresher module exists to bring you up to the latest syntax quickly\r\n\r\nBasic HTML + CSS knowledge helps but is NOT required\r\n\r\nWho this course is for:\r\nBeginner or advanced web developers who want to dive into backend (server-side) development with NodeJS\r\nEveryone who\'s interested in building modern, scalable and high-performing web applications\r\nExperienced NodeJS developers who want to dive into specific features like using GraphQL with NodeJS', '1. React Concepts.mp4', 'Programming', 'Beginner', 'English', 'True', 'free', '', '47219119', 'nodetutorial.jpg', 'Jose Portilla', 'pending', 'No', '30 hours', 'No', 'free', '2020-11-23 16:56:22'),
(11, 'A High Level Overview of React', 'Welcome to the most comprehensive resource for Material-UI to date!', 'Welcome to the most comprehensive resource for Material-UI to date!\r\n\r\nAcross 35 hours and more than 200 lectures, I will teach you absolutely everything there is to know about building finely designed applications using hands-down the most useful tool I\'ve learned since React itself -- Material-UI!\r\n\r\n\r\n\r\nTake your web development skills to a whole new level and separate yourself from the average React developer by gaining the confidence to build professionally designed applications!\r\n\r\nAfter learning React, I think many developers run into a common problem -- what are the best practices for actually building your own project!? You may have an idea in your head for a really cool application or website but feel like you wouldn\'t know exactly how to go about creating it with React. Are you supposed to build every little component and piece of functionality from scratch? Definitely not! Learn to let Material-UI do the heavy lifting for you with its comprehensive customizable component library with integrated styling, theming, grid, and responsive design systems.\r\n\r\nMost of the courses you take while learning React are focused on teaching you the core concepts and fundamental syntax/structures necessary to understand and build React applications. This is usually done by building either a handful of small projects, each focused around a certain concept or by building a large project and incorporating each concept as you go. Learning like this is great, and absolutely essential to understanding the subject.\r\n\r\nHowever, I have noticed that due to the focus on the underlying concepts and functionality, most of the designs and layouts aren\'t particularly interesting! None of the designs are bad by any means -- and that isn\'t the focus of pure React courses so this isn\'t a problem -- but they aren\'t usually something you would give to a paying client, so that does leave a bit of a gap when you begin working on your own. That\'s precisely why I made this course!\r\n\r\n\r\n\r\nWe\'re going to build two complete projects from scratch based on just design files -- including my own actual production website!\r\n\r\nI\'m going to walk you through the learning process that I went through when I built my first production application -- all the way from starting the project with a blank screen to deploying a fully responsive website. What I really try to emphasize is the way to think about structuring layouts in Material-UI. We\'ll first go over screenshots of the design we\'re about to build and visually breakdown the grid setup necessary to achieve each look, along with the corresponding code snippets! Then we actually hop into the code editor to put it into action.\r\n\r\nWe\'ll also be going over the documentation for each Material-UI component before we use it in our project so you\'ll be familiar with all the different capabilities, not just the features we use! Each component is extremely flexible and one of my goals for this course was giving you enough familiarity with the entire current ecosystem to be ready to understand any future updates.\r\n\r\nA key part of building production applications is making sure that your styles and functionality don\'t just work on your system, but are flexible and responsive to any environment. That\'s why I drill responsive design practices so you\'ll understand not only the concepts to keep in mind but how to actually implement them with Material-UI and get perfect styles on the biggest, smallest, and every screen in between. This will hopefully become second nature and we\'ll all enjoy more optimized user-experiences across the web.\r\n\r\n\r\n\r\nWe will also be covering extra topics like SEO in React, switching our project over to Next.js and the benefits from doing so, hooking up Google Analytics to start making data-driven decisions, integrating animations from After Effects, and so much more!\r\n\r\n\r\n\r\nThe Course Content Includes:\r\n\r\nSetting up a new project with create-react-app, React Router, and Material-UI\r\n\r\nGuided explanations of the documentation for almost every Material-UI component followed by implementing them in our project\r\n\r\nDifferent image optimization strategies\r\n\r\nCreating a theme for your application by mastering Material-UI\'s centralized styling system\r\n\r\nLearning how to use responsive design to ensure your applications look perfect on any screen size and orientation!\r\n\r\nUsing the Material-UI grid system to align complex layouts perfectly\r\n\r\nExporting animations from Adobe After Effects and efficiently importing them into a React application with react-lottie\r\n\r\nLeveraging serverless functionality with Google Firebase Cloud Functions\r\n\r\nSending emails through Node.js\r\n\r\nMaking network requests in React while displaying feedback like loading spinners with Material-UI\r\n\r\nSearch Engine Optimization (SEO) in React applications\r\n\r\nMigrating a project from create-react-app to Next.js and why\r\n\r\nCross-browser testing and support\r\n\r\nDeploying a Next.js project and adding a custom domain name -- for two different hosting platforms\r\n\r\nIncorporate Google Analytics to collect data about who is interacting with your application and what they\'re doing\r\n\r\nBuild custom organizational functionality to control data displayed in tables including search, filtering, delete, and undo\r\n\r\n\r\n\r\nAlong with lifetime access to over 35 HOURS of content, you\'ll also find easy access to support through active Q/A.\r\n\r\nYou\'ve got nothing to lose -- this course comes with a 30-day money-back guarantee in case you aren\'t completely satisfied!\r\n\r\nTackle the challenge, blur the line between design and development, and learn to create the projects you\'ve envisioned.\r\n\r\nWho this course is for:\r\nReact developers looking to bridge the gap between design and development.\r\nReact developers who feel like they know React but still have more to learn before building a polished website.\r\nReact developers who have great designs but have struggled on perfectly implementing them in practice.\r\nReact developers who want to be able to build any website design that\'s handed to them.\r\nReact developers who want to master responsive design\r\nReact developers looking for a better understanding of UX/UI design principles\r\nReact developers looking for an easier, faster way to get up and running with clean, consistently designed applications', '1. React Concepts.mp4', 'Programming', 'Beginner', 'English', 'True', 'free', '', '73111112', 'intro-to-react js.jpg', 'Jose Portilla', 'pending', 'Yes', '7 hours', 'Yes', 'free', '2020-12-02 21:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `course_outcome`
--

CREATE TABLE `course_outcome` (
  `id` int(11) NOT NULL,
  `outcomes` varchar(255) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_outcome`
--

INSERT INTO `course_outcome` (`id`, `outcomes`, `course_code`, `date`) VALUES
(1, ' A Complete Understanding of Digital Marketing Foundations', '57980683', '2020-11-05 23:32:30'),
(2, ' Grow a Business Online From Scratch', '57980683', '2020-11-05 23:32:48'),
(3, ' Be Ahead Of the Curve With Your Business We Show You How To Take It To the Next Level With 2021 Techniques', '57980683', '2020-11-05 23:33:00'),
(4, ' You Will Learn How to Recreate What is Already Working and Apply It To Your Niche', '57980683', '2020-11-05 23:33:25'),
(5, ' Learn How To Find And Understand Your Audience', '57980683', '2020-11-05 23:33:39'),
(6, ' Digital Marketing Tools and Strategies', '57980683', '2020-11-05 23:33:54'),
(7, ' Create An Online Presence around Your Customer and Their Needs', '57980683', '2020-11-05 23:34:10'),
(8, ' You will learn how to create The Right Kind of Website for Your Business With Walk Through Creation Tutorials', '57980683', '2020-11-05 23:34:24'),
(9, ' Techniques To Generate More Leads For Your Brand or Business', '57980683', '2020-11-05 23:34:36'),
(10, ' Learn The Skills To Market Yourself As A Professionals Who Seek To Exceed In The Digital Space.', '57980683', '2020-11-05 23:34:49'),
(11, ' Make REAL web applications using cutting-edge technologies', '62342972', '2020-11-06 18:20:29'),
(12, ' Create a blog application from scratch using Express, MongoDB, and Semantic UI', '62342972', '2020-11-06 18:20:40'),
(13, ' Write your own browser-based game', '62342972', '2020-11-06 18:20:51'),
(14, ' Think like a developer. Become an expert at Googling code questions!', '62342972', '2020-11-06 18:21:09'),
(15, ' Write web apps with full authentication', '62342972', '2020-11-06 18:21:21'),
(16, ' Implement responsive navbars on websites', '62342972', '2020-11-06 18:21:34'),
(17, ' Write Javascript functions, and understand scope and higher order functions', '62342972', '2020-11-06 18:21:49'),
(18, ' Manipulate the DOM with vanilla JS', '62342972', '2020-11-06 18:22:01'),
(19, ' Translate between jQuery and vanillas JS', '62342972', '2020-11-06 18:22:20'),
(20, ' Use NodeJS to write server-side JavaScript', '62342972', '2020-11-06 18:22:32'),
(21, ' Write a REAL application using everything in the course', '62342972', '2020-11-06 18:22:44'),
(22, ' Use common JS data structures like Arrays and Objects', '62342972', '2020-11-06 18:22:53'),
(23, ' Use NPM to install all sorts of useful packages', '62342972', '2020-11-06 18:23:08'),
(24, ' Create your own Node modules', '62342972', '2020-11-06 18:23:18'),
(25, ' Create a beautiful, responsive landing page for a startup', '62342972', '2020-11-06 18:23:27'),
(26, ' Create a beautiful animated todo list application', '62342972', '2020-11-06 18:23:36'),
(27, ' Continue to learn and grow as a developer, long after the course ends', '62342972', '2020-11-06 18:23:49'),
(28, ' Create a complicated yelp-like application from scratch', '62342972', '2020-11-06 18:23:57'),
(29, ' Create static HTML and CSS portfolio sites and landing pages', '62342972', '2020-11-06 18:24:07'),
(30, ' Create complex HTML forms with validations', '62342972', '2020-11-06 18:24:18'),
(31, ' Use Bootstrap to create good-looking responsive layouts', '62342972', '2020-11-06 18:24:27'),
(32, ' Use JavaScript variables, conditionals, loops, functions, arrays, and objects', '62342972', '2020-11-06 18:24:36'),
(33, ' Create full-stack web applications from scratch', '62342972', '2020-11-06 18:24:45'),
(34, ' Manipulate the DOM using jQuery', '62342972', '2020-11-06 18:24:54'),
(35, ' Write JavaScript based browser games', '62342972', '2020-11-06 18:25:04'),
(36, ' Write complex web apps with multiple models and data associations', '62342972', '2020-11-06 18:25:13'),
(37, ' Use Express and MongoDB to create full-stack JS applications', '62342972', '2020-11-06 18:25:24'),
(38, ' Master Machine Learning on Python & R', '46267175', '2020-11-06 19:15:51'),
(39, ' Make accurate predictions', '46267175', '2020-11-06 19:16:03'),
(40, ' Make robust Machine Learning models', '46267175', '2020-11-06 19:16:13'),
(41, ' Use Machine Learning for personal purpose', '46267175', '2020-11-06 19:16:23'),
(42, ' Handle advanced techniques like Dimensionality Reduction', '46267175', '2020-11-06 19:17:16'),
(43, ' Build an army of powerful Machine Learning models and know how to combine them to solve any problem', '46267175', '2020-11-06 19:17:27'),
(44, ' Have a great intuition of many Machine Learning models', '46267175', '2020-11-06 19:17:37'),
(45, ' Make powerful analysis', '46267175', '2020-11-06 19:17:46'),
(46, ' Create strong added value to your business', '46267175', '2020-11-06 19:17:56'),
(47, ' Handle specific topics like Reinforcement Learning, NLP and Deep Learning', '46267175', '2020-11-06 19:18:04'),
(48, ' Know which Machine Learning model to choose for each type of problem', '46267175', '2020-11-06 19:18:13'),
(49, ' Develop modern, complex, responsive and scalable web applications with Angular 10', '65688029', '2020-11-06 19:24:38'),
(50, ' Use the gained, deep understanding of the Angular fundamentals to quickly establish yourself as a frontend developer', '65688029', '2020-11-06 19:24:48'),
(51, ' Fully understand the architecture behind an Angular application and how to use it', '65688029', '2020-11-06 19:24:58'),
(52, ' Create single-page applications with one of the most modern JavaScript frameworks out there', '65688029', '2020-11-06 19:25:06'),
(53, ' How to Draw Characters Well', '57350192', '2020-11-06 19:32:56'),
(54, ' How to Draw in 3D', '57350192', '2020-11-06 19:33:05'),
(55, ' How to Draw like a Professional Artist', '57350192', '2020-11-06 19:33:15'),
(56, ' Draw with Pencils and Paper or Digital Art Tools', '57350192', '2020-11-06 19:33:26'),
(57, ' How to Draw Out of Your Head Fast', '57350192', '2020-11-06 19:33:35'),
(58, ' How to Draw Faces, Bodies and Hands', '57350192', '2020-11-06 19:33:45'),
(59, ' How to Draw Characters for Games, Films, Animation, Manga, Comics and More', '57350192', '2020-11-06 19:33:54'),
(60, ' Utilize the included 7GB of Free Art Resources', '57350192', '2020-11-06 19:34:05'),
(61, ' Have a powerful Instagram account setup for your Business or personal that you can build your brand and convert your followers into paying customers.', '52526311', '2020-11-06 19:41:06'),
(62, ' Convert your new Instagram followers to long-term loyal paying customers who love your business!', '52526311', '2020-11-06 19:41:19'),
(63, ' We are up to date with all the new Instagram features and will guide you step by step on how to utilise these functions to grow your account and market your business.', '52526311', '2020-11-06 19:41:28'),
(64, ' Attract 10,000 real targeted followers to your Instagram account!', '52526311', '2020-11-06 19:41:39'),
(65, ' What sets this apart from other Instagram management & marketing courses is that by the end of this course - you will know all the strategies for you to grow your followers', '52526311', '2020-11-06 19:42:05'),
(66, ' Connect with new audiences and lower your ad costs via Facebook Ads!', '73515711', '2020-11-06 19:46:38'),
(67, ' MASTER Facebook Ads Manager!', '73515711', '2020-11-06 19:46:47'),
(68, ' MASTER your sales funnel... awareness, retargeting, and conversion!', '73515711', '2020-11-06 19:46:56'),
(69, ' Use the advanced features available in Facebook Business Manager.', '73515711', '2020-11-06 19:47:05'),
(70, ' Mass post quickly to various social media networks!', '73515711', '2020-11-06 19:47:13'),
(71, ' Implement the Facebook Pixel and advanced tracking strategies.', '73515711', '2020-11-06 19:47:22'),
(72, ' Average $0.01 per engagement/like/click with my Facebook ad strategies!', '73515711', '2020-11-06 19:47:30'),
(73, ' MASTER Facebook Marketing all in one course!', '73515711', '2020-11-06 19:47:40'),
(74, ' Create an incredible business plan from scratch.', '73277678', '2020-11-09 06:02:23'),
(75, ' Create a perfect Executive Summary write-up part of the Business Plan.', '73277678', '2020-11-09 06:02:42'),
(76, ' Create a perfect Product and or Service description write-up part of the Business Plan.', '73277678', '2020-11-09 06:03:07'),
(77, ' Create a perfect Customer and Market write-up part of the Business Plan.', '73277678', '2020-11-09 06:03:16'),
(78, ' Create a perfect Competition write-up part of the Business Plan.', '73277678', '2020-11-09 06:03:30'),
(79, ' Create a perfect Sales and Marketing write-up part of the Business Plan.', '73277678', '2020-11-09 06:03:39'),
(80, ' (Bonus Content): Create a perfect Start-up Presentation, using 25 supplied presentation templates.', '73277678', '2020-11-09 06:03:48'),
(81, ' Understand how to take any type of business to the next level (meaning a start-up or an established business).', '73277678', '2020-11-09 06:03:59'),
(82, ' Create a perfect Financials write-up part of the Business Plan, including an easy way to create and understand and forecast all financial statements and a ratio analysis too.', '73277678', '2020-11-09 06:04:10'),
(83, ' Create a perfect Management Team write-up part of the Business Plan.', '73277678', '2020-11-09 06:04:19'),
(84, ' Create a perfect Cover Page part of the Business Plan.', '73277678', '2020-11-09 06:04:29'),
(85, ' Create a perfect Go-to Market Strategy write-up part of the Business Plan.', '73277678', '2020-11-09 06:04:38'),
(86, ' Create a perfect Milestone write-up part of the Business Plan.', '73277678', '2020-11-09 06:04:49'),
(87, ' Work with one of the most in-demand web development programming languages', '47219119', '2020-11-23 16:51:19'),
(88, ' Build modern, fast and scalable server-side web applications with NodeJS, databases like SQL or MongoDB and more', '47219119', '2020-11-23 16:51:29'),
(89, ' Get a thorough introduction to DenoJS', '47219119', '2020-11-23 16:51:39'),
(90, ' Learn the basics as well as advanced concepts of NodeJS in great detail', '47219119', '2020-11-23 16:51:49'),
(91, ' Understand the NodeJS ecosystem and build server-side rendered apps, REST APIs and GraphQL APIs', '47219119', '2020-11-23 16:51:59'),
(95, ' will be comfortable with html,css,jquery', '46092655', '2020-12-02 14:48:00'),
(96, ' Build beautiful web apps to add to your portfolio', '46092655', '2020-12-02 14:48:06'),
(101, ' testing updates', '46448673', '2020-12-02 17:51:51'),
(102, ' will be comfortable with html,css,jquery', '75192567', '2020-12-02 18:29:54'),
(103, ' Build powerful, fast, user-friendly and reactive web apps', '76598719', '2020-12-02 18:34:57'),
(104, ' Apply for high-paid jobs or work as a freelancer in one the most-demanded sectors you can find in web dev right now', '76598719', '2020-12-02 18:35:09'),
(105, ' Provide amazing user experiences by leveraging the power of JavaScript with ease', '76598719', '2020-12-02 18:35:19'),
(106, ' will be comfortable with html,css,jquery', '73026020', '2020-12-02 18:38:59'),
(107, ' Apply for high-paid jobs or work as a freelancer in one the most-demanded sectors you can find in web dev right now', '73026020', '2020-12-02 18:39:04'),
(108, ' will be comfortable with html,css,jquery', '75407293', '2020-12-02 19:57:56'),
(109, ' will be comfortable with html,css,jquery', '71486236', '2020-12-02 20:11:54'),
(110, ' will be comfortable with js and react js', '71486236', '2020-12-02 20:12:01'),
(112, ' Build beautiful web apps to add to your portfolio', '73111112', '2020-12-02 21:11:47'),
(113, ' will be comfortable with html,css,jquery', '73111112', '2020-12-02 21:11:54'),
(114, ' Build powerful, fast, user-friendly and reactive web apps', '73111112', '2020-12-02 21:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `course_requirement`
--

CREATE TABLE `course_requirement` (
  `id` int(11) NOT NULL,
  `requirements` varchar(225) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_requirement`
--

INSERT INTO `course_requirement` (`id`, `requirements`, `course_code`, `date`) VALUES
(1, ' No digital marketing experience required!', '57980683', '2020-11-05 23:35:09'),
(2, ' Have a computer with Internet', '62342972', '2020-11-06 18:25:51'),
(3, ' Be ready to learn an insane amount of awesome stuff', '62342972', '2020-11-06 18:26:05'),
(4, ' Prepare to build real web apps!', '62342972', '2020-11-06 18:26:18'),
(5, ' Brace yourself for stupid jokes about my dog Rusty', '62342972', '2020-11-06 18:26:30'),
(6, ' Just some high school mathematics level.', '46267175', '2020-11-06 19:18:31'),
(7, ' NO Angular 1 or Angular 2 knowledge is required!', '65688029', '2020-11-06 19:25:27'),
(8, ' Basic HTML and CSS knowledge helps, but isn\'t a must-have', '65688029', '2020-11-06 19:25:39'),
(9, ' Prior TypeScript knowledge also helps but isn\'t necessary to benefit from this course', '65688029', '2020-11-06 19:25:51'),
(10, ' Basic JavaScript knowledge is required', '65688029', '2020-11-06 19:26:01'),
(11, ' Paper and Pencils or Digital Tools', '57350192', '2020-11-06 19:34:21'),
(12, ' Motivation to Learn!', '57350192', '2020-11-06 19:34:46'),
(13, ' A Desire to Draw Professionally', '57350192', '2020-11-06 19:34:58'),
(14, ' You should download Instagram onto a mobile device.', '52526311', '2020-11-06 19:42:23'),
(15, ' Have a personal profile/account on Facebook.', '73515711', '2020-11-06 19:47:55'),
(16, ' Microsoft Excel and Microsoft Word are required to be installed on your Windows based or Mac computers in order to take this course (you don\'t have to have any Excel or Word experience though to take this course). Thanks', '73277678', '2020-11-09 06:05:07'),
(17, ' General knowledge of how the web works is recommended but not a must-have', '47219119', '2020-11-23 16:52:23'),
(18, ' Basic JavaScript knowledge is strongly recommended but could be picked up whilst going through the course', '47219119', '2020-11-23 16:52:37'),
(19, ' NO NodeJS knowledge is required!', '47219119', '2020-11-23 16:52:49'),
(21, ' you have a working system..', '46092655', '2020-12-02 14:48:13'),
(22, ' must have node js install.', '46092655', '2020-12-02 14:48:22'),
(25, ' must have a basic knowledge of html,css,jquery', '46448673', '2020-12-02 17:51:56'),
(26, ' you must have a dedicated server ', '75192567', '2020-12-02 18:30:00'),
(27, ' JavaScript + HTML + CSS fundamentals are absolutely required', '76598719', '2020-12-02 18:35:37'),
(28, ' You DON\'T need to be a JavaScript expert to succeed in this course!', '76598719', '2020-12-02 18:35:56'),
(29, ' must have node js install.', '73026020', '2020-12-02 18:39:09'),
(30, ' must have a basic knowledge of html,css,jquery', '73026020', '2020-12-02 18:39:18'),
(31, ' must have node js install.', '75407293', '2020-12-02 19:58:05'),
(32, ' you have a working system..', '71486236', '2020-12-02 20:12:07'),
(33, ' JavaScript + HTML + CSS fundamentals are absolutely required', '71486236', '2020-12-02 20:12:16'),
(34, ' you must have a dedicated server ', '73111112', '2020-12-02 21:12:14'),
(35, ' You DON\'T need to be a JavaScript expert to succeed in this course!', '73111112', '2020-12-02 21:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `postal_code` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `course_code`, `address`, `city`, `country`, `postal_code`, `date`) VALUES
(1, 'Ogundeyi', 'Taoheed', 'ogundeyi@gmail.com', '08133090847', '46267175', '8,ebun oluwa street', 'ikeja', 'Lagos', '100001', '2020-11-23 15:54:21'),
(2, 'Ogundeyi', 'Taoheed', 'ogundeyi@gmail.com', '08133090847', '47219119', '8,ebun oluwa street', 'ikeja', 'Nigeria', '100001', '2020-11-23 16:57:04'),
(3, 'Adurotimi', 'Joshua', 'adurotimi@gmail.com', '08133090847', '46267175', 'Ikeja, Lagos, Nigeria', 'Lagos', 'Nigeria', '100001', '2020-11-29 06:57:26'),
(4, 'Ogundeyi', 'Taoheed', 'ogundeyi@gmail.com', '08133090847', '73111112', '8,ebun oluwa street', 'ikeja', 'Nigeria', '100001', '2020-12-02 21:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `instructor_firstname` varchar(225) NOT NULL,
  `instructor_lastname` varchar(225) NOT NULL,
  `instructor_image` varchar(225) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `linkedin` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `bios` mediumtext NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `instructor_firstname`, `instructor_lastname`, `instructor_image`, `facebook`, `twitter`, `linkedin`, `email`, `password`, `bios`, `full_name`, `date`) VALUES
(2, 'Nu\'man', 'Amri Maliky', 'amir.jpg', 'example@facebook.com', 'example@twitter.com', 'example@linkedin.com', 'ogundeyitaoheed@gmail.com', '1234567', '<p>My name is Kirill Eremenko and I am super-psyched that you are reading this!<p>\r\n\r\n<p>Professionally, I am a Data Science management consultant with over five years of experience in finance, retail, transport and other industries.</p> <p>I was trained by the best analytics mentors at Deloitte Australia and today I leverage Big Data to drive business strategy, revamp customer experience and revolutionize existing operational processes.</p>\r\n\r\n<p>From my courses you will straight away notice how I combine my real-life experience and academic background in Physics and Mathematics to deliver professional step-by-step coaching in the space of Data Science.<p> I am also passionate about public speaking, and regularly present on Big Data at leading Australian universities and industry events.</p>\r\n\r\n<p>To sum up, I am absolutely and utterly passionate about Data Science and I am looking forward to sharing my passion and knowledge with you!</p.\r\n\r\n', 'Amri Maliky', '2020-11-06 18:59:37'),
(3, 'Jose', 'Portilla', 'jose.jpg', 'example@facebook.com', 'example@twitter.com', 'example@linkedin.com', 'jose@gmail.com', '1234567', '<p> Jose Marcial Portilla has a BS and MS in Mechanical Engineering from Santa Clara University and years of experience as a professional instructor and trainer for Data Science and programming. He has publications and patents in various fields such as microfluidics, materials science, and data science technologies.</p><p> Over the course of his career he has developed a skill set in analyzing data and he hopes to use his experience in teaching and data science to help other people learn the power of programming the ability to analyze data, as well as present the data in clear and beautiful visualizations.</p><p> Currently he works as the Head of Data Science for Pierian Data Inc. <p>and provides in-person data science and python programming training courses to employees working at top companies, including General Electric, Cigna, The New York Times, Credit Suisse, McKinsey and many more.</p><p> Feel free to contact him on LinkedIn for more information on in-person training sessions or group training sessions in Las Vegas, NV.</p>', 'Jose Portilla', '2020-11-05 21:23:03'),
(4, 'Entrepreneur ', 'Academy', 'ea.jpg', 'example@facebook.com', 'example@twitter.com', 'example@linkedin.com', 'ea@gmail.com', '1234567', '<p>Entrepreneur Academy is an international Social Media Management Company with a passion for helping people and businesses, both large and small, to shape, manage and optimize their online presence.</p>\r\n\r\n<p>Through careful management and personal guidance, we have helped launch, grow and direct over 45 companies’ powerful social media. Our past clients range from Authors, Fashion Companies, City Pages, Creative Speakers, Life Coaches and Fitness Experts!</p>\r\n\r\n<p>We are so excited to be on the Udemy platform, ready to reach a larger audience and empower people to manage their own on-line presence and take the scary out of social media for everyone.</p>', 'Entrepreneur  Academy', '2020-11-05 21:26:55'),
(5, 'Benjamin', 'Wilson', 'benjamine.jpg', 'example@facebook.com', 'example@twitter.com', 'example@linkedin.com', 'benjamine@gmail.com', '1234567', '<p> My Name is Benji. </p>\r\n\r\n<p>I am a passionate entrepreneur from Melbourne Australia! </p>\r\n\r\n<p>I love creating innovative marketing strategies across all platforms from Instagram, to YouTube, to Amazon . I love pinpointing the difference between what makes people successful and what makes people fail then put all my hard earned knowledge into a course to share with you. </p>\r\n\r\n        <p>  My favourite thing to hear from past students is \"you saved me months of time and thousands of dollars!\" I hope that you give me the chance to help you too by signing up to one of my Udemy courses. I am currently working really hard to grow my catalogue and provide as much value as possible ;) </p>\r\n\r\n         <p> I love meeting new people so be sure to reach out to me if you want to connect. </p>', 'Benjamin Wilson', '2020-11-05 21:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_step`
--

CREATE TABLE `lesson_step` (
  `id` int(11) NOT NULL,
  `lesson_steps` varchar(225) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `step_code` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson_step`
--

INSERT INTO `lesson_step` (`id`, `lesson_steps`, `course_code`, `step_code`, `date`) VALUES
(1, ' introduction to digital marketing', '57980683', '75100806', '2020-11-06 11:03:47'),
(2, ' lesson1', '46267175', '76335742', '2020-11-25 12:09:02'),
(3, ' Complete React Tutorial (& Redux) #2 - How React Works', '73026020', '59351854', '2020-12-02 18:51:25'),
(4, ' second step', '73026020', '70575224', '2020-12-02 19:02:29'),
(5, ' setting up react js', '71486236', '53491866', '2020-12-02 20:56:32'),
(6, ' digging deep into react js ', '71486236', '67584025', '2020-12-02 20:59:09'),
(7, ' introduction to react js ', '73111112', '74017945', '2020-12-02 21:16:21'),
(8, ' catching a big fish', '73111112', '74262162', '2020-12-02 21:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_vidoes`
--

CREATE TABLE `lesson_vidoes` (
  `id` int(11) NOT NULL,
  `video_title` varchar(225) NOT NULL,
  `step_code` varchar(225) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `videos` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson_vidoes`
--

INSERT INTO `lesson_vidoes` (`id`, `video_title`, `step_code`, `course_code`, `videos`, `date`) VALUES
(1, 'lesson 1', '75100806', '57980683', '1. React Concepts.mp4', '2020-11-06 11:06:18'),
(2, 'lesson 1', '76335742', '46267175', '1. React Concepts.mp4', '2020-11-25 12:09:39'),
(3, '- Introduction to ReactJS', '70575224', '73026020', 'pKYiKbf7sP0', '2020-12-02 19:03:33'),
(4, 'uploading react js on windows', '53491866', '71486236', '1. React Concepts (1).mp4', '2020-12-02 20:57:15'),
(5, 'uploading react js on mac', '53491866', '71486236', '1. React Concepts.mp4', '2020-12-02 20:57:49'),
(6, 'starting with states and props', '53491866', '71486236', '1. React Concepts (1).mp4', '2020-12-02 20:58:29'),
(7, 'how to set up functional components ', '67584025', '71486236', '1. React Concepts (1).mp4', '2020-12-02 20:59:39'),
(8, 'setting up react js on windows', '74017945', '73111112', '1. React Concepts.mp4', '2020-12-02 21:17:00'),
(9, 'setting up react js on mac', '74017945', '73111112', '1. React Concepts (1).mp4', '2020-12-02 21:18:15'),
(10, 'setting up react js on linux', '74017945', '73111112', '1. React Concepts (1).mp4', '2020-12-02 21:20:28'),
(11, 'understanding react js ', '74262162', '73111112', '1. React Concepts.mp4', '2020-12-02 21:21:23'),
(12, 'understanding states and props on react js ', '74262162', '73111112', '1. React Concepts (1).mp4', '2020-12-02 21:22:44'),
(13, 'understanding the functional component', '74262162', '73111112', '1. React Concepts.mp4', '2020-12-02 21:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `review` varchar(225) NOT NULL,
  `rating` varchar(225) NOT NULL,
  `course_code` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `review`, `rating`, `course_code`, `date`) VALUES
(7, 'ogundeyi', 'ogundeyitaoheed@gmail.com', 'am trying to give it a more rating', '4', '73277678', '2020-11-27 15:00:33'),
(9, 'Ogundeyi', 'ogundeyi@gmail.com', 'too bad', '1', '47219119', '2020-11-28 12:35:44'),
(10, 'Ogundeyi', 'ogundeyi@gmail.com', 'wow i really love this course it really worth it.... thanks so much i really learn from scratch to python ninja you are a life saver.', '4', '46267175', '2020-11-28 17:40:27'),
(11, 'Adurotimi', 'adurotimi@gmail.com', 'i purchase this course and its very cool i really love it nice work by the instructors....', '5', '46267175', '2020-11-29 06:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `user_image` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `password`, `phone_number`, `user_image`, `date`) VALUES
(1, 'Ogundeyi', 'Taoheed', 'ogundeyi@gmail.com', '1234567', '08133090847', 'tao_image.jpg', '2020-12-02 06:43:58'),
(2, 'Adurotimi', 'Joshua', 'adurotimi@gmail.com', '1234567', '08133090847', '', '2020-11-29 08:58:53'),
(3, 'Adeniran', 'Adeboye', 'adeniran@gmail.com', '1234567', '08133090847', 'adeniran.jpg', '2020-11-29 08:44:36'),
(4, 'Ogunbameru', 'Philip', 'ogunbameru@gmail.com', '1234567', '08133090847', 'ogunbameru.jpg', '2020-11-29 08:44:42'),
(5, 'Uduak', 'Enye', 'uduak@gmail.com', '1234567', '08133090847', 'uduak.jpg', '2020-11-29 08:44:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_outcome`
--
ALTER TABLE `course_outcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_requirement`
--
ALTER TABLE `course_requirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_step`
--
ALTER TABLE `lesson_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_vidoes`
--
ALTER TABLE `lesson_vidoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_outcome`
--
ALTER TABLE `course_outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `course_requirement`
--
ALTER TABLE `course_requirement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lesson_step`
--
ALTER TABLE `lesson_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lesson_vidoes`
--
ALTER TABLE `lesson_vidoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
