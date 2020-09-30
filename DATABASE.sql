-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 07:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `post_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment_date`, `message`, `post_id`) VALUES
(7, 9, '2020-09-30 22:51:58', 'Nice post', 23);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `image` varchar(256) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `topics` varchar(256) NOT NULL,
  `trending` tinyint(11) NOT NULL,
  `sum_rating` bigint(11) NOT NULL,
  `rated_users` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `image`, `body`, `published`, `created_at`, `topics`, `trending`, `sum_rating`, `rated_users`) VALUES
(23, 9, 'Have a Coffee ', 'image6666coffee.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel tellus vehicula lacus suscipit eleifend ut a augue. Aliquam erat volutpat. Aenean arcu neque, ultricies quis maximus quis, mattis non diam. Vivamus a eros nec quam dignissim molestie non vel lectus. In tempor eu justo non congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin auctor porttitor tristique. Suspendisse ullamcorper justo justo, a tincidunt massa tempor eu. Morbi ornare sem ipsum. Aenean sed ex at diam malesuada faucibus. Donec nec nisl et diam gravida ullamcorper. Maecenas imperdiet massa vel elit tristique semper. Sed ante tellus, finibus in volutpat non, gravida sit amet tellus.</p><p>Morbi convallis sagittis odio, sed consequat ipsum elementum sit amet. Maecenas rhoncus interdum purus, eleifend rhoncus arcu lobortis ac. Aenean tristique libero id cursus congue. Nunc vestibulum ligula sed orci volutpat, vitae maximus nulla rutrum. Donec congue diam vel feugiat venenatis. Proin at diam posuere mi tincidunt dignissim tristique at nisi. Fusce quis sem rhoncus, viverra urna a, consequat sapien. Pellentesque mollis, ex sed aliquam imperdiet, odio quam euismod velit, non interdum sapien eros eu magna. Vestibulum tellus tellus, consequat in turpis a, mattis commodo leo. Quisque tempor lorem maximus pretium vehicula. Etiam convallis non felis et faucibus. Ut at rhoncus massa, a aliquet velit. In vitae varius ex.</p><p>Ut eget sollicitudin turpis, non vehicula risus. Donec egestas purus sit amet convallis convallis. Quisque feugiat, ipsum quis lacinia eleifend, justo ante euismod leo, nec dictum dolor urna vitae ex. Praesent semper eleifend mi, nec feugiat nisi commodo a. Vivamus egestas sed eros a porta. Quisque vehicula ac risus sed imperdiet. Pellentesque a ligula sit amet justo interdum sollicitudin vel at justo. Ut rhoncus nunc sed dui convallis, sit amet ullamcorper arcu lobortis. Nunc tempor congue dolor, id blandit elit mollis id. Etiam finibus hendrerit laoreet. Duis feugiat diam eget urna pulvinar tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean lobortis urna porttitor libero malesuada lacinia.</p><p>Nullam tincidunt ornare sodales. Aenean luctus, diam nec vestibulum euismod, tortor nisl pretium sem, fringilla accumsan felis lacus imperdiet libero. Vivamus at vehicula tellus. Praesent at arcu non nisl luctus blandit vel et turpis. Fusce dignissim nisi in velit porta tristique. Fusce interdum est arcu, nec tincidunt erat scelerisque id. Suspendisse at lacus volutpat, porttitor est vitae, dignissim neque. Suspendisse potenti.</p><p>Pellentesque feugiat feugiat mi. Nunc tincidunt, leo vitae accumsan venenatis, libero diam euismod velit, vulputate consequat orci neque sed massa. In sodales est nec est accumsan, sed malesuada massa tincidunt. Mauris porttitor tortor at nisl placerat rhoncus. Cras ac molestie libero. Pellentesque id hendrerit erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu nisl vel erat condimentum condimentum sit amet aliquam purus. Vestibulum lobortis feugiat accumsan. Nulla congue tempor erat. Etiam semper ut eros porta viverra. Aenean ullamcorper ipsum at pellentesque tincidunt. Nulla felis ligula, hendrerit a felis at, efficitur venenatis est. Nunc est lacus, auctor tristique magna vitae, consectetur elementum urna.</p>', 1, '2020-06-28 08:04:50', 'Life style', 1, 8, 2),
(24, 16, 'Get started with Machine learning', 'imageintroduction-to-machine-learning_social.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel tellus vehicula lacus suscipit eleifend ut a augue. Aliquam erat volutpat. Aenean arcu neque, ultricies quis maximus quis, mattis non diam. Vivamus a eros nec quam dignissim molestie non vel lectus. In tempor eu justo non congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin auctor porttitor tristique. Suspendisse ullamcorper justo justo, a tincidunt massa tempor eu. Morbi ornare sem ipsum. Aenean sed ex at diam malesuada faucibus. Donec nec nisl et diam gravida ullamcorper. Maecenas imperdiet massa vel elit tristique semper. Sed ante tellus, finibus in volutpat non, gravida sit amet tellus.</p><p>Morbi convallis sagittis odio, sed consequat ipsum elementum sit amet. Maecenas rhoncus interdum purus, eleifend rhoncus arcu lobortis ac. Aenean tristique libero id cursus congue. Nunc vestibulum ligula sed orci volutpat, vitae maximus nulla rutrum. Donec congue diam vel feugiat venenatis. Proin at diam posuere mi tincidunt dignissim tristique at nisi. Fusce quis sem rhoncus, viverra urna a, consequat sapien. Pellentesque mollis, ex sed aliquam imperdiet, odio quam euismod velit, non interdum sapien eros eu magna. Vestibulum tellus tellus, consequat in turpis a, mattis commodo leo. Quisque tempor lorem maximus pretium vehicula. Etiam convallis non felis et faucibus. Ut at rhoncus massa, a aliquet velit. In vitae varius ex.</p><p>Ut eget sollicitudin turpis, non vehicula risus. Donec egestas purus sit amet convallis convallis. Quisque feugiat, ipsum quis lacinia eleifend, justo ante euismod leo, nec dictum dolor urna vitae ex. Praesent semper eleifend mi, nec feugiat nisi commodo a. Vivamus egestas sed eros a porta. Quisque vehicula ac risus sed imperdiet. Pellentesque a ligula sit amet justo interdum sollicitudin vel at justo. Ut rhoncus nunc sed dui convallis, sit amet ullamcorper arcu lobortis. Nunc tempor congue dolor, id blandit elit mollis id. Etiam finibus hendrerit laoreet. Duis feugiat diam eget urna pulvinar tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean lobortis urna porttitor libero malesuada lacinia.</p><p>Nullam tincidunt ornare sodales. Aenean luctus, diam nec vestibulum euismod, tortor nisl pretium sem, fringilla accumsan felis lacus imperdiet libero. Vivamus at vehicula tellus. Praesent at arcu non nisl luctus blandit vel et turpis. Fusce dignissim nisi in velit porta tristique. Fusce interdum est arcu, nec tincidunt erat scelerisque id. Suspendisse at lacus volutpat, porttitor est vitae, dignissim neque. Suspendisse potenti.</p><p>Pellentesque feugiat feugiat mi. Nunc tincidunt, leo vitae accumsan venenatis, libero diam euismod velit, vulputate consequat orci neque sed massa. In sodales est nec est accumsan, sed malesuada massa tincidunt. Mauris porttitor tortor at nisl placerat rhoncus. Cras ac molestie libero. Pellentesque id hendrerit erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu nisl vel erat condimentum condimentum sit amet aliquam purus. Vestibulum lobortis feugiat accumsan. Nulla congue tempor erat. Etiam semper ut eros porta viverra. Aenean ullamcorper ipsum at pellentesque tincidunt. Nulla felis ligula, hendrerit a felis at, efficitur venenatis est. Nunc est lacus, auctor tristique magna vitae, consectetur elementum urna.</p>', 1, '2020-06-28 08:19:50', 'Machine learning', 1, 4, 1),
(30, 9, 'Fly high', 'imageimg3.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel tellus vehicula lacus suscipit eleifend ut a augue. Aliquam erat volutpat. Aenean arcu neque, ultricies quis maximus quis, mattis non diam. Vivamus a eros nec quam dignissim molestie non vel lectus. In tempor eu justo non congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin auctor porttitor tristique. Suspendisse ullamcorper justo justo, a tincidunt massa tempor eu. Morbi ornare sem ipsum. Aenean sed ex at diam malesuada faucibus. Donec nec nisl et diam gravida ullamcorper. Maecenas imperdiet massa vel elit tristique semper. Sed ante tellus, finibus in volutpat non, gravida sit amet tellus.</p><p>Morbi convallis sagittis odio, sed consequat ipsum elementum sit amet. Maecenas rhoncus interdum purus, eleifend rhoncus arcu lobortis ac. Aenean tristique libero id cursus congue. Nunc vestibulum ligula sed orci volutpat, vitae maximus nulla rutrum. Donec congue diam vel feugiat venenatis. Proin at diam posuere mi tincidunt dignissim tristique at nisi. Fusce quis sem rhoncus, viverra urna a, consequat sapien. Pellentesque mollis, ex sed aliquam imperdiet, odio quam euismod velit, non interdum sapien eros eu magna. Vestibulum tellus tellus, consequat in turpis a, mattis commodo leo. Quisque tempor lorem maximus pretium vehicula. Etiam convallis non felis et faucibus. Ut at rhoncus massa, a aliquet velit. In vitae varius ex.</p><p>Ut eget sollicitudin turpis, non vehicula risus. Donec egestas purus sit amet convallis convallis. Quisque feugiat, ipsum quis lacinia eleifend, justo ante euismod leo, nec dictum dolor urna vitae ex. Praesent semper eleifend mi, nec feugiat nisi commodo a. Vivamus egestas sed eros a porta. Quisque vehicula ac risus sed imperdiet. Pellentesque a ligula sit amet justo interdum sollicitudin vel at justo. Ut rhoncus nunc sed dui convallis, sit amet ullamcorper arcu lobortis. Nunc tempor congue dolor, id blandit elit mollis id. Etiam finibus hendrerit laoreet. Duis feugiat diam eget urna pulvinar tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean lobortis urna porttitor libero malesuada lacinia.</p><p>Nullam tincidunt ornare sodales. Aenean luctus, diam nec vestibulum euismod, tortor nisl pretium sem, fringilla accumsan felis lacus imperdiet libero. Vivamus at vehicula tellus. Praesent at arcu non nisl luctus blandit vel et turpis. Fusce dignissim nisi in velit porta tristique. Fusce interdum est arcu, nec tincidunt erat scelerisque id. Suspendisse at lacus volutpat, porttitor est vitae, dignissim neque. Suspendisse potenti.</p><p>Pellentesque feugiat feugiat mi. Nunc tincidunt, leo vitae accumsan venenatis, libero diam euismod velit, vulputate consequat orci neque sed massa. In sodales est nec est accumsan, sed malesuada massa tincidunt. Mauris porttitor tortor at nisl placerat rhoncus. Cras ac molestie libero. Pellentesque id hendrerit erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu nisl vel erat condimentum condimentum sit amet aliquam purus. Vestibulum lobortis feugiat accumsan. Nulla congue tempor erat. Etiam semper ut eros porta viverra. Aenean ullamcorper ipsum at pellentesque tincidunt. Nulla felis ligula, hendrerit a felis at, efficitur venenatis est. Nunc est lacus, auctor tristique magna vitae, consectetur elementum urna.</p>', 1, '2020-06-29 22:51:33', 'Life style', 0, 2, 1),
(34, 9, 'My Qurantine ', 'image86612091_481470909186913_7938985899759501312_n.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fringilla euismod ultricies. Curabitur id velit in eros tempor feugiat. Nullam varius quis sapien vitae volutpat. Suspendisse in tortor at velit fermentum vestibulum. Aenean dapibus augue a lorem pharetra egestas. Sed dignissim rutrum tortor, ac suscipit neque rutrum vitae. Sed interdum porttitor ipsum sed pellentesque. Phasellus tempus viverra dignissim. Etiam luctus felis metus, id commodo dui pulvinar eget. Proin commodo, felis sed pretium maximus, tortor sem aliquam purus, vel placerat justo erat ut felis. Mauris vel mi vel magna aliquam faucibus vitae sed odio. Quisque sed nulla risus.</p><p>In ut leo purus. Nunc sit amet erat ut neque pretium ullamcorper. Suspendisse pellentesque est id odio rhoncus, in tempus purus egestas. Fusce lorem diam, volutpat scelerisque scelerisque pharetra, sodales ac dolor. Morbi non luctus metus. Nullam gravida libero eget turpis luctus lobortis a sit amet ante. Quisque convallis leo id porta imperdiet. Donec nec dui sed dolor ornare consectetur. Mauris a ex ac odio pharetra vulputate. Phasellus faucibus sem mauris, et blandit tellus sodales a. Nulla porta consectetur tortor condimentum pretium.</p><p>Proin porttitor ex non tincidunt volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed velit mi, auctor sed leo at, molestie mattis lectus. Vestibulum molestie vitae nulla ut pulvinar. Nulla fermentum pulvinar eros at hendrerit. Etiam euismod eu velit a lacinia. Quisque gravida purus nec velit tristique imperdiet. Donec a lacus orci. Sed sed ligula enim.</p><p>Cras nisl dolor, faucibus id convallis laoreet, tincidunt id elit. In sit amet auctor magna. Proin aliquam lacus feugiat, porta orci interdum, consequat lacus. Ut vel vestibulum dui. Sed eget tincidunt tortor. Phasellus ullamcorper, quam id fermentum imperdiet, odio sem semper nisi, non eleifend elit risus sit amet lorem. Curabitur vel blandit quam, nec venenatis magna. Nulla nunc augue, varius a purus in, condimentum egestas turpis. Donec tempor velit vel turpis ornare posuere. Maecenas nunc nulla, accumsan eu ultricies at, suscipit ac est. Cras vel pellentesque diam.</p><p>Suspendisse id pulvinar purus. Maecenas hendrerit nec nibh sit amet vulputate. In sodales dolor justo, nec ullamcorper tortor elementum sit amet. Nulla nec leo facilisis, volutpat nunc eu, suscipit magna. Aenean non aliquet metus. Nullam porta justo ipsum, a ullamcorper libero hendrerit sit amet. Etiam lacinia ultricies porttitor. Quisque et ultrices libero. Cras malesuada malesuada tortor at dictum. Vivamus et placerat nisi. Nullam odio leo, maximus ut leo at, vulputate pellentesque ex. Etiam tincidunt leo neque, hendrerit hendrerit nibh porttitor a. Phasellus maximus tortor quis ornare pharetra. Praesent fringilla porta velit. Nunc sit amet bibendum turpis.</p>', 1, '2020-07-02 20:16:36', 'Life style', 0, 13, 3),
(36, 9, 'Web scraping', 'imagefeatured_image-6.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat lacus eu magna porttitor, bibendum finibus massa consequat. Nulla facilisi. Duis nec accumsan magna. Mauris placerat sed nibh nec eleifend. Phasellus et mattis tortor. In quis tristique mauris, ac maximus tortor. Duis eu mauris nec orci imperdiet egestas. Ut ullamcorper ultricies dolor, non varius ante vehicula et. Aenean libero odio, convallis at velit ac, eleifend venenatis lorem. Donec a rhoncus sapien, vel finibus turpis. Phasellus et accumsan risus.</p><p>Donec porta urna arcu, non tempus tellus tincidunt vel. Morbi euismod, nunc eget tempus aliquam, nisi diam porttitor lacus, tincidunt aliquam nisl elit ac nulla. Cras fringilla rutrum nisi id vehicula. Proin pulvinar porttitor mattis. Morbi eu elit et lacus ultrices mollis commodo accumsan arcu. Fusce est nisl, ornare sit amet pharetra et, viverra non felis. Sed maximus purus sit amet mollis fermentum. Praesent eleifend turpis in nulla auctor, eget consectetur sem laoreet. Donec odio dui, tempor quis odio et, facilisis aliquam quam. Morbi id lectus est. Fusce in nulla sed arcu tempor convallis. Vestibulum ut augue eu nulla suscipit commodo. Suspendisse sed diam quis felis varius mollis varius ac nisl.</p><p>Curabitur eget semper lectus. Duis sodales orci ex. Ut quis porta lectus, sed hendrerit eros. Curabitur fringilla pellentesque vulputate. Pellentesque sit amet ex pulvinar, gravida libero non, molestie dui. Maecenas non tortor lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur malesuada aliquet est, in volutpat justo porta eleifend. Nullam non quam id justo laoreet accumsan ac in lorem. Fusce facilisis finibus felis eu porta. Donec venenatis mattis elit, id efficitur purus accumsan et.</p><p>Phasellus facilisis ligula id lacus scelerisque elementum. Phasellus sagittis a dui non bibendum. Nulla id sapien venenatis, mollis nisi at, consectetur dolor. Pellentesque sit amet dapibus sapien, a scelerisque magna. Praesent efficitur diam gravida, egestas enim eu, lacinia urna. Sed vel magna gravida, lacinia justo quis, hendrerit sapien. Morbi egestas gravida dui non accumsan. Sed a justo purus. Nunc rhoncus sollicitudin tellus, ac aliquam lectus venenatis at. Maecenas dictum tempor tellus, non semper ipsum porttitor ut.</p><p>Sed iaculis mauris ac augue commodo, ut commodo sem luctus. Pellentesque mi metus, congue vitae nisl non, tincidunt porttitor nibh. Nulla rhoncus porta nisl, vitae pretium augue sagittis eget. Integer turpis mauris, vulputate nec ante non, luctus posuere justo. Duis congue ante in odio tincidunt dictum. Integer iaculis commodo lacus ut condimentum. Morbi dapibus lorem ut erat vehicula dignissim. In sodales laoreet lectus eu porttitor.</p>', 1, '2020-08-23 03:40:25', 'Web development', 0, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`) VALUES
(9, 'Machine learning', '<p>About Machine learning</p>'),
(10, 'Programming', '<p>About programming</p>'),
(12, 'Web development', '<p>About web development</p>'),
(13, 'Life style', '<p>About life style</p>'),
(16, 'Nature', '<p>About science fiction</p>'),
(17, 'Science fiction ', '<p>Science fiction</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `users_create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_img_status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `users_create_time`, `profile_img_status`) VALUES
(9, 1, 'Tarunno', 'tarunno@gmail.com', '$2y$10$QhiXsWh5nXL8jxHtYERbq.dKqv3KrOSP7KlV5SrFdidl0cxMwQexu', '2020-06-26 14:33:42', '1'),
(16, 0, 'Jolly', 'jolly@gmail.com', '$2y$10$u2BwY6dmKQsKTGyN1iN2YevM7l5yZB0/Myfde3YWEFk804SBYJAsy', '2020-06-28 02:16:35', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
