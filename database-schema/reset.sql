

CREATE TABLE password_resets (
  email VARCHAR(255),
  token_hash VARCHAR(255),
  expires_at DATETIME
);
