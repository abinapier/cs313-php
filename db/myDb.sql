CREATE TABLE users (
	id serial NOT NULL primary key,
	name varchar(60) NOT NULL
);

CREATE TABLE shoppinglist (
	id serial NOT NULL primary key,
	user_id integer REFERENCES users (id)
);

CREATE TABLE recipebox (
	id serial NOT NULL primary key,
	user_id int NOT NULL references users (id)
);

CREATE TABLE recipe (
	id serial NOT NULL primary key,
	name varchar(100) NOT NULL,
	instructions text NOT NULL,
	recipebox_id int NOT NULL references recipebox(id)
);

CREATE TABLE menu (
	id serial NOT NULL primary key,
	date date NOT NULL,
	user_id int NOT NULL references users (id),
	recipe_one_id int NOT NULL references recipe(id),
	recipe_two_id int NOT NULL references recipe(id),
	recipe_three_id int NOT NULL references recipe(id),
	recipe_four_id int NOT NULL references recipe(id),
	recipe_five_id int NOT NULL references recipe(id)
);

CREATE TABLE ingredient (
	id serial NOT NULL primary key,
	name varchar(100) NOT NULL,
	amount varchar(50) NOT NULL,
	recipe_id int NOT NULL references recipe(id),
	shoppinglist_id int references shoppinglist(id)
);
