drop table if exists Movies;
create table Movies
( MovieID int unsigned not null auto_increment primary key,
Movie varchar(50),
Rating decimal(4,1), 
ReleaseYear int(4),
Description text
);
insert into Movies values (NULL,"Shawshank Redemption",9.2,1994,"Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.");

insert into Movies values (NULL,"The Dark Knight",8.9,2008,"When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.");

insert into Movies values (NULL,"Fight Club",8.9,1999,"An insomniac office worker, looking for a way to change his life, crosses paths with a devil-may-care soap maker, forming an underground fight club that evolves into something much, much more...");

insert into Movies values (NULL,"The Fellowship of the Ring",8.8,2001,"A meek Hobbit and eight companions set out on a journey to destroy the One Ring and the Dark Lord Sauron.");

insert into Movies values (NULL,"The Empire Strikes Back",8.8,1980,"After the rebels have been brutally overpowered by the Empire on their newly established base, Luke Skywalker takes advanced Jedi training with Master Yoda, while his friends are pursued by Darth Vader as part of his plan to capture Luke.");

insert into Movies values (NULL,"Inception",8.8,2010,"A thief who steals corporate secrets through use of the dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.");

insert into Movies values (NULL,"Forrest Gump",8.8,1994,"Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him.");

insert into Movies values (NULL,"A New Hope",8.8,1997,"Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a wookiee and two droids to save the universe from the Empire's world-destroying battle-station, while also attempting to rescue Princess Leia from the evil Darth Vader.");

insert into Movies values (NULL,"The Matrix",8.7,1999,"A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.");

insert into Movies values (NULL,"Interstellar",8.7,2014,"A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.");

insert into Movies values (NULL,"Raiders of the Lost Ark",8.5,1981,"Archaeologist and adventurer Indiana Jones is hired by the US government to find the Ark of the Covenant before the Nazis.");

insert into Movies values (NULL,"Terminator 2: Judgment Day",8.5,1991,"A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her young son, John Connor, from a more advanced cyborg, made out of liquid metal.");

insert into Movies values (NULL,"Memento",8.5,2000,"A man creates a strange system to help him remember things; so he can hunt for the murderer of his wife without his short-term memory loss being an obstacle.");

insert into Movies values (NULL,"Back to the Future Part II",7.8,1989,"After visiting 2015, Marty McFly must repeat his visit to 1955 to prevent disastrous changes to 1985... without interfering with his first trip.");

insert into Movies values (NULL,"Alien",8.5,1979,"The commercial vessel Nostromo receives a distress call from an unexplored planet. After searching for survivors, the crew heads home only to realize that a deadly bioform has joined them.");

insert into Movies values (NULL,"The Lion King",8.5,1994,"Lion cub and future king Simba searches for his identity. His eagerness to please others and penchant for testing his boundaries sometimes gets him into trouble.");

insert into Movies values (NULL,"The Great Dictator",8.5,1940,"Dictator Adenoid Hynkel tries to expand his empire while a poor Jewish barber tries to avoid persecution from Hynkel's regime.");

insert into Movies values (NULL,"WALL·E",8.4,2008,"In the distant future, a small waste collecting robot inadvertently embarks on a space journey that will ultimately decide the fate of mankind.");

insert into Movies values (NULL,"Return of the Jedi",8.4,1983,"After rescuing Han Solo from the palace of Jabba the Hutt, the rebels attempt to destroy the second Death Star, while Luke struggles to make Vader return from the dark side of the Force.");

insert into Movies values (NULL,"Eternal Sunshine of the Spotless Mind",8.4,2004,"When their relationship turns sour, a couple undergoes a procedure to have each other erased from their memories. But it is only through the process of loss that they discover what they had to begin with.");