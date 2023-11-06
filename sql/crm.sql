CREATE TABLE `crm_h1_ke_h1` (
  `id_crm_h1_ke_h1` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_h1_ke_h1`
  ADD PRIMARY KEY (`id_crm_h1_ke_h1`);

ALTER TABLE `crm_h1_ke_h1`
  MODIFY `id_crm_h1_ke_h1` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

CREATE TABLE `crm_h2_ke_h1_ds` (
  `id_crm_h2_ke_h1_ds` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_h2_ke_h1_ds`
  ADD PRIMARY KEY (`id_crm_h2_ke_h1_ds`);

ALTER TABLE `crm_h2_ke_h1_ds`
  MODIFY `id_crm_h2_ke_h1_ds` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

CREATE TABLE `crm_h2_ke_h1_dl` (
  `id_crm_h2_ke_h1_dl` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_h2_ke_h1_dl`
  ADD PRIMARY KEY (`id_crm_h2_ke_h1_dl`);

ALTER TABLE `crm_h2_ke_h1_dl`
  MODIFY `id_crm_h2_ke_h1_dl` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

CREATE TABLE `crm_kpb1` (
  `id_crm_kpb1` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_kpb1`
  ADD PRIMARY KEY (`id_crm_kpb1`);

ALTER TABLE `crm_kpb1`
  MODIFY `id_crm_kpb1` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

CREATE TABLE `crm_kpb2` (
  `id_crm_kpb2` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_kpb2`
  ADD PRIMARY KEY (`id_crm_kpb2`);

ALTER TABLE `crm_kpb2`
  MODIFY `id_crm_kpb2` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

CREATE TABLE `crm_kpb3` (
  `id_crm_kpb3` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_kpb3`
  ADD PRIMARY KEY (`id_crm_kpb3`);

ALTER TABLE `crm_kpb3`
  MODIFY `id_crm_kpb3` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

CREATE TABLE `crm_kpb4` (
  `id_crm_kpb4` int(11) NOT NULL,
  `date` date NOT NULL,
  `kode_dealer` int(11) NOT NULL,
  `januari` double NOT NULL,
  `februari` double  NOT NULL,
  `maret` double NOT NULL,
  `april` double NOT NULL,
  `mai` double NOT NULL,
  `juni` double NOT NULL,
  `juli` double NOT NULL,
  `agustus` double NOT NULL,
  `september` double NOT NULL,
  `oktober` double NOT NULL,
  `november` double NOT NULL,
  `desember` double NOT NULL,
  `ach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `crm_kpb4`
  ADD PRIMARY KEY (`id_crm_kpb4`);

ALTER TABLE `crm_kpb4`
  MODIFY `id_crm_kpb4` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--

-- CREATE TABLE `crm_sales` (
--   `id_crm_sales` int(11) NOT NULL,
--   `id_tahun` int(4) NOT NULL,
--   `date` date NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `jaunuari` boolean NOT NULL,
--   `februari` boolean  NOT NULL,
--   `maret` boolean NOT NULL,
--   `april` boolean NOT NULL,
--   `mai` boolean NOT NULL,
--   `juni` boolean NOT NULL,
--   `juli` boolean NOT NULL,
--   `agustus` boolean NOT NULL,
--   `september` boolean NOT NULL,
--   `oktober` boolean NOT NULL,
--   `november` boolean NOT NULL,
--   `desember` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `crm_sales`
--   ADD PRIMARY KEY (`id_crm_sales`);

-- ALTER TABLE `crm_sales`
--   MODIFY `id_crm_sales` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;


-- CREATE TABLE `januari` (
--   `id_januari` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `januari`
--   ADD PRIMARY KEY (`id_januari`);

-- ALTER TABLE `id_januari`
--   MODIFY `id_januari` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `februari` (
--   `id_februari` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `februari`
--   ADD PRIMARY KEY (`id_februari`);

-- ALTER TABLE `id_februari`
--   MODIFY `id_februari` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `maret` (
--   `id_maret` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `maret`
--   ADD PRIMARY KEY (`id_maret`);

-- ALTER TABLE `id_maret`
--   MODIFY `id_maret` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `april` (
--   `id_april` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `april`
--   ADD PRIMARY KEY (`id_april`);

-- ALTER TABLE `id_april`
--   MODIFY `id_april` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `mai` (
--   `id_mai` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `mai`
--   ADD PRIMARY KEY (`id_mai`);

-- ALTER TABLE `id_mai`
--   MODIFY `id_mai` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `juni` (
--   `id_juni` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE ``
--   ADD PRIMARY KEY (`id_juni`);

-- ALTER TABLE `id_juni`
--   MODIFY `id_juni` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `juli` (
--   `id_juli` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `juli`
--   ADD PRIMARY KEY (`id_juli`);

-- ALTER TABLE `id_juli`
--   MODIFY `id_juli` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `agustus` (
--   `id_agustus` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `agustus`
--   ADD PRIMARY KEY (`id_agustus`);

-- ALTER TABLE `id_agustus`
--   MODIFY `id_agustus` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `september` (
--   `id_september` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `september`
--   ADD PRIMARY KEY (`id_september`);

-- ALTER TABLE `id_september`
--   MODIFY `id_september` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `oktober` (
--   `id_oktober` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean() NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `oktober`
--   ADD PRIMARY KEY (`id_oktober`);

-- ALTER TABLE `id_oktober`
--   MODIFY `id_oktober` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `november` (
--   `id_november` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `november`
--   ADD PRIMARY KEY (`id_november`);

-- ALTER TABLE `id_november`
--   MODIFY `id_november` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;

-- --

-- CREATE TABLE `desember` (
--   `id_desember` int(11) NOT NULL,
--   `kode_dealer` int(11) NOT NULL,
--   `h1_ke_h1` boolean NOT NULL,
--   `h2_ke_h1_ds` boolean NOT NULL,
--   `h2_ke_h1_dl` boolean NOT NULL,
--   `kpb1` boolean NOT NULL,
--   `kpb2` boolean NOT NULL,
--   `kpb3` boolean NOT NULL,
--   `kpb4` boolean NOT NULL,
--   `sales` boolean NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ALTER TABLE `desember`
--   ADD PRIMARY KEY (`id_desember`);

-- ALTER TABLE `id_desember`
--   MODIFY `id_desember` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- COMMIT;