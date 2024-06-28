Micro Mail

Micro Mail

CREATE TABLE `email_queue` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_account_id` int(11) DEFAULT NULL,
  `e_to` varchar(100) NOT NULL,
  `e_from` varchar(100) NOT NULL,
  `e_subject` varchar(100) NOT NULL,
  `e_body` text NOT NULL,
  `e_cc` varchar(200) DEFAULT NULL,
  `e_bcc` varchar(200) DEFAULT NULL,
  `e_attachment` varchar(200) DEFAULT NULL,
  `e_sent` tinyint(4) NOT NULL DEFAULT 0,
  `e_success` tinyint(4) NOT NULL DEFAULT 0,
  `e_error_response` text DEFAULT NULL,
  `e_response` text DEFAULT NULL,
  `e_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `e_attempt_date` timestamp NULL DEFAULT NULL,
  `e_sent_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
