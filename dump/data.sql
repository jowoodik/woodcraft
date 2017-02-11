CREATE TABLE applications
(
    id INTEGER PRIMARY KEY NOT NULL,
    user_name VARCHAR(255),
    user_email VARCHAR(255),
    user_telephone VARCHAR(255),
    user_company VARCHAR(255),
    build_appointment VARCHAR(255),
    status SMALLINT,
    outer_length CHAR(10),
    outer_width CHAR(10),
    outer_height CHAR(10),
    inner_length CHAR(10),
    inner_width CHAR(10),
    inner_height CHAR(10),
    build_foundation VARCHAR(255),
    file_route VARCHAR(255),
    created_at INTEGER,
    updated_at INTEGER
);
CREATE TABLE entity_catalog
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    name VARCHAR(255),
    CONSTRAINT catalog_route_id_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE entity_catalog_categories
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    text TEXT,
    image VARCHAR(255),
    created_at INTEGER,
    updated_at INTEGER,
    is_show BOOLEAN,
    is_sidebar BOOLEAN,
    CONSTRAINT pages_route_id_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE entity_catalog_instrument
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    name VARCHAR(255),
    CONSTRAINT fk_catalog_route_id FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE entity_catalog_wood
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    name VARCHAR(255),
    CONSTRAINT fk_catalog_wood_id FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE entity_gallery
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    image VARCHAR(255),
    description TEXT,
    created_at INTEGER,
    updated_at INTEGER,
    CONSTRAINT gallery_route_id_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE entity_page
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    text TEXT,
    created_at INTEGER,
    updated_at INTEGER,
    is_sidebar BOOLEAN DEFAULT false,
    CONSTRAINT entity_page_route_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE entity_services
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    image VARCHAR(255),
    description TEXT,
    created_at INTEGER,
    updated_at INTEGER,
    CONSTRAINT entity_services_id_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE gallery_item
(
    id INTEGER PRIMARY KEY NOT NULL,
    gallery_id INTEGER,
    name VARCHAR(255),
    image VARCHAR(255),
    is_active BOOLEAN,
    created_at INTEGER,
    updated_at INTEGER,
    CONSTRAINT gallery_item_gallery_id_id_fk FOREIGN KEY (gallery_id) REFERENCES entity_gallery (id)
);
CREATE TABLE menu
(
    id INTEGER PRIMARY KEY NOT NULL,
    route_id INTEGER,
    name VARCHAR(255),
    position VARCHAR(255),
    sort INTEGER,
    is_active BOOLEAN,
    CONSTRAINT menu_route_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE migration
(
    version VARCHAR(180) PRIMARY KEY NOT NULL,
    apply_time INTEGER
);
CREATE TABLE news
(
    id INTEGER PRIMARY KEY NOT NULL,
    title VARCHAR(255),
    alias VARCHAR(255),
    short_text TEXT,
    text TEXT,
    image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description VARCHAR(255),
    meta_keywords VARCHAR(255),
    created_at INTEGER,
    updated_at INTEGER,
    status INTEGER
);
CREATE TABLE route
(
    id INTEGER PRIMARY KEY NOT NULL,
    title VARCHAR(255),
    alias VARCHAR(255),
    parent_id INTEGER,
    entity INTEGER,
    entity_id INTEGER,
    meta_title VARCHAR(255),
    meta_description TEXT,
    meta_keywords TEXT,
    is_active BOOLEAN,
    sort INTEGER,
    created_at INTEGER,
    updated_at INTEGER,
    CONSTRAINT route_parent_id_id_fk FOREIGN KEY (parent_id) REFERENCES route (id)
);
COMMENT ON COLUMN route.title IS 'Р—Р°РіРѕР»РѕРІРѕРє';
CREATE TABLE route_index
(
    route_id INTEGER PRIMARY KEY NOT NULL,
    path VARCHAR(255),
    level SMALLINT,
    refs INTEGER[],
    CONSTRAINT route_index_route_id_fk FOREIGN KEY (route_id) REFERENCES route (id)
);
CREATE TABLE settings_main_page
(
    id INTEGER PRIMARY KEY NOT NULL,
    title VARCHAR(255),
    info_text TEXT,
    status SMALLINT,
    image VARCHAR(255),
    video TEXT,
    number VARCHAR(255),
    position VARCHAR(50),
    sort SMALLINT DEFAULT 0
);
CREATE TABLE slider
(
    id INTEGER PRIMARY KEY NOT NULL,
    title VARCHAR(255),
    text TEXT,
    image VARCHAR(255),
    link VARCHAR(50),
    status SMALLINT,
    sort SMALLINT DEFAULT 0,
    created_at INTEGER,
    updated_at INTEGER
);