SELECT nom
FROM distrib
WHERE id_distrib = 42
OR id_distrib  BETWEEN  '62' AND '69'
OR id_distrib = 71
OR id_distrib BETWEEN '88' AND '90'
OR LOWER(nom) LIKE %y%y%
LIMIT 3. 8;
