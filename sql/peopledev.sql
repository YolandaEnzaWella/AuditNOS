CREATE TABLE `peopledev` (
  `id_data` int(11) NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `nama_dealer` varchar(80) NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `honda_id` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `wajib_training` varchar(50) NOT NULL,
  `status_training` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `peopledev`
--
ALTER TABLE `peopledev`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `peopledev`
--
ALTER TABLE `peopledev`
  MODIFY `id_data` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;