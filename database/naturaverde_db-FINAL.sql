-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naturaverde_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE `cancellation` (
  `cancel_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `other_reason` text NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoryimages_tbl`
--

CREATE TABLE `categoryimages_tbl` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoryimages_tbl`
--

INSERT INTO `categoryimages_tbl` (`id`, `category_id`, `img_url`) VALUES
(1, 1, '274739221_1296519430849598_968319939356263145_n.jpg'),
(2, 1, '274536718_1296519467516261_655975173771238752_n.jpg'),
(3, 1, '274633929_1296519407516267_5729779195343847664_n.jpg'),
(4, 1, '274732444_1296519397516268_3062167006153435729_n.jpg'),
(5, 2, '116101613_908556169645928_16406125997772131232312787332_n.jpg'),
(6, 2, '328499745_915449209878792_8847194247113123181729490_n.jpg'),
(7, 2, '370342909_695525925789173_9541204289871231231231236223_n.jpg'),
(8, 2, '370354750_1278619632855436_5348652480509449214_n.jpg'),
(9, 3, '083412313123_915449209878792_8847194247181729490_n.jpg'),
(10, 3, '5464231233142_915449209878792_8847194247181729490_n.jpg'),
(11, 3, '5648212512313_915449209878792_8847194247181729490_n.jpg'),
(12, 3, '54645234234242_915449209878792_8847194247181729490_n.jpg'),
(13, 4, '5612341262_915449209878792_8847194247181729490_n.jpg'),
(14, 4, '5612341262_9154492634128792_88471942423423461239490_n.jpg'),
(15, 4, '5612341262_915449209878792_8843242712312312313181729490_n.jpg'),
(16, 4, '12312915449201231238792_88471912312181729490_n.jpg'),
(17, 5, '098089452_915449209878792_8847194247181729490_n.jpg'),
(18, 5, '561234241_9154345878792_884742342349490_n.jpg'),
(19, 5, '90532342342_9154456712471792_8847194247312312490_n.jpg'),
(20, 5, '5612341262_9154234223423456729490_n.jpg'),
(21, 6, '4634132_9156732409878792_88471624239490_n.jpg'),
(22, 6, '56123655344562342_884719424895641231559490_n.jpg'),
(23, 6, '1232131234_91548764646456792_8847194247181729490_n.jpg'),
(24, 6, '56753434562_9154236545234234251729490_n.jpg'),
(25, 7, '13123534234_915449209878797834534523447194247181729490_n.jpg'),
(26, 7, '9677835345_932534756_85675675.jpg'),
(27, 7, '231654356342_915448673452792_88623523447181729490_n.jpg'),
(28, 7, '564525345_8568643562_67886743534530_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `confirm_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `checkout_status` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `details_and_packages`
--

CREATE TABLE `details_and_packages` (
  `package_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tour_package` varchar(30) NOT NULL,
  `total_guests` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `check_in_date_and_time` datetime NOT NULL,
  `check_out_date_and_time` datetime NOT NULL,
  `room_accomodation` varchar(60) NOT NULL,
  `total_package_rate` int(11) NOT NULL,
  `max_pax` int(11) NOT NULL,
  `excess_guests` int(11) NOT NULL,
  `amount_due_for_excess_guests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information_details`
--

CREATE TABLE `information_details` (
  `client_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` bigint(15) NOT NULL,
  `address` varchar(60) NOT NULL,
  `email_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_inclusions`
--

CREATE TABLE `package_inclusions` (
  `inclusion_id` int(11) NOT NULL,
  `inclusion_name` text NOT NULL,
  `inclusion_for` set('day','night','overnight','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_inclusions`
--

INSERT INTO `package_inclusions` (`inclusion_id`, `inclusion_name`, `inclusion_for`) VALUES
(1, 'Function Hall', 'day,night,overnight'),
(2, 'Karaoke', 'day,night,overnight'),
(3, 'Infinity & Kiddie Pool', 'day,night,overnight,'),
(4, 'Half Basketball Court', 'day,night,overnight,'),
(5, 'Board/Card Games', 'day,night,overnight,'),
(6, 'Shower & Changing Area', 'day,night,overnight,'),
(7, 'Kitchen w/ Gas Stove, Ref & Freezer, Water Dispenser, & Grill', 'day,night,overnight,'),
(8, 'Unlimited refill of drinking water', 'day,night,overnight,'),
(9, '24/7 Standby Generator', 'day,night,overnight,'),
(10, 'Secure parking ', 'day,night,overnight,'),
(11, 'Pool Loungers and Umbrellas', 'day,night,overnight,'),
(12, 'Pool Loungers and Umbrellas', 'day,night,overnight,'),
(13, 'Jogging/Bike Trail', 'day,night,overnight,'),
(14, 'Gazebos', 'day,night,overnight,'),
(15, 'Grilling Area', 'day,night,overnight,'),
(16, 'Unlimited Wireless Internet Connection', 'day,night,overnight,'),
(17, 'Split-type, air-conditioning in all room accommodations', 'day,night,overnight,'),
(20, 'Package 101', 'day');

-- --------------------------------------------------------

--
-- Table structure for table `package_prices`
--

CREATE TABLE `package_prices` (
  `price_id` int(11) NOT NULL,
  `package_name` varchar(30) NOT NULL,
  `package_price` int(11) NOT NULL,
  `package_type` varchar(30) NOT NULL,
  `attribute` varchar(30) NOT NULL,
  `max_pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_prices`
--

INSERT INTO `package_prices` (`price_id`, `package_name`, `package_price`, `package_type`, `attribute`, `max_pax`) VALUES
(1, 'day tour', 15001, 'day', 'day price', 0),
(2, 'night tour', 18002, 'night', 'night price', 0),
(3, '1 villa', 15000, 'overnight', 'main room', 6),
(4, '2 villas', 24005, 'overnight', 'main room', 12),
(5, '2 villas and 1 small dorm', 25000, 'overnight', 'main room', 20),
(6, '2 villas and 1 big dorms', 36007, 'overnight', 'main room', 26),
(7, '2 villas and 2 dorms', 40005, 'overnight', 'main room', 35),
(10, 'day tour', 355, 'excess', 'excess price', 0),
(11, 'overnight', 1001, 'excess', 'excess price', 0),
(12, 'day tour pax', 21, 'pax', 'maximum pax for day tour', 0),
(13, 'night tour pax', 23, 'pax', 'maximum pax for night tour', 0),
(14, 'night tour', 356, 'excess', 'excess price', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_time`
--

CREATE TABLE `package_time` (
  `id` int(11) NOT NULL,
  `package_name` varchar(30) NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_time`
--

INSERT INTO `package_time` (`id`, `package_name`, `check_in_time`, `check_out_time`) VALUES
(1, 'day tour', '09:00:00', '18:00:00'),
(2, 'night tour', '12:00:00', '21:00:00'),
(3, 'overnight tour', '14:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `total_package_rate` int(11) NOT NULL,
  `due_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resortcategory_tbl`
--

CREATE TABLE `resortcategory_tbl` (
  `id` int(11) NOT NULL,
  `categorytitle` varchar(255) DEFAULT NULL,
  `categorydescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resortcategory_tbl`
--

INSERT INTO `resortcategory_tbl` (`id`, `categorytitle`, `categorydescription`) VALUES
(1, 'Big Dorm', 'Accommodate large groups comfortably in our spacious and well-equipped dormitory, perfect for gatherings of 15 to 26 people.\r\n'),
(2, 'Pool', 'Immerse yourself in pure bliss and unwind by taking a dip in our sparkling swimming pool, offering a refreshing oasis for relaxation and enjoyment.'),
(3, 'Parking', 'Conveniently park your vehicles at our secure and spacious parking area to ensure a hassle-free stay.'),
(4, 'Function Hall', 'Celebrate your special occasions in style at our elegant function hall, equipped with modern audiovisual facilities, capable of hosting up to 100 guests.\r\n'),
(5, 'Resort Amenities', 'Experience the ultimate in relaxation and recreation with our range of resort amenities, including a basketball half court for active enjoyment, complimentary Wi-Fi for staying connected, and a cozy mini hall for intimate gatherings and events.'),
(6, 'Green Spaces', 'Surround yourself with nature\'s beauty in our expansive green spaces, including a working farm where you can indulge in sustainable agriculture, pick fresh produce, and discover the joys of harmonious coexistence with the environment.'),
(7, 'Fruits', 'Delight in the luscious flavors of nature\'s bounty as you indulge in our farm-fresh fruits, handpicked at their peak ripeness to ensure a delectable experience throughout your stay.');

-- --------------------------------------------------------

--
-- Table structure for table `termsandconditions_tbl`
--

CREATE TABLE `termsandconditions_tbl` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termsandconditions_tbl`
--

INSERT INTO `termsandconditions_tbl` (`id`, `description`) VALUES
(1, '• CHECK IN AND CHECK OUT: For overnight guests, standard check in time is at 2:00PM and check out time is at 11:00AM. For Day Tour guests, check in time is 9AM and check out time is 5PM. Please give our staff ample time to clean the room and surroundings for our next guests who will be checking-in at the resort. An additional 3000PHP per hour will be charged to guests for early check-in and/or late check-out. All guests are required to register at the reception upon entry at the resort.\r\n\r\n• VISITORS: (Additional charges in this in this paragraph apply to overnight tour package): In the interest of your well-being and security, all visitors are required to register at the reception for a fee of 500PHP per head, regardless of whether they will use the resort amenities such as swimming pool, function hall, karaoke, basketball court, kitchen, and shower areas or not. Visitors are not allowed to stay at the resort. The resort gates will be locked by 11PM, and therefore all visitors will be requested to leave the resort premises by 11PM as well.\r\n\r\n• ROOM CAPACITY: A fee of 1000PHP per person will be charged in excess of the maximum number of occupants permitted for each respective room type. The resort reserves the right to refuse entry to any additional guest exceeding the maximum number of occupancies allowed for each room type.\r\n\r\n• RESERVATIONS: For official reservations, we require fifty percent (50%) down payment at the time of booking. Reservations are on first come first serve basis. The remaining balance must be settled upon check-in and a 5000PHP deposit will be asked from guests for incidental charges and/or damages. If no incidental charges and/or damages were incurred throughout the guests\' stay, the 5000PHP deposit will be fully refunded to guests.\r\n\r\n• CANCELLATIONS: Strictly no refunds for reservations cancelled 6 days before check-in date and for early check-outs. However, guests can reschedule their stay depending on the resort\'s availability. Rescheduling/rebooking will be free of charge.\r\n\r\n• PAYMENTS: Payments for bookings and reservations must be made either by cash or bank transfer only. For bank transfers, please ask our resort manager for the resort’s bank account information Once bank transfer is made, kindly email us a copy of the receipt or deposit slip to __________________________ as soon as possible. Once your payment is confirmed, we will send your booking confirmation via email.\r\n\r\n• ON CALLS: For on call and text bookings, we will hold the dates for you for 24 hours only. If after 24 hours we have not yet received any down payments, bookings will automatically be canceled to give way to other guests that are willing to comply with our policies.\r\n\r\n• DAMAGES: Guests shall not move furnishings or interfere with the electrical network or any other installations in the rooms or in the premises of the resort without the consent of the resort\'s management. Guests are required to pay for any loss damage caused to the resort\'s property due to improper use or negligence. Willful damage or defacing or resort property will be cause for immediate eviction and prosecution.\r\n\r\n• SECURITY: For your safety and security, CCTVs are installed in the premises of the resort. Firearms and other deadly weapons are strictly prohibited, and anyone caught will be automatically escorted out of the resort. Common courtesy must prevail between all persons in the resort. Profane, abusive, or threatening language, or action directed of resort personnel or guests are strictly prohibited. Any guest whose actions interfere with the operations of the resort will be evicted.\r\n\r\n• THUNDERS AND LIGHTNINGS: In case of thunders and lightning, swimming pool must be cleared of all swimmers at the first clap of thunder or lightning, or any other dangerous weather condition. The pool must main cleared for 45 minutes at the last clap of thunder or lightning. Guests must remain at least 20 feet away from the deck. If the weather worsens, the pool and its surrounding areas must be vacated. The resort management reserves the right to deny the use of pool to anyone as they deem necessary.\r\n\r\n• FORCE MAJEURE: Natura Verde Farm and Private Resort shall not be held liable to the guest or travel agency or operation by reason of any failure or delay in performing its obligations under this agreement if the delay or failure caused by force majeure. Any additional expenses incurred from changes in schedule brought about by the weather, road, and local conditions shall be borne by the guests or travel agencies/operators. However, best effort will be extended in assisting the guests in safeguarding their interests. In case cancellations are due to fortuitous events, force majeure, or Acts of God as defined by Philippine law, both parties make an agreement for scheduling. If rescheduling is not possible due to time and/or occupancy restraint, both parties will make a settlement and restitution, taking into consideration that none is at fault.\r\n\r\n• SAFETY AND WAIVER: Natura Verde Farm and Private Resort will not be held responsible for risks, injuries, accidents, or deaths inside and outside the resort premises. Natura Verde Farm and Private Resort will not be held responsible for expenses incurred due to airline, bus, ferry delays or cancellations, lost luggage, health issues, and any other unwanted and unforeseen scenarios and/or events.\r\n\r\n• FOOD AND BEVERAGES: Guest can bring foods and beverages inside the resort with no corkage fee. No eating and drinking near or in the pool area. Cooking of food inside the villas and pavilion are strictly prohibited. A kitchen and grilling nook are provided for your convenience. Glass containers are not allowed inside the resort; hence, all bags and luggage will be subject to inspection upon entry. By bringing your own food and drinks, guests hereby release Nature Verde Farm and Private Resort from any and all responsibility for any injury or illness resulting from consumption of any food or beverage which Natura Verde Farm and Private Resort did not prepare, distribute, or provide.\r\n\r\n• Bringing of sound systems, speakers, or any other musical instruments must be registered upon check-in. The management reserves the right to limit the bringing of such items inside the resort.\r\n\r\n• We welcome small to medium sized dogs that have updated vaccine records and are potty-trained. A maximum of 2 dogs will be allowed at the resort and they will have their own designated sleeping area. Pets will not be allowed to sleep inside the rooms. Please strictly comply for all guest’ safety and convenience.\r\n\r\n• Smoking is strictly prohibited inside the rooms and anyone caught will be subjected to a fine of 5000PHP per person. A designated smoking area near the parking is provided for guests.\r\n\r\n• Natura Verde Farm and Private Resort reserved the right to amend or change its rules, terms and conditions, without prior notice for the reservation, safety, control and orderly operation of the resort.\r\n\r\n• COVID 19: With the current global pandemic COVID-19, Natura Verde Farm and Private Resort will require all guest and visitors to have their temperature taken upon entry, to wear face masks and face shields, and to observe social distancing while inside the premises of the resort. All guests are strictly required to follow these directives and any violation committed will be solely accounted for by the guests and visitors of Natura Verde Farm and Private Resort.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `email` text NOT NULL,
  `phonenumber` text NOT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `verification_code` int(6) NOT NULL,
  `reset_code` int(6) NOT NULL,
  `code_expire` int(11) NOT NULL,
  `email_verified_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD PRIMARY KEY (`cancel_id`),
  ADD KEY `id` (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `categoryimages_tbl`
--
ALTER TABLE `categoryimages_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`confirm_id`),
  ADD KEY `client_id` (`package_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `details_and_packages`
--
ALTER TABLE `details_and_packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `information_details`
--
ALTER TABLE `information_details`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `package_inclusions`
--
ALTER TABLE `package_inclusions`
  ADD PRIMARY KEY (`inclusion_id`);

--
-- Indexes for table `package_prices`
--
ALTER TABLE `package_prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `package_time`
--
ALTER TABLE `package_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `client_id` (`package_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `resortcategory_tbl`
--
ALTER TABLE `resortcategory_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termsandconditions_tbl`
--
ALTER TABLE `termsandconditions_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cancellation`
--
ALTER TABLE `cancellation`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoryimages_tbl`
--
ALTER TABLE `categoryimages_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `confirm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details_and_packages`
--
ALTER TABLE `details_and_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information_details`
--
ALTER TABLE `information_details`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_inclusions`
--
ALTER TABLE `package_inclusions`
  MODIFY `inclusion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `package_prices`
--
ALTER TABLE `package_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `package_time`
--
ALTER TABLE `package_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resortcategory_tbl`
--
ALTER TABLE `resortcategory_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `termsandconditions_tbl`
--
ALTER TABLE `termsandconditions_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD CONSTRAINT `cancellation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cancellation_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `details_and_packages` (`package_id`);

--
-- Constraints for table `categoryimages_tbl`
--
ALTER TABLE `categoryimages_tbl`
  ADD CONSTRAINT `categoryimages_tbl_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `resortcategory_tbl` (`id`);

--
-- Constraints for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD CONSTRAINT `confirmation_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `details_and_packages` (`package_id`),
  ADD CONSTRAINT `confirmation_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `details_and_packages`
--
ALTER TABLE `details_and_packages`
  ADD CONSTRAINT `details_and_packages_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `information_details`
--
ALTER TABLE `information_details`
  ADD CONSTRAINT `information_details_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `details_and_packages` (`package_id`),
  ADD CONSTRAINT `information_details_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `details_and_packages` (`package_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
