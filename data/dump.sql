CREATE TABLE `posts` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(255) NOT NULL,
 `post` longtext NOT NULL,
 `created_at` timestamp NOT NULL UNIQUE,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 
DEFAULT CHARSET=utf8;

INSERT INTO posts(id, title, post, created_at)
VALUES (1,'Lorem ipsum','dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.[1] Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.','20120202031515');

INSERT INTO posts(id, title, post, created_at)
VALUES (2, 'Dolor sit amet','consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.','20130503011414');

INSERT INTO posts(id, title, post, created_at)
VALUES (3, 'Consectetuer adipiscing elit','sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.','20130512041616');
