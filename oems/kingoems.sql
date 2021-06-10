-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 06:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingoems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(10) NOT NULL,
  `ANAME` varchar(100) NOT NULL,
  `APASS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `APID` int(10) NOT NULL,
  `SREGNO` bigint(15) NOT NULL,
  `DEP` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL DEFAULT 'Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`APID`, `SREGNO`, `DEP`, `STATUS`) VALUES
(34, 820318621022, 'MCA', 'Approved'),
(35, 820318621007, 'MCA', 'Approved'),
(36, 820318621011, 'MCA', 'Approved'),
(37, 820318621024, 'MCA', 'Approved'),
(38, 820318621025, 'MCA', 'Approved'),
(39, 820318621020, 'MCA', 'Approved'),
(40, 820318621016, 'MCA', 'Approved'),
(41, 820318621018, 'MCA', 'Approved'),
(42, 820318621015, 'MCA', 'Approved'),
(43, 820318621002, 'MCA', 'Approved'),
(44, 820318621029, 'MCA', 'Approved'),
(47, 820318621012, 'MCA', 'Approved'),
(48, 820318621034, 'MCA', 'Approved'),
(49, 820318621014, 'MCA', 'Approved'),
(50, 820318621001, 'MCA', 'Approved'),
(51, 820318621010, 'MCA', 'Approved'),
(52, 820318621021, 'MCA', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `coursetable`
--

CREATE TABLE `coursetable` (
  `COURSE_ID` int(10) NOT NULL,
  `COU_CODE` varchar(100) NOT NULL,
  `COU_NAME` varchar(100) NOT NULL,
  `COU_CREATED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetable`
--

INSERT INTO `coursetable` (`COURSE_ID`, `COU_CODE`, `COU_NAME`, `COU_CREATED`) VALUES
(1, 'MC5505', 'SOA', '2021-02-26 00:00:00'),
(2, 'MC5501', 'Cloud Computing', '2021-02-26 10:40:52'),
(5, 'MC5502', 'Big Data Analytics', '2021-03-01 09:00:39'),
(6, 'MC5503', 'Software Testing', '2021-03-01 14:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `EXMNE_ID` int(11) NOT NULL,
  `EXMNE_FULLNAME` varchar(100) NOT NULL,
  `EXMNE_COURSE` varchar(100) NOT NULL,
  `EXMNE_GENDER` varchar(100) NOT NULL,
  `EXMNE_BIRTHDATE` varchar(100) NOT NULL,
  `EXMNE_YEAR_LEVEL` varchar(100) NOT NULL,
  `EXMNE_EMAIL` varchar(100) NOT NULL,
  `EXMNE_PASSWORD` varchar(100) NOT NULL,
  `EXMNE_STATUS` varchar(100) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`EXMNE_ID`, `EXMNE_FULLNAME`, `EXMNE_COURSE`, `EXMNE_GENDER`, `EXMNE_BIRTHDATE`, `EXMNE_YEAR_LEVEL`, `EXMNE_EMAIL`, `EXMNE_PASSWORD`, `EXMNE_STATUS`) VALUES
(4, 'Pradeep', 'SOA', 'male', '2021-03-16', 'third year', 'pradeep@gmail.com', '123456', 'Active'),
(5, 'Arun', 'SOA', 'male', '2021-03-09', 'first year', 'Arun@gmail.com', '123456', 'Active'),
(6, 'Karthik', 'SOA', 'male', '2021-03-18', 'first year', 'gk8924768@gmail.com', '123456', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `EX_ID` int(10) NOT NULL,
  `COU_ID` int(10) NOT NULL,
  `EXTITLE` varchar(100) NOT NULL,
  `EX_TIME_LIMIT` varchar(100) NOT NULL,
  `EX_QUESTLIMIT_DISPLAY` int(11) NOT NULL,
  `EX_DESCRIPTION` varchar(150) NOT NULL,
  `EX_CREATED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`EX_ID`, `COU_ID`, `EXTITLE`, `EX_TIME_LIMIT`, `EX_QUESTLIMIT_DISPLAY`, `EX_DESCRIPTION`, `EX_CREATED`) VALUES
(2, 1, 'SOAP', '60', 10, 'SOAP basics', '2021-03-01 09:51:47'),
(3, 2, 'Cloud Basic', '40', 10, 'MCQ and basic question', '2021-03-01 10:01:58'),
(4, 1, 'WSDL', '40', 10, 'Fully MCQ', '2021-03-06 14:58:56'),
(5, 1, 'XML', '30', 10, 'MCQ Type', '2021-03-06 14:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FID` int(10) NOT NULL,
  `EXNAME` varchar(50) NOT NULL,
  `REG_NO` bigint(15) NOT NULL,
  `FEEDBACK` varchar(100) NOT NULL,
  `YOURQUALITY` varchar(50) NOT NULL,
  `FB_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FID`, `EXNAME`, `REG_NO`, `FEEDBACK`, `YOURQUALITY`, `FB_DATE`) VALUES
