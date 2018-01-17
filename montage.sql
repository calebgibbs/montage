-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2018 at 08:44 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montage`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_position` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `image_position`) VALUES
(6, 2, '5a5e64f2b3fa3.jpg', '1'),
(7, 2, '5a5e64f2cfe5d.jpg', '2'),
(8, 2, '5a5e64f2eb0aa.jpg', '3'),
(9, 3, '5a5e65aa75f65.jpg', '1'),
(10, 3, '5a5e65aa913d1.jpg', '2'),
(11, 4, '5a5e66392523b.jpg', '1'),
(12, 4, '5a5e66393f7d8.jpg', '2'),
(13, 4, '5a5e66395bf94.jpg', '3'),
(14, 4, '5a5e663978091.jpg', '4'),
(15, 5, '5a5e66e0acfee.jpg', '1'),
(16, 5, '5a5e66e0c8905.jpg', '2'),
(17, 5, '5a5e66e0e3522.jpg', '3'),
(18, 5, '5a5e66e109360.jpg', '4'),
(19, 5, '5a5e66e124972.jpg', '5'),
(20, 6, '5a5e676f88f0e.jpg', '1'),
(21, 6, '5a5e676fab3f9.jpg', '2'),
(22, 6, '5a5e676fce11b.jpg', '3'),
(23, 6, '5a5e676fe2749.jpg', '4'),
(27, 8, '5a5e6862ea40f.jpg', '1'),
(28, 8, '5a5e68631ac66.jpg', '2'),
(29, 8, '5a5e68632e5e0.jpg', '3'),
(30, 9, '5a5e68cd2d20a.jpg', '1'),
(31, 9, '5a5e68cd47199.jpg', '2'),
(32, 9, '5a5e68cd60985.jpg', '3'),
(33, 9, '5a5e68cd6fee9.jpg', '4'),
(34, 10, '5a5e693d7b91b.jpg', '1'),
(35, 10, '5a5e693d969e9.jpg', '2'),
(36, 10, '5a5e693da4d02.jpg', '3'),
(37, 11, '5a5e69c4bfb19.jpg', '1'),
(38, 11, '5a5e69c4daa48.jpg', '2'),
(39, 11, '5a5e69c5003df.jpg', '3'),
(40, 11, '5a5e69c519bb4.jpg', '4'),
(41, 11, '5a5e69c527c46.jpg', '5'),
(42, 12, '5a5e6a31f1d33.jpg', '1'),
(43, 12, '5a5e6a321903c.jpg', '2'),
(44, 12, '5a5e6a3234a6d.jpg', '3'),
(45, 12, '5a5e6a32428ed.jpg', '4'),
(46, 13, '5a5e6a9c1cb86.jpg', '1'),
(47, 13, '5a5e6a9c36c36.jpg', '2'),
(48, 13, '5a5e6a9c44ee5.jpg', '3'),
(49, 14, '5a5e6af57b692.jpg', '1'),
(50, 14, '5a5e6af595faa.jpg', '2'),
(51, 14, '5a5e6af5b1609.jpg', '3'),
(52, 14, '5a5e6af5ccd94.jpg', '4'),
(53, 14, '5a5e6af5dad0f.jpg', '5'),
(54, 15, '5a5e6b49a9a14.jpg', '1'),
(55, 15, '5a5e6b49c50ae.jpg', '2'),
(56, 15, '5a5e6b49d437d.jpg', '3'),
(67, 17, '5a5e6bceaf016.jpg', '1'),
(68, 17, '5a5e6bcec9b3c.jpg', '2'),
(69, 17, '5a5e6bcee5484.jpg', '3'),
(70, 17, '5a5e6bcf0bdda.jpg', '4'),
(71, 17, '5a5e6bcf19daf.jpg', '5'),
(72, 19, '5a5e6c24c0b75.jpg', '1'),
(73, 19, '5a5e6c24db245.jpg', '2'),
(74, 19, '5a5e6c24e9927.jpg', '3'),
(95, 24, '5a5e6dba33ce1.jpg', '1'),
(96, 24, '5a5e6dba4eacf.jpg', '2'),
(97, 24, '5a5e6dba6813f.jpg', '3'),
(98, 24, '5a5e6dba819e4.jpg', '4'),
(99, 24, '5a5e6dba8fe69.jpg', '5'),
(100, 25, '5a5e6e33327c7.jpg', '1'),
(101, 25, '5a5e6e334dc2c.jpg', '2'),
(102, 25, '5a5e6e3368a72.jpg', '3'),
(103, 25, '5a5e6e33833e2.jpg', '4'),
(104, 25, '5a5e6e339d20b.jpg', '5'),
(105, 26, '5a5e6e7a3dbbf.jpg', '1'),
(106, 26, '5a5e6e7a58c92.jpg', '2'),
(107, 26, '5a5e6e7a67248.jpg', '3'),
(108, 27, '5a5e6efc66e0b.jpg', '1'),
(109, 27, '5a5e6efc80515.jpg', '2'),
(110, 27, '5a5e6efc8e797.jpg', '3'),
(111, 28, '5a5e6f46f2f5e.jpg', '1'),
(112, 28, '5a5e6f4719796.jpg', '2'),
(113, 28, '5a5e6f4734b53.jpg', '3'),
(114, 28, '5a5e6f474faac.jpg', '4'),
(115, 28, '5a5e6f475de10.jpg', '5'),
(116, 29, '5a5e70a29b7fd.jpg', '1'),
(117, 29, '5a5e70a2b6944.jpg', '2'),
(118, 29, '5a5e70a2d3ba4.jpg', '3'),
(119, 29, '5a5e70a305673.jpg', '4'),
(120, 30, '5a5e7105622ab.jpg', '1'),
(121, 30, '5a5e71057f737.jpg', '2'),
(122, 30, '5a5e71059b4a8.jpg', '3'),
(123, 31, '5a5e73238c385.jpg', '1'),
(124, 31, '5a5e7323a8b9b.jpg', '2'),
(125, 31, '5a5e7323c6ede.jpg', '3'),
(131, 34, '5a5e74769f266.jpg', '1'),
(132, 34, '5a5e7476c05ee.jpg', '2'),
(133, 35, '5a5e75598c493.jpg', '1'),
(134, 35, '5a5e755996970.jpg', '2'),
(135, 35, '5a5e7559a062c.jpg', '3'),
(136, 36, '5a5e760802fc8.jpg', '1'),
(137, 36, '5a5e76081cf6a.jpg', '2'),
(138, 36, '5a5e760836815.jpg', '3'),
(139, 36, '5a5e760845132.jpg', '4'),
(140, 37, '5a5e772b3a905.jpg', '1'),
(141, 37, '5a5e772b57c01.jpg', '2'),
(142, 37, '5a5e772b73190.jpg', '3'),
(143, 38, '5a5e77ed235ac.jpg', '1'),
(144, 38, '5a5e77ed4c38e.jpg', '2'),
(145, 39, '5a5e790b8119a.jpg', '1'),
(146, 39, '5a5e790bae0e4.jpg', '2'),
(147, 40, '5a5e7a5747d2a.jpg', '1'),
(148, 40, '5a5e7a576395c.jpg', '2'),
(149, 40, '5a5e7a57860b1.jpg', '3'),
(150, 41, '5a5e7bf64f124.jpg', '1'),
(151, 41, '5a5e7bf66b664.jpg', '2'),
(152, 42, '5a5ef8e47edc3.jpg', '1'),
(153, 42, '5a5ef8e4a2ed1.jpg', '2'),
(154, 43, '5a5efa45ef5ba.jpg', '1'),
(155, 43, '5a5efa461bcfe.jpg', '2'),
(156, 43, '5a5efa463782b.jpg', '3'),
(157, 44, '5a5efb442df74.jpg', '1'),
(158, 44, '5a5efb444b837.jpg', '2'),
(159, 44, '5a5efb445a4eb.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(11) NOT NULL,
  `category` enum('workstations','storage','tech_accesories','tables','screens','agile','chairs','joinery_custom') NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` enum('workstation','storage','tech_accesories','table','screen','agile_furniture','chair','joinery_custom','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `category`) VALUES
(2, 'Motion Shell', 'Motion Shell work pods provide a very high level of acoustic and visual privacy, allowing workers to complete focused individual tasks in a comfortable enclosed environment.', 'agile_furniture'),
(3, 'Motion Team', 'This shared workspace is ideal for teams of up to 4 to cluster, providing a focussed zone for individual work with the ability to easily collaborate with the people nearby. Motion Team is designed to create a defined zone for individuals who collaborate regularly throughout the day.', 'agile_furniture'),
(4, 'Motion Wave', 'Motion Wave work pods provide a good touch down space for individual tasks. They are very space efficient, providing a small amount of acoustic and visual privacy for workers.', 'agile_furniture'),
(5, 'Motion Zip', 'Motion Zip work pods provide a high level of acoustic and visual privacy, allowing workers to complete focused individual tasks in a comfortable environment.', 'agile_furniture'),
(6, 'Motion Expo', 'Motion Expo is ideal for workplace presentations, providing 2 defined tiers for workers to gather around. The screens provide some acoustic privacy and help to define the area for its use. The bar leaner height desks provide space for laptops or notebooks as required.', 'agile_furniture'),
(8, 'Motion Ring ', 'Motion Ring provides a great private space for standing meetings. The large 2 way acoustic screens keep the meeting private, while blocking out distracting workplace sounds from the outside.', 'agile_furniture'),
(9, 'Motion Link', 'Motion Link phone booths provide workers with a private acoustic space to make phone/video calls. A standing height table top provides space for laptops or notebooks if necessary. Motion Link is designed to keep noise from the outside out, while also enclosing the user to prevent them from distracting others in the workplace.', 'agile_furniture'),
(10, 'Motion Meeting', 'Motion Meeting is a 4 seater booth which provides a high level of privacy for users. This enclosed setting is ideal for anything from focussed brainstorming sessions to client meet and greets.', 'agile_furniture'),
(11, 'Motion Arc', 'Motion Arc provides space for groups of people to collaborate together, and comes with the option of additional privacy screens to enclose the space and provide a high level of privacy for workers.', 'agile_furniture'),
(12, 'Motion Arc Walls ', 'Motion Arc provides space for a group of people to collaborate together with the option of additional screens to enclose the space and provide a high level of privacy for workers.', 'agile_furniture'),
(13, 'Motion Canopy', 'Motion Canopy seating can be arranged to create meeting spaces or be used as quite spaces to complete short individual tasks. The large acoustic panels and roof provide a very good level of privacy in the busy work environment.', 'agile_furniture'),
(14, 'Motion Cape', 'Motion Cape seating can be arranged to create meeting spaces or be used as quite spaces to complete short individual tasks. The large acoustic panels provide a good level of privacy in the busy work environment.', 'agile_furniture'),
(15, 'Motion Disk', 'Motion Disc 6 is perfect for open spaces, providing comfortable individual seating spaces in a 360 degree range.', 'agile_furniture'),
(17, 'Motion Fin', 'Motion Fin seating can be arranged to create open meeting areas or be used as spaces to complete short individual tasks. The low back creates an open welcoming environment for workers to relax as well.', 'agile_furniture'),
(19, 'Motion Free Chair ', 'The Free Chair is a stylish addition to any breakout, meeting, or low-intensity work zone. With 360 degrees of rotation, the seating always returns to it\'s original position when vacated. Upholstered in Motion Felt, with polished alloy base.', 'agile_furniture'),
(24, 'Motion Grandstand ', 'Motion Grandstand provides tiered seating for anything from quick meetings and presentations to relaxation. Available in the full Motion Felt range, the Grandstand modules can provide visual interest to any space.', 'agile_furniture'),
(25, 'Motion Loop', 'The Motion Loop range allows for endless layout possibilities to suit any environment. Creating waiting room areas or collaborative zones is easy with simple loop forms.', 'agile_furniture'),
(26, 'Motion Otto', 'Motion Otto is the smallest member of the MotionOffice family. Castors on the base provide a mobile option to create clusters or add seating to any desired area.', 'agile_furniture'),
(27, 'Motion Sync', 'The Motion Sync chair features a generously sized mesh backrest to ergonomically support your back, and moulded seat foam with your colour choice of Motion Felt seat cover. A super smooth seat slide adjusts for all users, large and small, and the synchro tilt mechanism moves the seat in harmony with the back recline. The stylish black nylon star base is equipped with heavy duty 60mm castors.', 'agile_furniture'),
(28, 'Motion Wing', 'Motion Wing seating can be arranged to create meeting spaces or be used as quite spaces to complete short individual tasks. The acoustic wings provide acoustic privacy with a more unique bold aesthetic.', 'agile_furniture'),
(29, 'Eightby4', 'Eight by 4 is a highly customisable ottoman that is easy to rearrange into an agile workspace solution.', 'agile_furniture'),
(30, 'Halo', 'The Halo ottoman is available in 3 varying diameters. Its simple soft aesthetic makes it an inviting secondary seating option.', 'agile_furniture'),
(31, 'Star ', 'The Star is a fun group work solution that promotes communication, learning and creativity. Star can be rearranged into many different formations to suit the space.', 'agile_furniture'),
(34, 'Sterm ', 'Stem comes in small, medium and large sizes making it suitable for a range of different workspaces. The Stem is a fun group work solution that promotes communication, learning and creativity.', 'agile_furniture'),
(35, 'Gumball ', 'Ergonomically shaped and enveloping armchair, especially suitable for recreational settings. Available in several variants may be produced in lacquered material or in version with light. The special edition is filled with thousands of coloured balls that come through the translucent and soft surface available.', 'agile_furniture'),
(36, 'Profile Side Screen', 'The Profile E-Panel slide on side screen is quick and easy to use. It can be used as a privacy screen, an acoustic barrier and a pin board all rolled into one. Setup your desk with privacy or divide one are into two and transform your space with colour coordinated side screens for your desk areas.', 'screen'),
(37, 'Biro II', 'A contemporary style for work or home, the Brio II chair offers a range of adjustability options for superior comfort.', 'chair'),
(38, 'Challenger', 'The Buro Challenger Chair is an impressive chair for any modern office or boardroom. Featuring European styling and design its state of the art synchro mechanism and superior comfort will satisfy.', 'chair'),
(39, 'Mentor', 'The Buro Mentor offers the latest in contemporary and ergonomic design. The Mentor is a stand out candidate for any board room, office or home office environment. Featuring a complete range of ergonomic features, easy to use synchronised seating adjustments and outstanding comfort.', 'chair'),
(40, 'Metro', 'A stylish mesh back chair offering a modern look for your office with a polished aluminium base and fully adjustable ergonomic features.\r\nThe Buro Metro chair is supported by the following internationally recognised standards:\r\n-AFRDI Level 6 - Severe Commercial Certificationâ€™\r\n-Global GreenTag', 'chair'),
(41, 'Metro II 24/7', 'Following on from the hugely successful Buro Metro Chair comes the new Buro Metro II 24/7, designed for Multi-Shift operations. Featuring the latest technologies in ergonomics and the sophistication of contemporary fine mesh & elastic knit seat upholstery.', 'chair'),
(42, 'Merto II HB', 'Following on from the hugely successful Buro Metro Chair is the new Buro Metro II High Back our newest member of the Metro II family. Featuring the latest technologies in ergonomics the Metro II HB includes a contoured & supportive high back with built in adjustable lumbar support for ultimate back comfort. Featuring the Metro II sophistication of a contemporary fine mesh & elastic knit seat upholstery.', 'chair'),
(43, 'Roma II', 'The Roma 2 lever chairâ€™s exceptionally comfortable seat and supportive back (available in both highback and midback options) more than\r\nmatch its modern good looks. Its many seat and back position adjustments enable the user the ultimate office seating experience.', 'chair'),
(44, 'Roma III', 'The Roma 3 lever chairâ€™s exceptionally comfortable seat and supportive back (available in both highback and midback options) more than match its modern good looks. Its many seat and back position adjustments enable the user the ultimate office seating experience. Supported by the following internationally recognised standards:\r\n-â€˜AFRDI Level 6 - Severe Commercial Certificationâ€™\r\n-Global GreenTag ', 'chair');

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `feature` varchar(300) NOT NULL,
  `position` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `feature`, `position`) VALUES
(11, 2, 'Noise absorbing screen', '1'),
(12, 2, 'Timber desktop', '2'),
(13, 3, 'Noise absorbing screen', '1'),
(14, 3, 'Timber desktop ', '2'),
(15, 4, 'Noise absorbing screen', '1'),
(16, 4, 'Timber desktop', '2'),
(17, 5, 'Noise absorbing screen', '1'),
(18, 5, 'Timber desktop', '2'),
(19, 6, 'Noise absorbing screen', '1'),
(20, 6, 'Timber desktop', '2'),
(21, 6, 'High bar worktop', '3'),
(23, 8, 'Noise absorbing screen', '1'),
(24, 9, 'Noise absorbing screen', '1'),
(25, 9, 'Timber desktop', '2'),
(26, 10, 'Noise absorbing screen', '1'),
(27, 10, 'Timber desktop', '2'),
(28, 11, 'Comfortable padded seating', '1'),
(29, 11, 'Can seat groups of varying sizes', '2'),
(30, 12, 'Comfortable padded seating', '1'),
(31, 12, 'Can seat groups of varying sizes', '2'),
(32, 12, 'Noise absorbing screen', '3'),
(33, 13, 'Noise absorbing screen', '1'),
(34, 13, 'Comfortable padded seating', '2'),
(35, 13, 'Enclosed quite space', '3'),
(36, 14, 'Noise absorbing screen', '1'),
(37, 15, 'Comfortable padded seating', '1'),
(40, 17, 'Comfortable padded seating', '1'),
(41, 19, 'Strong steel chrome base', '1'),
(42, 19, 'Comfortable seating option', '2'),
(47, 24, 'Comfortable padded seating', '1'),
(48, 25, 'Comfortable padded seating', '1'),
(49, 26, 'Comfortable padded seating', '1'),
(50, 27, 'Comfortable padded seating', '1'),
(51, 27, 'Ergonomic backrest', '2'),
(52, 27, 'Adjustable height and seat angle control', '3'),
(53, 28, 'Comfortable padded seating', '1'),
(54, 28, 'Noise absorbing screen', '2'),
(55, 29, 'Heavy duty construction', '1'),
(56, 29, 'Light weight for easy manoeuvrability', '2'),
(57, 29, 'Superior 80mm 35/230 FR foam', '3'),
(58, 29, 'Fine top stitch detailing', '4'),
(59, 29, 'Black plastic glides', '5'),
(60, 29, 'Full 5 year guarantee (excluding upholstery)', '6'),
(61, 30, 'Superior 80mm 35/230 FR foam', '1'),
(62, 30, 'Strong durable inner construction', '2'),
(63, 30, 'Plastic glides', '3'),
(64, 31, 'Modular options to optimise use of the workplace', '1'),
(65, 31, 'Heavy duty inner frame construction ', '2'),
(66, 31, 'High density soft pile foam ', '3'),
(67, 31, 'Full 5 year guarantee (excluding upholstery)', '4'),
(78, 34, 'Modular options to optimise use of the workplace', '1'),
(79, 34, 'Heavy duty inner frame construction ', '2'),
(80, 34, 'High density soft pile foam', '3'),
(81, 34, 'Customer Specified fabric', '4'),
(82, 34, 'Full 5 year guarantee (excluding upholstery)', '5'),
(83, 35, 'Ergonomically shaped and enveloping armchair, especially suitable for recreational settings.Â ', '1'),
(84, 36, 'Acoustically rated E-Panel', '1'),
(85, 36, 'Pinnable material construction', '2'),
(86, 36, 'Moisture and stain resistant', '3'),
(87, 36, 'Precision cut to your exact specifications', '4'),
(88, 36, '24mm thick', '5'),
(89, 37, 'Adjustable seat height', '1'),
(90, 37, 'Ratchet height adjustable lumbar support', '2'),
(91, 37, 'High density quality seat foam', '3'),
(92, 37, 'Seat & back tilt with lock adjustment', '4'),
(93, 37, 'Body weight tension adjustment', '5'),
(94, 38, 'Adjustable seat height', '1'),
(95, 38, 'Synchronised seat & backrest angle with 4 position locking adjustment', '2'),
(96, 38, 'Body weight tension adjustment', '3'),
(97, 38, 'Height & width adjustable arms', '4'),
(98, 38, 'Polished chrome steel base', '5'),
(99, 38, 'Soft touch, hard wearing polyurethane upholstery', '6'),
(100, 38, 'Tested to ANSI/BIFMA x5.1-2011', '7'),
(101, 38, 'General-Purpose Office Chairs', '8'),
(102, 38, 'Full 6 year guarantee (excel upholstery)', '9'),
(103, 39, 'Contoured high density seat foam', '1'),
(104, 39, 'Synchronised seat & backrest angle with 4 position locking adjustment', '2'),
(105, 39, 'Superior self weighting tension adjustment, adjusts automatically', '3'),
(106, 39, 'Adjustable lumbar support', '4'),
(107, 39, 'Height, depth & angle adjustable arms with soft PU pads', '5'),
(108, 39, '60mm castors', '6'),
(109, 39, 'Tested to ANSI/BIFMA x5.1-2011 General Purpose Office Chairs', '7'),
(110, 39, 'Full 6 Year guarantee (excel upholstery)', '8'),
(111, 40, 'Adjustable seat height', '1'),
(112, 40, 'Ratchet height adjustable back', '2'),
(113, 40, 'Independently adjustable seat tilt - free floating or lockable', '3'),
(114, 40, 'Independently adjustable back tilt - free floating or lockable', '4'),
(115, 40, 'High density polyurethane moulded foam seat', '5'),
(116, 40, 'Polished aluminium base', '6'),
(117, 41, 'Adjustable seat height', '1'),
(118, 41, 'Ratchet height adjustable back', '2'),
(119, 41, 'Independently adjustable seat tilt- free floating or lockable', '3'),
(120, 41, 'Independently adjustable back tilt- free floating or lockable', '4'),
(121, 41, 'Depth adjustable seat slide', '5'),
(122, 41, 'High density polyurethane moulded foam seat', '6'),
(123, 41, 'Polished aluminium base', '7'),
(124, 41, '60mm Castors', '8'),
(125, 41, 'Supported by the internationally recognised Global GreenTag', '9'),
(126, 42, 'Gaslift ', '1'),
(127, 42, 'Ratchet height adjustable back/lumbar', '2'),
(128, 42, 'Independently adjustable seat tilt - free floating or lockable', '3'),
(129, 42, 'Independently adjustable back tilt - free floating or lockable', '4'),
(130, 42, 'Seat slide mechanism', '5'),
(131, 42, 'Polished aluminium base', '6'),
(132, 42, 'High density polyurethane moulded foam seat', '7'),
(133, 42, '60mm castors', '8'),
(134, 43, '30 x 48mm gas lift', '1'),
(135, 43, 'Ratchet height adjustable back/lumbar', '2'),
(136, 43, 'Adjustable seat and backrest angle â€“ free floating or lockable', '3'),
(137, 43, 'Polyurethane moulded foam', '4'),
(138, 43, 'Nylon base ', '5'),
(139, 43, '60mm twin wheel castors ', '6'),
(140, 43, 'Supported by the internationally recognised Global GreenTag', '7'),
(141, 44, '130 x 48mm gas lift', '1'),
(142, 44, 'Ratchet height adjustable back/lumbar', '2'),
(143, 44, 'Independently adjustable seat angle â€“ free floating or lockable', '3'),
(144, 44, 'Independently adjustable back rest angle â€“ free floating or ', '4'),
(145, 44, 'Polyurethane moulded foam', '5'),
(146, 44, 'D1nylon base', '6'),
(147, 44, '60mm twin wheel castors', '7');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_option` varchar(300) NOT NULL,
  `position` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `product_option`, `position`) VALUES
