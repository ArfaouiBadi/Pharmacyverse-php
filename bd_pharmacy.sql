-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 09:28 PM
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
-- Database: `bd_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `code_client` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` int(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Mdp` varchar(8) NOT NULL,
  `dateNais` varchar(20) NOT NULL,
  `CIN` int(8) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `isAdmin` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`code_client`, `nom`, `prenom`, `tel`, `email`, `Mdp`, `dateNais`, `CIN`, `adress`, `photo`, `isAdmin`) VALUES
(3, 'nahdi', 'walid', 98654721, 'nahdi@gmail.com', '1234', '2023-12-07', 41326548, 'Tunis', 'https://i.ibb.co/wKb68Ps/083a9c73-7df1-449c-9ef3-5f6a9712bd42.jpg', 0),
(5, 'badi', 'Arfaoui', 98147936, 'Arfaouibadi19@gmail.com', '1234', '2023-12-20', 14459887, 'Rue', 'https://i.ibb.co/n1Xffw2/b0f29890-6e98-4ab1-a1fb-327d1a071108.jpg', 1),
(7, 'badi', 'Arfaoui', 98147936, 'arfaouibadi19@yhoo.com', '1234', '', 14459887, 'Rue de aaaaaa', 'https://i.ibb.co/hZcqZmy/2f8c9b26-e11f-49e7-b0e3-25dfb6bf9136.jpg', 0),
(9, 'walid', 'Arfaoui', 98147936, 'arfaouibadi50@gmail.com', '1234', '2023-12-15', 14459887, 'Rue', 'https://i.ibb.co/jkFzfTx/7df8456c-2dc4-456b-b41b-03f8085f75b0.jpg', 0),
(11, 'client', 'client', 12345678, 'client@gmail.com', '1234', '2023-12-02', 12345678, 'client', 'https://i.ibb.co/wKb68Ps/083a9c73-7df1-449c-9ef3-5f6a9712bd42.jpg', 0),
(13, 'Rami', 'Khadthri', 98456321, 'rami@gmail.com', '1234', '1952-02-07', 99999999, 'Kabereya', 'https://scontent.ftun13-1.fna.fbcdn.net/v/t39.30808-6/331549337_543073284311014_6742213325125192477_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=hTccEgY_nEcAX8lvKOp&_nc_ht=scontent.ftun13-1.fna&oh=00_AfAqKpUYB6niPX8Dhc7i3-Zt2ckHM75GkQQ628Bp6Z22Fg&oe=65760918', 0),
(14, 'nasrie', 'mariem', 22578338, 'nasrimariem@gmail.com', '1234', '2023-12-07', 1144587, 'rades', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicament`
--

CREATE TABLE `medicament` (
  `code_medicament` int(10) NOT NULL,
  `description` varchar(30) NOT NULL,
  `prix_unitaire` int(10) NOT NULL,
  `treatedFor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicament`
--

INSERT INTO `medicament` (`code_medicament`, `description`, `prix_unitaire`, `treatedFor`) VALUES
(1, 'Head and Shoulder', 90, 'Hair '),
(3, 'Lisinopril', 9, 'Hypertension'),
(4, 'Paracetamol', 4, 'Fever and pain'),
(5, 'Atorvastatin', 15, 'Cholesterol management'),
(6, 'Omeprazole', 11, 'Acid reflux'),
(7, 'Ibuprofen', 6, 'Inflammation and pain'),
(8, 'Levothyroxine', 8, 'Thyroid disorders'),
(9, 'Metformin', 10, 'Diabetes'),
(10, 'Cetirizine', 5, 'Allergies'),
(11, 'Ranitidine', 9, 'Gastric ulcers'),
(12, 'Amlodipine', 11, 'High blood pressure'),
(13, 'Clopidogrel', 14, 'Blood clot prevention'),
(14, 'Albuterol', 8, 'Bronchospasm relief'),
(15, 'Warfarin', 9, 'Blood thinning'),
(16, 'Simvastatin', 15, 'High cholesterol'),
(17, 'Ciprofloxacin', 10, 'Bacterial infections'),
(18, 'Fluticasone', 7, 'Nasal allergies'),
(19, 'Escitalopram', 9, 'Depression and anxiety'),
(20, 'Hydrochlorothiazide', 6, 'Edema and high blood pressure'),
(21, 'Metoprolol', 13, 'Hypertension'),
(22, 'Diazepam', 7, 'Anxiety disorders'),
(23, 'Pregabalin', 16, 'Neuropathic pain'),
(24, 'Mometasone', 12, 'Eczema and dermatitis'),
(25, 'Cephalexin', 9, 'Bacterial infections'),
(26, 'Fluoxetine', 6, 'Depression and panic disorder'),
(27, 'Enalapril', 10, 'High blood pressure'),
(28, 'Prednisone', 9, 'Inflammation and autoimmune disorders'),
(29, 'Gabapentin', 7, 'Neuropathic pain'),
(30, 'Clarithromycin', 14, 'Bacterial infections'),
(31, 'Diphenhydramine', 5, 'Allergies and insomnia'),
(32, 'Sildenafil', 17, 'Erectile dysfunction'),
(33, 'Losartan', 10, 'Hypertension'),
(34, 'Furosemide', 8, 'Edema and heart failure'),
(35, 'Lorazepam', 8, 'Anxiety disorders'),
(36, 'Montelukast', 12, 'Asthma and allergic rhinitis'),
(37, 'Esomeprazole', 12, 'Gastroesophageal reflux disease (GERD)'),
(38, 'Acetaminophen', 5, 'Pain and fever'),
(39, 'Citalopram', 7, 'Depression'),
(40, 'Hydrocodone', 16, 'Moderate to severe pain'),
(41, 'Lansoprazole', 11, 'Gastric ulcers and GERD'),
(42, 'Cyclobenzaprine', 8, 'Muscle spasms'),
(43, 'Azithromycin', 15, 'Bacterial infections'),
(44, 'Alprazolam', 8, 'Anxiety disorders'),
(45, 'Venlafaxine', 10, 'Depression and anxiety'),
(46, 'Tramadol', 11, 'Moderate to severe pain'),
(47, 'Bupropion', 8, 'Depression and smoking cessation'),
(48, 'Meloxicam', 13, 'Arthritis pain'),
(49, 'Duloxetine', 10, 'Depression and nerve pain'),
(50, 'Oxycodone', 19, 'Severe pain management'),
(52, 'Mirtazapine', 9, 'Depression'),
(53, 'Metronidazole', 7, 'Bacterial and parasitic infections'),
(54, 'Amitriptyline', 7, 'Depression and nerve pain'),
(55, 'Doxycycline', 6, 'Bacterial infections'),
(56, 'Naproxen', 7, 'Pain and inflammation'),
(57, 'Carvedilol', 10, 'Heart failure and hypertension'),
(58, 'Pantoprazole', 10, 'GERD and peptic ulcers'),
(59, 'Lidocaine', 8, 'Local anesthesia'),
(60, 'Fentanyl', 16, 'Severe pain management'),
(61, 'Trazodone', 8, 'Depression and insomnia'),
(62, 'Prednisolone', 11, 'Inflammatory conditions'),
(63, 'Hydroxyzine', 6, 'Anxiety and itching'),
(64, 'Dicyclomine', 9, 'Irritable bowel syndrome (IBS)'),
(65, 'Risperidone', 10, 'Schizophrenia and bipolar disorder'),
(66, 'Quetiapine', 13, 'Bipolar disorder and depression'),
(67, 'Valacyclovir', 15, 'Herpes simplex virus (HSV) infections'),
(68, 'Methylprednisolone', 11, 'Inflammatory conditions'),
(69, 'Cefuroxime', 10, 'Bacterial infections');

-- --------------------------------------------------------

--
-- Table structure for table `medicament_vente`
--

CREATE TABLE `medicament_vente` (
  `code_med_vente` int(10) NOT NULL,
  `id_medicament` int(10) NOT NULL,
  `id_vente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `code_pharmcien` int(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` int(8) NOT NULL,
  `id_pharmacie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacien`
--

CREATE TABLE `pharmacien` (
  `code_pharmacie` int(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `tel1` int(8) NOT NULL,
  `tel2` int(8) NOT NULL,
  `quote` varchar(500) NOT NULL,
  `experience` int(2) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacien`
--

INSERT INTO `pharmacien` (`code_pharmacie`, `nom`, `address`, `tel1`, `tel2`, `quote`, `experience`, `photo`) VALUES
(1, 'Dr Olfa', '123 Main Street', 12345678, 98765432, 'Experienced pharmacist with a focus on customer care.', 5, 'https://i.ibb.co/QMFwDHR/medical-concept-indian-beautiful-female-260nw-1635029716.webp'),
(2, 'Dr aymen', '456 Oak Avenue', 87654321, 56789012, 'Dedicated to providing quality pharmaceutical services.', 10, 'https://i.ibb.co/rygwMmK/bruno-rodrigues-279x-IHym-PYY-unsplash.jpg'),
(3, 'Dr Sami', '789 Pine Road', 23456789, 34567890, 'Over 10 years of expertise in pharmacy services.', 8, 'https://i.ibb.co/q0TpwP3/usman-yousaf-p-Trhfmj2j-DA-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `code_client` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `nbrStart` int(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`code_client`, `review`, `nbrStart`, `status`) VALUES
(1, 'I had an amazing experience with the service! The staff was friendly, and the treatment was effective. I would highly recommend it to others. Thank you!', 5, 'Recovered'),
(2, 'The treatment was effective, and I am almost fully recovered. The healthcare professionals were knowledgeable and caring throughout the process.', 4, 'Almost Recovered'),
(3, 'I am satisfied with the care I received. The medical team was attentive, and the facilities were clean and organized. I feel positive about my recovery journey.', 3, 'Patient'),
(4, 'As a new patient, I just started the treatment. The initial experience has been good, and I am hopeful for positive outcomes. Looking forward to continuing the journey.', 2, 'New Patient'),
(11, '', 3, ''),
(11, '', 5, ''),
(11, '', 5, ''),
(11, 'walid', 1, 'aaaaa'),
(12, 'service tarayar ejebny barcha', 4, 'cured'),
(5, '', 0, ''),
(14, 'service heyel', 2, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `code_vente` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `code_medicament` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`code_vente`, `id_client`, `code_medicament`) VALUES
(1, 5, 4),
(2, 5, 28),
(3, 5, 70),
(4, 5, 28),
(5, 5, 66),
(6, 5, 66),
(7, 5, 36),
(8, 5, 19),
(9, 11, 7),
(10, 14, 38),
(11, 14, 49),
(12, 14, 48);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`code_client`);

--
-- Indexes for table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`code_medicament`);

--
-- Indexes for table `medicament_vente`
--
ALTER TABLE `medicament_vente`
  ADD PRIMARY KEY (`code_med_vente`),
  ADD KEY `fk_id_medicament` (`id_medicament`),
  ADD KEY `fk_id_vente` (`id_vente`);

--
-- Indexes for table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD PRIMARY KEY (`code_pharmcien`),
  ADD KEY `fk_id_pharmacie` (`id_pharmacie`);

--
-- Indexes for table `pharmacien`
--
ALTER TABLE `pharmacien`
  ADD PRIMARY KEY (`code_pharmacie`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`code_vente`),
  ADD KEY `fk_id_client` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `code_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `code_medicament` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `medicament_vente`
--
ALTER TABLE `medicament_vente`
  MODIFY `code_med_vente` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacie`
--
ALTER TABLE `pharmacie`
  MODIFY `code_pharmcien` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacien`
--
ALTER TABLE `pharmacien`
  MODIFY `code_pharmacie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `code_vente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicament_vente`
--
ALTER TABLE `medicament_vente`
  ADD CONSTRAINT `fk_id_vente` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`code_vente`);

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `fk_id_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`code_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
