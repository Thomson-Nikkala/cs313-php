-- This is the OLD DATABASE version, kept only for reference.

-- Cleanup old tables

select 'drop table if exists "' || gamer || '" cascade;' 
  from pg_tables
 where schemaname = 'public';
 
select 'drop table if exists "' || game || '" cascade;' 
  from pg_tables
 where schemaname = 'public';
 
 select 'drop table if exists "' || gaming_preference || '" cascade;' 
  from pg_tables
 where schemaname = 'public';
 
select 'drop table if exists "' || recommendation || '" cascade;' 
  from pg_tables
 where schemaname = 'public';

-- Create function to trigger user time stamp update (Reference: https://x-team.com/blog/automatic-timestamps-with-postgresql/)

CREATE OR REPLACE FUNCTION trigger_timestamp()
RETURNS TRIGGER AS $$
BEGIN
  NEW.updated_at = NOW();
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TABLE public.gamer (
    id      SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE;
	display_name    VARCHAR(100) NOT NULL,
	email           VARCHAR(50) NOT NULL,
	password_salt   BINARY(40),
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

CREATE TABLE public.game (
    id      SERIAL NOT NULL PRIMARY KEY,
	name	VARCHAR(50) NOT NULL,
	designer  VARCHAR(40),
	description  TEXT,
	image_url  TEXT,
    properties jsonb  -- jsonb is stored as binary code
);
    
-- sample input statement for the game table

INSERT INTO game (name, designer, description, image_url, properties)
VALUES ('Azul', 'Michael Kiesling', 'Draft colored tiles and decorate the walls of your palace.  Score points for completing patterns and sets.', 'https://cf.geekdo-images.com/itemrep/img/ql-0-t271LVGqbmWA1gdkIH7WvM=/fit-in/246x300/pic3718275.jpg', '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":45, "themes":["art", "renaissance"], "weight":1.8, "mechanisms":[ "Card Drafting", "Pattern Building", "Set Collection", "Tile Placement"]}' );
    
CREATE TABLE public.gaming_preference (
    id      SERIAL      NOT NULL PRIMARY KEY,
	user_id  INTEGER,
    FOREIGN KEY (user_id) REFERENCES user(id),
    preferences jsonb
);

-- sample input statement for the gaming_preference table

INSERT INTO gaming_preference(user_id, preferences)
VALUES (1, '{ "min_players":3, "max_players":8, "min_playtime":30, "max_playtime":60, "themes":["fantasy", "science fiction", "art"], "min_weight":1.0, "max_weight":2.5, "mechanisms":[ "Card Drafting", "Deck Building", "Set Collection", "Tile Placement"]}');

CREATE TABLE public.recommendation (
    user_id             INTEGER NOT NULL,
    game_id         INTEGER NOT NULL,
    PRIMARY KEY (user_id, game_id),
    recommended BOOLEAN;
);

-- sample input statemeng for the recommendation table 

INSERT INTO recommendation(user_id, game_id, recommended)
VALUES (1,1,TRUE);


-- list tables

\dt



