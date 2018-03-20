CREATE TABLE ft_table (
	id UNSIGNED NOT NULL AUTO_INCREMENT,
	login VARCHAR(8) NOT NULL DEFAULT 'toto',
	groupe ENUM(’staff’, ’student’,’other’) NOT NULL,
	date_de_creation DATE NOT NULL, 
	PRIMARY KEY(id)
)
