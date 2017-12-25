CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `email_confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
