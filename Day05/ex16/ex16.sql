SELECT COUNT(date_last_film) AS movies FROM member WHERE DATE(date_last_film) >= "2006-10-30" AND DATE(date_last_film) <= "2007-07-27" OR MONTH(date_last_film) = "12" AND DAY(date_last_film) = "24";
