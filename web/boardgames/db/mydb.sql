-- Nikkala Thomson
-- CS 313 database for "The Board Game Whisperer"

-- Clean up any old tables

DROP TABLE public.recommendation;
-- recommendation depends on gamer and board_game
DROP TABLE public.board_game;
DROP TABLE public.preference;
-- preference depends on gamer
DROP TABLE public.gamer;

-- Create function to trigger user time stamp update (Source code: https://x-team.com/blog/automatic-timestamps-with-postgresql/)

CREATE OR REPLACE FUNCTION trigger_timestamp()
RETURNS TRIGGER AS $$
BEGIN
  NEW.updated_at = NOW();
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TABLE public.gamer (
    gamer      SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
	display_name    VARCHAR(100) NOT NULL,
	email           VARCHAR(50) NOT NULL,
	hashed_password TEXT NOT NULL,
    created_at     TIMESTAMPTZ NOT NULL DEFAULT NOW(),
	updated_at    TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

-- create trigger for timestamp modification

CREATE TRIGGER set_timestamp
BEFORE UPDATE ON gamer
FOR EACH ROW
EXECUTE PROCEDURE trigger_timestamp();

CREATE TABLE public.board_game (
    board_game          SERIAL NOT NULL PRIMARY KEY,
    name        VARCHAR(50) NOT NULL,
    designer    VARCHAR(40),
	description TEXT,
	image_url   TEXT,
    properties json  
);
    
CREATE TABLE public.preference (
    preference      SERIAL      NOT NULL PRIMARY KEY,
	gamer  INTEGER UNIQUE,
    FOREIGN KEY (gamer) REFERENCES gamer(gamer),
    preferences json
);

CREATE TABLE public.recommendation (
    gamer             INTEGER NOT NULL,
    board_game        INTEGER NOT NULL,
    PRIMARY KEY (gamer, board_game), 
    recommended BOOLEAN,  -- tracks whether (T/F) this game was recommended to this gamer
    -- if either gamer or board_game are deleted, any associated recommendations are also deleted
    CONSTRAINT recommendation_gamer_fkey FOREIGN KEY (gamer)
      REFERENCES gamer (gamer) 
      ON UPDATE NO ACTION ON DELETE CASCADE,
    CONSTRAINT recommendation_board_game_fkey FOREIGN KEY (board_game)
      REFERENCES board_game (board_game) 
      ON UPDATE NO ACTION ON DELETE CASCADE
);

-- list tables
\dt



