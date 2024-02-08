CREATE DATABASE myownapi;

USE myownapi;

CREATE TABLE `quotes` (
    `id` int AUTO_INCREMENT NOT NULL ,
    `quote` TEXT  NOT NULL ,
    `author` varchar(255)  NOT NULL ,
    `created_at` datetime  NOT NULL DEFAULT current_timestamp ,
    `updated_at` datetime  NOT NULL DEFAULT current_timestamp ,
    PRIMARY KEY (
        `id`
    )
);

INSERT INTO quotes (quote , author) 
VALUES 
("People sleep peaceably in their beds at night only because rough men stand ready to do violence on their behalf." , "George Orwell") , 
("The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart." , "Helen Keller") , 
("Never be afraid to trust an unknown future to a known God." , "Corrie Ten Boom") , 
("It's not what you look at that matters, it's what you see." , "Henry David Thoreau") , 
("You can have everything in life you want, if you will just help other people get what they want." , "Zig Ziglar") , 
("Trust is not the same as faith. A friend is someone you trust. Putting faith in anyone is a mistake." , "Christopher Hitchens") ,
("A journey is a person in itself; no two are alike. And all plans, safeguards, policing, and coercion are fruitless. We find that after years of struggle that we do not take a trip; a trip takes us." , "John Steinbeck")
;