(11, 2, 'Wedge seating and desk pod option', '1'),
(12, 2, 'Color option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '2'),
(13, 2, 'Worktop option solid beech, lacquered white', '3'),
(14, 2, 'Available in pods of 1 or 2', '4'),
(15, 3, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(16, 3, 'Worktop option solid beech, lacquered white', '2'),
(17, 4, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(18, 4, 'Worktop option solid beech, lacquered white', '2'),
(19, 4, 'Available in pods of 2,4 and 6', '3'),
(20, 4, 'Wedge seating and desk pod option', '4'),
(21, 5, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(22, 5, 'Worktop option solid beech, lacquered white', '2'),
(23, 5, 'Available in pods of 2,3,4,5 and 6', '3'),
(24, 5, 'Wedge seating and desk pod option', '4'),
(25, 6, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(26, 6, 'Worktop option solid beech, lacquered white', '2'),
(28, 8, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(29, 9, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(30, 9, 'Worktop option solid beech, lacquered white', '2'),
(31, 10, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(32, 10, 'Worktop option solid beech, lacquered white', '2'),
(33, 11, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(34, 11, 'With or without table', '2'),
(35, 11, 'Can be arranged in 120Â°,180Â°,240Â° and 300Â°', '3'),
(36, 12, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(37, 12, 'With or without table', '2'),
(38, 12, 'Can be arranged in 180Â°,240Â° and 300Â°', '3'),
(39, 12, 'The screen is available in heights of 1100mm, 1400mm and 2000mm', '4'),
(40, 13, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(41, 14, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(42, 14, '1 or 2 sweater option', '2'),
(43, 15, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(48, 17, 'Color option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(49, 17, '1 or 2 sweater option', '2'),
(50, 19, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(51, 19, 'Polished alloy', '2'),
(56, 24, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(57, 25, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(58, 25, 'Straight Section, motion loop inner 60Â°, motion loop inner 90Â°, motion loop outer 60Â°, motion loop outer 90Â°, ottoman and backrest option.', '2'),
(59, 26, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(60, 27, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(61, 27, 'With or without armrests', '2'),
(62, 27, 'Black nylon', '3'),
(63, 28, 'Colour option includes Charcoal Grey, Stone Grey, Ash Grey, Deep Blue, Ice Blue, Emerald Green, Avocado Green, Bumblebee Yellow, Sunset Orange, Chilli Red.', '1'),
(64, 29, 'Customer Specified fabric', '1'),
(65, 29, 'Ottoman set with castors', '2'),
(66, 30, 'Customer specified fabric', '1'),
(67, 30, 'Aluminium D-ring for easy manoeuvrability', '2'),
(68, 31, 'Customer Specified fabric', '1'),
(69, 31, 'Optional contrasting upholsteries available', '2'),
(74, 34, 'Customer Specified fabric', '1'),
(75, 34, 'Optional contrasting upholsteries available', '2'),
(76, 35, 'Available in several variants may be produced in lacquered material', '1'),
(77, 35, 'Available with lights inside to give a glowing effect', '2'),
(78, 36, 'Available in 12 popular colours', '1'),
(79, 37, 'Soft PU castors', '1'),
(80, 37, 'Polished aluminium base', '2'),
(81, 37, 'Customer specified and indent fabric ', '3'),
(82, 38, 'Soft PU castors', '1'),
(83, 39, 'Soft PU castors ', '1'),
(84, 39, 'Customer specified fabric (seat only)', '2'),
(85, 40, 'Customer specified fabric (seat only)', '1'),
(86, 40, 'Height and width adjustable arms', '2'),
(87, 40, 'Black nylon base', '3'),
(88, 40, 'Soft PU castors ', '4'),
(89, 40, 'Depth adjustable seat slide ', '5'),
(90, 40, 'Small Seat 480W x 470D mm', '6'),
(91, 41, 'Soft PU castors', '1'),
(92, 41, 'Black nylon base', '2'),
(93, 41, 'Height adjustable arms', '3'),
(94, 41, 'Customer specified fabric (seat only)', '4'),
(95, 42, 'Customer specified fabric (seat only)', '1'),
(96, 42, 'Black nylon base', '2'),
(97, 42, 'Height & width adjustable arms', '3'),
(98, 42, 'Soft PU castors', '4'),
(99, 42, '4 lever seat slide mechanism with deluxe seat tilt & tension adjustment', '5'),
(100, 42, 'Small seat 480w x 470dmm', '6'),
(101, 42, '100mm gaslift for seat height range 465-560mm', '7'),
(102, 43, 'Seat slide mechanism', '1'),
(103, 43, 'Height and width adjustable arms', '2'),
(104, 43, 'Polished aluminium base', '3'),
(105, 43, 'Soft PU castors', '4'),
(106, 43, 'Small seat 480w x 470d mm', '5'),
(107, 43, 'Customer specified fabric', '6'),
(108, 43, 'Available in Midback or Highback', '7'),
(109, 44, 'Available in Midback or Highback', '1'),
(110, 44, 'Seat slide mechanism', '2'),
(111, 44, 'Height and width adjustable arms ', '3'),
(112, 44, 'Polished aluminium base', '4'),
(113, 44, 'Soft PU castors', '5'),
(114, 44, 'Small Seat 480W x 470Dmm', '6'),
(115, 44, 'Customer specified fabric', '7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `account_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `account_status` enum('not_active','active') NOT NULL DEFAULT 'not_active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `company`, `password`, `account_type`, `account_status`) VALUES
(1, 'Caleb Gibbs', 'calebgibbs@me.com', 'CG Development', '$2y$10$Y3nMFkAzMY7GSTNdDm6vMOcH4ZVC0PmI2DHulJO6ZmOcKGVXs18XS', 'admin', 'active'),
(4, 'Test', 'test@123.com', '', '$2y$10$K7bJx.RSwwBWseqsbPJAdePfoev5dOVAdiSCwZcvtmoH0kJ63A3Iy', 'user', 'active'),
(5, 'Bella', 'bella@me.com', 'Montage Interiors', '$2y$10$ENzvRpdMsYwZr3BKZeicleHhDzVOFmddfjdInOPywvgi1mA0hbsxm', 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nav`
--
ALTER TABLE `nav`
  ADD CONSTRAINT `nav_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
