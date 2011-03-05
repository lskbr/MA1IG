CREATE TABLE boolean_configuration (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description text, configuration_id BIGINT, is_kernel TINYINT(1) DEFAULT '0' NOT NULL, is_activated TINYINT(1) DEFAULT '0' NOT NULL, INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE category_translation (id BIGINT, name VARCHAR(40) NOT NULL UNIQUE, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, position BIGINT DEFAULT 99 NOT NULL, is_activated TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE configuration (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description text, configuration_id BIGINT, INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dynamic_page (id BIGINT AUTO_INCREMENT, hash_code VARCHAR(255) NOT NULL, menu_title VARCHAR(255) NOT NULL, position BIGINT DEFAULT 99 NOT NULL, publication_date DATETIME, category_id BIGINT NOT NULL, language_id BIGINT NOT NULL, controller VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, boolean_configuation_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX language_id_idx (language_id), INDEX boolean_configuation_id_idx (boolean_configuation_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE language (id BIGINT AUTO_INCREMENT, name VARCHAR(40) NOT NULL UNIQUE, abbreviation VARCHAR(5) NOT NULL UNIQUE, flag VARCHAR(255), is_activated TINYINT(1) DEFAULT '0' NOT NULL, is_default TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE numeric_configuration (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description text, configuration_id BIGINT, value BIGINT NOT NULL, INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE page (id BIGINT AUTO_INCREMENT, hash_code VARCHAR(255) NOT NULL, menu_title VARCHAR(255) NOT NULL, position BIGINT DEFAULT 99 NOT NULL, publication_date DATETIME, category_id BIGINT NOT NULL, language_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX language_id_idx (language_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE static_page (id BIGINT AUTO_INCREMENT, hash_code VARCHAR(255) NOT NULL, menu_title VARCHAR(255) NOT NULL, position BIGINT DEFAULT 99 NOT NULL, publication_date DATETIME, category_id BIGINT NOT NULL, language_id BIGINT NOT NULL, content text, is_activated TINYINT(1) DEFAULT '0' NOT NULL, title VARCHAR(255) DEFAULT 'En contruction' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX language_id_idx (language_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE boolean_configuration ADD CONSTRAINT boolean_configuration_configuration_id_boolean_configuration_id FOREIGN KEY (configuration_id) REFERENCES boolean_configuration(id);
ALTER TABLE category_translation ADD CONSTRAINT category_translation_id_category_id FOREIGN KEY (id) REFERENCES category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE configuration ADD CONSTRAINT configuration_configuration_id_boolean_configuration_id FOREIGN KEY (configuration_id) REFERENCES boolean_configuration(id);
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_language_id_language_id FOREIGN KEY (language_id) REFERENCES language(id);
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_boolean_configuation_id_boolean_configuration_id FOREIGN KEY (boolean_configuation_id) REFERENCES boolean_configuration(id);
ALTER TABLE numeric_configuration ADD CONSTRAINT numeric_configuration_configuration_id_boolean_configuration_id FOREIGN KEY (configuration_id) REFERENCES boolean_configuration(id);
ALTER TABLE page ADD CONSTRAINT page_language_id_language_id FOREIGN KEY (language_id) REFERENCES language(id);
ALTER TABLE page ADD CONSTRAINT page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE static_page ADD CONSTRAINT static_page_language_id_language_id FOREIGN KEY (language_id) REFERENCES language(id);
ALTER TABLE static_page ADD CONSTRAINT static_page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
