# positivequadrant

### Naimish: 30/09/2025

Run the following query to create the `industries_serve` table:

CREATE TABLE industries_serve (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    industry_image VARCHAR(255) NULL,
    status TINYINT(1) DEFAULT 0
) AUTO_INCREMENT=1;



### Naimish: 01/10/2025

Run the following query to create the `project_portfolios` table:

CREATE TABLE project_portfolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    industry_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('active','inactive') DEFAULT 'active',
    FOREIGN KEY (industry_id) REFERENCES industries_serve(id) ON DELETE CASCADE
);

CREATE TABLE project_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (project_id) REFERENCES project_portfolios(id) ON DELETE CASCADE
);