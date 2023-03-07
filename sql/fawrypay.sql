-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table fawrypay.activities: ~0 rows (approximately)
INSERT INTO `activities` (`id`, `name`, `address`, `details`, `active`, `fees`, `created_at`, `updated_at`, `tax_id`, `owner_id`) VALUES
	(1, 'GGGGGGG', '887FYGYTCYTRCTRYTC', 'KMLKJKGYTFYFYT', 1, 88, '2023-03-06', '2023-03-06', 1, 1);

-- Dumping data for table fawrypay.categories: ~0 rows (approximately)

-- Dumping data for table fawrypay.causes: ~0 rows (approximately)

-- Dumping data for table fawrypay.companies: ~0 rows (approximately)
INSERT INTO `companies` (`id`, `name`, `address`, `owner_name`, `balance`, `tax_id`) VALUES
	(1, 'RRRRR', '77YBJHGVTFCTFCT', 'FFFFFFF', 9999, 1);

-- Dumping data for table fawrypay.companies_codes: ~0 rows (approximately)

-- Dumping data for table fawrypay.contact_rquests: ~0 rows (approximately)

-- Dumping data for table fawrypay.invoices: ~0 rows (approximately)

-- Dumping data for table fawrypay.items: ~0 rows (approximately)

-- Dumping data for table fawrypay.license: ~0 rows (approximately)

-- Dumping data for table fawrypay.national_ids: ~0 rows (approximately)

-- Dumping data for table fawrypay.offers: ~0 rows (approximately)

-- Dumping data for table fawrypay.owners_phone: ~0 rows (approximately)

-- Dumping data for table fawrypay.ranks: ~2 rows (approximately)
INSERT INTO `ranks` (`id`, `name`) VALUES
	(1, 'RRR'),
	(2, 'UUUU');

-- Dumping data for table fawrypay.services: ~0 rows (approximately)

-- Dumping data for table fawrypay.tranfers: ~0 rows (approximately)

-- Dumping data for table fawrypay.uid_devices: ~0 rows (approximately)

-- Dumping data for table fawrypay.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `email`, `phone`, `password`, `balance`, `vf-code`, `fingerprint`, `created_at`, `updated_at`, `gender`, `verfied`, `trusted`, `verified_at`, `password_payments`, `company_id`, `rank_id`) VALUES
	(1, 'EEE@EEE.COM', 1345678990, '123456', 77777, 88, '99', '2023-03-06', '2023-03-06', 0, 0, 'T', '2023-03-06', 123456, 1, 1);

-- Dumping data for table fawrypay.vehicles: ~0 rows (approximately)

-- Dumping data for table fawrypay.vehicle_type: ~0 rows (approximately)

-- Dumping data for table fawrypay.visa: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
