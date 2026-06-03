create database prak601;
use prak601;

CREATE TABLE praktikans (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NULL
    );

select * from praktikans;
SELECT photo FROM praktikans;
INSERT INTO praktikans
(name, nim, full_name, prodi, photo)
VALUES
(
'Orlando',
'2410817210017',
'Orlando Sugian',
'Teknologi Informasi',
'public/images/orlando.jpg'
);

ALTER TABLE praktikans
ADD hobbies TEXT,
ADD skills TEXT;

UPDATE praktikans
SET
hobbies = 'Gaming,Olahraga,Trading',
skills = 'HTML,CSS,C++,PHP'
WHERE id = 1;

UPDATE praktikans
SET photo='images/orlando.jpg'
WHERE id=1;