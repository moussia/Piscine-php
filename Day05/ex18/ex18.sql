SELECT name, id_distrib FROM distrib WHERE name REGEXP 'Y.*Y' AND (id_distrib = 42 OR id_distrib = 71 OR id_distrib BETWEEN 62 AND 69 OR id_distrib BETWEEN 88 AND 90) LIMIT 5 OFFSET 2;
