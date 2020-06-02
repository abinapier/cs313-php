INSERT INTO recipe (name, instructions, recipebox_id)
VALUES ('BBQ Stuffed Sweet Potatoes', 'Preheat oven to 425 degrees F. Lay sweet potatoes cut side up on a large baking sheet. Roast until tender, about 35 minutes, depending on size of your potatoes. In a saucepan set to medium-low, stir together chicken and BBQ sauce. Heat until warm, 5-10 minutes. Top each potato with scoopfuls of chicken. Spoon over additional BBQ sauce and sprinkle with chopped parsley or sliced green onions, if desired.', 2), 
('Easy Chili', 'Mix the meat, beans and tomatoes together in large pot. Bring it to a boil over medium heat and then bring heat to medium low and allow to simmer for about 30 minutes. Salt and pepper to taste. Enjoy with your favorite toppings such as cheese and sour cream.', 2), 
('Black Bean Soup', 'Combine all ingredients in a medium pot. Bring to a boil and simmer for 10 minutes. Remove from stove and blend using an immersion blender or a traditional blender.', 2), 
('Cauliflower Soup', 'Warm the olive oil in a heavy-bottomed pan. Sweat the onion in the olive oil over low heat without letting it brown for 15 minutes. Add the cauliflower, salt to taste, and 1/2 cup water. Raise the heat slightly, cover the pot tightly and stew the cauliflower for 15 to 18 minutes, or until tender. Then add another 4 1/2 cups hot water, bring to a low simmer and cook an additional 20 minutes uncovered. Working in batches, purée the soup in a blender to a very smooth, creamy consistency. Let the soup stand for 20 minutes. In this time it will thicken slightly. Thin the soup with 1/2 cup hot water. Reheat the soup. Serve hot, drizzled with a thin stream of extra-virgin olive oil and freshly ground black pepper.', 2), 
('Easy Chicken Salad', 'Mix all ingredients in a small bowl. Enjoy right away or refrigerator until ready to serve.', 2);

INSERT INTO ingredient (name, amount, recipe_id)
VALUES ('Sweet Potatos', '2', 6),
('boneless skinless chicken breasts, cooked and shredded', '1 lb', 6),
('BBQ sauce','1/3 cup', 6),
('ground beef , cooked and drained', '1 lb', 7),
('15 oz can chili beans', '1', 7),
('10 ounce can diced tomatoes with green chiles', '1', 7),
('15.5 ounce can black beans', '2', 8),
('chicken broth', '1 cup', 8),
('15 ounce can diced tomatoes', '1 can', 8),
('olive oil', '3 T.', 9),
('fresh cauliflower', '1 head', 9),
('water', '5 1/2 cups', 9),
('shredded chicken', '1 cup', 10),
('mayonnaise', '2 T', 10),
('cranraisins', '1/3 cup', 10),
('Sweet Potatos', '2', 1),
('boneless skinless chicken breasts, cooked and shredded', '1 lb', 1),
('BBQ sauce','1/3 cup', 1),
('ground beef , cooked and drained', '1 lb', 2),
('15 oz can chili beans', '1', 2),
('10 ounce can diced tomatoes with green chiles', '1', 2),
('15.5 ounce can black beans', '2', 3),
('chicken broth', '1 cup', 3),
('15 ounce can diced tomatoes', '1 can', 3),
('olive oil', '3 T.', 4),
('fresh cauliflower', '1 head', 4),
('water', '5 1/2 cups', 4),
('shredded chicken', '1 cup', 5),
('mayonnaise', '2 T', 5),
('cranraisins', '1/3 cup', 5);

INSERT INTO menu (date, user_id, recipe_one_id, recipe_two_id, recipe_three_id, recipe_four_id, recipe_five_id)
VALUES ('2020-05-25', 3, 1, 2, 3, 5, 5),
('2020-06-01', 4, 6, 7, 8, 9, 10);

