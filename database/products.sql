SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

CREATE DATABASE `products`;
USE `products`;

-- --------------------------------------------------------

--
-- Table's structure for the table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` float NULL,
  `height` float NULL,
  `width` float NULL,
  `length` float NULL,
  `weight` float NULL,
  `size` float NULL,
  `type` varchar(30) NOT NULL,
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `height`, `width`, `length`, `weight`, `size`, `type`) VALUES
(1, 'JVC20012300', 'Acme DISC', 1, NULL, NULL, NULL, NULL, 700, 'dvd');

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `height`, `width`, `length`, `weight`, `size`, `type`) VALUES
(2, 'GGWP0007', 'War and Peace', 20, NULL, NULL, NULL, 2, NULL, 'book');

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `height`, `width`, `length`, `weight`, `size`, `type`) VALUES
(3, 'TR120555', 'Chair', 40, 24, 45, 15, NULL, NULL, 'furniture');

--
-- Indexes for dumped tables
--

--
-- Indexes of the table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT of the dumped tables
--

--
-- AUTO_INCREMENT of the table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
