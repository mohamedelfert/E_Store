-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2020 at 11:50 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_clients`
--

CREATE TABLE `app_clients` (
  `ClientId` int(10) UNSIGNED NOT NULL,
  `ClientName` varchar(30) NOT NULL,
  `ClientPhone` varchar(15) NOT NULL,
  `ClientEmail` varchar(30) NOT NULL,
  `ClientAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_clients`
--

INSERT INTO `app_clients` (`ClientId`, `ClientName`, `ClientPhone`, `ClientEmail`, `ClientAddress`) VALUES
(5, 'احمد خالد محمد', '01102151487', 'ahmed@gmail.com', 'مصر , المنصوره'),
(6, 'محمد علي السيد', '01111112462', 'm@yahoo.com', 'مصر , سوهاج');

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses_categories`
--

CREATE TABLE `app_expenses_categories` (
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `ExpenseName` varchar(30) NOT NULL,
  `FixedPayment` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses_daily_list`
--

CREATE TABLE `app_expenses_daily_list` (
  `DExpensId` int(10) UNSIGNED NOT NULL,
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `Payment` decimal(7,0) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_notifications`
--

CREATE TABLE `app_notifications` (
  `NotificationId` int(10) UNSIGNED NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Type` tinyint(2) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_product_categories`
--

CREATE TABLE `app_product_categories` (
  `CatId` int(10) UNSIGNED NOT NULL,
  `CatName` varchar(30) NOT NULL,
  `CatImage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_product_list`
--

CREATE TABLE `app_product_list` (
  `ProductId` int(10) UNSIGNED NOT NULL,
  `CatId` int(10) UNSIGNED NOT NULL,
  `ProductName` varchar(30) NOT NULL,
  `ProductImage` varchar(30) NOT NULL,
  `Quntity` int(10) UNSIGNED NOT NULL,
  `Price` decimal(6,0) UNSIGNED NOT NULL,
  `Barcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices`
--

CREATE TABLE `app_purchases_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `Created` date NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_details`
--

CREATE TABLE `app_purchases_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `ProductPrice` decimal(7,2) NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_receipts`
--

CREATE TABLE `app_purchases_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentAmount` decimal(8,2) NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAccountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferedTo` varchar(30) DEFAULT NULL,
  `Created` date NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices`
--

CREATE TABLE `app_sales_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `ClintId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `Created` date NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_details`
--

CREATE TABLE `app_sales_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `ProductPrice` decimal(7,2) NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_receipts`
--

CREATE TABLE `app_sales_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentAmount` decimal(8,2) NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAccountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferedTo` varchar(30) DEFAULT NULL,
  `Created` date NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_suppliers`
--

CREATE TABLE `app_suppliers` (
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `SupplierName` varchar(30) NOT NULL,
  `SupplierPhone` varchar(15) NOT NULL,
  `SupplierEmail` varchar(30) NOT NULL,
  `SupplierAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_suppliers`
--

INSERT INTO `app_suppliers` (`SupplierId`, `SupplierName`, `SupplierPhone`, `SupplierEmail`, `SupplierAddress`) VALUES
(1, 'خالد يوسف محمد', '01233336544', 'khaled@yahoo.com', 'Egypt, Tanta'),
(3, 'سيد حامد متولي', '01555484444', 'sayed@gmail.com', 'مصر , القاهره');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` char(60) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `SubscriptionDate` date NOT NULL,
  `LastLogin` datetime NOT NULL,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`UserId`, `Username`, `Password`, `Email`, `PhoneNumber`, `SubscriptionDate`, `LastLogin`, `GroupId`, `Status`) VALUES
(1, 'mohamed', '$2a$07$yeNCSNwRpYopOhv0TrrReOKHdX2KwbMhOY1DrnoxsNk2U9Cy2OteS', 'medo@yahoo.com', '01141521054', '2019-12-30', '2020-01-01 22:29:04', 1, 1),
(2, 'علي', '$2a$07$yeNCSNwRpYopOhv0TrrReOunIisW1b8.JDsNKxyuF3O29C6ouWfCC', 'ali@yahoo.com', '01000000000', '2019-12-30', '2020-01-01 22:28:54', 2, 1),
(3, 'zinab', '$2a$07$yeNCSNwRpYopOhv0TrrReOTF7T/DenCJpSDRToDBOX7ZBEqfd.CVe', 'zinab@yahoo.com', '01200000000', '2019-12-30', '2019-12-30 21:34:46', 2, 1),
(4, 'hasan', '$2a$07$yeNCSNwRpYopOhv0TrrReOunIisW1b8.JDsNKxyuF3O29C6ouWfCC', 'hasan@yahoo.com', '01254888888', '2019-12-30', '2019-12-30 19:43:03', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups`
--

CREATE TABLE `app_users_groups` (
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `GroupName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups`
--

INSERT INTO `app_users_groups` (`GroupId`, `GroupName`) VALUES
(1, 'مدير التطبيق'),
(2, 'المحاسب'),
(3, 'أمين مخزن'),
(4, 'مجموعه تجريبية');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups_privileges`
--

CREATE TABLE `app_users_groups_privileges` (
  `Id` tinyint(3) UNSIGNED NOT NULL,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups_privileges`
--

INSERT INTO `app_users_groups_privileges` (`Id`, `GroupId`, `PrivilegeId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 2, 1),
(11, 2, 4),
(12, 2, 7),
(13, 3, 7),
(14, 3, 8),
(15, 4, 4),
(16, 1, 10),
(17, 1, 11),
(18, 1, 12),
(19, 1, 13),
(20, 1, 14),
(21, 1, 15),
(22, 1, 16),
(23, 1, 17),
(24, 1, 18),
(25, 1, 19),
(26, 1, 20),
(27, 1, 21),
(28, 1, 22),
(29, 1, 23),
(30, 1, 24),
(31, 1, 25),
(32, 1, 26),
(33, 1, 27),
(34, 1, 28),
(35, 1, 29),
(36, 1, 30),
(37, 1, 31),
(38, 1, 32),
(39, 1, 33),
(43, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_privileges`
--

CREATE TABLE `app_users_privileges` (
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL,
  `Privilege` varchar(30) NOT NULL,
  `PrivilegeTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_privileges`
--

INSERT INTO `app_users_privileges` (`PrivilegeId`, `Privilege`, `PrivilegeTitle`) VALUES
(1, 'انشاء مستخدم جديد', '/users/add'),
(2, 'تعديل بيانات مستخدم', '/users/edit'),
(3, 'حذف مستخدم', '/users/delete'),
(4, 'انشاء قسم جديد', '/productcategories/add'),
(5, 'تعديل قسم', '/productcategories/edit'),
(6, 'حذف قسم', '/productcategories/delete'),
(7, 'انشاء فاتوره مبيعات', '/sales/add'),
(8, 'تعديل فاتوره مبيعات', '/sales/edit'),
(9, 'حذف فاتوره مبيعات', '/sales/delete'),
(10, 'الصلاحيات', '/privileges/default'),
(11, 'المستخدمين', '/users/default'),
(12, 'مجموعات المستخدمين', '/usersgroups/default'),
(13, 'انشاء مجموعه مستخدمين جديده', '/usersgroups/add'),
(14, 'تعديل مجموعه مستخدمين', '/usersgroups/edit'),
(15, 'حذف مجموعه مستخدمين', '/usersgroups/delete'),
(16, 'اضافة صلاحية جديده', '/privileges/add'),
(17, 'تعديل صلاحيه', '/privileges/edit'),
(18, 'حذف صلاحية', '/privileges/delete'),
(19, 'المبيعات', '/sales/default'),
(20, 'المشتريات', '/purchases/default'),
(21, 'انشاء فاتوره مشتريات', '/purchases/add'),
(22, 'تعديل فاتوره مشتريات', '/purchases/edit'),
(23, 'حذف فاتوره مشتريات', '/purchases/delete'),
(24, 'انواع المصروفات', '/expensescategories/default'),
(25, 'المصروفات اليومية', '/dailyexpenses/default'),
(26, 'الموردين', '/suppliers/default'),
(27, 'انشاء مورد', '/suppliers/add'),
(28, 'تعديل مورد', '/suppliers/edit'),
(29, 'حذف مورد', '/suppliers/delete'),
(30, 'العملاء', '/clients/default'),
(31, 'انشاء عميل', '/clients/add'),
(32, 'تعديل عميل', '/clients/edit'),
(33, 'حذف عميل', '/clients/delete'),
(35, 'اقسام المنتجات', '/productcategories/default');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_profiles`
--

CREATE TABLE `app_users_profiles` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Avatar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_profiles`
--

INSERT INTO `app_users_profiles` (`UserId`, `FirstName`, `LastName`, `Address`, `DateOfBirth`, `Avatar`) VALUES
(1, 'محمد', 'الفرت', 'طنطا', '1995-01-19', NULL),
(2, 'علي', 'حسن', 'cairo', '2000-09-29', NULL),
(3, 'زينب', 'خالد', 'سوهاج', '1997-09-24', NULL),
(4, 'حسن', 'حسن', 'tanta', '1990-11-29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_clients`
--
ALTER TABLE `app_clients`
  ADD PRIMARY KEY (`ClientId`),
  ADD UNIQUE KEY `ClientName` (`ClientName`),
  ADD UNIQUE KEY `ClientPhone` (`ClientPhone`),
  ADD UNIQUE KEY `ClientEmail` (`ClientEmail`);

--
-- Indexes for table `app_expenses_categories`
--
ALTER TABLE `app_expenses_categories`
  ADD PRIMARY KEY (`ExpenseId`);

--
-- Indexes for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  ADD PRIMARY KEY (`DExpensId`),
  ADD KEY `ExpenseId` (`ExpenseId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD PRIMARY KEY (`NotificationId`),
  ADD KEY `UserID` (`UserId`);

--
-- Indexes for table `app_product_categories`
--
ALTER TABLE `app_product_categories`
  ADD PRIMARY KEY (`CatId`);

--
-- Indexes for table `app_product_list`
--
ALTER TABLE `app_product_list`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CatId` (`CatId`);

--
-- Indexes for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `SupplierId` (`SupplierId`);

--
-- Indexes for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `InvoiceId` (`InvoiceId`);

--
-- Indexes for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD PRIMARY KEY (`ReceiptId`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `ClintId` (`ClintId`);

--
-- Indexes for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `InvoiceId` (`InvoiceId`);

--
-- Indexes for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD PRIMARY KEY (`ReceiptId`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_suppliers`
--
ALTER TABLE `app_suppliers`
  ADD PRIMARY KEY (`SupplierId`),
  ADD UNIQUE KEY `SupplierName` (`SupplierName`),
  ADD UNIQUE KEY `SupplierPhone` (`SupplierPhone`),
  ADD UNIQUE KEY `SupplierEmail` (`SupplierEmail`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `GroupId` (`GroupId`),
  ADD KEY `PrivilegeId` (`PrivilegeId`);

--
-- Indexes for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  ADD PRIMARY KEY (`PrivilegeId`);

--
-- Indexes for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_clients`
--
ALTER TABLE `app_clients`
  MODIFY `ClientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_expenses_categories`
--
ALTER TABLE `app_expenses_categories`
  MODIFY `ExpenseId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  MODIFY `DExpensId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_notifications`
--
ALTER TABLE `app_notifications`
  MODIFY `NotificationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_product_categories`
--
ALTER TABLE `app_product_categories`
  MODIFY `CatId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_product_list`
--
ALTER TABLE `app_product_list`
  MODIFY `ProductId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  MODIFY `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  MODIFY `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  MODIFY `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  MODIFY `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_suppliers`
--
ALTER TABLE `app_suppliers`
  MODIFY `SupplierId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  MODIFY `GroupId` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  MODIFY `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  MODIFY `PrivilegeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  ADD CONSTRAINT `app_expenses_daily_list_ibfk_1` FOREIGN KEY (`ExpenseId`) REFERENCES `app_expenses_categories` (`ExpenseId`),
  ADD CONSTRAINT `app_expenses_daily_list_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD CONSTRAINT `app_notifications_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_product_list`
--
ALTER TABLE `app_product_list`
  ADD CONSTRAINT `app_product_list_ibfk_1` FOREIGN KEY (`CatId`) REFERENCES `app_product_categories` (`CatId`);

--
-- Constraints for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD CONSTRAINT `app_purchases_invoices_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`),
  ADD CONSTRAINT `app_purchases_invoices_ibfk_2` FOREIGN KEY (`SupplierId`) REFERENCES `app_suppliers` (`SupplierId`);

--
-- Constraints for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_product_list` (`ProductId`),
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`);

--
-- Constraints for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD CONSTRAINT `app_sales_invoices_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`),
  ADD CONSTRAINT `app_sales_invoices_ibfk_2` FOREIGN KEY (`ClintId`) REFERENCES `app_clients` (`ClientId`);

--
-- Constraints for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_product_list` (`ProductId`),
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`);

--
-- Constraints for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_users`
--
ALTER TABLE `app_users`
  ADD CONSTRAINT `app_users_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`);

--
-- Constraints for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`),
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_2` FOREIGN KEY (`PrivilegeId`) REFERENCES `app_users_privileges` (`PrivilegeId`);

--
-- Constraints for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  ADD CONSTRAINT `app_users_profiles_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
