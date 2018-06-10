CREATE TABLE adverts
(
  id      INT AUTO_INCREMENT
    PRIMARY KEY,
  title   VARCHAR(200)                        NOT NULL,
  phone   INT(9)                              NOT NULL,
  status  INT(1) DEFAULT '1'                  NULL,
  created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  message TEXT                                NULL
)
  ENGINE = InnoDB;

CREATE TABLE users
(
  id       INT AUTO_INCREMENT
    PRIMARY KEY,
  name     VARCHAR(200)                        NOT NULL,
  email    VARCHAR(200)                        NOT NULL,
  status   INT(1) DEFAULT '1'                  NULL,
  created  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  password VARCHAR(200)                        NULL,
  CONSTRAINT email
  UNIQUE (email)
)
  ENGINE = InnoDB;

