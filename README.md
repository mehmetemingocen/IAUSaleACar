# CAR SALE PROJECT in PHP

## Overview
The "IAU Car Sale" project PHP developed.The main goal of the project is to provide a platform where users can manage car sales, become members, log in, browse available cars, and perform CRUD (Create, Read, Update, Delete) operations via the admin panel. This document outlines the project's objectives, achievements, technologies used, and setup instructions.

---

## Project Features

### General Overview of Pages
1. **Login Page**
   - Acts as a secure gateway for user authentication.
   - Users can register, log in, or log out.
   - Prevents unauthorized access with basic credential verification.

2. **Home Page**
   - Serves as the central hub, providing navigation to key features like viewing cars and posting ads.
   - Emphasizes simplicity and clarity for ease of use.

3. **Cars for Sale Page**
   - Displays a list of available cars with details like make, model, year, and mileage.
   - Offers a user-friendly interface for browsing.

4. **Admin Page**
   - Enables administrators to manage car listings through CRUD operations.
   - Includes tools for adding, updating, or deleting car data efficiently.

### Technologies Used
- **Frontend**
  - HTML, CSS, and Bootstrap for structure, styling, and responsive design.
- **Backend**
  - PHP for server-side logic and dynamic content handling.
- **Database**
  - MySQL managed with phpMyAdmin for storing and retrieving data.

### Key Achievements
- **Core Functionality**
  - Secure user authentication and dynamic car listing management.
  - Fully functional admin panel for vehicle data operations.
- **Dynamic Content**
  - Real-time updates to ensure accurate and current information.
- **Responsive Design**
  - Adaptable interface for desktop, tablet, and mobile devices.

---
## Database Design

This database is designed to manage car sales efficiently. It includes three main tables: `admin`, `cars`, and `users`. Below, you will find the general descriptions of the database and its key features.

---

## General Database Descriptions

### Database Name
`car_sales`

### Tables and Descriptions

1. **admin Table**
   - **Columns**:
     - `id` (Primary Key)
     - `name` (Admin Name)
     - `password` (Hashed Password)

2. **cars Table**
   - **Columns**:
     - `id` (Primary Key)
     - `first_name` (Seller's First Name)
     - `last_name` (Seller's Last Name)
     - `brand` (Car Brand)
     - `km` (Car Mileage in Kilometers)
     - `year` (Manufacturing Year)

3. **users Table**
   - **Columns**:
     - `id` (Primary Key)
     - `username` (User's Username)
     - `password` (Hashed Password)

---

## Key Features

1. **Modular Design**
   - Tables are structured to focus on specific functions, ensuring clarity and maintainability.

2. **Password Security**
   - User and admin passwords are stored in a hashed format to enhance security.

3. **Scalability**
   - The database structure allows for the easy addition of new attributes, such as `fuel_type` or `color` in the `cars` table.
  
## ER Diagram 

![Ekran görüntüsü](https://github.com/mehmetemingocen/IAUSaleACar/blob/main/ER_DIAGRAM.png)

---
## Functional & Nonfunctional Requirements

### Functional Requirements
1. **User Authentication and Authorization**
   - Registration, login, and logout.
   - Restricted access to specific features.
2. **Car Listings Management**
   - CRUD operations for car listings.
   - Detailed car information.
3. **Search and Filter**
   - Search by keywords and filter by price, model year, and brand.
4. **Responsive Design**
   - Seamless experience across all device types.
5. **User Profile Management**
   - View and edit profiles.
   - List user-specific car ads.
6. **Admin Features**
   - Manage user accounts and car listings.
   - Deactivate or delete inappropriate content.
7. **Notifications**
   - Alerts for approved or updated listings.

### Nonfunctional Requirements
1. **Performance**
   - Page load within 2 seconds.
   - CRUD operations within 1 second.
2. **Security**
   - Password encryption and HTTPS communication.
3. **Maintainability and Scalability**
   - Modular and future-proof system design.
4. **Compatibility**
   - Works on major browsers like Chrome, Firefox, Safari, and Edge.
5. **Capacity**
   - Supports 100 concurrent users and over 10,000 car listings.

---

## Installation Guide

### Required Software
- WAMP Server (PHP and MySQL)
- Visual Studio Code (or another text editor)
- A web browser (e.g., Chrome)

### Setting Up the Database
1. **Start WAMP**
   - Launch MySQL and Apache servers.
2. **Access phpMyAdmin**
   - Navigate to `http://localhost/phpmyadmin`.
3. **Create a New Database**
   - Name the database (e.g., `car_sales`) and set the character set to `UTF8_general_ci`.
4. **Define Tables**
   - Create necessary tables with appropriate columns in phpMyAdmin.

### Running the Project Locally
1. **Move Files**
   - Copy the project folder to the `wwww` or `htdocs` directory in WAMP.
2. **Update Config**
   - Open `config.php` and set the database connection details:
     ```php
     $host = 'localhost';
     $db = 'car_sales';
     $user = 'root';
     $pass = '';
     ```
3. **Access the Application**
   - Navigate to `http://localhost/your_project_folder_name` in your browser.
4. **Admin Login**
   - Use admin credentials (e.g., username: `admin`, password: `12345`).

### Deploying to a Live Server
1. **Choose Hosting**
   - Use a provider that supports PHP and MySQL (e.g., Natro).
2. **Upload Files**
   - Upload the project to the `public_html` directory using cPanel.
3. **Migrate Database**
   - Use phpMyAdmin on the live server to import the local database.
4. **Update Config**
   - Modify `config.php` for live server credentials.

### Testing the Project
- Verify features like registration, login, and CRUD operations in the live environment.
- Test admin functionalities and ensure smooth operation.

---
### UI Design
![Ekran görüntüsü](https://github.com/mehmetemingocen/IAUSaleACar/blob/main/Login%20Page.png)
![Ekran görüntüsü](https://github.com/mehmetemingocen/IAUSaleACar/blob/main/Homepage.png)
![Ekran görüntüsü](https://github.com/mehmetemingocen/IAUSaleACar/blob/main/Admin%20Page.png)
![Ekran görüntüsü](https://github.com/mehmetemingocen/IAUSaleACar/blob/main/Cars%20on%20Sale%20Page.png)
![Ekran görüntüsü](https://github.com/mehmetemingocen/IAUSaleACar/blob/main/CRUD.png)




---

## License
This project is licensed under [MIT License](LICENSE).

---

## Contact
For inquiries or feedback, please contact [your_email@example.com].
