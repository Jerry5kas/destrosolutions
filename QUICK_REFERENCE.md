# Web App Quick Reference Guide

## Overview
This is a Laravel 12 web application with an admin panel for managing content including banners, services, products, training programs, quantum solutions, blog posts, and contact inquiries.

## Technology Stack
- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: TailwindCSS 4.x, Alpine.js
- **Build Tool**: Vite
- **Database**: MySQL/SQLite (configurable)
- **Authentication**: VIPER (Laravel's default auth)

## Project Structure

### Core Directories
```
app/
├── Http/Controllers/        # Application controllers
│   └── Admin/              # Admin panel controllers
├── Models/                 # Eloquent models
├── Providers/              # Service providers
└── View/Components/        # Blade components

resources/
├── css/                    # Stylesheets
├── js/                     # JavaScript files
└── views/                  # Blade templates
    ├── admin/              # Admin panel views
    └── components/         # Reusable components

database/
├── migrations/             # Database migrations
└── seeders/               # Database seeders
```

## Database Models & Features

### Core Models

#### 1. **Admin** (`app/Models/Admin.php`)
- **Purpose**: Admin authentication
- **Fields**: `name`, `email`, `password`
- **Features**: Admin panel access control

#### 2. **User** (`app/Models/User.php`)
- **Purpose**: Standard user authentication
- **Fields**: `name`, `email`, `password`, `email_verified_at`
- **Features**: Email verification support

#### 3. **Banner** (`app/Models/Banner.php`)
- **Purpose**: Homepage/landing page banners
- **Fields**: `image`, `title`, `slogan`, `description`, `page`, `text1`, `text2`, `text3`, `is_active`
- **Features**: Multi-page banner support, activation toggle

#### 4. **Service** (`app/Models/Service.php`)
- **Purpose**: Company services management
- **Fields**: `title`, `description`, `key_features` (JSON), `image`, `is_active`
- **Features**: Structured key features, image support

#### 5. **Product** (`app/Models/Product.php`)
- **Purpose**: Product catalog management
- **Fields**: `title`, `description`, `key_features` (JSON), `image`, `is_active`
- **Features**: Similar structure to services

#### 6. **Quantum** (`app/Models/Quantum.php`)
- **Purpose**: Quantum computing solutions
- **Fields**: `title`, `description`, `key_features` (JSON), `image`, `is_active`
- **Features**: Specialized quantum solutions

#### 7. **Training** (`app/Models/Training.php`)
- **Purpose**: Training programs management
- **Fields**: `title`, `description`, `objectives` (JSON), `image`, `is_active`
- **Features**: Structured training objectives

#### 8. **BlogCategory** (`app/Models/BlogCategory.php`)
- **Purpose**: Blog post categorization
- **Fields**: `name`, `description`, `is_active`

#### 9. **BlogPost** (`app/Models/BlogPost.php`)
- **Purpose**: Blog content management
- **Fields**: `category_id`, `title`, `description`, `image`, `is_active`
- **Relationships**: `belongsTo(BlogCategory)`

#### 10. **Contact** (`app/Models/Contact.php`)
- **Purpose**: Contact form submissions
- **Fields**: `name`, `phone`, `email`, `message`

## Routes & Controllers

### Public Routes
```php
GET  /                    # Welcome page
GET  /theme-utilities     # Theme utilities page
GET  /page               # Generic page
```

### Admin Routes (Protected)
```php
# Authentication
GET  /admin/login        # Admin login form
POST /admin/login        # Admin login submission
POST /admin/logout       # Admin logout

# Dashboard
GET  /admin/dashboard    # Admin dashboard with statistics

# Content Management (CRUD operations)
/admin/banners          # Banner management
/admin/quantum          # Quantum solutions
/admin/services         # Services management
/admin/products         # Product management
/admin/training         # Training programs

# Blog Management
/admin/blog/categories  # Blog categories
/admin/blog/posts       # Blog posts

# Contact Management
/admin/contacts         # Contact inquiries (view/delete only)
```

## Admin Panel Features

### Dashboard
- **Statistics Overview**: Counts of all content types
- **Latest Blog Posts**: Recent posts with categories
- **Caching**: Dashboard stats cached for 60 seconds, posts for 30 seconds

### Content Management
Each content type supports:
- **Create**: Add new content
- **Read**: View content lists
- **Update**: Edit existing content
- **Delete**: Remove content
- **Status Toggle**: Activate/deactivate content

### Admin Views Structure
```
resources/views/admin/
├── auth/login.blade.php           # Admin login
├── dashboard.blade.php            # Main dashboard
├── layouts/app.blade.php          # Admin layout
├── banners/                       # Banner management
├── blog/categories/               # Blog categories
├── blog/posts/                    # Blog posts
├── contacts/                      # Contact inquiries
├── products/                      # Product management
├── quantum/                       # Quantum solutions
├── services/                      # Service management
└── training/                      # Training programs
```

## Frontend Technologies

### Styling
- **TailwindCSS 4.x**: Utility-first CSS framework
- **Custom CSS**: `resources/css/style.css`
- **Responsive Design**: Mobile-first approach

### JavaScript
- **Alpine.js 3.x**: Lightweight JavaScript framework
- **Vite**: Fast build tool for development and production
- **Custom Scripts**: 
  - `loading-helpers.js`: Loading state management
  - `search-functionality.js`: Search features

## Development Commands

### Setup
```bash
composer install          # Install PHP dependencies
npm install              # Install Node.js dependencies
php artisan key:generate # Generate application key
php artisan migrate      # Run database migrations
npm run build           # Build frontend assets
```

### Development
```bash
# Start development server with all services
composer run dev

# Individual services
php artisan serve        # Laravel development server
npm run dev             # Vite development server
php artisan queue:listen # Queue worker
```

### Testing
```bash
composer run test       # Run PHP tests
```

## Key Features

### 1. **Content Management System**
- Full CRUD operations for all content types
- Image upload support
- JSON field support for structured data
- Activation/deactivation toggles

### 2. **Admin Authentication**
- Separate admin authentication system
- Protected admin routes
- Session-based authentication

### 3. **Blog System**
- Categorized blog posts
- Category management
- Latest posts display

### 4. **Contact Management**
- Contact form submission handling
- Admin view of all inquiries
- Contact deletion capability

### 5. **Caching Strategy**
- Dashboard statistics caching
- Blog posts caching
- Performance optimization

### 6. **Responsive Design**
- TailwindCSS for styling
- Alpine.js for interactivity
- Mobile-first responsive design

## Database Migrations

The application includes comprehensive migrations for:
- Users and admins tables
- All content models (banners, services, products, etc.)
- Blog system (categories and posts)
- Contact inquiries
- Cache and job tables

## Security Features

- **CSRF Protection**: Built-in Laravel CSRF protection
- **Authentication Guards**: Separate admin authentication
- **Mass Assignment Protection**: Fillable fields defined
- **Password Hashing**: Secure password storage

## Performance Optimizations

- **Database Caching**: Dashboard statistics and blog posts
- **Asset Compilation**: Vite for optimized frontend builds
- **Lazy Loading**: Eloquent relationships
- **Image Optimization**: Structured image handling

## File Structure Summary

```
├── app/                    # Application logic
├── bootstrap/              # Application bootstrap
├── config/                 # Configuration files
├── database/               # Database migrations & seeders
├── public/                 # Public assets & images
├── resources/              # Views, CSS, JS
├── routes/                 # Route definitions
├── storage/                # File storage & logs
├── tests/                  # Test suites
└── vendor/                 # Composer dependencies
```

## Quick Start

1. **Install Dependencies**: `composer install && npm install`
2. **Environment Setup**: Copy `.env.example` to `.env` and configure
3. **Generate Key**: `php artisan key:generate`
4. **Run Migrations**: `php artisan migrate`
5. **Build Assets**: `npm run build`
6. **Start Development**: `composer run dev`

## Admin Access

- Navigate to `/admin/login`
- Use admin credentials to access the dashboard
- All content management features available through the admin panel

---

*This quick reference covers the core functionality and structure of the Laravel web application. For detailed implementation, refer to the individual model, controller, and view files.*

