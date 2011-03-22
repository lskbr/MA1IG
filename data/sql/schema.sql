CREATE TABLE configuration (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description text, configuration_id BIGINT, type VARCHAR(255), is_kernel TINYINT(1) DEFAULT '0', is_activated TINYINT(1) DEFAULT '0', value BIGINT DEFAULT 0, INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE category_translation (id BIGINT, name VARCHAR(40) NOT NULL UNIQUE, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, is_activated TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE configuration (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description text, configuration_id BIGINT, type VARCHAR(255), is_kernel TINYINT(1) DEFAULT '0', is_activated TINYINT(1) DEFAULT '0', value BIGINT DEFAULT 0, INDEX configuration_type_idx (type), INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dynamic_page_translation (id BIGINT, menu_title VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE dynamic_page (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, publication_date DATETIME, category_id BIGINT NOT NULL, controller VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, boolean_configuation_id BIGINT NOT NULL, INDEX category_id_idx (category_id), INDEX boolean_configuation_id_idx (boolean_configuation_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE language (id BIGINT AUTO_INCREMENT, name VARCHAR(40) NOT NULL UNIQUE, abbreviation VARCHAR(5) NOT NULL UNIQUE, flag VARCHAR(255), is_activated TINYINT(1) DEFAULT '0' NOT NULL, is_default TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE page_translation (id BIGINT, menu_title VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE page (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, publication_date DATETIME, category_id BIGINT NOT NULL, INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE static_page_translation (id BIGINT, menu_title VARCHAR(255), content text, is_activated TINYINT(1) DEFAULT '0', title VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE static_page (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, publication_date DATETIME, category_id BIGINT NOT NULL, INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE configuration ADD CONSTRAINT configuration_configuration_id_configuration_id FOREIGN KEY (configuration_id) REFERENCES configuration(id);
ALTER TABLE category_translation ADD CONSTRAINT category_translation_id_category_id FOREIGN KEY (id) REFERENCES category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE dynamic_page_translation ADD CONSTRAINT dynamic_page_translation_id_dynamic_page_id FOREIGN KEY (id) REFERENCES dynamic_page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_boolean_configuation_id_configuration_id FOREIGN KEY (boolean_configuation_id) REFERENCES configuration(id);
ALTER TABLE page_translation ADD CONSTRAINT page_translation_id_page_id FOREIGN KEY (id) REFERENCES page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE page ADD CONSTRAINT page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE static_page_translation ADD CONSTRAINT static_page_translation_id_static_page_id FOREIGN KEY (id) REFERENCES static_page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE static_page ADD CONSTRAINT static_page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
