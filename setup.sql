CREATE TABLE IF NOT EXISTS plans ( id int NOT NULL AUTO_INCREMENT,
nome_plano varchar(50) NOT NULL DEFAULT '0',
valor_plano int NOT NULL DEFAULT '0', PRIMARY KEY (id) )
ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO plans (id, nome_plano, valor_plano) 
VALUES (1, 'Fale Mais 30', 30),
(2, 'Fale Mais 60', 60),
(3, 'Fale Mais 120', 120);

CREATE TABLE IF NOT EXISTS simulator ( id int NOT NULL AUTO_INCREMENT,
origem int NOT NULL DEFAULT '0',
destino int NOT NULL DEFAULT '0',
taxa_min float NOT NULL DEFAULT '0',
PRIMARY KEY (id) ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO simulator (id, origem, destino, taxa_min)
VALUES (1, 11, 11, 0.5),
(2, 11, 16, 1.9),
(3, 11, 17, 1.7),
(4, 11, 18, 0.9),
(5, 16, 11, 2.9), 
(6, 16, 16, 0.5), 
(7, 16, 17, 1.5), 
(8, 16, 18, 2), 
(9, 17, 11, 2.7), 
(10, 17, 16, 1.3), 
(11, 17, 17, 0.5), 
(12, 17, 18, 1.1), 
(13, 18, 11, 1.9), 
(14, 18, 16, 2.2), 
(15, 18, 17, 1.8), 
(16, 18, 18, 0.5);