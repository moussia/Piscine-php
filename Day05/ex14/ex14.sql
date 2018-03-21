SELECT etage_salle AS etage
SUM(nbr_siege) AS sieges
FROM salle
ORDER BY sieges DESC;
