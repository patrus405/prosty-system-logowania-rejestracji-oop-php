CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date` date NOT NULL,
  `email_confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;