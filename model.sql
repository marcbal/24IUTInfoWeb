-- Create schemas

-- Create tables
CREATE TABLE IF NOT EXISTS compagnies
(
    id INTEGER NOT NULL,
    nom VARCHAR(255),
    pays VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS clients
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

CREATE TABLE IF NOT EXISTS transporters
(
    id_navire INTEGER,
    id_conteneur INTEGER    
);

CREATE TABLE IF NOT EXISTS conteneurs
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

CREATE TABLE IF NOT EXISTS mouvements
(
    id INTEGER NOT NULL,
    type VARCHAR(255),
    id_conteneur INTEGER,
    id_escale INTEGER,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS escales
(
    id INTEGER NOT NULL,
    date_entree DATE,
    date_sortie DATE,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS agents
(
    id INTEGER NOT NULL,
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
    REFERENCES compagnies(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE transporters
    ADD    FOREIGN KEY (id_navire)
    REFERENCES navire(id)
    MATCH SIMPLE
;
    
ALTER TABLE transporters
    ADD    FOREIGN KEY (id_conteneur)
    REFERENCES conteneurs(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE conteneurs
    ADD    FOREIGN KEY (id_client)
    REFERENCES clients(id)
    MATCH SIMPLE
    ON DELETE CASCADE
    ON UPDATE CASCADE
;
    
ALTER TABLE users
    ADD    FOREIGN KEY (id_client)
    REFERENCES clients(id)
    MATCH SIMPLE
;
    
ALTER TABLE users
    ADD    FOREIGN KEY (id_compagnie)
    REFERENCES compagnies(id)
    MATCH SIMPLE
;
    
ALTER TABLE mouvements
    ADD    FOREIGN KEY (id_conteneur)
    REFERENCES conteneurs(id)
    MATCH SIMPLE
;
    
ALTER TABLE mouvements
    ADD    FOREIGN KEY (id_escale)
    REFERENCES escales(id)
    MATCH SIMPLE
;
    
ALTER TABLE users
    ADD    FOREIGN KEY (id_agent)
    REFERENCES agents(id)
    MATCH SIMPLE
;
    

