
# Riseup Website

Riseup is a social networking site built using HTML, CSS, PHP, MySQL, and the MVC architectural pattern. This project is considered a core PHP project and is designed to have three different parts: User, Studio, and Admin.


## Technologies Used

The project is developed using the following technologies:

-   PHP
-   MVC (Model-View-Controller) architectural pattern
-   HTML
-   CSS
-   JavaScript
-   MySQL

## Project Repository

The source code and necessary files for the Riseup Website project can be found in the GitHub repository: [RiseUp-Web](https://github.com/Uttamnath64/RiseUp-Web.git)

## Project Structure

The project is organized following the MVC architectural pattern, which separates the application into three main components:

1.  **Models**: Responsible for handling data logic, interacting with the database, and representing the business objects.
2.  **Views**: Responsible for rendering the user interface and presenting data to the users.
3.  **Controllers**: Responsible for handling user input, processing requests, and updating the models and views accordingly.

Additionally, there are other directories and files that contribute to the overall project structure:

-   **`index.php`**: The main entry point of the application.
-   **`config.php`**: Contains configuration settings for connecting to the MySQL database and other constants.
-   **`css/`**: Directory for CSS files.
-   **`js/`**: Directory for JavaScript files.
-   **`images/`**: Directory for storing image assets.

## Setup Instructions

To set up the project locally, follow these steps:

1.  Clone the repository: `git clone https://github.com/Uttamnath64/RiseUp-Web.git`.
2.  Navigate to the project directory: `cd RiseUp-Web`.
3.  Import the MySQL database: Use the provided SQL script in the `database/` directory to create the necessary database schema and tables.
4.  Update the database configuration: Open `config.php` and modify the database connection settings according to your local environment.
5.  Start a local development server: You can use tools like XAMPP, WAMP, or MAMP to run the PHP application locally.
6.  Access the application: Open a web browser and visit `http://localhost/RiseUp-Web` to access the Riseup Website.

## Usage

Riseup Website offers the following functionality across its three different parts:

-   **User**: Users can create accounts, connect with other users, post updates, and interact with the community.
-   **Studio**: Studios can showcase their work, promote their services, and engage with potential clients.
-   **Admin**: Admin has access to manage users, studios, and monitor the overall site activities.
