-- Guest input statement for the user table.  

INSERT INTO gamer (username, display_name, email, hashed_password)
VALUES ('Guest', 'Guest', 'guest@gmail.com', 'gobbledygook');

-- Guest input for the preference table

INSERT INTO preference(gamer, preferences)
VALUES (1, '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":120, "min_weight":1.5, "max_weight":2.5, "themes":[], "mechanisms":[]}');


-- input for the board_game table

INSERT INTO board_game (name, designer, description, image_url, properties)
VALUES ('Azul', 'Michael Kiesling', 'Draft colored tiles and decorate the walls of your palace.  Score points for completing patterns and sets.', 'https://images-na.ssl-images-amazon.com/images/I/61Uzk6kyVyL.jpg', '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":45,  "weight":1.8, "themes":["Art", "Renaissance"], "mechanisms":[ "Drafting", "Pattern_Building", "Set_Collection", "Tile_Placement"]}' );

VALUES ('Azul', 'Michael Kiesling', 'Draft colored tiles and decorate the walls of your palace.  Score points for completing patterns and sets.', 'https://images-na.ssl-images-amazon.com/images/I/61Uzk6kyVyL.jpg', '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":45,  "weight":1.8, "themes":["Art", "Renaissance"], "mechanisms":[ "Drafting", "Pattern_Building", "Set_Collection", "Tile_Placement"]}' );