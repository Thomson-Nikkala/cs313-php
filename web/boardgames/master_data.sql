-- Guest input statement for the user table.  

INSERT INTO gamer (username, display_name, email, hashed_password)
VALUES ('Guest', 'Guest', 'guest@gmail.com', 'gobbledygook');

-- Guest input for the preference table

INSERT INTO preference(gamer, preferences)
VALUES (1, '{"min_players":2, "max_players":4, "min_playtime":30, "max_playtime":120, "min_weight":1.5, "max_weight":2.5, "themes":[], "mechanisms":[]}');


-- input for the board_game table

INSERT INTO board_game (name, image_url, properties)
VALUES ('Azul', 'https://cdn.pastemagazine.com/www/articles/azul%20boardgame%20main.jpg', '{ "min_players":2, "max_players":4, "min_playtime":30, "max_playtime":45,  "weight":1.8, "themes":["Art", "Renaissance"], "mechanisms":[ "Drafting", "Pattern_Building", "Set_Collection", "Tile_Placement"]}' );

INSERT INTO board_game (name, image_url, properties)
VALUES ('Codenames', 'https://czechgames.com/en/home/news-18-08-28-a-little-story-behind-the-big-codenames/news-18-08-28-a-little-story-behind-the-big-codenames-a.png', '{ "min_players":2, "max_players":8, "min_playtime":15, "max_playtime":20,  "weight":1.31, "themes":["Spies"], "mechanisms":[ "Memory", "Partnerships", "Press_Your_Luck"]}' );

INSERT INTO board_game (name, image_url, properties)
VALUES ('Sushi Go Party!', 'https://cf.geekdo-images.com/medium/img/BljyHqtaMZWU9_VZhQ78TiU68PA=/fit-in/500x500/filters:no_upscale()/pic3729875.jpg', '{ "min_players":2, "max_players":8, "min_playtime":20, "max_playtime":25,  "weight":1.33, "themes":["Food"], "mechanisms":["Drafting", "Pattern_Building", "Set_Collection", "Tile_Placement"]}' );

INSERT INTO board_game (name, image_url, properties)
VALUES ('Dixit', 'https://cf.geekdo-images.com/opengraph/img/0Pu9oJx4vlXsl5sHTdjcBP7VHBM=/fit-in/1200x630/pic3483909.jpg', '{"min_players":3, "max_players":6, "min_playtime":30, "max_playtime":35,  "weight":1.24, "themes":["Art"], "mechanisms":["Simultaneous_Action_Selection", "Storytelling", "Voting"]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('Kingdomino', 'https://prodimage.images-bn.com/pimages/0803979036007_p0_v1_s550x406.jpg', '{"min_players":2, "max_players":4, "min_playtime":15, "max_playtime":20,  "weight":1.21, "themes":["Fantasy", "Medieval"], "mechanisms":["Drafting", "Pattern_Building", "Tile_Placement"]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('Telestrations', 'https://cf.geekdo-images.com/opengraph/img/C0T6EG5xfV-LuNdAsj1fDudMIc0=/fit-in/1200x630/pic2523100.jpg', '{"min_players":4, "max_players":8, "min_playtime":30, "max_playtime":35,  "weight":1.09, "themes":["Humor"], "mechanisms":["Line_Drawing"]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('One Night Ultimate Werewolf', 'http://cdn.shopify.com/s/files/1/0940/6374/products/1338_5567a88e392812.97684325_one_20night_20werewolf_large_e574c147-53b2-4aff-9b33-f011c9636c86_grande.jpg?v=1510663121', '{"min_players":3, "max_players":10, "min_playtime":10, "max_playtime":15,  "weight":1.4, "themes":["Horror"], "mechanisms":["Hidden_Traitor", "Voting"]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('PitchCar', 'http://www.fairplaygames.com/pics/Pitchcar.jpg', '{"min_players":2, "max_players":8, "min_playtime":30, "max_playtime":35,  "weight":1.12, "themes":["Racing", "Sports"], "mechanisms":["Dexterity"]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('Friday', 'https://cf.geekdo-images.com/opengraph/img/idpTaOpMAfejYA_oWt3Uk9lcns8=/fit-in/1200x630/pic1513328.jpg', '{"min_players":1, "max_players":1, "min_playtime":25, "max_playtime":30,  "weight":2.12, "themes":["Adventure", "Pirates"], "mechanisms":["Deck_Building", "Hand_Management"]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');

INSERT INTO board_game (name, image_url, properties)
VALUES ('', '', '{"min_players":, "max_players":, "min_playtime":, "max_playtime":,  "weight":, "themes":["", ""], "mechanisms":["", ""]}');