(21, 'SOAP', 820318621012, 'Good', 'Acceptable', '2021-05-07 15:27:18'),
(22, 'SOAP', 820318621010, 'Very Good', 'Acceptable', '2021-05-07 15:36:34'),
(23, 'Cloud Basic', 820318621010, 'Very Good', 'Acceptable', '2021-05-08 10:36:02'),
(24, 'SOAP', 820318621012, 'Very Good', 'Good ', '2021-05-19 20:52:48'),
(25, 'SOAP', 820318621012, 'Good', 'Acceptable', '2021-05-20 14:46:18'),
(26, 'SOAP', 820318621012, 'Bad', 'Poor', '2021-05-20 15:29:42'),
(27, 'Cloud Basic', 820318621012, 'Very Good', 'Acceptable', '2021-05-20 20:01:46'),
(28, 'Cloud Basic', 820318621021, 'Good', 'Acceptable', '2021-05-20 20:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `partaquestions`
--

CREATE TABLE `partaquestions` (
  `QIDA` int(10) NOT NULL,
  `CU_ID` int(10) NOT NULL,
  `EXTITLE_ID` int(10) NOT NULL,
  `QUESTIONS` text NOT NULL,
  `OP1` varchar(100) NOT NULL,
  `OP2` varchar(100) NOT NULL,
  `OP3` varchar(100) NOT NULL,
  `OP4` varchar(100) NOT NULL,
  `OP5` varchar(100) DEFAULT NULL,
  `CORRECT_ANSWER` int(10) NOT NULL,
  `QTYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partaquestions`
--

INSERT INTO `partaquestions` (`QIDA`, `CU_ID`, `EXTITLE_ID`, `QUESTIONS`, `OP1`, `OP2`, `OP3`, `OP4`, `OP5`, `CORRECT_ANSWER`, `QTYPE`) VALUES
(1, 1, 2, 'What is full form in PHP ', 'Hypertext pre-processor', 'Personal Home Page', 'Process Home Page', 'Page Home paper', 'Public Home Page', 2, 'Radio'),
(2, 1, 2, 'Which of the following is a repeatable task within a business process?', 'service', 'bus', ' methods', 'all of the mentioned', '', 1, 'Radio'),
(3, 1, 2, 'Which of the following is used to define the service component that performs the service?', 'WSDL', ' SCDL', ' XML', 'None of the mentioned', 'SOA', 2, 'Radio'),
(4, 1, 2, 'Which of the following is commonly used to describe the service interface, how to bind information, and the nature of the componentâ€™s service or endpoint?', 'WSDL', 'SCDL', 'XML', 'None of the mentioned', 'SOA', 1, 'Radio'),
(5, 1, 2, 'Which of the following provides commands for defining logic using conditional statements?', 'XML', 'WS-BPEL', ' JSON', 'None of the mentioned', 'UDDI', 2, 'Radio'),
(6, 1, 2, 'Point out the correct statement.', 'Some mature SOA implementations favor orchestration over choreography', 'Most mature SOA implementations favor choreography over orchestration', 'With orchestration, multiple service manages the various processes', 'None of the mentioned', 'SOA is xml based object', 4, 'Radio'),
(7, 1, 2, 'SOA _____ an extension of the Service Oriented Architecture to respond to events that occur as a result of business processes.', '2.0', '3.0', '4.0', ' All of the mentioned', '5.0', 1, 'Radio'),
(8, 1, 2, 'Point out the wrong statement.', 'Event handling is part of event-driven SOA or SOA 2.0', 'An ESB provides a lower layer for event management with a messaging infrastructure', 'UML is the modeling language of the Object Management Group that provides a method for creating visu', 'None of the mentioned', 'XML', 1, 'Radio'),
(9, 1, 2, 'Which of the following application has the ability to query event data in the same way that a stock ticker or trading application can query trading data?', 'CVE', 'CEV', 'XML', 'None of the mentioned', 'CVV', 1, 'Radio'),
(10, 1, 2, 'What does CVE in SOA design stand for?', 'Causal Vector Engine', ' Continuous Vector Engine', 'Causal Valuable Engine', ' None of the mentioned', 'Choreography', 1, 'Radio'),
(11, 1, 2, 'Which of the following is a collaborative effort where the logic of the business process is pushed out to the members?', ' Orchestration', 'Choreography', 'SOA 2.0', 'None of the mentioned', 'SOA 4.0', 2, 'Radio'),
(12, 1, 2, 'In the ______ model, data and messages are exchanged in a Service Data Object (SDO).', 'CSA', ' SCA', ' UDDI', 'None of the mentioned', 'SOA', 1, 'Radio'),
(13, 1, 2, 'How many types of methods are used to combine web services?', '1', '2', '3', 'None of the mentioned', '', 1, 'Radio'),
(14, 1, 2, 'What is J2EE?', 'Java Enter Price Edition', 'J2EE 2.0', 'Java Virtuval Machine', 'java', 'java & servlet', 1, 'Radio'),
(17, 2, 3, ' What type of computing technology refers to services and applications that typically run on a distributed network through virtualized resources?', 'Distributed Computing', 'Cloud Computing', 'Soft Computing', 'Parallel Computing', 'Intranet', 2, 'Radio'),
(18, 2, 3, 'Which one of the following options can be considered as the Cloud?', 'Hadoop', 'Intranet', 'Web Applications', 'All of the mentioned', 'None Of the above', 1, 'Radio'),
(19, 2, 3, 'Cloud computing is a kind of abstraction which is based on the notion of combining physical resources and represents them as _______resources to users.', 'Real', 'Cloud', 'Virtual', 'none of the mentioned', 'Softwares', 3, 'Radio'),
(20, 2, 3, 'Which of the following has many features of that is now known as cloud computing?', 'Web Service', 'Softwares', 'All of the mentioned', 'Internet', 'None Of the above', 4, 'Radio'),
(21, 2, 3, 'Which one of the following cloud concepts is related to sharing and pooling the resources?', 'Polymorphism', 'Virtualization', 'Abstraction', 'None of the mentioned', 'All of the above', 2, 'Radio'),
(22, 2, 3, 'Which one of the following statements is not true?', 'The popularization of the Internet actually enabled most cloud computing systems.', 'Cloud computing makes the long-held dream of utility as a payment possible for you, with an infinite', 'Soft computing addresses a real paradigm in the way in which the system is deployed.', 'All of the mentioned', 'None Of the above', 3, 'Radio'),
(23, 2, 3, 'Which one of the following can be considered as a utility is a dream that dates from the beginning of the computing industry itself?', 'Computing', 'Model', 'Software', 'All of the mentioned', 'None Of the above', 1, 'Radio'),
(24, 2, 3, 'Which of the following is an essential concept related to Cloud?', 'Reliability', 'Abstraction', 'Productivity', 'All of the mentioned', 'None Of the above', 2, 'Radio'),
(25, 2, 3, 'Which one of the following is Cloud Platform by Amazon?', 'Azure', 'AWS', 'Cloudera', 'All of the mentioned', 'None Of the above', 2, 'Radio'),
(26, 2, 3, 'Which of the following statement is not true?', 'Through cloud computing, one can begin with very small and become big in a rapid manner.', 'All applications benefit from deployment in the Cloud.', 'Cloud computing is revolutionary, even though the technology it is built on is evolutionary.', 'None of the mentioned', 'All of the above', 2, 'Radio'),
(27, 2, 3, 'In the Planning Phase, Which of the following is the correct step for performing the analysis?', 'Cloud Computing Value Proposition', 'Cloud Computing Strategy Planning', 'Both A and B', 'Business Architecture Development', 'Planning Phase', 3, 'Radio'),
(28, 2, 3, ' In which one of the following, a strategy record or Document is created respectively to the events, conditions a user may face while applying cloud computing mode.', 'Cloud Computing Value Proposition', 'Cloud Computing Strategy Planning', 'Planning Phase', 'Business Architecture Development', 'None Of the above', 2, 'Radio'),
(29, 2, 3, 'What is Business Architecture Development?', 'We recognize the risks that might be caused by cloud computing application from a business perspecti', 'We identify the applications that support the business processes and the technologies required to su', 'We formulate all kinds of plans that are required to transform the current business to cloud computi', 'None of the above', 'All of the above', 1, 'Radio'),
(30, 2, 3, 'Which one of the following refers to the non-functional requirements like disaster recovery, security, reliability, etc.', 'Service Development', 'Quality of service', 'Plan Development', 'Technical Service', 'None Of the above', 2, 'Radio'),
(31, 2, 3, 'Which of the following type of virtualization is also characteristic of cloud computing?', 'Storage ', 'Application ', 'CPU ', 'All of the above ', 'None Of the above', 123, 'Checkbox'),
(32, 2, 3, 'Which of these is not a major type of cloud computing usage?', 'Hardware as a Service', 'Platform as a Service', 'Software as a Service', 'Infrastructure as a Service', 'None Of the Above', 1, 'Radio'),
(35, 1, 2, 'Which are the components of EAI system as a whole?\r\n\r\n', 'Hub, Bus, Adapter', 'Only Bus  ', 'Guidelines', 'Only Adapters  ', 'None Of the Above', 123, 'Checkbox'),
(36, 1, 2, 'Which of the following describes a message-passing taxonomy for a component-based architecture that provides services to clients upon demand?', 'SOA', 'EBS', 'GEC', 'All of the mentioned', 'None Of the Above', 123, 'Checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `partbquestions`
--

CREATE TABLE `partbquestions` (
  `QIDB` int(10) NOT NULL,
  `CU_ID` int(10) NOT NULL,
  `EXTITLE_ID` int(10) NOT NULL,
  `QUESTIONS` text NOT NULL,
  `OP1` varchar(100) NOT NULL,
  `OP2` varchar(100) NOT NULL,
  `OP3` varchar(100) NOT NULL,
  `OP4` varchar(100) NOT NULL,
  `OP5` varchar(100) NOT NULL,
  `CORRECT_ANSWER` int(10) NOT NULL,
  `QTYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partbquestions`
--

INSERT INTO `partbquestions` (`QIDB`, `CU_ID`, `EXTITLE_ID`, `QUESTIONS`, `OP1`, `OP2`, `OP3`, `OP4`, `OP5`, `CORRECT_ANSWER`, `QTYPE`) VALUES
(1, 1, 2, 'Which of the following application has ability to query event data in the same way that a stock ticker or trading application can query trading data ?', 'CVE ', 'CEV ', 'XML ', 'None of the mentioned', 'SSA', 1, 'Radio'),
(2, 1, 2, 'Which two statements about security considerations in an SOA environment are true? | SOA Mcqs', 'Firewalls or routers are the mechanisms for securing an SOA business environment.', 'Security policy decisions are made and carried out within an Enterprise Service Bus (ESB).', 'Identities exist for both users and services, and both must be subject to the same controls.	', ' The creation of roles for business process task lists are used to prevent business partner access t', ' There is a need to manage identity and security across a range of systems and services that are imp', 4, 'Radio'),
(3, 1, 2, 'Which are the components of EAI system as a whole?\r\n\r\n', ' Hub, Bus, Adapters ', 'Only Bus  ', ' Guidelines  ', 'Only Adapters  ', 'No of the Above', 1, 'Radio'),
(4, 1, 2, ' AJAX uses _________ for asynchronous communication between various data sources.', 'XSLT ', 'XMLHttpRequest ', ' DTD ', 'None of the mentioned ', ' SAS ', 1, 'Radio'),
(5, 1, 2, ' Which of the following correctly describes group of technologies that leverage HTML and CSS for styling?', ' DOM ', 'AJAX ', 'SAS ', ' All of the mentioned ', 'No of the Above', 2, 'Radio'),
(6, 1, 2, 'A _____ is the combination of data from two or more sources that creates a unique service.', ' dev', ' mashup ', 'ajax ', ' all of the mentioned ', 'No of the Above', 2, 'Radio'),
(7, 1, 2, 'OCC support the management of cloud computing infrastructure for scientific research as part of the ________ working group initiative.', 'OSCD ', ' OSCDP ', 'OSCP', 'All of the mentioned ', 'No of the Above', 2, 'Radio'),
(8, 1, 2, 'Providing XML Gateway SOA security requires a _________ so that encryption is enforced by digital signatures.', ' Public Key Infrastructure ', ' Private Key Infrastructure ', ' Hybrid Key Infrastructure ', 'None of the mentioned ', 'All of the Above', 1, 'Radio'),
(9, 1, 2, 'Which of the following extends WS-Security to provide a mechanism to issue, renew, and validate security tokens ?', 'WS-Trust ', 'WS-SecureConversion', 'WS-SecurityPolicy ', ' All of the mentionedd', ' None of the mentioned ', 1, 'Radio'),
(10, 1, 2, ' Which of the following provides data authentication and authorization between client and service ?', 'SAML ', ' WS-SecureConversion', 'WS-Security ', 'All of the mentioned ', 'None of the mentioned', 1, 'Radio'),
(11, 1, 2, 'Which of the following is policy based XML security service by Cisco ?', 'Application Oriented Manager ', ' Application Oriented Networking', 'Application Process Networking', 'All of the mentioned ', 'None of the mentioned', 2, 'Radio'),
(12, 1, 2, ' SOA offers a ________ design and reusable components in large deployments.', 'physical ', 'logical ', 'external ', ' all of the mentioned ', 'None of the mentioned', 2, 'Radio'),
(13, 1, 2, 'Which of the following discovery service can map SOA transactions and dependencies ?', 'CA Wily SOA Solution', 'CSA Wily SOA Solution ', ' ESB Wily SOA Solution ', 'None of the mentioned ', 'None of the mentioned', 1, 'Radio'),
(14, 1, 2, ' Which of the following is a SOA transaction manager ?', ' AppSight ', 'LISA ', ' CoreFirst ', ' All of the mentioned ', 'None of the mentioned', 1, 'Radio'),
(16, 2, 3, 'Which one of the following is a phase of the Deployment process?', 'Selecting Cloud Computing Provider', 'IT Architecture Development', 'Business Architecture Development', 'Transformation Plan Development', 'None Of the above', 4, 'Radio'),
(17, 2, 3, 'By whom is the backend commonly used?', 'Client', 'User', 'Stockholders', 'service provider', 'Browser', 4, 'Radio'),
(18, 2, 3, 'Through which, the backend and front-end are connected with each other?', 'Browser', 'Database', 'Network', 'Both A and B', 'None Of the above', 3, 'Radio'),
(19, 2, 3, 'How many types of services are there those are offered by the Cloud Computing to the users?', '2', '4', '3', '5', '6', 3, 'Radio'),
(20, 2, 3, 'The Foce.com and windows Azure are examples of which of the following?', 'IaaS', 'PaaS', 'SaaS', 'Both A and B', 'None Of the above', 2, 'Radio'),
(21, 2, 3, 'Which of the following provides the Graphic User Interface (GUI) for interaction with the cloud? ', 'Client', 'Client Infrastructure', 'Application', 'Server', 'All of the above', 2, 'Radio'),
(22, 2, 3, ' Which one of the following a technology works behind the cloud computing platform?', 'Virtualization', 'SOA', 'Grid Computing', 'All of the above', 'None Of the above', 4, 'Radio'),
(23, 2, 3, 'Which one of the following is a kind of technique that allows sharing the single physical instance of an application or the resources among multiple organizations/customers? ', 'Virtualization', 'Service-Oriented Architecture', 'Grid Computing', 'Utility Computing', 'None Of the above', 1, 'Radio'),
(24, 2, 3, 'Which one of the following statement is true about the Virtualization?', 'It provides a logical name for a physical resource, and on-demand provides an indicator of that phys', 'In Virtualization, we analyze the strategy related problems that customers may face.', 'In Virtualization, it is necessary to compile the Multitenant properly.', 'All of the above', 'None Of the above', 1, 'Radio'),
(25, 2, 3, ' In Virtualization, which architecture provides the virtual isolation between the several tenants?', 'IT Architecture', 'Multitenant', 'Deployment', 'Business Architecture', 'None Of the above', 2, 'Radio'),
(26, 2, 3, 'Which one of the following statement is true about the Service-Oriented Architecture?', 'It is possible to exchange data between applications from different vendors without using additional', 'It provides computational resources on-demand as a metered service.', 'Service-Oriented Architecture allows using the application as a service for other applications.', 'Both A and C', 'None Of the above', 4, 'Radio'),
(27, 2, 3, 'In Grid Computing, which types of computer resources are there?', 'heterogeneous dispersed.', 'geographically dispersed.', 'Both A and B', 'None of the above', 'SOA', 2, 'Radio'),
(28, 2, 3, 'Which one of these is not a cloud computing pricing model?', 'Free ', 'Ladder ', 'Pay Per Use ', 'Subscription ', 'None Of the above', 134, 'Checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(10) NOT NULL,
  `REGNO` bigint(60) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CLG` varchar(100) NOT NULL,
  `DEP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `REGNO`, `NAME`, `DOB`, `EMAIL`, `CLG`, `DEP`) VALUES
(1, 820318621012, 'karthik', '1998-06-15', 'gk8924768@gmail.com', 'AVC', 'MCA'),
(2, 820318621021, 'pavithra', '1998-05-18', 'mspavithra@gmail.com', 'AVC', 'MCA'),
(4, 820318621022, 'Ragul', '1998-06-22', 'rainaragul@gmail.com', 'AVC', 'MCA'),
(5, 820318621007, 'Gokul', '1998-06-27', 'gokulthdr@gmail.com', 'AVC', 'MCA'),
(6, 820318621011, 'Muthu', '1998-06-15', 'muthu@gmail.com', 'AVC', 'MCA'),
(7, 820318621024, 'Sandhiya', '1998-12-04', 'sandhiyasubramaniyan@gmail.com', 'AVC', 'MCA'),
(8, 820318621025, 'R.Selvakumar', '1998-06-15', 'rskselvakumar25@gmail.com', 'A.V.C College of Engineering', 'MCA'),
(9, 820318621020, 'Mythili', '1998-03-16', 'mythili20@gmail.com', 'AVC College Of Engineering', 'MCA'),
(10, 820318621016, 'P Kishore', '1997-08-27', 'kishore123@gmail.com', 'AVC', 'MCA'),
(12, 820318621018, 'Mangai', '1998-06-15', 'mangai123@gmail.com', 'AVC', 'MCA'),
(13, 820318621015, 'Keerthana', '1998-02-08', 'Keerthana123@gmail.com', 'AVC', 'MCA'),
(14, 820318621002, 'ARUN', '1997-07-30', 'arunm71997@gmail.com', 'AVC COLLEGE OF ENGINEERING ', 'MCA'),
(15, 820318621029, 'Subastri', '1997-08-01', 'subisuba97@gmail.com', 'AVC ', 'MCA'),
(16, 820318621034, 'Vikesh', '1998-05-13', 'vikesh123@gmail.com', 'AVC', 'MCA'),
(17, 820318621013, 'Kavya', '15-06-1998', 'kavya123@gmail.com', 'AVC', 'MCA'),
(41, 820318621014, 'Kavitha', '1998-06-15', 'kavitha123@gmail.com', 'AVC', 'MCA'),
(42, 820318621008, 'Jammel', '1998-06-15', 'jameel123@gmail.com', 'AVC', 'MCA'),
(43, 820318621010, 'jeyasri', '1998-06-15', 'jeyasri123@gmail.com', 'AVC', 'MCA'),
(44, 820318621001, 'Arthi', '1998-06-15', 'Arthi123@gmail.com', 'AVC', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `studentactivity`
--

CREATE TABLE `studentactivity` (
  `ACTID` int(10) NOT NULL,
  `SREG_NO` bigint(14) NOT NULL,
  `QUESTION_NO` int(10) NOT NULL,
  `SOPTION` int(10) NOT NULL,
  `EX_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentactivity`
--

INSERT INTO `studentactivity` (`ACTID`, `SREG_NO`, `QUESTION_NO`, `SOPTION`, `EX_ID`) VALUES
(189, 820318621025, 1, 2, 2),
(190, 820318621025, 2, 2, 2),
(191, 820318621025, 3, 2, 2),
(192, 820318621025, 4, 1, 2),
(193, 820318621025, 5, 2, 2),
(194, 820318621025, 6, 4, 2),
(195, 820318621025, 7, 1, 2),
(196, 820318621025, 8, 1, 2),
(197, 820318621025, 9, 1, 2),
(198, 820318621025, 10, 1, 2),
(199, 820318621022, 1, 2, 2),
(200, 820318621022, 2, 1, 2),
(201, 820318621022, 3, 2, 2),
(202, 820318621022, 4, 1, 2),
(203, 820318621022, 5, 2, 2),
(204, 820318621022, 6, 4, 2),
(205, 820318621022, 7, 1, 2),
(206, 820318621022, 8, 1, 2),
(207, 820318621022, 9, 1, 2),
(208, 820318621022, 10, 1, 2),
(209, 820318621020, 1, 2, 2),
(210, 820318621020, 2, 2, 2),
(211, 820318621020, 3, 2, 2),
(212, 820318621020, 4, 1, 2),
(213, 820318621020, 5, 2, 2),
(214, 820318621020, 6, 4, 2),
(215, 820318621020, 7, 1, 2),
(216, 820318621020, 8, 1, 2),
(217, 820318621020, 9, 1, 2),
(218, 820318621020, 10, 1, 2),
(219, 820318621024, 1, 2, 2),
(220, 820318621024, 2, 1, 2),
(221, 820318621024, 3, 2, 2),
(222, 820318621024, 4, 1, 2),
(223, 820318621024, 5, 2, 2),
(224, 820318621024, 6, 4, 2),
(225, 820318621024, 7, 1, 2),
(226, 820318621024, 8, 1, 2),
(227, 820318621024, 9, 1, 2),
(228, 820318621024, 10, 1, 2),
(229, 820318621007, 1, 2, 2),
(230, 820318621007, 2, 1, 2),
(231, 820318621007, 3, 2, 2),
(232, 820318621007, 4, 1, 2),
(233, 820318621007, 5, 2, 2),
(234, 820318621007, 6, 4, 2),
(235, 820318621007, 7, 1, 2),
(236, 820318621007, 8, 1, 2),
(237, 820318621007, 9, 1, 2),
(238, 820318621007, 10, 1, 2),
(280, 820318621011, 1, 2, 2),
(281, 820318621011, 2, 1, 2),
(282, 820318621011, 3, 1, 2),
(283, 820318621011, 4, 1, 2),
(284, 820318621011, 5, 2, 2),
(285, 820318621011, 6, 1, 2),
(286, 820318621011, 7, 1, 2),
(287, 820318621011, 8, 2, 2),
(288, 820318621011, 9, 1, 2),
(289, 820318621011, 10, 1, 2),
(293, 820318621002, 1, 2, 2),
(294, 820318621002, 2, 1, 2),
(295, 820318621002, 3, 2, 2),
(296, 820318621002, 4, 2, 2),
(297, 820318621002, 5, 1, 2),
(298, 820318621002, 6, 2, 2),
(299, 820318621002, 7, 2, 2),
(300, 820318621002, 8, 2, 2),
(301, 820318621002, 9, 2, 2),
(302, 820318621002, 10, 1, 2),
(303, 820318621018, 1, 2, 2),
(304, 820318621018, 2, 2, 2),
(305, 820318621018, 3, 2, 2),
(306, 820318621018, 4, 2, 2),
(307, 820318621018, 5, 2, 2),
(308, 820318621018, 6, 2, 2),
(309, 820318621018, 7, 2, 2),
(310, 820318621018, 8, 2, 2),
(311, 820318621018, 9, 2, 2),
(312, 820318621018, 10, 1, 2),
(313, 820318621029, 1, 2, 2),
(314, 820318621029, 2, 2, 2),
(315, 820318621029, 3, 1, 2),
(316, 820318621029, 4, 1, 2),
(317, 820318621029, 5, 2, 2),
(318, 820318621029, 6, 1, 2),
(319, 820318621029, 7, 2, 2),
(320, 820318621029, 8, 2, 2),
(321, 820318621029, 9, 2, 2),
(322, 820318621029, 10, 2, 2),
(337, 820318621001, 1, 2, 2),
(338, 820318621001, 2, 2, 2),
(339, 820318621001, 3, 2, 2),
(340, 820318621001, 4, 2, 2),
(341, 820318621001, 5, 2, 2),
(342, 820318621001, 6, 2, 2),
(343, 820318621001, 7, 2, 2),
(344, 820318621001, 8, 2, 2),
(345, 820318621001, 9, 2, 2),
(346, 820318621001, 10, 1, 2),
(393, 820318621010, 1, 2, 2),
(394, 820318621010, 2, 2, 2),
(395, 820318621010, 3, 2, 2),
(396, 820318621010, 4, 1, 2),
(397, 820318621010, 5, 2, 2),
(398, 820318621010, 6, 2, 2),
(399, 820318621010, 7, 2, 2),
(400, 820318621010, 8, 1, 2),
(401, 820318621010, 9, 2, 2),
(402, 820318621010, 10, 1, 2),
(476, 820318621012, 8, 1, 2),
(477, 820318621012, 11, 2, 2),
(478, 820318621012, 5, 2, 2),
(479, 820318621012, 10, 1, 2),
(480, 820318621012, 35, 123, 2),
(481, 820318621012, 2, 1, 2),
(482, 820318621012, 7, 1, 2),
(483, 820318621012, 13, 1, 2),
(484, 820318621012, 36, 123, 2),
(485, 820318621012, 14, 1, 2),
(486, 820318621012, 25, 2, 3),
(487, 820318621012, 30, 2, 3),
(488, 820318621012, 31, 123, 3),
(489, 820318621012, 29, 1, 3),
(490, 820318621012, 17, 2, 3),
(491, 820318621012, 32, 1, 3),
(492, 820318621012, 27, 4, 3),
(493, 820318621012, 26, 2, 3),
(494, 820318621012, 20, 4, 3),
(495, 820318621012, 24, 2, 3),
(496, 820318621021, 21, 2, 3),
(497, 820318621021, 25, 2, 3),
(498, 820318621021, 28, 3, 3),
(499, 820318621021, 18, 1, 3),
(500, 820318621021, 30, 2, 3),
(501, 820318621021, 26, 2, 3),
(502, 820318621021, 22, 3, 3),
(503, 820318621021, 27, 2, 3),
(504, 820318621021, 24, 2, 3),
(505, 820318621021, 19, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `studentactivityb`
--

CREATE TABLE `studentactivityb` (
  `ACTBID` int(10) NOT NULL,
  `REGNO` bigint(14) NOT NULL,
  `QUESTION_NO` int(10) NOT NULL,
  `SOPTION` int(10) NOT NULL,
  `EX_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentactivityb`
--

INSERT INTO `studentactivityb` (`ACTBID`, `REGNO`, `QUESTION_NO`, `SOPTION`, `EX_ID`) VALUES
(31, 820318621025, 1, 1, 2),
(32, 820318621025, 2, 4, 2),
(33, 820318621025, 3, 1, 2),
(34, 820318621025, 4, 1, 2),
(35, 820318621025, 5, 2, 2),
(36, 820318621025, 6, 2, 2),
(37, 820318621025, 7, 2, 2),
(38, 820318621025, 8, 1, 2),
(39, 820318621025, 9, 1, 2),
(40, 820318621025, 10, 3, 2),
(41, 820318621022, 1, 1, 2),
(42, 820318621022, 2, 4, 2),
(43, 820318621022, 3, 1, 2),
(44, 820318621022, 4, 1, 2),
(45, 820318621022, 5, 2, 2),
(46, 820318621022, 6, 2, 2),
(47, 820318621022, 7, 2, 2),
(48, 820318621022, 8, 1, 2),
(49, 820318621022, 9, 4, 2),
(50, 820318621022, 10, 5, 2),
(51, 820318621020, 1, 1, 2),
(52, 820318621020, 2, 4, 2),
(53, 820318621020, 3, 1, 2),
(54, 820318621020, 4, 1, 2),
(55, 820318621020, 5, 2, 2),
(56, 820318621020, 6, 2, 2),
(57, 820318621020, 7, 2, 2),
(58, 820318621020, 8, 1, 2),
(59, 820318621020, 9, 1, 2),
(60, 820318621020, 10, 1, 2),
(61, 820318621024, 1, 1, 2),
(62, 820318621024, 2, 4, 2),
(63, 820318621024, 3, 1, 2),
(64, 820318621024, 4, 1, 2),
(65, 820318621024, 5, 2, 2),
(66, 820318621024, 6, 2, 2),
(67, 820318621024, 7, 2, 2),
(68, 820318621024, 8, 1, 2),
(69, 820318621024, 9, 1, 2),
(70, 820318621024, 10, 4, 2),
(71, 820318621007, 1, 1, 2),
(72, 820318621007, 2, 4, 2),
(73, 820318621007, 3, 1, 2),
(74, 820318621007, 4, 1, 2),
(75, 820318621007, 5, 2, 2),
(76, 820318621007, 6, 2, 2),
(77, 820318621007, 7, 2, 2),
(78, 820318621007, 8, 1, 2),
(79, 820318621007, 9, 1, 2),
(80, 820318621007, 10, 1, 2),
(131, 820318621011, 1, 1, 2),
(132, 820318621011, 2, 1, 2),
(133, 820318621011, 3, 1, 2),
(134, 820318621011, 4, 2, 2),
(135, 820318621011, 5, 3, 2),
(136, 820318621011, 6, 2, 2),
(137, 820318621011, 7, 2, 2),
(138, 820318621011, 8, 1, 2),
(139, 820318621011, 9, 1, 2),
(140, 820318621011, 10, 1, 2),
(142, 820318621002, 1, 1, 2),
(143, 820318621002, 2, 2, 2),
(144, 820318621002, 3, 2, 2),
(145, 820318621002, 4, 3, 2),
(146, 820318621002, 5, 2, 2),
(147, 820318621002, 6, 2, 2),
(148, 820318621002, 7, 2, 2),
(149, 820318621002, 8, 1, 2),
(150, 820318621002, 9, 1, 2),
(151, 820318621002, 10, 2, 2),
(152, 820318621018, 1, 1, 2),
(153, 820318621018, 2, 2, 2),
(154, 820318621018, 3, 2, 2),
(155, 820318621018, 4, 2, 2),
(156, 820318621018, 5, 2, 2),
(157, 820318621018, 6, 2, 2),
(158, 820318621018, 7, 1, 2),
(159, 820318621018, 8, 1, 2),
(160, 820318621018, 9, 2, 2),
(161, 820318621018, 10, 2, 2),
(162, 820318621029, 1, 2, 2),
(163, 820318621029, 2, 2, 2),
(164, 820318621029, 3, 1, 2),
(165, 820318621029, 4, 2, 2),
(166, 820318621029, 5, 2, 2),
(167, 820318621029, 6, 2, 2),
(168, 820318621029, 7, 1, 2),
(169, 820318621029, 8, 1, 2),
(170, 820318621029, 9, 1, 2),
(171, 820318621029, 10, 1, 2),
(192, 820318621001, 1, 1, 2),
(193, 820318621001, 2, 2, 2),
(194, 820318621001, 3, 2, 2),
(195, 820318621001, 4, 2, 2),
(196, 820318621001, 5, 3, 2),
(197, 820318621001, 6, 1, 2),
(198, 820318621001, 7, 2, 2),
(199, 820318621001, 8, 2, 2),
(200, 820318621001, 9, 2, 2),
(201, 820318621001, 10, 2, 2),
(245, 820318621010, 1, 1, 2),
(246, 820318621010, 2, 3, 2),
(247, 820318621010, 3, 2, 2),
(248, 820318621010, 4, 1, 2),
(249, 820318621010, 5, 2, 2),
(250, 820318621010, 6, 3, 2),
(251, 820318621010, 7, 3, 2),
(252, 820318621010, 8, 2, 2),
(253, 820318621010, 9, 1, 2),
(254, 820318621010, 10, 3, 2),
(295, 820318621012, 12, 2, 2),
(296, 820318621012, 4, 1, 2),
(297, 820318621012, 5, 2, 2),
(298, 820318621012, 9, 1, 2),
(299, 820318621012, 13, 1, 2),
(300, 820318621012, 8, 1, 2),
(301, 820318621012, 3, 1, 2),
(302, 820318621012, 14, 1, 2),
(303, 820318621012, 6, 2, 2),
(304, 820318621012, 7, 2, 2),
(305, 820318621012, 28, 134, 3),
(306, 820318621012, 17, 4, 3),
(307, 820318621012, 19, 3, 3),
(308, 820318621012, 21, 2, 3),
(309, 820318621012, 16, 4, 3),
(310, 820318621012, 27, 2, 3),
(311, 820318621012, 25, 2, 3),
(312, 820318621012, 26, 4, 3),
(313, 820318621012, 24, 1, 3),
(314, 820318621012, 22, 4, 3),
(315, 820318621021, 20, 2, 3),
(316, 820318621021, 24, 1, 3),
(317, 820318621021, 19, 3, 3),
(318, 820318621021, 28, 134, 3),
(319, 820318621021, 21, 2, 3),
(320, 820318621021, 26, 4, 3),
(321, 820318621021, 27, 2, 3),
(322, 820318621021, 23, 1, 3),
(323, 820318621021, 22, 4, 3),
(324, 820318621021, 18, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `studentscore`
--

CREATE TABLE `studentscore` (
  `SID` int(10) NOT NULL,
  `REGNO` bigint(14) NOT NULL,
  `SCORE` int(10) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  `EX_ID` int(10) NOT NULL,
  `LOG` date NOT NULL,
  `TIME` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentscore`
--

INSERT INTO `studentscore` (`SID`, `REGNO`, `SCORE`, `TOTAL`, `EX_ID`, `LOG`, `TIME`) VALUES
(31, 820318621025, 27, 30, 2, '2021-03-31', '00:00:00'),
(32, 820318621022, 26, 30, 2, '2021-03-31', '00:00:00'),
(33, 820318621020, 29, 30, 2, '2021-03-31', '00:00:00'),
(34, 820318621024, 28, 30, 2, '2021-04-01', '00:00:00'),
(35, 820318621007, 30, 30, 2, '2021-04-02', '13:05:18'),
(41, 820318621011, 21, 30, 2, '2021-04-08', '12:30:31'),
(42, 820318621002, 16, 30, 2, '2021-04-14', '10:44:00'),
(43, 820318621018, 12, 30, 2, '2021-04-14', '20:07:08'),
(44, 820318621029, 15, 30, 2, '2021-04-19', '12:20:01'),
(47, 820318621001, 8, 30, 2, '2021-05-05', '12:57:51'),
(54, 820318621010, 14, 30, 2, '2021-05-07', '14:17:21'),
(60, 820318621012, 30, 30, 2, '2021-05-20', '19:38:55'),
(62, 820318621012, 29, 30, 3, '2021-05-20', '20:04:11'),
(63, 820318621021, 28, 30, 3, '2021-05-20', '20:37:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`APID`),
  ADD UNIQUE KEY `REGNO` (`SREGNO`);

--
-- Indexes for table `coursetable`
--
ALTER TABLE `coursetable`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`EXMNE_ID`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`EX_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `partaquestions`
--
ALTER TABLE `partaquestions`
  ADD PRIMARY KEY (`QIDA`);

--
-- Indexes for table `partbquestions`
--
ALTER TABLE `partbquestions`
  ADD PRIMARY KEY (`QIDB`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentactivity`
--
ALTER TABLE `studentactivity`
  ADD PRIMARY KEY (`ACTID`);

--
-- Indexes for table `studentactivityb`
--
ALTER TABLE `studentactivityb`
  ADD PRIMARY KEY (`ACTBID`);

--
-- Indexes for table `studentscore`
--
ALTER TABLE `studentscore`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `APID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `coursetable`
--
ALTER TABLE `coursetable`
  MODIFY `COURSE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `EXMNE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `EX_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `partaquestions`
--
ALTER TABLE `partaquestions`
  MODIFY `QIDA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `partbquestions`
--
ALTER TABLE `partbquestions`
  MODIFY `QIDB` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `studentactivity`
--
ALTER TABLE `studentactivity`
  MODIFY `ACTID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `studentactivityb`
--
ALTER TABLE `studentactivityb`
  MODIFY `ACTBID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `studentscore`
--
ALTER TABLE `studentscore`
  MODIFY `SID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
