-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 06:48 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `product_name`, `product_quantity`, `product_price`, `product_image`) VALUES
(1, 4, 'The Pet\'s Family', 1, 50, 0x67726f6f6d50657446616d696c792e706e67),
(2, 4, 'Diva Pets', 2, 30, 0x67726f6f6d44697661506574732e6a7067),
(7, 8, 'Petsmore', 1, 100, 0x67726f6f6d506574736d6f72652e706e67),
(8, 8, 'Mr.COCO Pet Hotel Spa', 1, 100, 0x686f74656c4d72434f434f2e706e67),
(9, 8, 'Healing Pets', 1, 100, 0x7665744865616c696e67506574732e706e67),
(10, 4, 'Dettol', 1, 23.9, 0x646574746f6c2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` int(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `customer_zipcode` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_city`, `customer_state`, `customer_zipcode`, `username`, `password`, `usertype`) VALUES
(4, 'SYED MUHAMMAD', 'syedhisham@gmail.com', 199056204, '7166 Taman Permint Jalan Sekayu', 'Kuala Berang', 'Terengganu', 21700, 'hisham', 'abc123', 1),
(5, 'apple@apple.com', 'apple@apple.com', 98765432, '7166 Taman Permint Jalan Sekayu', 'Kuala Berang', 'Terengganu', 21700, 'Apple.com', '123', 1),
(6, 'NORLIDA BINTI JAAFAR', 'syedamin5598@gmail.com', 12123123, 'Taman', 'Kuala Berang', 'Terengganu', 21700, 'nor', '1234', 1),
(8, 'SYED MUHAMMAD', 'syed@gmail.com', 199056204, 'Lot 7166 Taman Permint', 'Kuala Berang', 'Terengganu', 21700, 'syed', 'syed123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_details` varchar(255) NOT NULL,
  `food_price` decimal(10,0) NOT NULL,
  `food_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `sp_id`, `food_name`, `food_details`, `food_price`, `food_image`) VALUES
(20, 3, 'KFC Fried Chiken', '6 pcs KFC Fried chiken ', '35', '/rms/img/Food/friedChiken.jpeg'),
(21, 3, 'KFC Double Cheese Burger', '2 pcs Chiken Meet 1 slice of cheese', '20', '/rms/img/Food/doubleChesseBurger.png'),
(23, 3, 'KFC Diner Meal Set B', '2 pcs of chiken, 1 tin of pepsi, 1 medium mashed potato, 1 medium coslow', '13', '/rms/img/Food/dinermeal.jpeg'),
(24, 3, 'Nasi Lemak Sedap', 'Rice, Sambal, cucumber, ikan bilis', '15', '/rms/img/Food/nasilemak.jpeg'),
(25, 3, 'KFC zinger meal', '2 pcs of chicken, medium size mashed potato, medium soda ', '15', '/rms/img/Food/kfc.png'),
(26, 3, 'Nasi Lemak Berapi', 'medium rice, ikan bilis, sambal udang', '5', '/rms/img/Food/nasilemak.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `good`
--

CREATE TABLE `good` (
  `good_id` int(11) NOT NULL,
  `good_name` varchar(50) NOT NULL,
  `good_details` varchar(255) NOT NULL,
  `good_quantity` int(11) NOT NULL,
  `good_price` float NOT NULL,
  `good_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `good`
--

INSERT INTO `good` (`good_id`, `good_name`, `good_details`, `good_quantity`, `good_price`, `good_image`) VALUES
(9, 'Small Golden House Decoration ', 'Lawan Sejuk Kecil Villa3DTeka-Teki Logam Tiga DimensidiyBuatan Tangan Dipasang Rumah Dewasa Model Kreatif Hari Jadi Hadiah', 9, 50, 0x676f6f64342e706e67),
(10, '3D Moon LED', '3D Print Moon LED Night Lamp Rechargeable 7 Colors Tap and Touch Control Home Decor Creative Gift  ', 4, 20, 0x676f6f64322e706e67),
(11, 'Modern Super Soft Geometry Series Pillowcase', ' Polyester fabric, durable and wear-resistant.  ', 1234, 25, 0x676f6f64332e706e67),
(12, 'Pure Copper Mug', ' Pure Copper Mug Moscow Mule Cup For Cold drink Cocktail without Inside Liner【bluesky1990】.  ', 124, 18, 0x676f6f64362e706e67),
(13, 'Line Friends Sally Mug Cup', ' Official Line Merchandise: Line Friends Sally Mug Cup.  ', 12, 30, 0x676f6f64352e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(255) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_details` varchar(255) NOT NULL,
  `medicine_quantity` int(100) NOT NULL,
  `medicine_price` varchar(100) NOT NULL,
  `medicine_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_details`, `medicine_quantity`, `medicine_price`, `medicine_image`) VALUES
(1, 'Dettol', 'Cleans 99.9% germs', 10, '23.90', 0x646574746f6c2e6a7067),
(2, 'Panadol', 'Relieve the headache', 10, '18.50', 0x6d65646963696e652d312e706e67),
(3, 'Blacmores', 'Vitamin C', 10, '49.90', 0x6d65646963696e652d342e706e67),
(4, 'Panadol Extra', 'Reduces fever and relieves mild to moderate pain', 5, '18.50', 0x6d65646963696e652d382e706e67),
(5, 'Flu Tablet', 'Relieves cold and fever', 5, '14.90', 0x6d65646963696e652d332e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` longblob NOT NULL,
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petgroom`
--

CREATE TABLE `petgroom` (
  `groom_id` int(10) NOT NULL,
  `groom_name` varchar(100) NOT NULL,
  `groom_price` float NOT NULL,
  `groom_quantity` int(100) NOT NULL,
  `groom_details` varchar(1000) NOT NULL,
  `groom_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petgroom`
--

INSERT INTO `petgroom` (`groom_id`, `groom_name`, `groom_price`, `groom_quantity`, `groom_details`, `groom_image`) VALUES
(9, 'Pets Grooming Hotel', 100, 1, 'Our mission at Pets Grooming Hotel is to make dogs beautiful.Help us make more dogs beautiful by placing your furry kids on our professional groomers hands.', 0x67726f6f6d5047482e706e67),
(10, 'The Pet Familys', 50, 1, 'Qian Hu The Pet Family (M) Sdn Bhd is the nation’s leading retailer of premium pet food, supplies and services. Established in 2004, the company currently operates 4 pet megastores under the name of “The Pet Family” across Malaysia, dedicated to pet lovers of all kind under one roof.', 0x67726f6f6d50657446616d696c792e706e67),
(11, 'Petsmore', 100, 1, 'Petsmore.com in Mandarin pronounces as “Chong Wu Duo Duo”. It is mean that “Many Pets”. Pets More currently as the Market leaders and also the biggest pet retail-chain store in Malaysia that provides conveniences, professional advice, product choices, more variety of pets choices and services for our customers. The nature of the business is to market quality pets to the consumers.\r\n     \r\nThe range of pets includes dog, cat, tortoise, hamster, rabbit and others. Besides that, Pets More also market products such as pet food, equipments and utilities all cater specially for pets. All the products sold in the shop must go through a strict and thorough quality check before they are being sold to the customers. We also obtained an in-house grooming service who services our customers to keep their pets in a tiptop presentable look at all time. The pet shops are designed in a way that is spacious, clean and open to allow shoppers and pets enough rooms to move about when they are shopping in P', 0x67726f6f6d506574736d6f72652e706e67),
(12, 'Global Pets', 70, 1, '\r\nAbout Us\r\nFounded as an independent pet supplies store in Nusa Bestari, Johor Bahru in 2004 and was an instant success. Global Pets has rapidly expanded to become a distinctive household brand that has established its mark as an integrated pet care specialty chain store.\r\n\r\nThe company expanded its offerings by giving greater emphasis to pet care services and rolled out grooming and boarding services companywide. In our quest to offer our customers a more comprehensive pet care solution, we continue to explore and develop new service offerings especially in areas such as pet adoption, training and cremation.', 0x67726f6f6d476c6f62616c506574732e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `pethotel`
--

CREATE TABLE `pethotel` (
  `hotel_id` int(100) NOT NULL,
  `hotel_name` varchar(1000) NOT NULL,
  `hotel_price` float NOT NULL,
  `hotel_quantity` int(100) NOT NULL,
  `hotel_details` varchar(1000) NOT NULL,
  `hotel_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pethotel`
--

INSERT INTO `pethotel` (`hotel_id`, `hotel_name`, `hotel_price`, `hotel_quantity`, `hotel_details`, `hotel_image`) VALUES
(3, 'COCOMOMOS', 150, 1, 'It’s the ultimate pet destination built exclusively for urban dogs and cats located in central of Klang Valley. Our stunning five storey building is tastefully designed with special rooms and suites for your pets set with modern installations, a large indoor park, interaction play room and a rooftop pool area. It’s enough to make any dog or cat to wag its tail.', 0x686f74656c436f636f6d6f6d6f2e706e67),
(4, 'Mr.COCO Pet Hotel Spa', 100, 1, 'Mr Coco Pet Hotel and Spa is a premium pet hotel and spa in Mont Kiara/ Desa Sri Hartamas area. It was founded in 2016 with the aim to provide world class service and treatment to our furry friends. We only use the best products formulated with 100% natural ingredients so that our furry friends get the best without any side effects. Our pet playground (separate) allows wow-wow and meow-meows to roam freely while learning to interact with their fellow mates. Every single little furry friend that checks into our hotel are treated like royalty with tender love and care, to compensate the absence of their beloved owners during their stay here. We allow owners to have peace of mind travelling abroad while leaving their furry friends at our hotel.', 0x686f74656c4d72434f434f2e706e67),
(5, 'Pamper Pup', 100, 1, 'We dedicate a great part of our time caring for all the dogs here at our home. And as for first-timers at our home, we would like to offer an INTRODUCTORY TRIAL STAY, be it Day Care or a 2d1n Sleepover stay, which will be a BUY 1 FREE 1 INTRODUCTORY PLAN to fur-mama and fur-dada who are serious about our services.\r\n', 0x686f74656c50616d7065725075702e706e67),
(6, 'Pet Backer', 200, 1, 'In this day and age, life is understandably hectic for many pet parents. With commitments at work, time out with friends and family, full time attention to our pets are usually not a possibility. So whether you are having late nights at work, out on a holiday or simply need a break and need pet sitting, in home boarding, daycare, dog walking or even pet grooming, PetBacker is here to connect you with other pet lovers who are ready to help you take care of your pets like it were part of their family, belly rubs and hugs included.', 0x686f74656c5065746261636b65722e737667),
(7, 'Pet Nanny', 100, 1, 'Malaysia’s leading educational organization for professional pet sitters since 2007. ​Pet sit/private home boarding for cats, dogs, rabbit, guinea pig, hamster, gerbil, raccoon, birds, sugar glider, geckos, civet, scorpions, snakes, otter, tortoises or other small animals. ', 0x686f74656c5065744e616e6e792e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `petvet`
--

CREATE TABLE `petvet` (
  `vet_id` int(100) NOT NULL,
  `vet_name` varchar(1000) NOT NULL,
  `vet_price` float NOT NULL,
  `vet_quantity` int(100) NOT NULL,
  `vet_details` varchar(1000) NOT NULL,
  `vet_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petvet`
--

INSERT INTO `petvet` (`vet_id`, `vet_name`, `vet_price`, `vet_quantity`, `vet_details`, `vet_image`) VALUES
(2, 'Veterinary Essential Services', 50, 1, 'We are a group of veterinary practices in Malaysia founded by Veterinarians who are passionate about their work and strive to provide the best healthcare our pets deserve. Veterinary Essential Services\' Core is built around protecting the important things for Pet Owners and members of the Veterinary Profession. We aim to help protect and preserve the Veterinary profession\'s passion, Create a more Healthy Work Environment for Vets, Allowing Our Team to Deliver Their Best to every patient that requires our help.', 0x766574457373656e7469616c2e706e67),
(3, 'Healing Pets', 100, 1, 'Our team is committed to educate our clients in healthcare for their beloved furry friends. Healing Pets strive to stay on top in the latest advances in veterinary technology to give only the very best services to our clients , so that their pets will have healthier and happier lives.', 0x7665744865616c696e67506574732e706e67),
(4, 'Vet Lee', 50, 1, 'To be the most trusted specialist clinic for responsible pet owners', 0x7665744c45452e6a7067),
(5, 'SAMC', 150, 1, 'SAMC Animal\'s centre is a veterinary clinic and surgery for companion animals mainly feline and canine. Call us for more info.', 0x76657453414d432e6a7067),
(6, 'VPAC- Vets for Pets Animal Clinic', 150, 1, 'Vets for Pets Animal Clinic (VPAC) is a veterinary practice in Kuala Lumpur that mainly focusing on small animal medicine and surgery, and secondary on pets grooming and retailing.', 0x766574565041432e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(100) NOT NULL,
  `sp_email` varchar(100) NOT NULL,
  `sp_phone` int(20) NOT NULL,
  `sp_address` varchar(100) NOT NULL,
  `sp_city` varchar(100) NOT NULL,
  `sp_state` varchar(100) NOT NULL,
  `sp_zipcode` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`sp_id`, `sp_name`, `sp_email`, `sp_phone`, `sp_address`, `sp_city`, `sp_state`, `sp_zipcode`, `username`, `password`, `usertype`) VALUES
(1, 'PGH', 'pgh@gmail.com', 999999, '7166 Taman Permint Jalan Sekayu', 'Kuala Berang', 'Terengganu', 21700, 'pgh', 'pgh123', 2),
(2, 'apple@apple.com', 'apple@apple.com', 98765432, '7166 Taman Permint Jalan Sekayu', 'Kuala Berang', 'Terengganu', 21700, 'Apple.com', '123456', 2),
(3, 'chang', 'syedhisham5598@gmail.com', 123123123, 'Taman', 'Kuala Berang', 'TErengganu', 21700, 'chang55', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runner_id` int(100) NOT NULL,
  `runner_name` varchar(100) NOT NULL,
  `runner_email` varchar(50) NOT NULL,
  `runner_phone` int(20) NOT NULL,
  `runner_address` varchar(100) NOT NULL,
  `runner_city` varchar(50) NOT NULL,
  `runner_state` varchar(50) NOT NULL,
  `runner_zipcode` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runner_id`, `runner_name`, `runner_email`, `runner_phone`, `runner_address`, `runner_city`, `runner_state`, `runner_zipcode`, `username`, `password`, `usertype`) VALUES
(1, 'Muhammad', 'muhammad@gmail.com', 112312312, '7166 Taman Permint Jalan Sekayu', 'Kuala Berang', 'Terengganu', 21700, 'muhd', 'muhd123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(100) NOT NULL,
  `tracking_id` int(100) NOT NULL,
  `tracking_date` date NOT NULL,
  `tracking_time` varchar(100) NOT NULL,
  `tracking_progress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `runner_id` int(100) NOT NULL,
  `runner_status` varchar(100) NOT NULL,
  `shipping_status` varchar(100) NOT NULL,
  `shipping_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`good_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `petgroom`
--
ALTER TABLE `petgroom`
  ADD PRIMARY KEY (`groom_id`);

--
-- Indexes for table `pethotel`
--
ALTER TABLE `pethotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `petvet`
--
ALTER TABLE `petvet`
  ADD PRIMARY KEY (`vet_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runner_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petgroom`
--
ALTER TABLE `petgroom`
  MODIFY `groom_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pethotel`
--
ALTER TABLE `pethotel`
  MODIFY `hotel_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `petvet`
--
ALTER TABLE `petvet`
  MODIFY `vet_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runner_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
