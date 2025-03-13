-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 07:30 PM
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
-- Database: `swap project`
--

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `Consult ID` int(10) NOT NULL,
  `Full Name` varchar(255) NOT NULL,
  `Contact Number or Email` varchar(255) NOT NULL,
  `Consult Subject` varchar(128) NOT NULL,
  `Consult Request` varchar(1000) NOT NULL,
  `Booked Date` datetime NOT NULL,
  `Date of Request` datetime NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`Consult ID`, `Full Name`, `Contact Number or Email`, `Consult Subject`, `Consult Request`, `Booked Date`, `Date of Request`, `Status`) VALUES
(1, 'Jasper Willis', 'JasperW001@mail.com', 'Collaboration with TP AMC', 'I hope this message finds you well. I am Jasper Willis from Quantum Innovations Tech, reaching out to explore potential collaboration and seek expertise from your Advanced Manufacturing Centre.\r\n\r\nWe are keen to schedule a consultation to discuss how your center can contribute to enhancing our manufacturing processes. Specifically, we are interested in:\r\n\r\nAdvanced Additive Manufacturing: Exploring applications of 3D printing for product development and prototyping.\r\n\r\nSmart Manufacturing Systems: Seeking insights into implementing intelligent systems to optimize efficiency.\r\n\r\nRobotics and Automation: Exploring integration for streamlined production and increased productivity.\r\n\r\nWe believe your cutting-edge technologies and knowledge could significantly benefit our operations. If possible, could we schedule a consultation to delve deeper into our requirements and potential areas of collaboration? Additionally, please let us know if any specific documents or prerequisites are necessar', '2024-02-14 10:00:00', '2024-01-01 18:26:01', 'APPROVED'),
(2, 'Alfred Reed', '78144311', 'Consultation Inquiry for Innovative Manufacturing Solutions', 'I hope this message finds you well. My name is Alfred Reed, and I represent Nebula Dynamics Solutions. We are reaching out to explore the possibility of scheduling a consultation with your esteemed team at Temasek Polytechnic Advanced Manufacturing Centre.\r\n\r\nOur company is currently in the process of enhancing our manufacturing capabilities, and we believe that the expertise and resources offered by your Advanced Manufacturing Centre could provide invaluable insights.\r\n\r\nSpecifically, we are interested in discussing the implementation of advanced technologies in our production processes. This includes exploring the applications of 3D printing, smart manufacturing systems, and robotics. We are keen to understand how these technologies can be tailored to our unique requirements to optimize efficiency and streamline our operations.\r\n\r\nIf possible, we would like to schedule a consultation at your earliest convenience to delve deeper into our specific needs and explore potential collaborat', '2024-04-01 01:30:00', '2023-11-14 09:59:15', 'APPROVED'),
(3, 'Rosalinda Pam', 'RosaPam@mail.com', 'Unorthodox Consultation Request for Unconventional Business Endeavors', 'I hope this peculiar message reaches you in a state of cosmic curiosity. My name is Rosalinda Pam, and I represent Quirk Centric Inc, a trailblazing enterprise dedicated to pushing the boundaries of rationality.\r\n\r\nWe have embarked on an avant-garde quest to revolutionize the mundane and mundane-ize the revolutionary. In this spirit, we seek your unparalleled expertise for a consultation that defies the norms of typical business inquiries. Our agenda is as follows:\r\n\r\nTelepathic Project Management: We envision a future where project updates are transmitted directly to team members\' minds. Can your center harness the power of extrasensory perception to make this a reality?\r\n\r\nBiodegradable Quantum Computing: Traditional computers are so passé. We\'re looking for a sustainable alternative involving biodegradable quantum bits. Can your team warp the laws of quantum physics to align with environmental ethics?\r\n\r\nTime-Travel Integration in Supply Chain: Anticipating market trends is so yeste', '2024-04-01 00:00:00', '2023-12-25 00:00:00', 'DENIED'),
(4, 'Bonnie', 'BonnieFFP@mail.com', 'Collaboration with TP AMC', 'My name is Bonnie, and I am representing SynthoSpark Technologies, a Virtual Reality Tourism Industry firm committed to optimizing our operational processes.\r\n\r\nWe are interested in scheduling a consultation with your team at TP AMC to explore ways to enhance our efficiency and productivity. Our primary focus areas include:\r\n\r\nWorkflow Automation: We are keen on understanding how automation technologies can be strategically implemented to streamline routine tasks and reduce manual intervention in our processes.\r\n\r\nData Analytics Integration: Exploring the integration of advanced data analytics to gain actionable insights and improve decision-making across various departments.\r\n\r\nSupply Chain Optimization: Assessing opportunities to enhance our supply chain management through technology-driven solutions, with a particular emphasis on inventory control and demand forecasting.\r\n\r\nIf feasible, we would appreciate the opportunity to discuss our specific requirements and gain insights into b', '2024-07-20 17:30:00', '2024-01-13 18:37:13', 'PENDING'),
(5, 'Mervin Liu', 'MervGM@mail.com', 'Consultation Inquiry for Revolutionary Manufacturing Solutions', 'My name is Mervin Liu, and I represent FuturumForge Technologies, an innovative company at the forefront of revolutionizing manufacturing processes.\r\n\r\nWe have been following the groundbreaking work of your Advanced Manufacturing Centre and are keen to explore potential collaboration opportunities. Our company is on a quest to redefine traditional manufacturing norms, and we believe your expertise aligns seamlessly with our vision.\r\n\r\nSpecifically, we are interested in delving into the following areas during a consultation:\r\n\r\nAdvanced Materials Integration: Exploring novel materials and their applications in manufacturing to enhance product durability and performance.\r\n\r\nSmart Factory Implementation: Seeking insights on the integration of IoT and smart manufacturing technologies to create a more connected and efficient production environment.\r\n\r\nSustainable Manufacturing Practices: Exploring environmentally friendly approaches and processes that align with our commitment to sustainabi', '2024-06-30 10:00:00', '2024-01-09 01:41:39', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `employee attendance`
--

CREATE TABLE `employee attendance` (
  `User ID` int(8) NOT NULL,
  `Punch In Time` time NOT NULL,
  `Punch Out Time` time NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee attendance`
--

INSERT INTO `employee attendance` (`User ID`, `Punch In Time`, `Punch Out Time`, `Date`) VALUES
(3, '08:55:26', '17:17:41', '2024-01-13'),
(3, '08:59:41', '17:00:41', '2024-01-11'),
(2, '08:49:27', '17:00:29', '2024-01-08'),
(2, '08:59:24', '17:00:42', '2024-01-10'),
(4, '09:00:30', '05:00:24', '2024-01-08'),
(4, '08:45:09', '17:13:30', '2024-01-10'),
(5, '08:59:19', '17:24:13', '2024-01-09'),
(5, '09:24:19', '17:12:30', '2024-01-12'),
(6, '09:26:33', '18:00:28', '2024-01-11'),
(6, '08:26:30', '18:11:34', '2024-01-12'),
(7, '09:12:43', '17:17:30', '2024-01-13'),
(7, '08:59:21', '17:13:17', '2024-01-14'),
(8, '09:13:40', '18:14:59', '2024-01-11'),
(8, '09:00:50', '17:46:20', '2024-01-12'),
(9, '08:28:34', '17:59:20', '2024-01-13'),
(9, '08:59:34', '17:00:34', '2024-01-14'),
(10, '09:00:14', '17:29:00', '2024-01-12'),
(10, '08:47:21', '17:14:59', '2024-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `employee leave`
--

CREATE TABLE `employee leave` (
  `User ID` int(8) NOT NULL,
  `Leave ID` int(10) NOT NULL,
  `From Date` date NOT NULL,
  `To Date` date NOT NULL,
  `Reason For Leave` varchar(255) NOT NULL,
  `Application Date` datetime NOT NULL,
  `Attachment` varchar(255) NOT NULL,
  `Status` varchar(8) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee leave`
--

INSERT INTO `employee leave` (`User ID`, `Leave ID`, `From Date`, `To Date`, `Reason For Leave`, `Application Date`, `Attachment`, `Status`, `Type`) VALUES
(2, 2, '2024-01-10', '2024-01-13', 'lazy', '2024-01-09 10:19:38', 'shrug.png', 'DENIED', 'LEAVE'),
(3, 4, '2024-03-20', '2024-03-21', 'Brother\'s Wedding', '2024-01-13 08:02:40', 'weddinginvitation.png', 'PENDING', 'LEAVE'),
(4, 3, '2024-01-24', '2024-01-25', 'Doctor\'s Appointment', '2024-01-16 09:00:44', 'appointment.jpg', 'PENDING', 'LEAVE'),
(9, 1, '2024-01-17', '2024-01-17', 'Daughter\'s High School Graduation on 2024/01/17', '2024-01-10 14:23:28', 'graduationinvite.png', 'APPROVED', 'CHILD'),
(10, 5, '2024-01-17', '2024-01-17', 'Son was sick, had to fetch to a clinic.', '2024-01-18 17:14:21', 'sonclinicbill.png', 'PENDING', 'LEAVE');

-- --------------------------------------------------------

--
-- Table structure for table `employee mc`
--

CREATE TABLE `employee mc` (
  `User ID` int(8) NOT NULL,
  `MC Number` int(10) NOT NULL,
  `Clinic Name` varchar(255) NOT NULL,
  `From Date` date NOT NULL,
  `To Date` date NOT NULL,
  `Status` varchar(8) NOT NULL,
  `Application Date` datetime NOT NULL,
  `Attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee mc`
--

INSERT INTO `employee mc` (`User ID`, `MC Number`, `Clinic Name`, `From Date`, `To Date`, `Status`, `Application Date`, `Attachment`) VALUES
(2, 2, 'Vitality Medical Center', '2024-01-02', '2024-01-06', 'DENIED', '2024-01-02 19:31:10', 'hdlreceipt.pdf'),
(4, 3, 'Zenith Family Health', '2023-12-20', '2023-12-22', 'APPROVED', '2023-12-20 03:32:21', 'rosannamc15231.jpg'),
(6, 5, 'Horizon Health Center', '2024-01-18', '2024-01-20', 'PENDING', '2024-01-18 11:33:18', 'edgarmc12485.jpg\r\n'),
(7, 4, 'NovaMed General Practice', '2024-01-20', '2024-01-21', 'PENDING', '2024-01-19 10:52:24', 'caelanmc23451.jpg'),
(8, 1, 'WellSpring Clinic', '2024-01-08', '2024-01-10', 'APPROVED', '2024-01-01 09:49:01', 'mavismc09123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User ID` int(8) NOT NULL,
  `First Name` varchar(50) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone Number` int(8) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User ID`, `First Name`, `Last Name`, `Email`, `Phone Number`, `Role`, `Password`) VALUES
(1, 'Annmaerie', 'Yu', 'HR_Manager_1@TPAMC.live.com', 78819901, 'HR Manager', 'AnnYu01'),
(2, 'Rachelle', 'Tan', 'RT_Employee@TPAMC.live.com', 71230984, 'Employee', 'RacTan02'),
(3, 'Basil', 'Wu', 'BW_Employee@TPAMC.live.com', 72309189, 'Employee', 'BasWu03'),
(4, 'Rosanna', 'Wong', 'RW_Employee@TPAMC.live.com', 78230911, 'Employee', 'RosWong04'),
(5, 'Edgar', 'Leong', 'EL_Employee@TPAMC.live.com', 78019231, 'Employee', 'EdgLeong05'),
(6, 'Edgar ', 'Oliver', 'EO_Employee@TPAMC.live.com', 78834091, 'Employee', 'EdgOliver06'),
(7, 'Caelan', 'Nye', 'CN_Employee@TPAMC.live.com', 78831912, 'Employee', 'CaeNye07'),
(8, 'Mavis', 'Lu', 'ML_Employee@TPAMC.live.com', 73409123, 'Employee', 'MavLu08'),
(9, 'Agnes', 'Tan', 'AT_Employee@TPAMC.live.com', 77312309, 'Employee', 'AgnTan09'),
(10, 'Arron', 'Leo', 'AL_Employee@TPAMC.live.com', 76641092, 'Employee', 'ArrLeo10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD UNIQUE KEY `Consult ID` (`Consult ID`);

--
-- Indexes for table `employee attendance`
--
ALTER TABLE `employee attendance`
  ADD KEY `Employee Attendance2` (`User ID`);

--
-- Indexes for table `employee leave`
--
ALTER TABLE `employee leave`
  ADD UNIQUE KEY `User ID` (`User ID`,`Leave ID`);

--
-- Indexes for table `employee mc`
--
ALTER TABLE `employee mc`
  ADD UNIQUE KEY `User ID` (`User ID`,`MC Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User ID`),
  ADD UNIQUE KEY `User ID` (`User ID`,`Email`,`Phone Number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee attendance`
--
ALTER TABLE `employee attendance`
  ADD CONSTRAINT `Employee Attendance` FOREIGN KEY (`User ID`) REFERENCES `users` (`User ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee leave`
--
ALTER TABLE `employee leave`
  ADD CONSTRAINT `Employee Leave` FOREIGN KEY (`User ID`) REFERENCES `users` (`User ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee mc`
--
ALTER TABLE `employee mc`
  ADD CONSTRAINT `Employee MC` FOREIGN KEY (`User ID`) REFERENCES `users` (`User ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
