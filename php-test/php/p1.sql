CREATE TABLE recipes (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    prep_time INT NOT NULL,
    difficulty INT CHECK (difficulty BETWEEN 1 AND 3),
    vegetarian BOOLEAN NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ratings (
    id SERIAL PRIMARY KEY,
    recipe_id INT REFERENCES recipes(id),
    value INT CHECK (value BETWEEN 1 AND 5),
    rated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);