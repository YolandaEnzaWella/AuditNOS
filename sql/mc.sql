CREATE TABLE `mc` (
  `id_data` int(11) NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `nama_dealer` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `q1` varchar(50) NOT NULL,
  `q2` varchar(50) NOT NULL,
  `q3` varchar(50) NOT NULL,
  `q4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `nos`
--
ALTER TABLE `mc`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `nos`
--
ALTER TABLE `mc`
  MODIFY `id_data` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;