
CREATE DATABASE IF NOT EXISTS movie;
USE movie;
CREATE TABLE IF NOT EXISTS seat_types(
id int primary key auto_increment,
name varchar(255),
price int
);
CREATE TABLE IF NOT EXISTS auditoriums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    capacity INT,
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE IF NOT EXISTS customers (
	id INT auto_increment,
    email VARCHAR(255) unique,
    password VARCHAR(255),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    phone_number VARCHAR(13),
    address TEXT,
    status INT,
    created_at timestamp null,
    updated_at timestamp null,
    PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number_of_row INT,
    number_of_col INT,
    status int,
    auditorium_id INT,
    type_id int,
    created_at timestamp null,
    updated_at timestamp null,
    foreign key (type_id) references seat_types(id),
    FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
);
CREATE TABLE IF NOT EXISTS ages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE IF NOT EXISTS tempImages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);
CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    director VARCHAR(255),
    description TEXT,
    image TEXT,
    duration VARCHAR(255),
    release_date DATE,
    language VARCHAR(50),
    price FLOAT,
    is_featured enum('Yes', 'No') default('No'),
    status INT,
    age_id INT,
    created_at timestamp null,
    updated_at timestamp null,
    FOREIGN KEY (age_id) REFERENCES ages(id)
);

CREATE TABLE IF NOT EXISTS casts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    slug varchar(255),
    image TEXT,
    status INT,
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE IF NOT EXISTS screenings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    auditorium_id INT,
    screening_start DATETIME,
    screening_end DATETIME,
    created_at timestamp null,
    updated_at timestamp null,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
);

CREATE TABLE IF NOT EXISTS reservation_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_type VARCHAR(255) NOT NULL,
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    screening_id INT,
    reservation_contact VARCHAR(255),
    date DATETIME,
    status INT,
    customer_id INT,
    seat_id int,
    FOREIGN KEY (screening_id) REFERENCES screenings(id),
    FOREIGN KEY (seat_id) REFERENCES seats(id),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE IF NOT EXISTS seat_reserved (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seat_id INT,
    reservation_id INT,
    screening_id INT,
    FOREIGN KEY (seat_id) REFERENCES seats(id),
    FOREIGN KEY (reservation_id) REFERENCES reservations(id),
    FOREIGN KEY (screening_id) REFERENCES screenings(id)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone_number VARCHAR(20),
    email VARCHAR(255),
    image TEXT,
    password VARCHAR(255),
    role INT
);

CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT,
    payment_amount DECIMAL(10, 2),
    payment_date DATETIME,
    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

CREATE TABLE IF NOT EXISTS genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description varchar(1000),
    status INT,
    created_at timestamp null,
    updated_at timestamp null
);
CREATE TABLE IF NOT EXISTS tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS movie_genres (
    movie_id INT,
    genre_id INT,
    PRIMARY KEY (movie_id, genre_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (genre_id) REFERENCES genres(id)
);


CREATE TABLE IF NOT EXISTS movie_casts (
    movie_id INT,
    cast_id INT,
    PRIMARY KEY (movie_id, cast_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id) on delete cascade,
    FOREIGN KEY (cast_id) REFERENCES casts(id) on delete cascade
);

CREATE TABLE IF NOT EXISTS movie_tags (
    movie_id INT,
    tag_id INT,
    PRIMARY KEY (movie_id, tag_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id) on delete cascade,
    FOREIGN KEY (tag_id) REFERENCES tags(id) on delete cascade
);

-- CREATE TABLE IF NOT EXISTS schedules (
--     movie_id INT,
--     auditorium_id INT,
--     starttime TIME,
--     created_at timestamp null,
--     updated_at timestamp null,
--     PRIMARY KEY (movie_id, auditorium_id),
--     FOREIGN KEY (movie_id) REFERENCES movies(id),
--     FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
-- );

-- CREATE TABLE IF NOT EXISTS tickets (
--     schedule_id INT,
--     seat_id INT,
--     customer_id INT,
--     created_at timestamp null,
--     updated_at timestamp null,
--     PRIMARY KEY (schedule_id, seat_id, customer_id),
--     FOREIGN KEY (schedule_id) REFERENCES schedules(id),
--     FOREIGN KEY (seat_id) REFERENCES seats(id),
--     FOREIGN KEY (customer_id) REFERENCES customers(id)
-- );
-- INSERT INTO auditoriums (name, seat_no, created_at, updated_at) 
-- VALUES ('Auditorium A', 100, NOW(), NOW());
-- select * from auditoriums;
-- -- Inserting data into customers table
-- INSERT INTO customers (email, password, first_name, last_name, phone_number, address, status, created_at, updated_at) 
-- VALUES ('customer1@example.com', 'password1', 'John', 'Doe', '1234567890', '123 Main St, City, Country', 1, NOW(), NOW());

-- -- Inserting data into seats table
-- INSERT INTO seats (number_of_row, number_of_col, auditorium_id, created_at, updated_at) 
-- VALUES (1, 1, 1, NOW(), NOW());

-- -- Inserting data into ages table
-- INSERT INTO ages (name, created_at, updated_at) 
-- VALUES ('Adult', NOW(), NOW());

-- -- Inserting data into casts table
-- INSERT INTO casts (name, slug, image, status, created_at, updated_at) 
-- VALUES ('Actor Name', 'actor-name', 'path/to/image.jpg', 1, NOW(), NOW());

-- -- Inserting data into genres table
-- INSERT INTO genres (name, description, status, created_at, updated_at) 
-- VALUES ('Action', 'Action genre description', 1, NOW(), NOW());

-- -- Inserting data into tags table
-- INSERT INTO tags (name) 
-- VALUES ('Tag Name');

-- -- Inserting data into movies table
-- INSERT INTO movies (title, director, description, duration_min, release_date, image, language, price, status, cast_id, genre_id, age_id) 
-- VALUES ('Movie Title', 'Director Name', 'Movie description', 120, '2024-01-01', 'path/to/image.jpg', 'English', 9.99, 1, 1, 1, 1);

-- -- Inserting data into screenings table
-- INSERT INTO screenings (movie_id, auditorium_id, screening_start, screening_end) 
-- VALUES (1, 1, '2024-03-26 18:00:00', '2024-03-26 20:00:00');

-- -- Inserting data into reservation_types table
-- INSERT INTO reservation_types (reservation_type) 
-- VALUES ('Online Booking');

-- -- Inserting data into reservations table
-- INSERT INTO reservations (screening_id, reservation_type_id, reservation_contact, date, status, customer_id) 
-- VALUES (1, 1, 'customer1@example.com', NOW(), 1, 1);

-- -- Inserting data into seat_reserved table
-- INSERT INTO seat_reserved (seat_id, reservation_id, screening_id) 
-- VALUES (1, 1, 1);
-- alter table reservations add created_at timestamp null;
-- -- Inserting data into payments table
-- INSERT INTO payments (reservation_id, payment_amount, payment_date) 
-- VALUES (1, 9.99, NOW());
-- insert into users (name,email,password,role)
-- values ('admin','ab@gmail.com', md5('12'),1);