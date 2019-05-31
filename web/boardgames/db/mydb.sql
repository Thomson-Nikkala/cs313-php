-- Nikkala Thomson
-- CS 313 database for "The Board Game Whisperer"

-- Clean up any old tables

DROP TABLE public.recommendation;
-- recommendation depends on gamer and board_game
DROP TABLE public.board_game;
DROP TABLE public.preference;
-- preference depends on gamer;
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
	password_salt   INT,
	password_hashed TEXT,
    created_at     TIMESTAMPTZ NOT NULL DEFAULT NOW(),
	modified_at    TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

-- create trigger for timestamp modification

CREATE TRIGGER set_timestamp
BEFORE UPDATE ON gamer
FOR EACH ROW
EXECUTE PROCEDURE trigger_timestamp();

-- Sample input statement for the user table.  Password hashing and salting will be added later.

INSERT INTO gamer (username, display_name, email)
VALUES ('Nikkala', 'Princess Leia', 'nikkalabiz@gmail.com');

CREATE TABLE public.board_game (
    board_game          SERIAL NOT NULL PRIMARY KEY,
    name        VARCHAR(50) NOT NULL,
    designer    VARCHAR(40),
	description TEXT,
	image_url   TEXT,
    properties json  
);
    
-- sample input statement for the board_game table

INSERT INTO board_game (name, designer, description, image_url, properties)
VALUES ('Azul', 'Michael Kiesling', 'Draft colored tiles and decorate the walls of your palace.  Score points for completing patterns and sets.', 'https://cf.geekdo-images.com/itemrep/img/ql-0-t271LVGqbmWA1gdkIH7WvM=/fit-in/246x300/pic3718275.jpg', '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":45, "themes":["art", "renaissance"], "weight":1.8, "mechanisms":[ "Card Drafting", "Pattern Building", "Set Collection", "Tile Placement"]}' );
    
CREATE TABLE public.preference (
    preference      SERIAL      NOT NULL PRIMARY KEY,
	gamer  INTEGER,
    FOREIGN KEY (gamer) REFERENCES gamer(gamer),
    preferences json
);

-- sample input statement for the preference table

INSERT INTO preference(gamer, preferences)
VALUES (1, '{ "min_players":3, "max_players":8, "min_playtime":30, "max_playtime":60, "themes":["fantasy", "science fiction", "art"], "min_weight":1.0, "max_weight":2.5, "mechanisms":[ "Card Drafting", "Deck Building", "Set Collection", "Tile Placement"]}');

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

-- sample input statement for the recommendation table 

INSERT INTO recommendation(gamer, board_game, recommended)
VALUES (1,1,TRUE);


-- list tables

\dt



