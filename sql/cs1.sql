CREATE TABLE `cs1` (
  `id_data` int(11) NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `nama_dealer` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `cs`
--
ALTER TABLE `cs1`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs1`
  MODIFY `id_data` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;