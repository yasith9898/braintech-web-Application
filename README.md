# BrainTech IT Company Management System

A complete modern IT Company Management System built with Laravel 12, Blade, Bootstrap 5, JavaScript, and SQLite. This system includes a professional corporate IT company website with a complete Admin Panel and CMS.

## Features

### Frontend Website
- **Home Page**: Hero section, company introduction, statistics counters, featured services, latest projects, client testimonials
- **About Page**: Company overview, mission, vision, company history, team members
- **Services**: Dynamic services listing with service details pages
- **Technologies**: Dynamic technology stack with icons and descriptions
- **Projects/Portfolio**: Dynamic project gallery with project details and categories
- **Contact**: Contact form, company information, Google map integration

### Admin Panel
- **Dashboard**: Overview with statistics (services, projects, technologies, team members, testimonials, contact messages)
- **Service Management**: Add, edit, delete services with image upload
- **Technology Management**: Add, edit, delete technologies with logo upload
- **Portfolio Management**: Add, edit, delete projects with multiple image upload and category management
- **Team Management**: Add, edit, delete team members with profile photo upload
- **Testimonial Management**: Add, edit, delete testimonials with avatar upload
- **Contact Management**: View contact messages, delete messages, mark as read
- **Website Settings**: Manage company name, logo, description, address, phone, email, social media links, footer settings

### Authentication
- Admin login with Laravel Breeze
- Forgot password functionality
- Password reset
- Secure authentication middleware

## Technology Stack

- **Backend**: Laravel 12, PHP 8.3+
- **Database**: SQLite
- **Frontend**: Blade Templates, Bootstrap 5, JavaScript, HTML5, CSS3
- **Authentication**: Laravel Breeze
- **ORM**: Laravel Eloquent

## Installation

### Prerequisites
- PHP 8.3 or higher
- Composer
- Node.js and NPM
- SQLite extension enabled

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd laravel-app
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   ```
   
   The `.env.example` file is already configured for SQLite:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Create SQLite database file**
   ```bash
   touch database/database.sqlite
   ```
   On Windows, you can create an empty file named `database.sqlite` in the `database` folder.

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database**
   ```bash
   php artisan db:seed
   ```
   This will populate the database with sample data including:
   - Initial settings
   - Sample services
   - Sample technologies
   - Sample projects
   - Sample team members
   - Sample testimonials
   - Default admin user

8. **Create storage symbolic link**
   ```bash
   php artisan storage:link
   ```

9. **Build frontend assets**
   ```bash
   npm run build
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`

## Default Admin Credentials

- **Email**: admin@braintech.com
- **Password**: password

**Important**: Change the default admin password after first login for security.

## Project Structure

```
laravel-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin panel controllers
│   │   │   └── Frontend/       # Frontend controllers
│   ├── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   ├── seeders/                # Database seeders
│   └── database.sqlite        # SQLite database file
├── resources/
│   ├── views/
│   │   ├── admin/              # Admin panel views
│   │   ├── frontend/          # Frontend views
│   │   └── layouts/           # Blade layout files
├── public/
│   └── storage/               # Storage symbolic link
└── routes/
    └── web.php                # Web routes
```

## Database Tables

- **users**: Admin users
- **services**: Service offerings
- **technologies**: Technology stack
- **projects**: Portfolio projects
- **project_images**: Project gallery images
- **team_members**: Team members
- **testimonials**: Client testimonials
- **contact_messages**: Contact form submissions
- **settings**: Website configuration settings

## Usage

### Frontend Access
- Home: `http://localhost:8000`
- About: `http://localhost:8000/about`
- Services: `http://localhost:8000/services`
- Projects: `http://localhost:8000/projects`
- Technologies: `http://localhost:8000/technologies`
- Contact: `http://localhost:8000/contact`

### Admin Panel Access
- Login: `http://localhost:8000/login`
- Dashboard: `http://localhost:8000/admin/dashboard`
- Services: `http://localhost:8000/admin/services`
- Technologies: `http://localhost:8000/admin/technologies`
- Projects: `http://localhost:8000/admin/projects`
- Team Members: `http://localhost:8000/admin/team-members`
- Testimonials: `http://localhost:8000/admin/testimonials`
- Contact Messages: `http://localhost:8000/admin/contact-messages`
- Settings: `http://localhost:8000/admin/settings`

## Development

### Running Tests
```bash
php artisan test
```

### Code Style
This project follows PSR-12 coding standards.

### Adding New Features
1. Create migration: `php artisan make:migration`
2. Create model: `php artisan make:model`
3. Create controller: `php artisan make:controller`
4. Define routes in `routes/web.php`
5. Create views in `resources/views/`

## Security Considerations

- Change default admin password
- Use environment variables for sensitive data
- Enable HTTPS in production
- Regularly update dependencies
- Implement rate limiting for forms
- Validate and sanitize all user inputs

## License

This project is open-sourced software licensed under the MIT license.

## Support

For support and questions, please contact the development team.

---

Built with [Laravel](https://laravel.com) - The PHP Framework for Web Artisans
