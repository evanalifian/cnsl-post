# cnsl-post

`cnsl-post` is a lightweight PHP microblogging application built with native PHP and an MVC-style architecture.

The app provides a simple social posting experience with user authentication, profile management, post creation with optional image upload, and search for other users.

## Features

- User registration and authentication
- Login and logout with session management
- Create text posts with optional image upload
- View a feed of all posts on the home page
- User profile page showing personal posts
- Edit profile details and upload avatar images
- Delete posts and delete user account
- Search for users by username
- View other user profiles and their posts

## Technology stack

- PHP 8+ with PDO for database access
- `vlucas/phpdotenv` for environment configuration
- Native PHP MVC structure with controllers, models, repositories, services, and views
- Vanilla JavaScript for interactive UI behaviors
- CSS for styling post cards, modals, and notifications
- MySQL-compatible database

## Setup

1. Install composer dependencies:

```bash
composer install
```

2. Copy or create a `.env` file from the example and set database credentials:

```bash
copy .env.example .env
```

3. Import the database schema from `cnsl_post.sql` into your MySQL server.

4. Run the application from the project root (for example using PHP built-in server):

```bash
php -S localhost:8000
```

5. Open the app in your browser at `http://localhost:8000`.

## Project structure

## Project Structure

```bash
root:.
├───public
│   ├───assets
│   ├───css
│   ├───js
│   └───uploads
├───src
│   ├───Config
│   ├───Controller
│   ├───Exception
│   ├───Helpers
│   ├───Middleware
│   ├───Model
│   ├───Repository
│   ├───Seeder
│   ├───Service
│   ├───Utils
│   └───View
│       ├───about
│       ├───components
│       ├───home
│       ├───landing
│       ├───post
│       │   ├───create
│       │   └───detail
│       ├───search
│       ├───templates
│       └───user
│           ├───login
│           ├───not-found
│           ├───profile
│           ├───profile-settings
│           ├───signup
│           └───view-user
├───.env.example
├───.gitignore
├───.htaccess
├───composer.json
├───composer.lock
├───index.php
├───README.md
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
