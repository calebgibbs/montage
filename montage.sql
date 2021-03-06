-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 12:22 AM
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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `product_id`) VALUES
(4, 1, 5),
(5, 1, 4),
(10, 1, 2),
(12, 1, 29),
(23, 1, 42),
(24, 1, 41),
(25, 1, 11),
(26, 1, 12),
(27, 1, 3),
(28, 1, 6),
(29, 1, 10),
(30, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `description`) VALUES
(15, 'Russell McVeagh', 'Client: Russell McVeagh Lawyers Architect: Rory Hocking Date: May 08\r\n\r\nProject: Refurbishment of Staff room &amp; Kitchen Level 24 Supply &amp; installation of Large boardroom table Level 25 Solution: Kitchen refurbishment involved installing a new stainless steel bench top, a custom made bar leaner with Incognito base. Also supplied were two Formica, powdercoated bar leaners, with 12 Jessica stools to match. Custom made Tawa Veneer boardtable measuring 7400 x 2508 (at widest point)'),
(16, 'Land Information New Zealand', 'Client: Land Information New Zealand Architect: Catalyst Consulting Date: December 08 \r\n\r\nProject: Refurbish vacant workspace and cafe Solution: Montage Interiors used Madison user adjustable corner workstations and low Axis screens to provide spacious working environment. The cafe ha informal low seating with a splash of colour form the ottomans. The tables are mobile to allow an effortless reconfiguration for functions. The minimalist colour scheme was chosen to enhance what was a more shaded corner section in the buildings interiors.'),
(17, 'Southern Cross Hospital', 'Client: Southern Cross Hospital Architect: Warren and Mahoney Main contractor: Mainzeal\r\n\r\nDate:20/10/2009 to 30/04/2010\r\n\r\nProject: Southern Cross Hospital redevelopment ,90 Hanson street, Wellington, new\r\n\r\nDetails of job: manufacture of joinery to theatres, scrub in rooms, patient bed rooms staff kitchen, reception and admin areas'),
(18, 'Ministry of Justice', 'Client: Ministry Of Justice\r\n\r\nArchitect: Creative Spaces\r\n\r\nMain Contractor: Fletcher Construction\r\n\r\nDate: September 07\r\n\r\nProject: Tribunals AMP Building\r\n\r\nSolution: Supply and installation of joinery to court rooms, reception and office areas.'),
(19, 'Waitangi Tribunal', 'Client: Waitangi Tribunal\r\n\r\nArchitect: Gaze Commercial\r\n\r\nDate: September 2004\r\n\r\nProject: Fujitsu Tower 141 The Terrace\r\n\r\nSolution: Supply of Joinery and furniture including Reception Units, Credenza?s, Kitchens and specialised joinery items to 5 Floors.'),
(20, 'The Correspondence School', 'Client: The Correspondence School Architect: CGM Date: November 08 and on going Project: Refurbishment of 4 (out of 6) wings in Wellington and one site in Christchurch\r\n\r\nSolution: Fit out 240+ Madison technically adjustable workstations and 8 Madison user adjustable workstations. Design, build and supply personal storage credenzas. Supply and installation of CPU holders and monitor arms. Supply tilting tables and meeting room furniture. Supply low seating and lunge suites for common areas.'),
(21, 'Custom filing cabinets', 'Montage Interiors can manufacture filing cabinets to our clients specific requirements\r\n\r\n- Low pressure laminates\r\n\r\n- Timber veneer\r\n\r\n-  Custom sizing\r\n\r\n-  Drop files\r\n\r\n-  Slide out shelves\r\n\r\n-  Option of lockable'),
(22, 'Victoria University Hostel', 'In February 2013 Montage delivered and placed 30 x 2 seater sofas and 24 x 3 seater sofaâ€™s in Victoria Universityâ€™s Boulcott Streetâ€™s Student Hostels.\r\n\r\nMontage Interiors Account Manager Derek Joy worked with Dave Lowe of Interact Architect and Kirstyn McKeefry of Wareham Cameron + Co on the development of sofaâ€™s that would stand up to the ultimate high use environment of a Student Hostel.'),
(23, 'Berkley Dallard', 'August 2011-February 2013\r\n\r\n5 towers\r\n210 apartments (kitchen, wardrobe and storage shelving refurbishment)\r\nMay 2013 - July 2014\r\n\r\n1 building\r\n130 kitchen, shelving and vanity units: supply and installation'),
(24, 'Rabobank', 'Montage Interiors Company Director and Account Managerworked with Architect Joey Grooves over a 13 year period on the furniture fit outs of Rabobanks nationwide branches. Montage Interiors also manufactured and installed many reception counters, staff kitchens and a variety of joinery items. Architect Joey Grooves selected the furniture and finishes from Montage Interiors range following consultation with the client.'),
(25, 'Public Trust', 'Public Trust currently 43 branches throughout NZ and Montage Interiors have successfully supplied furniture to them all in the last 18 years. We have recently refitted their Corporate Office in Wellington consisting of over 100 workstations, mobiles, screens, storage, meeting chairs, low seating and ergo chairs all chosen from Public Trust exclusive furniture catalogue.'),
(26, 'Trade Me', 'Montage Interiors in conjunction with HMA Architects transitioned Trademe from sitting desks to the fantastic Pillar sit to stand desking.\r\n\r\nAs bold and innovative employers, Trademe have opted for every one of their 400+ head office employees to have a Montage Interiors sit to stand Pillar desk with a funky mobile.');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(10) NOT NULL,
  `portfolio_id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_position` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `image`, `image_position`) VALUES
