CREATE TABLE `ms` (
  `id_data` int(11) NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `nama_dealer` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `nos`
--
ALTER TABLE `ms`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `nos`
--
ALTER TABLE `ms`
  MODIFY `id_data` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;