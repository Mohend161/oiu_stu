-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 يونيو 2020 الساعة 13:38
-- إصدار الخادم: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tswyaat`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `maxid` () RETURNS INT(11) BEGIN
	-- Declare the return variable here
DECLARE v_id int;
DECLARE v_yearid int;
select max(YearID) into v_yearid from TBYear;
select max(ID) into v_id FROM TBLon where det=v_yearid;
if (v_id is null) then
    set v_id=1;
end if;

	RETURN v_id;

	-- Return the result of the function

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `account`
--

CREATE TABLE `account` (
  `acct_num` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- القوادح `account`
--
DELIMITER $$
CREATE TRIGGER `ins_sum` BEFORE INSERT ON `account` FOR EACH ROW SET @sum = @sum + NEW.amount
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 315610383),
('m130524_201442_init', 315610388),
('m190124_110200_add_verification_token_column_to_user_table', 315610388);

-- --------------------------------------------------------

--
-- بنية الجدول `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `po`
--

INSERT INTO `po` (`id`, `po_no`, `note`) VALUES
(4, 'zxc', 'ssa');

--
-- القوادح `po`
--
DELIMITER $$
CREATE TRIGGER `before_delete` BEFORE DELETE ON `po` FOR EACH ROW DELETE FROM po_iteme WHERE po_iteme.po_id= OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `po_iteme`
--

