DROP SCHEMA IF EXISTS whatscrap CASCADE;
CREATE SCHEMA whatscrap;

CREATE TABLE IF NOT EXISTS whatscrap.user(
  username VARCHAR(50) PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  location VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS whatscrap.code(
  code TEXT PRIMARY KEY,
  username VARCHAR(50) REFERENCES whatscrap.user DEFAULT NULL
);
