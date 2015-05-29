-- Create schemas

-- Create tables
CREATE TABLE IF NOT EXISTS compagnie
(
    id INTEGER NOT NULL,
    nom VARCHAR(255),
    pays VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS client
(
    id INTEGER NOT NULL,
    nom VARCHAR(255),
    rue VARCHAR(255),
    ville VARCHAR(255),
    code_postale VARCHAR(255),
    pays VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS navire
(
    id INTEGER NOT NULL,
    nom VARCHAR(255),
    capacite INTEGER,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS compagnie_navire
(
    id_navire INTEGER,
    id_compagnie INTEGER    
);

CREATE TABLE IF NOT EXISTS transporter
(
    id_navire INTEGER,
    id_conteneur INTEGER    
);

CREATE TABLE IF NOT EXISTS conteneur
(
    id INTEGER NOT NULL,
    capacite INTEGER,
    id_client INTEGER,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS users
(
    id INTEGER NOT NULL,
    user_password_hash VARCHAR(255),
    user_email VARCHAR(255),
    user_type VARCHAR(255),
    id_client INTEGER,
    id_compagnie INTEGER,
    id_agent INTEGER,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS mouvement
(
    id INTEGER NOT NULL,
    type VARCHAR(255),
    id_conteneur INTEGER,
    id_escale INTEGER,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS escale
(
    id INTEGER NOT NULL,
    date_entree DATE,
    date_sortie DATE,
    PRIMARY KEY(id)
);


-- Create FKs
ALTER TABLE compagnie_navire
    ADD    FOREIGN KEY (id_navire)
    REFERENCES navire(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE compagnie_navire
    ADD    FOREIGN KEY (id_compagnie)
    REFERENCES compagnie(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE transporter
    ADD    FOREIGN KEY (id_navire)
    REFERENCES navire(id)
    MATCH SIMPLE
;
    
ALTER TABLE transporter
    ADD    FOREIGN KEY (id_conteneur)
    REFERENCES conteneur(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE conteneur
    ADD    FOREIGN KEY (id_client)
    REFERENCES client(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE users
    ADD    FOREIGN KEY (id_client)
    REFERENCES client(id)
    MATCH SIMPLE
;
    
ALTER TABLE users
    ADD    FOREIGN KEY (id_compagnie)
    REFERENCES compagnie(id)
    MATCH SIMPLE
;
    
ALTER TABLE mouvement
    ADD    FOREIGN KEY (id_conteneur)
    REFERENCES conteneur(id)
    MATCH SIMPLE
;
    
ALTER TABLE mouvement
    ADD    FOREIGN KEY (id_escale)
    REFERENCES escale(id)
    MATCH SIMPLE
;
    

