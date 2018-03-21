SELECT nom, prenom, DATE(date_de_naissance)
FROM fiche_personne
WHERE YEAR(date_de_naissance) = 1989
ORDER BY nom;
