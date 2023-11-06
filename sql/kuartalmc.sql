CREATE TABLE `kuartalmc` (
  `id_data` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kuartal` varchar(50) NOT NULL,
  `tahap` varchar(50) NOT NULL,
  `indikator` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `kuartalmc`
--
ALTER TABLE `kuartalmc`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `kuartalmc`
--
ALTER TABLE `kuartalmc`
  MODIFY `id_data` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;