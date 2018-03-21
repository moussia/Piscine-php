SELECT  UPPER(fiche_personne.nom) AS NOM,
fiche_personne.prenom, abonnement.prix
FROM membre
INNER JOIN fiche_personne ON fiche_personne.id_perso = membre.id_membre
INNER JOIN abonnement ON abonnement.id_abo = membre.id_membre
WHERE abonnement.prix > 42
ORDER BY fiche_personne.nom, ORDER BY fiche_personne.prenom;
