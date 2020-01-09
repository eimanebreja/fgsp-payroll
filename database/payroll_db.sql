-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2020 at 06:43 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_date`
--

CREATE TABLE `tbl_date` (
  `date_id` int(11) NOT NULL,
  `payroll_sched` varchar(100) NOT NULL,
  `cutoff_sched` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_date`
--

INSERT INTO `tbl_date` (`date_id`, `payroll_sched`, `cutoff_sched`) VALUES
(30, 'October 06, 2019', 'September 15 - 30, 2019'),
(39, 'Sample 2', 'Sample 2'),
(40, 'November 5, 2019', 'September 15 - 30, 2019'),
(41, 'November 5, 2019', 'September 15 - 30, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduction`
--

CREATE TABLE `tbl_deduction` (
  `deduc_id` int(11) NOT NULL,
  `deduc_late` decimal(10,2) NOT NULL,
  `deduc_absent` decimal(10,2) NOT NULL,
  `deduc_pagibig` decimal(10,2) NOT NULL,
  `deduc_sss` decimal(10,2) NOT NULL,
  `deduc_philhealth` decimal(10,2) NOT NULL,
  `deduc_undertime` decimal(10,2) NOT NULL,
  `deduc_tax` decimal(10,2) NOT NULL,
  `deduc_total` decimal(10,2) NOT NULL,
  `emp_no` varchar(11) NOT NULL,
  `salary_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_earnings`
--

CREATE TABLE `tbl_earnings` (
  `earn_id` int(11) NOT NULL,
  `earn_salary` decimal(10,2) NOT NULL,
  `earn_allowance` decimal(10,2) NOT NULL,
  `earn_overtime` decimal(10,2) NOT NULL,
  `earn_incentives` decimal(10,2) NOT NULL,
  `earn_reimburse` decimal(10,2) NOT NULL,
  `earn_total` decimal(10,2) NOT NULL,
  `emp_no` varchar(100) NOT NULL,
  `payroll_sched` varchar(100) NOT NULL,
  `salary_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_position` varchar(100) NOT NULL,
  `emp_no` varchar(100) NOT NULL,
  `emp_dhired` varchar(100) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_contact` varchar(100) NOT NULL,
  `emp_bday` varchar(100) NOT NULL,
  `emp_philhealth` varchar(100) NOT NULL,
  `emp_sss` varchar(100) NOT NULL,
  `emp_pagibig` varchar(100) NOT NULL,
  `emp_tin` varchar(100) NOT NULL,
  `emp_ecp` varchar(100) NOT NULL,
  `emp_ecp_no` varchar(100) NOT NULL,
  `emp_bdo_account` varchar(100) NOT NULL,
  `emp_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_name`, `emp_position`, `emp_no`, `emp_dhired`, `emp_email`, `emp_contact`, `emp_bday`, `emp_philhealth`, `emp_sss`, `emp_pagibig`, `emp_tin`, `emp_ecp`, `emp_ecp_no`, `emp_bdo_account`, `emp_image`) VALUES
(34, 'Nimuel Eiman Mercado Nebreja', 'Web Developer', '001', 'October 24, 2019', 'nimuel.eiman.nebreja@fgsp.ph', '09759542126', '', '', '', '', '', '', '', '', 'upload/16707653_1737535096557171_4128624454400864790_o.jpg'),
(47, 'Mildred  Lasac', 'Designer', '002', 'January 14, 2020', 'mildred@gmail.com', '', '', '', '', '', '', '', '', '', 'upload/Accelfactor_6 copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` varchar(50) NOT NULL,
  `event_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `expenses_id` int(11) NOT NULL,
  `expenses_category` varchar(150) NOT NULL,
  `expenses_month` varchar(150) NOT NULL,
  `expenses_date` varchar(150) NOT NULL,
  `expenses_name` varchar(150) NOT NULL,
  `expenses_payable_to` varchar(150) NOT NULL,
  `expenses_amount` decimal(10,2) NOT NULL,
  `expenses_check_number` varchar(150) NOT NULL,
  `check_payment_date` varchar(150) NOT NULL,
  `expenses_quantity` varchar(150) NOT NULL,
  `expenses_tin_number` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`expenses_id`, `expenses_category`, `expenses_month`, `expenses_date`, `expenses_name`, `expenses_payable_to`, `expenses_amount`, `expenses_check_number`, `check_payment_date`, `expenses_quantity`, `expenses_tin_number`) VALUES
(24, '2', 'October 2019', 'October 4, 2019', 'Internet', 'Infinivan', '24192.00', '', 'Paid', '', ''),
(25, '2', 'October 2019', 'October 4, 2019', 'Rent', 'Cityland Conduminium', '76.00', '', 'Paid', '', ''),
(26, '3', 'October 2019', 'December 3, 2019', 'Water', '', '150.00', '', '', '3', ''),
(27, '2', 'November 2019', 'November 4, 2019', 'Monthly Dues', 'Cityland Development Corporation', '7.00', 'PDC', 'Paid', '', ''),
(28, '2', 'December 2019', 'December 2, 2019', 'Electricity', 'Cityland', '8576.00', 'PDC', 'Paid', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overview`
--

CREATE TABLE `tbl_overview` (
  `over_id` int(11) NOT NULL,
  `earn_salary` decimal(10,2) NOT NULL,
  `earn_allowance` decimal(10,2) NOT NULL,
  `earn_overtime` decimal(10,2) NOT NULL,
  `earn_incentives` decimal(10,2) NOT NULL,
  `earn_reimburse` decimal(10,2) NOT NULL,
  `earn_other` decimal(10,2) NOT NULL,
  `earn_total` decimal(10,2) NOT NULL,
  `deduc_late` decimal(10,2) NOT NULL,
  `deduc_absent` decimal(10,2) NOT NULL,
  `deduc_pagibig` decimal(10,2) NOT NULL,
  `deduc_sss` decimal(10,2) NOT NULL,
  `deduc_philhealth` decimal(10,2) NOT NULL,
  `deduc_undertime` decimal(10,2) NOT NULL,
  `deduc_tax` decimal(10,2) NOT NULL,
  `deduc_total` decimal(10,2) NOT NULL,
  `emp_no` varchar(100) NOT NULL,
  `salary_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_overview`
--

INSERT INTO `tbl_overview` (`over_id`, `earn_salary`, `earn_allowance`, `earn_overtime`, `earn_incentives`, `earn_reimburse`, `earn_other`, `earn_total`, `deduc_late`, `deduc_absent`, `deduc_pagibig`, `deduc_sss`, `deduc_philhealth`, `deduc_undertime`, `deduc_tax`, `deduc_total`, `emp_no`, `salary_status`) VALUES
(172, '200.00', '0.00', '0.00', '0.00', '0.00', '0.00', '200.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '001', 'Approved'),
(173, '200.00', '0.00', '0.00', '0.00', '0.00', '0.00', '200.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '002', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `salary_id` int(11) NOT NULL,
  `salary_status` varchar(100) NOT NULL,
  `payroll_sched` varchar(100) NOT NULL,
  `cutoff_sched` varchar(100) NOT NULL,
  `emp_no` varchar(100) NOT NULL,
  `over_id` int(100) NOT NULL,
  `transac_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_salary`
--

INSERT INTO `tbl_salary` (`salary_id`, `salary_status`, `payroll_sched`, `cutoff_sched`, `emp_no`, `over_id`, `transac_status`) VALUES
(484, 'Approved', 'January 6, 2020', 'January 7, 2020', '001', 172, 1),
(485, 'Approved', 'January 6, 2020', 'January 7, 2020', '002', 173, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_pass`, `user_status`) VALUES
(1, 'admin', 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_date`
--
ALTER TABLE `tbl_date`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `tbl_deduction`
--
ALTER TABLE `tbl_deduction`
  ADD PRIMARY KEY (`deduc_id`);

--
-- Indexes for table `tbl_earnings`
--
ALTER TABLE `tbl_earnings`
  ADD PRIMARY KEY (`earn_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Indexes for table `tbl_overview`
--
ALTER TABLE `tbl_overview`
  ADD PRIMARY KEY (`over_id`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_date`
--
ALTER TABLE `tbl_date`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_deduction`
--
ALTER TABLE `tbl_deduction`
  MODIFY `deduc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_earnings`
--
ALTER TABLE `tbl_earnings`
  MODIFY `earn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_overview`
--
ALTER TABLE `tbl_overview`
  MODIFY `over_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
