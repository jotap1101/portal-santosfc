# Santos FC Website

This project is a website for Santos FC, a Brazilian football club. It provides information about the club, news, player profiles, and includes an admin panel for managing the site's content.

## Features

*   **Admin Panel:** Allows administrators to manage site content including:
    *   News articles
    *   Player information
    *   Club achievements/conquests
    *   User accounts
    *   Videos
    *   Messages
*   **User Authentication:** Secure login and registration system for users.
*   **User Profiles:** Users can view and update their profile information.
*   **News Section:** Displays the latest news and articles related to Santos FC.
*   **Club Information:** Provides comprehensive details about:
    *   The club's history and foundation
    *   The official club anthem
    *   Information about the Vila Belmiro stadium
    *   A showcase of club titles and trophies (Memorial das Conquistas)
    *   Current team roster/elenco
*   **Contact Page:** Allows users to send messages or inquiries.
*   **Media Content:** Includes image galleries and potentially video content.

## Technologies Used

*   **Backend:** PHP
*   **Frontend:** HTML, CSS, JavaScript
*   **Database:** MySQL

## Setup Instructions

1.  **Clone the repository:**
    ```bash
    git clone <repository_url>
    cd <repository_directory>
    ```
2.  **Web Server:**
    *   Ensure you have a web server (like Apache, Nginx, or XAMPP, WAMP, MAMP for local development) installed and running.
    *   Place the project files in the web server's document root (e.g., `htdocs` for Apache/XAMPP, `www` for WAMP/Nginx).
3.  **Database Setup:**
    *   Ensure you have a MySQL server running.
    *   Create a new database named `santosfc_db`.
    *   Import the database schema and initial data using the `sql/santosfc_db.sql` file. You can do this using a tool like phpMyAdmin or the MySQL command line:
        ```bash
        mysql -u your_username -p santosfc_db < sql/santosfc_db.sql
        ```
        (Replace `your_username` with your MySQL username. You will be prompted for your password.)
4.  **Database Connection:**
    *   The default database connection settings are located in `php/connection.php`:
        *   Server: `localhost`
        *   Username: `root`
        *   Password: (empty)
        *   Database Name: `santosfc_db`
    *   If your MySQL setup uses different credentials, update them in `php/connection.php`.
5.  **Access the Website:**
    *   Open your web browser and navigate to the project's URL (e.g., `http://localhost/your_project_directory_name/` if you're using a local server).

## Folder Structure

```
.
├── admin-*.php         # PHP files for various admin panel functionalities
├── css/                 # Stylesheets for the website
├── documentação/        # Project documentation files (diagrams, requirements, etc.)
├── img/                 # Image assets used throughout the site
├── includes/            # Reusable PHP components (header, footer, sidebar)
├── js/                  # JavaScript files for frontend interactivity
├── midia/               # Media files (e.g., audio like the club anthem)
├── php/                 # Core PHP files (database connection, controllers)
├── sql/                 # SQL files (database schema)
├── uploaded-images/     # Directory for images uploaded by users/admins
├── *.php                # Root PHP files for main pages (index, contact, news, etc.)
└── README.md            # This file
```

## Contributing

Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

1.  **Fork the repository.**
2.  **Create a new branch** for your feature or bug fix:
    ```bash
    git checkout -b feature/your-feature-name
    ```
    or
    ```bash
    git checkout -b bugfix/issue-description
    ```
3.  **Make your changes** and commit them with clear, descriptive messages.
4.  **Push your changes** to your forked repository:
    ```bash
    git push origin feature/your-feature-name
    ```
5.  **Create a Pull Request** to the main repository, detailing the changes you've made.

Please ensure your code adheres to any existing coding standards and that you test your changes thoroughly.
