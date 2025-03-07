# URL Shortener

A simple URL shortener built with PHP and MySQL. This project allows users to shorten long URLs and redirect them using a unique short code.

## Features
- Shorten long URLs into unique short codes.
- Redirect users to the original URL when accessing the short code.
- Store and retrieve URLs from a MySQL database.
- Simple UI using Bootstrap.
- Apache `.htaccess` support for clean URL redirection.

## Installation

### Prerequisites
- PHP (>=7.4)
- MySQL
- Apache with `mod_rewrite` enabled
- Composer (optional, for dependency management)

### Clone the Repository
```sh
 git clone https://github.com/salvador-castro/URLShortener.git
 cd URLShortener
```

### Database Setup
1. Create a MySQL database:
```sql
CREATE DATABASE url_shortener;
USE url_shortener;
CREATE TABLE urls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(10) UNIQUE NOT NULL,
    url_larga TEXT NOT NULL
);
```
2. Update `config.php` with your database credentials.

### Run the Application
1. Start your Apache and MySQL services.
2. Place the project inside your server's root directory (e.g., `htdocs` for XAMPP).
3. Open your browser and go to:
```
http://localhost/URLShortener/
```
4. Enter a long URL and get a shortened link.

### URL Redirection
- Once a URL is shortened, access the short link:
```
http://localhost/URLShortener/{short-code}
```
This will redirect to the original URL.

## Project Structure
```
URLShortener/
│── config.php          # Database configuration
│── index.php           # Main UI for shortening URLs
│── functions.php       # URL shortening logic
│── redirect.php        # Handles redirection
│── .htaccess           # Enables clean URLs
│── README.md           # Project documentation
```

## License
This project is open-source and available under the MIT License.

## Author
Developed by [Salvador Castro](https://github.com/salvador-castro).