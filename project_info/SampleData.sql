-- -----------------------------------------------------
-- INSERT INTO event_location statements
-- -----------------------------------------------------
INSERT INTO `event_location`(`city`, `zip`, `street`)
VALUES ('Kent','98031','Strawberry St. SE 55512'),
('Kent','98031','James St. 12345'),
('Renton','98055','Coal Creek Pkwy SE 87542'),
('Auburn','98092','SE 320th St 12401'),
('Auburn','98002','124th Ave SE 31207');

-- -----------------------------------------------------
-- INSERT INTO tags statements
-- -----------------------------------------------------
INSERT INTO `tags`(`tag_name`)
VALUES ('DnD'), ('Matrix'), ('Critical Role'), ('Drinks'), ('Food'), ('Pizza'),
('Wh40k'), ('WHFB'), ('Larping'), ('AOS');

-- -----------------------------------------------------
-- INSERT INTO genres statements
-- -----------------------------------------------------
INSERT INTO `genres`(`genre_name`) VALUES ('Dark Fantasy'), ('High Fantasy'), ('Sword & Planet'),
('Cyberpunk'), ('Steampunk'), ('Dieselpunk'), ('Sci-fi'), ('Fantasy');

-- -----------------------------------------------------
-- INSERT INTO game statements
-- -----------------------------------------------------
INSERT INTO `game`(`game_name`) VALUES ('Dungeons & Dragons 5E'), ('Magic the Gathering'),
('Settlers of Catan'), ('Warhammer Fantasy Battles 8E'), ('Dungeons & Dragons 3.5E');

-- -----------------------------------------------------
-- INSERT INTO event statements
-- -----------------------------------------------------
INSERT INTO `event`(`event_name`, `event_date`, `location_id`, `genre_id`, `game_id`, `capacity`)
VALUES ('DnD Happy Hour Party', '2020-06-15','1','8','1','32'),
    ("Gdubb's Warhammer Fantasy Casual", '2020-05-05','3','1','4','16'),
    ('MTG Tourny', '2020-04-03', '4', '5', '2', '36');

-- -----------------------------------------------------
-- INSERT INTO event_tags statements
-- -----------------------------------------------------
INSERT INTO `event_tags`(`event_id`, `tag_id`) VALUES (1,1),(1,4),(1,5),(1,6);