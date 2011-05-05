CREATE TABLE configuration (id BIGINT AUTO_INCREMENT, main VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description text, configuration_id BIGINT, type VARCHAR(255), is_kernel TINYINT(1) DEFAULT '0', is_activated TINYINT(1) DEFAULT '0', value VARCHAR(255) DEFAULT '0', INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE category_translation (id BIGINT, name VARCHAR(40) NOT NULL UNIQUE, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, is_activated TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE citation_translation (id BIGINT, author VARCHAR(255), content text, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE citation (id BIGINT AUTO_INCREMENT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE comment (id BIGINT AUTO_INCREMENT, text text, update_at datetime, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE configuration (id BIGINT AUTO_INCREMENT, main VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description text, configuration_id BIGINT, type VARCHAR(255), is_kernel TINYINT(1) DEFAULT '0', is_activated TINYINT(1) DEFAULT '0', value VARCHAR(255) DEFAULT '0', INDEX configuration_type_idx (type), INDEX configuration_id_idx (configuration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE corespondance (id BIGINT AUTO_INCREMENT, first_mail datetime, last_mail datetime, number_of_mail BIGINT DEFAULT 0, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE counter_translation (id BIGINT, slogan_part1 VARCHAR(255) NOT NULL, slogan_part2 VARCHAR(255) NOT NULL, donation_text VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE counter (id BIGINT AUTO_INCREMENT, initial_date DATETIME NOT NULL, initial_number BIGINT NOT NULL, period BIGINT NOT NULL, objective_number BIGINT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dynamic_page_translation (id BIGINT, menu_title VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE dynamic_page (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, publication_date DATETIME, category_id BIGINT, controller VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, boolean_configuation_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX boolean_configuation_id_idx (boolean_configuation_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE faq_translation (id BIGINT, question text, answer text, is_activated TINYINT(1) DEFAULT '0', lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE faq (id BIGINT AUTO_INCREMENT, position BIGINT, faq_category_id BIGINT NOT NULL, INDEX faq_category_id_idx (faq_category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE faq_category_translation (id BIGINT, name VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE faq_category (id BIGINT AUTO_INCREMENT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE folder (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE galery_translation (id BIGINT, name VARCHAR(40) NOT NULL UNIQUE, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE galery (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, is_activated TINYINT(1) DEFAULT '0' NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE guestbook (id BIGINT AUTO_INCREMENT, content text, is_validated TINYINT(1) DEFAULT '0' NOT NULL, language_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX language_id_idx (language_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE language (id BIGINT AUTO_INCREMENT, name VARCHAR(40) NOT NULL UNIQUE, abbreviation VARCHAR(5) NOT NULL UNIQUE, flag VARCHAR(255), is_activated TINYINT(1) DEFAULT '0' NOT NULL, is_default TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE message (id BIGINT AUTO_INCREMENT, text text NOT NULL, is_saved TINYINT(1) DEFAULT '0', read_at datetime, created_at datetime NOT NULL, reply_at datetime, comment_id BIGINT, sender_id BIGINT, category_id BIGINT NOT NULL, folder_id BIGINT DEFAULT 1 NOT NULL, forward_to_id BIGINT NOT NULL, INDEX comment_id_idx (comment_id), INDEX sender_id_idx (sender_id), INDEX category_id_idx (category_id), INDEX folder_id_idx (folder_id), INDEX forward_to_id_idx (forward_to_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE news (id BIGINT AUTO_INCREMENT, title VARCHAR(255), content text, is_activated TINYINT(1) DEFAULT '0' NOT NULL, language_id BIGINT NOT NULL, publication_date DATETIME, comments_activated TINYINT(1) DEFAULT '1' NOT NULL, INDEX language_id_idx (language_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE news_comments (id BIGINT AUTO_INCREMENT, content text, author_id BIGINT NOT NULL, news_id BIGINT NOT NULL, father_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX news_id_idx (news_id), INDEX author_id_idx (author_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE page_translation (id BIGINT, menu_title VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE page (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, publication_date DATETIME, category_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE partner_translation (id BIGINT, company_name VARCHAR(255), description VARCHAR(255), site VARCHAR(255), is_visible TINYINT(1) DEFAULT '0', lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE partner (id BIGINT AUTO_INCREMENT, logo VARCHAR(255), position BIGINT, visit_count BIGINT DEFAULT 0, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE person (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL UNIQUE, corespondance_id BIGINT, INDEX corespondance_id_idx (corespondance_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE photo_translation (id BIGINT, title VARCHAR(255), description text, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE photo (id BIGINT AUTO_INCREMENT, url VARCHAR(255), publication_start DATETIME, publication_end DATETIME, galery_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX galery_id_idx (galery_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE standard_sentence (id BIGINT AUTO_INCREMENT, text text NOT NULL, title VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE static_page_translation (id BIGINT, menu_title VARCHAR(255) NOT NULL, content text NOT NULL, is_activated TINYINT(1) DEFAULT '0', title VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE static_page (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, publication_date DATETIME, category_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE address (id BIGINT AUTO_INCREMENT, street VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(10) NOT NULL, person_id BIGINT, INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE payment (id BIGINT AUTO_INCREMENT, brut_amout FLOAT(18, 2) NOT NULL, fee FLOAT(18, 2) NOT NULL, date VARCHAR(255) NOT NULL, paypal_id VARCHAR(255) NOT NULL UNIQUE, person_id BIGINT, INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, person_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE configuration ADD CONSTRAINT configuration_configuration_id_configuration_id FOREIGN KEY (configuration_id) REFERENCES configuration(id);
ALTER TABLE category_translation ADD CONSTRAINT category_translation_id_category_id FOREIGN KEY (id) REFERENCES category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE citation_translation ADD CONSTRAINT citation_translation_id_citation_id FOREIGN KEY (id) REFERENCES citation(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE counter_translation ADD CONSTRAINT counter_translation_id_counter_id FOREIGN KEY (id) REFERENCES counter(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE dynamic_page_translation ADD CONSTRAINT dynamic_page_translation_id_dynamic_page_id FOREIGN KEY (id) REFERENCES dynamic_page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE dynamic_page ADD CONSTRAINT dynamic_page_boolean_configuation_id_configuration_id FOREIGN KEY (boolean_configuation_id) REFERENCES configuration(id);
ALTER TABLE faq_translation ADD CONSTRAINT faq_translation_id_faq_id FOREIGN KEY (id) REFERENCES faq(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE faq ADD CONSTRAINT faq_faq_category_id_faq_category_id FOREIGN KEY (faq_category_id) REFERENCES faq_category(id);
ALTER TABLE faq_category_translation ADD CONSTRAINT faq_category_translation_id_faq_category_id FOREIGN KEY (id) REFERENCES faq_category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE galery_translation ADD CONSTRAINT galery_translation_id_galery_id FOREIGN KEY (id) REFERENCES galery(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE guestbook ADD CONSTRAINT guestbook_language_id_language_id FOREIGN KEY (language_id) REFERENCES language(id);
ALTER TABLE message ADD CONSTRAINT message_sender_id_person_id FOREIGN KEY (sender_id) REFERENCES person(id);
ALTER TABLE message ADD CONSTRAINT message_forward_to_id_person_id FOREIGN KEY (forward_to_id) REFERENCES person(id);
ALTER TABLE message ADD CONSTRAINT message_folder_id_folder_id FOREIGN KEY (folder_id) REFERENCES folder(id);
ALTER TABLE message ADD CONSTRAINT message_comment_id_comment_id FOREIGN KEY (comment_id) REFERENCES comment(id);
ALTER TABLE message ADD CONSTRAINT message_category_id_faq_category_id FOREIGN KEY (category_id) REFERENCES faq_category(id);
ALTER TABLE news ADD CONSTRAINT news_language_id_language_id FOREIGN KEY (language_id) REFERENCES language(id);
ALTER TABLE news_comments ADD CONSTRAINT news_comments_news_id_news_id FOREIGN KEY (news_id) REFERENCES news(id);
ALTER TABLE news_comments ADD CONSTRAINT news_comments_author_id_sf_guard_user_id FOREIGN KEY (author_id) REFERENCES sf_guard_user(id);
ALTER TABLE page_translation ADD CONSTRAINT page_translation_id_page_id FOREIGN KEY (id) REFERENCES page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE page ADD CONSTRAINT page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE partner_translation ADD CONSTRAINT partner_translation_id_partner_id FOREIGN KEY (id) REFERENCES partner(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE person ADD CONSTRAINT person_corespondance_id_corespondance_id FOREIGN KEY (corespondance_id) REFERENCES corespondance(id);
ALTER TABLE photo_translation ADD CONSTRAINT photo_translation_id_photo_id FOREIGN KEY (id) REFERENCES photo(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE photo ADD CONSTRAINT photo_galery_id_galery_id FOREIGN KEY (galery_id) REFERENCES galery(id);
ALTER TABLE static_page_translation ADD CONSTRAINT static_page_translation_id_static_page_id FOREIGN KEY (id) REFERENCES static_page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE static_page ADD CONSTRAINT static_page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE address ADD CONSTRAINT address_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE payment ADD CONSTRAINT payment_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user ADD CONSTRAINT sf_guard_user_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
