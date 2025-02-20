# Dynamic Event Booking System

## Objective
A simple Event Booking System where users can browse, book, and manage their event registrations. Admins can add/edit/delete events and view all bookings.

## Core Requirements
1. User Authentication (PHP & MySQL)
2. Event Management
3. Frontend
4. Database
5. Additional Requirements

## Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/JameerBasha31/dynamic_event_booking_system.git
   cd dynamic_event_booking_system
   ```

2. **Database Setup**
   - Import the `database_dump.sql` file into your MySQL database.
   - Create a database named `event_booking_system`.
   - Use the following command to import the SQL file:
     ```bash
     mysql -u your_username -p event_booking_system < sql/database_dump.sql
     ```

3. **Configuration**
   - Update the database connection details in `config/config.php`:
     ```php
     <?php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'your_username');
     define('DB_PASSWORD', 'your_password');
     define('DB_NAME', 'event_booking_system');
     ?>
     ```

4. **Run the Application**
   - Ensure your web server (e.g., Apache) is running.
   - Place the project folder in your web server's root directory.
   - Access the application in your web browser via `http://localhost/dynamic_event_booking_system`.

## Database Connection Details
- **Host:** localhost
- **Database Name:** event_booking_system
- **Username:** your_username
- **Password:** your_password

## Sample Login Credentials
- **Admin User:**
  - Email: admin@example.com
  - Password: admin123
- **Regular User:**
  - Email: user@example.com
  - Password: user123

## Project Structure
```
dynamic_event_booking_system/
│
├── assets/
│   ├── css/
│   └── js/
│
├── config/
│   └── config.php
│
├── database/
│   └── db.php
│
├── includes/
│   ├── auth.php
│   ├── events.php
│   ├── bookings.php
│   └── header.php
│
├── admin/
│   ├── create_event.php
│   ├── edit_event.php
│   ├── delete_event.php
│   ├── view_bookings.php
│   └── index.php
│
├── user/
│   ├── browse_events.php
│   ├── register_event.php
│   ├── cancel_registration.php
│   └── index.php
│
├── sql/
│   └── database_dump.sql
│
├── index.php
├── login.php
├── register.php
└── logout.php
```