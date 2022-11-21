SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `relationship` text NOT NULL,
  `profil_picture` varchar(255) NOT NULL,
  `cover_picture` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
  -- may add likes and dislikes later
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
-- The COMMIT command is the transactional command used to save changes invoked by a transaction to the database. 