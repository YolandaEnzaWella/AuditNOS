CREATE TABLE `issuems` (
  `id_data` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_semester` varchar(50) NOT NULL,
  `h1premisses` varchar(50) NOT NULL,
  `issues` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `issuems`
--
ALTER TABLE `issuems`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `issuems`
--
ALTER TABLE `issuems`
  MODIFY `id_data` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;