-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 أبريل 2020 الساعة 02:42
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
-- بنية الجدول `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1584861446),
('m130524_201442_init', 1584861454),
('m190124_110200_add_verification_token_column_to_user_table', 1584861457);

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
(35, '1', '1');

-- --------------------------------------------------------

--
-- بنية الجدول `po_iteme`
--

CREATE TABLE `po_iteme` (
  `id` int(11) NOT NULL,
  `po_iteme_no` varchar(10) NOT NULL,
  `qte` double NOT NULL,
  `po_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `po_iteme`
--

INSERT INTO `po_iteme` (`id`, `po_iteme_no`, `qte`, `po_id`) VALUES
(24, '11', 200, 35),
(25, '12', 200, 35),
(26, '13', 400, 35);

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
(5, 'طب');

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
(28, 'عبدالسلام', 1, 1, 0, 0);

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
(24, 40, 1, '2020-04-17 00:00:00.000', 700, NULL, NULL),
(25, 40, 1, '2020-04-17 00:00:00.000', 50, NULL, NULL);

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
(39, '2020-04-17', 10000, 26, 1, 1, 'الغرض منها', 0, 'ملاحظات', 1, '0000-00-00 00:00:00.000', 0, 0, 0, 0),
(40, '2020-04-18', 750, 27, 2, 4, 'تسيير العمل بالاداره', 0, 'تصديق الوكيل', 2, '0000-00-00 00:00:00.000', 0, 0, 0, 0);

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
  `PayDate` datetime(3) DEFAULT NULL,
  `PayID` int(11) NOT NULL,
  `Notes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `tbsectemp`
--

CREATE TABLE `tbsectemp` (
  `EmpReID` int(11) NOT NULL,
  `EmpNaRe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'صيانة حدائق وممرات');

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
(1, '2013'),
(2, '2014');

-- --------------------------------------------------------

--
-- بنية الجدول `typename`
--

CREATE TABLE `typename` (
  `typeID` int(11) NOT NULL,
  `typename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`RetID`,`PayID`),
  ADD KEY `EmpID` (`EmpID`,`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `tblon`
--
ALTER TABLE `tblon`
  ADD PRIMARY KEY (`LonID`),
  ADD KEY `EmpID` (`EmpID`,`TypeID`,`CollegeID`,`CurrID`),
  ADD KEY `TypeID` (`TypeID`),
  ADD KEY `CollegeID` (`CollegeID`),
  ADD KEY `CurrID` (`CurrID`);

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
  ADD PRIMARY KEY (`SecrtID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `po_iteme`
--
ALTER TABLE `po_iteme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbcollege`
--
ALTER TABLE `tbcollege`
  MODIFY `CollegeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbcurrency`
--
ALTER TABLE `tbcurrency`
  MODIFY `CurrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbemployee`
--
ALTER TABLE `tbemployee`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbfiltrate`
--
ALTER TABLE `tbfiltrate`
  MODIFY `FiltrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `LonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblonemp`
--
ALTER TABLE `tblonemp`
  MODIFY `EmpLon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbreport`
--
ALTER TABLE `tbreport`
  MODIFY `RepID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbreview`
--
ALTER TABLE `tbreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbsecret`
--
ALTER TABLE `tbsecret`
  MODIFY `SecrtID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbsectemp`
--
ALTER TABLE `tbsectemp`
  MODIFY `EmpReID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbsection`
--
ALTER TABLE `tbsection`
  MODIFY `TySectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tblistreturn_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `tbemployee` (`EmpID`);

--
-- القيود للجدول `tblon`
--
ALTER TABLE `tblon`
  ADD CONSTRAINT `tblon_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `tbemployee` (`EmpID`),
  ADD CONSTRAINT `tblon_ibfk_2` FOREIGN KEY (`TypeID`) REFERENCES `tbtypelan` (`TypeID`),
  ADD CONSTRAINT `tblon_ibfk_3` FOREIGN KEY (`CollegeID`) REFERENCES `tbcollege` (`CollegeID`),
  ADD CONSTRAINT `tblon_ibfk_4` FOREIGN KEY (`CurrID`) REFERENCES `tbcurrency` (`CurrID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
