SELECT last_name, first_name, CAST(birthdate AS DATE) as birthdate FROM user_card WHERE year(birthdate)=1989 ORDER BY last_name;