(6, 15, '5a80d6efb4db7.png', '1'),
(7, 15, '5a80d6efe1c53.png', '2'),
(8, 15, '5a80d6f01a74e.png', '3'),
(9, 15, '5a80d6f045ddc.png', '4'),
(10, 16, '5a80da2145b99.png', '1'),
(11, 16, '5a80da216ff5e.png', '2'),
(12, 16, '5a80da219a2bf.png', '3'),
(13, 16, '5a80da21c3f33.png', '4'),
(14, 17, '5a80dc8c3e3c4.png', '1'),
(15, 17, '5a80dc8c66a7c.png', '2'),
(16, 18, '5a80dd1b33d87.png', '1'),
(17, 18, '5a80dd1b5f5b1.png', '2'),
(18, 19, '5a80ddf5c45a6.png', '1'),
(19, 19, '5a80ddf5f176c.png', '2'),
(20, 19, '5a80ddf629969.png', '3'),
(21, 19, '5a80ddf654887.png', '4'),
(22, 20, '5a80deaadfe04.png', '1'),
(23, 20, '5a80deab13548.png', '2'),
(24, 20, '5a80deab3a572.png', '3'),
(25, 20, '5a80deab5ef69.png', '4'),
(26, 21, '5a80df8e1f49f.png', '1'),
(27, 21, '5a80df8e377d9.png', '2'),
(28, 21, '5a80df8e4d57e.png', '3'),
(29, 21, '5a80df8e62efe.png', '4'),
(30, 22, '5a80e04692454.png', '1'),
(31, 22, '5a80e046be8d9.png', '2'),
(32, 22, '5a80e046e78d3.png', '3'),
(33, 23, '5a81337a5ac98.png', '1'),
(34, 23, '5a81337a82327.png', '2'),
(35, 23, '5a81337aad664.png', '3'),
(36, 24, '5a8134323d9fc.png', '1'),
(37, 24, '5a8134326ce77.png', '2'),
(38, 24, '5a81343298647.png', '3'),
(39, 25, '5a8135346b05a.png', '1'),
(40, 25, '5a8135348c9c6.png', '2'),
(41, 25, '5a813534ad2fb.png', '3'),
(42, 25, '5a813534c6a98.png', '4'),
(43, 25, '5a813534e4316.png', '5'),
(44, 26, '5a8135c35e668.jpg', '1'),
(45, 26, '5a8135c3738a8.jpg', '2'),
(46, 26, '5a8135c384719.jpg', '3'),
(47, 26, '5a8135c393f10.jpg', '4'),
(48, 26, '5a8135c3a2a33.jpg', '5');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` enum('workstation','storage','tech_accesories','table','screen','agile_furniture','chair','joinery_custom','other') NOT NULL,
  `supplier` enum('buro','darwell','eden','europlan','harrows','issa','knights','konfurb','montage','motion','profile','titian','welwood','other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `category`, `supplier`) VALUES
(2, 'Motion Shell', 'Motion Shell work pods provide a very high level of acoustic and visual privacy, allowing workers to complete focused individual tasks in a comfortable enclosed environment.', 'agile_furniture', NULL),
(3, 'Motion Team', 'This shared workspace is ideal for teams of up to 4 to cluster, providing a focussed zone for individual work with the ability to easily collaborate with the people nearby. Motion Team is designed to create a defined zone for individuals who collaborate regularly throughout the day.', 'agile_furniture', NULL),
(4, 'Motion Wave', 'Motion Wave work pods provide a good touch down space for individual tasks. They are very space efficient, providing a small amount of acoustic and visual privacy for workers.', 'agile_furniture', NULL),
(5, 'Motion Zip', 'Motion Zip work pods provide a high level of acoustic and visual privacy, allowing workers to complete focused individual tasks in a comfortable environment.', 'agile_furniture', NULL),
(6, 'Motion Expo', 'Motion Expo is ideal for workplace presentations, providing 2 defined tiers for workers to gather around. The screens provide some acoustic privacy and help to define the area for its use. The bar leaner height desks provide space for laptops or notebooks as required.', 'agile_furniture', NULL),
(8, 'Motion Ring ', 'Motion Ring provides a great private space for standing meetings. The large 2 way acoustic screens keep the meeting private, while blocking out distracting workplace sounds from the outside.', 'agile_furniture', NULL),
(9, 'Motion Link', 'Motion Link phone booths provide workers with a private acoustic space to make phone/video calls. A standing height table top provides space for laptops or notebooks if necessary. Motion Link is designed to keep noise from the outside out, while also enclosing the user to prevent them from distracting others in the workplace.', 'agile_furniture', NULL),
(10, 'Motion Meeting', 'Motion Meeting is a 4 seater booth which provides a high level of privacy for users. This enclosed setting is ideal for anything from focussed brainstorming sessions to client meet and greets.', 'agile_furniture', NULL),
(11, 'Motion Arc', 'Motion Arc provides space for groups of people to collaborate together, and comes with the option of additional privacy screens to enclose the space and provide a high level of privacy for workers.', 'agile_furniture', NULL),
(12, 'Motion Arc Walls ', 'Motion Arc provides space for a group of people to collaborate together with the option of additional screens to enclose the space and provide a high level of privacy for workers.', 'agile_furniture', NULL),
(13, 'Motion Canopy', 'Motion Canopy seating can be arranged to create meeting spaces or be used as quite spaces to complete short individual tasks. The large acoustic panels and roof provide a very good level of privacy in the busy work environment.', 'agile_furniture', NULL),
(14, 'Motion Cape', 'Motion Cape seating can be arranged to create meeting spaces or be used as quite spaces to complete short individual tasks. The large acoustic panels provide a good level of privacy in the busy work environment.', 'agile_furniture', NULL),
(15, 'Motion Disk', 'Motion Disc 6 is perfect for open spaces, providing comfortable individual seating spaces in a 360 degree range.', 'agile_furniture', NULL),
(17, 'Motion Fin', 'Motion Fin seating can be arranged to create open meeting areas or be used as spaces to complete short individual tasks. The low back creates an open welcoming environment for workers to relax as well.', 'agile_furniture', NULL),
(19, 'Motion Free Chair ', 'The Free Chair is a stylish addition to any breakout, meeting, or low-intensity work zone. With 360 degrees of rotation, the seating always returns to it\'s original position when vacated. Upholstered in Motion Felt, with polished alloy base.', 'agile_furniture', NULL),
(24, 'Motion Grandstand ', 'Motion Grandstand provides tiered seating for anything from quick meetings and presentations to relaxation. Available in the full Motion Felt range, the Grandstand modules can provide visual interest to any space.', 'agile_furniture', NULL),
(25, 'Motion Loop', 'The Motion Loop range allows for endless layout possibilities to suit any environment. Creating waiting room areas or collaborative zones is easy with simple loop forms.', 'agile_furniture', NULL),
(26, 'Motion Otto', 'Motion Otto is the smallest member of the MotionOffice family. Castors on the base provide a mobile option to create clusters or add seating to any desired area.', 'agile_furniture', NULL),
(27, 'Motion Sync', 'The Motion Sync chair features a generously sized mesh backrest to ergonomically support your back, and moulded seat foam with your colour choice of Motion Felt seat cover. A super smooth seat slide adjusts for all users, large and small, and the synchro tilt mechanism moves the seat in harmony with the back recline. The stylish black nylon star base is equipped with heavy duty 60mm castors.', 'agile_furniture', NULL),
(28, 'Motion Wing', 'Motion Wing seating can be arranged to create meeting spaces or be used as quite spaces to complete short individual tasks. The acoustic wings provide acoustic privacy with a more unique bold aesthetic.', 'agile_furniture', NULL),
(29, 'Eightby4', 'Eight by 4 is a highly customisable ottoman that is easy to rearrange into an agile workspace solution.', 'agile_furniture', NULL),
(30, 'Halo', 'The Halo ottoman is available in 3 varying diameters. Its simple soft aesthetic makes it an inviting secondary seating option.', 'agile_furniture', NULL),
(31, 'Star ', 'The Star is a fun group work solution that promotes communication, learning and creativity. Star can be rearranged into many different formations to suit the space.', 'agile_furniture', NULL),
(34, 'Sterm ', 'Stem comes in small, medium and large sizes making it suitable for a range of different workspaces. The Stem is a fun group work solution that promotes communication, learning and creativity.', 'agile_furniture', NULL),
(35, 'Gumball ', 'Ergonomically shaped and enveloping armchair, especially suitable for recreational settings. Available in several variants may be produced in lacquered material or in version with light. The special edition is filled with thousands of coloured balls that come through the translucent and soft surface available.', 'agile_furniture', NULL),
(36, 'Profile Side Screen', 'The Profile E-Panel slide on side screen is quick and easy to use. It can be used as a privacy screen, an acoustic barrier and a pin board all rolled into one. Setup your desk with privacy or divide one are into two and transform your space with colour coordinated side screens for your desk areas.', 'screen', NULL),
(37, 'Biro II', 'A contemporary style for work or home, the Brio II chair offers a range of adjustability options for superior comfort.', 'chair', NULL),
(38, 'Challenger', 'The Buro Challenger Chair is an impressive chair for any modern office or boardroom. Featuring European styling and design its state of the art synchro mechanism and superior comfort will satisfy.', 'chair', NULL),
(39, 'Mentor', 'The Buro Mentor offers the latest in contemporary and ergonomic design. The Mentor is a stand out candidate for any board room, office or home office environment. Featuring a complete range of ergonomic features, easy to use synchronised seating adjustments and outstanding comfort.', 'chair', NULL),
(40, 'Metro', 'A stylish mesh back chair offering a modern look for your office with a polished aluminium base and fully adjustable ergonomic features.\r\nThe Buro Metro chair is supported by the following internationally recognised standards:\r\n-AFRDI Level 6 - Severe Commercial Certificationâ€™\r\n-Global GreenTag', 'chair', NULL),
(41, 'Metro II 24/7', 'Following on from the hugely successful Buro Metro Chair comes the new Buro Metro II 24/7, designed for Multi-Shift operations. Featuring the latest technologies in ergonomics and the sophistication of contemporary fine mesh & elastic knit seat upholstery.', 'chair', NULL),
(42, 'Merto II HB', 'Following on from the hugely successful Buro Metro Chair is the new Buro Metro II High Back our newest member of the Metro II family. Featuring the latest technologies in ergonomics the Metro II HB includes a contoured & supportive high back with built in adjustable lumbar support for ultimate back comfort. Featuring the Metro II sophistication of a contemporary fine mesh & elastic knit seat upholstery.', 'chair', NULL),
(43, 'Roma II', 'The Roma 2 lever chairâ€™s exceptionally comfortable seat and supportive back (available in both highback and midback options) more than\r\nmatch its modern good looks. Its many seat and back position adjustments enable the user the ultimate office seating experience.', 'chair', NULL),
(44, 'Roma III', 'The Roma 3 lever chairâ€™s exceptionally comfortable seat and supportive back (available in both highback and midback options) more than match its modern good looks. Its many seat and back position adjustments enable the user the ultimate office seating experience. Supported by the following internationally recognised standards:\r\n-â€˜AFRDI Level 6 - Severe Commercial Certificationâ€™\r\n-Global GreenTag ', 'chair', NULL),
(48, 'New titleljkhkjh', 'hello this is the tiel', 'workstation', 'eden');

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
(147, 44, '60mm twin wheel castors', '7'),
(158, 48, 'qwdff', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_position` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `image_position`) VALUES
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
(159, 44, '5a5efb445a4eb.jpg', '3'),
(160, 48, '5a8838516a34a.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_links`
--

CREATE TABLE `product_links` (
  `id` int(11) NOT NULL,
  `product_id` int(200) NOT NULL,
  `href` varchar(200) NOT NULL,
  `link_text` varchar(100) NOT NULL,
  `position` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_links`
--

INSERT INTO `product_links` (`id`, `product_id`, `href`, `link_text`, `position`) VALUES
(1, 48, 'ssfgf', 'ssfgf', '1');

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
(115, 44, 'Customer specified fabric', '7'),
(116, 48, 'sdgddvg', '1');

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
  `account_status` enum('not_active','active') NOT NULL DEFAULT 'not_active',
  `email_list` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `company`, `password`, `account_type`, `account_status`, `email_list`) VALUES
(1, 'Caleb Gibbs ', 'calebgibbs@me.com', 'CG Development', '$2y$10$58O5d7coczLkbhgGny6B/Ot3FczpVFYKg4PvjbA9sCIXWacnTAMR6', 'admin', 'active', 'yes'),
(12, 'Matt McLaughlin', 'matt@montagenz.co.nz', 'Montage Interiors', '$2y$10$W8I.5abez98gcEZgmOBHo.4QLqNAM095HmfNU6wBT.z0AucN65aiG', 'admin', 'active', 'no'),
(13, 'Nynke Louise', 'nynke@montagenz.co.nz', 'Montage Interiors', '$2y$10$iZ12O.9eGD0cgOpH4cuujupX0W1llcrh.qdgWClKggar/dD4s7tg2', 'admin', 'active', 'yes'),
(14, 'Euan gray', 'euangray99@gmail.com', 'Montage Interiors', '$2y$10$9h7wlio91GIV3X7R38VkJ.2N.6tZeskTj/krJIHynN1m6ID7h4ZFG', 'admin', 'active', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

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
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_links`
--
ALTER TABLE `product_links`
  ADD UNIQUE KEY `id` (`id`),
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
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `product_links`
--
ALTER TABLE `product_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD CONSTRAINT `portfolio_images_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_links`
--
ALTER TABLE `product_links`
  ADD CONSTRAINT `product_links_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
