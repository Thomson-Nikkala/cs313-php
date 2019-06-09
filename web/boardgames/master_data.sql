-- Guest input statement for the user table.  

INSERT INTO gamer (username, display_name, email, hashed_password)
VALUES ('Guest', 'Guest', 'guest@gmail.com', 'gobbledygook');

-- Guest input for the preference table

INSERT INTO preference(gamer, preferences)
VALUES (1, '{"min_players":2, "max_players":4, "min_playtime":30, "max_playtime":120, "min_weight":1.5, "max_weight":2.5, "themes":[], "mechanisms":[]}');


-- input for the board_game table

INSERT INTO board_game (name, image_url, properties)
VALUES ('Azul', 'https://cf.geekdo-images.com/opengraph/img/5UBOdYQkBGcTlZFSWH3cQ2G3fvw=/fit-in/1200x630/pic3718275.jpg', '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":45,  "weight":1.8, "themes":["Art", "Renaissance"], "mechanisms":[ "Drafting", "Pattern_Building", "Set_Collection", "Tile_Placement"]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

VALUES ('', '', '{ "min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":[ "", ""]}' );