CREATE TABLE `po_iteme` (
  `id` int(11) NOT NULL,
  `po_iteme_no` varchar(100) NOT NULL,
  `qte` double NOT NULL,
  `po_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `tbcollege`
--

CREATE TABLE `tbcollege` (
  `CollegeID` int(11) NOT NULL,
  `CollegeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbcollege`
--

INSERT INTO `tbcollege` (`CollegeID`, `CollegeName`) VALUES
(1, 'كلية الصيدلة'),
(2, 'كلية الطب'),
(3, 'كلية الزراعة'),
(4, 'كلية الهندسة'),
(5, 'طب'),
(6, 'اداب'),
(7, '');

-- --------------------------------------------------------

--
-- بنية الجدول `tbcurrency`
--

CREATE TABLE `tbcurrency` (
  `CurrID` int(11) NOT NULL,
  `CurrName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbcurrency`
--

INSERT INTO `tbcurrency` (`CurrID`, `CurrName`) VALUES
(1, 'جنية'),
(2, 'دولار');

-- --------------------------------------------------------

--
-- بنية الجدول `tbemployee`
--

CREATE TABLE `tbemployee` (
  `EmpID` int(11) NOT NULL,
  `EmpName` varchar(50) DEFAULT NULL,
  `Lon` int(11) DEFAULT NULL,
  `isopen` int(11) DEFAULT NULL,
  `oldlon` int(11) DEFAULT NULL,
  `oldisopen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbemployee`
--

INSERT INTO `tbemployee` (`EmpID`, `EmpName`, `Lon`, `isopen`, `oldlon`, `oldisopen`) VALUES
(26, 'مهند حامد', 1, 1, 0, 0),
(27, 'محمد عبدالله', 1, 1, 0, 0),
(28, 'عبدالسلام', 1, 1, 0, 0),
(29, 'جماع', 1, 1, 0, 0),
(30, 'مهند مهند', 1, 1, 0, 0),
(31, 'مهند مهند', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `tbfiltrate`
--

CREATE TABLE `tbfiltrate` (
  `FiltrID` int(11) NOT NULL,
  `LonID` int(11) DEFAULT NULL,
  `TySectionID` int(11) DEFAULT NULL,
  `ProcedureDate` datetime(3) DEFAULT NULL,
  `Money` double DEFAULT NULL,
  `Archive` int(11) DEFAULT NULL,
  `YearID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbfiltrate`
--

INSERT INTO `tbfiltrate` (`FiltrID`, `LonID`, `TySectionID`, `ProcedureDate`, `Money`, `Archive`, `YearID`) VALUES
(52, 47, 2, '2020-06-10 00:00:00.000', 500, 0, NULL),
(53, 47, 2, '2020-05-06 00:00:00.000', 500, 0, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `tbitem`
--

CREATE TABLE `tbitem` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbitem`
--

INSERT INTO `tbitem` (`ItemID`, `ItemName`) VALUES
(1, 'بديل نقدي'),
(2, 'بدل اتصال'),
(3, 'تذاكر سفر'),
(4, 'علاوة موحدة');

-- --------------------------------------------------------

--
-- بنية الجدول `tblistreturn`
--

CREATE TABLE `tblistreturn` (
  `RetID` int(11) NOT NULL,
  `PayID` int(11) NOT NULL,
  `EmpID` int(11) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `IsPrint` int(11) DEFAULT NULL,
  `Notes` varchar(50) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Accept` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `tblon`
--

CREATE TABLE `tblon` (
  `LonID` int(11) NOT NULL,
  `LonDate` date DEFAULT NULL,
  `Maount` double DEFAULT NULL,
  `EmpID` int(11) DEFAULT NULL,
  `TypeID` int(11) DEFAULT NULL,
  `CollegeID` int(11) DEFAULT NULL,
  `Note` varchar(50) DEFAULT NULL,
  `Finish` int(11) DEFAULT NULL,
  `Notes` varchar(50) DEFAULT NULL,
  `CurrID` int(11) DEFAULT NULL,
  `ProcedureDatfin` datetime(3) DEFAULT NULL,
  `Archive` int(11) DEFAULT NULL,
  `det` int(11) DEFAULT NULL,
  `ID` bigint(20) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tblon`
--

INSERT INTO `tblon` (`LonID`, `LonDate`, `Maount`, `EmpID`, `TypeID`, `CollegeID`, `Note`, `Finish`, `Notes`, `CurrID`, `ProcedureDatfin`, `Archive`, `det`, `ID`, `UserID`) VALUES
(47, '2020-06-18', 1000, 29, 2, 4, 'الغرض مناه', 1, 'ملاحظات', 1, '2020-06-13 09:06:25.000', 0, 3, 0, 0);

--
-- القوادح `tblon`
--
DELIMITER $$
CREATE TRIGGER `LonID_tbfiltrate_delete` BEFORE DELETE ON `tblon` FOR EACH ROW DELETE FROM tbfiltrate WHERE tbfiltrate.LonID= OLD.LonID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `tblonemp`
--

CREATE TABLE `tblonemp` (
  `EmpLon` int(11) NOT NULL,
  `EmpNameLon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `tbreport`
--

CREATE TABLE `tbreport` (
  `RepID` int(11) NOT NULL,
  `RepName` varchar(50) DEFAULT NULL,
  `Ty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbreport`
--

INSERT INTO `tbreport` (`RepID`, `RepName`, `Ty`) VALUES
(1, 'تتقرير يوضح تصفية العهد', 1),
(2, 'تقرير في فترة معينة', 1),
(3, 'تقرير في فترة معينة', 2),
(4, 'تقرير يوضح صرف المستحقات', 2),
(5, 'تقرير يوضح الاسماء الموقوفة عن الصرف', 2),
(6, 'تقرير في شهر معين', 3),
(7, 'تقريري في سنه معينه', 3);

-- --------------------------------------------------------

--
-- بنية الجدول `tbreview`
--

CREATE TABLE `tbreview` (
  `ID` int(11) NOT NULL,
  `LonID` int(11) DEFAULT NULL,
  `TyItID` int(11) DEFAULT NULL,
  `Money` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `tbsecret`
--

CREATE TABLE `tbsecret` (
  `SecrtID` int(11) NOT NULL,
  `PayID` int(11) NOT NULL,
  `PayDate` datetime(3) DEFAULT NULL,
  `Notes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbsecret`
--

INSERT INTO `tbsecret` (`SecrtID`, `PayID`, `PayDate`, `Notes`) VALUES
(2, 1, '2020-06-01 00:00:00.000', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `tbsectemp`
--

CREATE TABLE `tbsectemp` (
  `EmpReID` int(11) NOT NULL,
  `EmpNaRe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbsectemp`
--

INSERT INTO `tbsectemp` (`EmpReID`, `EmpNaRe`) VALUES
(1, 'الذين تم صرف مستحقاتهم'),
(2, 'الذين لم يتم صرف مستحقاتهم');

-- --------------------------------------------------------

--
-- بنية الجدول `tbsection`
--

CREATE TABLE `tbsection` (
  `TySectionID` int(11) NOT NULL,
  `TySectionName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbsection`
--

INSERT INTO `tbsection` (`TySectionID`, `TySectionName`) VALUES
(1, 'مواد نظافة'),
(2, 'ضيافة وتكريم'),
(3, 'تامين عربات'),
(4, 'صيانة حدائق وممرات'),
(5, '');

-- --------------------------------------------------------

--
-- بنية الجدول `tbtypelan`
--

CREATE TABLE `tbtypelan` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbtypelan`
--

INSERT INTO `tbtypelan` (`TypeID`, `TypeName`) VALUES
(1, 'مؤقتة'),
(2, 'مستديمة'),
(3, 'سلفيات');

-- --------------------------------------------------------

--
-- بنية الجدول `tbuser`
--

CREATE TABLE `tbuser` (
  `UserID` int(11) NOT NULL,
  `FullUserName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Passwrd` varchar(50) DEFAULT NULL,
  `TypeUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `tbyear`
--

CREATE TABLE `tbyear` (
  `YearID` int(11) NOT NULL,
  `YearName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbyear`
--

INSERT INTO `tbyear` (`YearID`, `YearName`) VALUES
(3, '2013'),
(4, '2014'),
(5, '2015');

-- --------------------------------------------------------

--
-- بنية الجدول `typename`
--

CREATE TABLE `typename` (
  `typeID` int(11) NOT NULL,
  `typename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `typename`
--

INSERT INTO `typename` (`typeID`, `typename`) VALUES
(1, 'العهد'),
(2, 'المرتجعات');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(2, 'مهند حامد', '82M7V0C_D3A5QHB0i-VygIKa7BTbOp36', '$2y$13$A5FbUO8isxJpd7hjmo3vUu5WfUdXJ7eAsDKldC6kClrQLEVQKhzUO', NULL, 'mahend161@gmail.com', 10, 315610537, 315610537, 'iaXuNU4-NEL0zVTnj9OiV_3GYYhnbrcE_315610537');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_iteme`
--
ALTER TABLE `po_iteme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id` (`po_id`);

--
-- Indexes for table `tbcollege`
--
ALTER TABLE `tbcollege`
  ADD PRIMARY KEY (`CollegeID`);

--
-- Indexes for table `tbcurrency`
--
ALTER TABLE `tbcurrency`
  ADD PRIMARY KEY (`CurrID`);

--
-- Indexes for table `tbemployee`
--
ALTER TABLE `tbemployee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `tbfiltrate`
--
ALTER TABLE `tbfiltrate`
  ADD PRIMARY KEY (`FiltrID`),
  ADD KEY `LonID` (`LonID`),
  ADD KEY `TySectionID` (`TySectionID`);

--
-- Indexes for table `tbitem`
--
ALTER TABLE `tbitem`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `tblistreturn`
--
ALTER TABLE `tblistreturn`
  ADD PRIMARY KEY (`RetID`),
  ADD KEY `EmpID` (`EmpID`,`ItemID`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `EmpID_2` (`EmpID`),
  ADD KEY `EmpID_3` (`EmpID`),
  ADD KEY `ItemID_2` (`ItemID`),
  ADD KEY `PayID` (`PayID`),
  ADD KEY `EmpID_4` (`EmpID`);

--
-- Indexes for table `tblon`
--
ALTER TABLE `tblon`
  ADD PRIMARY KEY (`LonID`),
  ADD KEY `EmpID` (`EmpID`,`TypeID`,`CollegeID`,`CurrID`),
  ADD KEY `TypeID` (`TypeID`),
  ADD KEY `CollegeID` (`CollegeID`),
  ADD KEY `CurrID` (`CurrID`),
  ADD KEY `det` (`det`);

--
-- Indexes for table `tblonemp`
--
ALTER TABLE `tblonemp`
  ADD PRIMARY KEY (`EmpLon`);

--
-- Indexes for table `tbreport`
--
ALTER TABLE `tbreport`
  ADD PRIMARY KEY (`RepID`);

--
-- Indexes for table `tbreview`
--
ALTER TABLE `tbreview`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbsecret`
--
ALTER TABLE `tbsecret`
  ADD PRIMARY KEY (`PayID`),
  ADD KEY `SecrtID` (`SecrtID`);

--
-- Indexes for table `tbsectemp`
--
ALTER TABLE `tbsectemp`
  ADD PRIMARY KEY (`EmpReID`);

--
-- Indexes for table `tbsection`
--
ALTER TABLE `tbsection`
  ADD PRIMARY KEY (`TySectionID`);

--
-- Indexes for table `tbtypelan`
--
ALTER TABLE `tbtypelan`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbyear`
--
ALTER TABLE `tbyear`
  ADD PRIMARY KEY (`YearID`);

--
-- Indexes for table `typename`
--
ALTER TABLE `typename`
  ADD PRIMARY KEY (`typeID`),
  ADD UNIQUE KEY `typeID` (`typeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_iteme`
--
ALTER TABLE `po_iteme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbcollege`
--
ALTER TABLE `tbcollege`
  MODIFY `CollegeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbcurrency`
--
ALTER TABLE `tbcurrency`
  MODIFY `CurrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbemployee`
--
ALTER TABLE `tbemployee`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbfiltrate`
--
ALTER TABLE `tbfiltrate`
  MODIFY `FiltrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbitem`
--
ALTER TABLE `tbitem`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblistreturn`
--
ALTER TABLE `tblistreturn`
  MODIFY `RetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblon`
--
ALTER TABLE `tblon`
  MODIFY `LonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblonemp`
--
ALTER TABLE `tblonemp`
  MODIFY `EmpLon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbreport`
--
ALTER TABLE `tbreport`
  MODIFY `RepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbreview`
--
ALTER TABLE `tbreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbsecret`
--
ALTER TABLE `tbsecret`
  MODIFY `SecrtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbsectemp`
--
ALTER TABLE `tbsectemp`
  MODIFY `EmpReID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbsection`
--
ALTER TABLE `tbsection`
  MODIFY `TySectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbtypelan`
--
ALTER TABLE `tbtypelan`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typename`
--
ALTER TABLE `typename`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `po_iteme`
--
ALTER TABLE `po_iteme`
  ADD CONSTRAINT `po_iteme_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `po` (`id`);

--
-- القيود للجدول `tbfiltrate`
--
ALTER TABLE `tbfiltrate`
  ADD CONSTRAINT `tbfiltrate_ibfk_1` FOREIGN KEY (`LonID`) REFERENCES `tblon` (`LonID`),
  ADD CONSTRAINT `tbfiltrate_ibfk_2` FOREIGN KEY (`TySectionID`) REFERENCES `tbsection` (`TySectionID`);

--
-- القيود للجدول `tblistreturn`
--
ALTER TABLE `tblistreturn`
  ADD CONSTRAINT `tblistreturn_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `tbitem` (`ItemID`),
  ADD CONSTRAINT `tblistreturn_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `tbemployee` (`EmpID`),
  ADD CONSTRAINT `tblistreturn_ibfk_3` FOREIGN KEY (`PayID`) REFERENCES `tbsecret` (`PayID`);

--
-- القيود للجدول `tblon`
--
ALTER TABLE `tblon`
  ADD CONSTRAINT `tblon_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `tbemployee` (`EmpID`),
  ADD CONSTRAINT `tblon_ibfk_2` FOREIGN KEY (`TypeID`) REFERENCES `tbtypelan` (`TypeID`),
  ADD CONSTRAINT `tblon_ibfk_3` FOREIGN KEY (`CollegeID`) REFERENCES `tbcollege` (`CollegeID`),
  ADD CONSTRAINT `tblon_ibfk_4` FOREIGN KEY (`CurrID`) REFERENCES `tbcurrency` (`CurrID`),
  ADD CONSTRAINT `tblon_ibfk_5` FOREIGN KEY (`det`) REFERENCES `tbyear` (`YearID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
