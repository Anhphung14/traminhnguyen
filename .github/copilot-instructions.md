# Copilot Instructions for MinhNguyen App

## Overview
This project is a Laravel-based web application. It leverages Laravel's MVC architecture, Eloquent ORM, and Blade templating engine. The frontend integrates with Vue.js for dynamic components, managed via Vite.

## Key Directories
- **`app/`**: Contains the core application logic, including models, controllers, middleware, and policies.
- **`resources/views/`**: Blade templates for server-side rendering.
- **`resources/js/`**: Vue.js components and JavaScript logic.
- **`routes/`**: Defines application routes (`web.php` for web routes, `auth.php` for authentication).
- **`database/`**: Includes migrations, seeders, and factories for database management.
- **`tests/`**: Contains PHPUnit tests, organized into `Feature` and `Unit` directories.

## Developer Workflows
### Local Development
1. Install dependencies:
   ```bash
   composer install
   npm install
   ```
2. Set up the environment:
   - Copy `.env.example` to `.env`.
   - Configure database and other environment variables.
3. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
4. Start the development server:
   ```bash
   php artisan serve
   npm run dev
   ```

### Testing
Run the test suite with:
```bash
php artisan test
```

### Building for Production
Build the frontend assets:
```bash
npm run build
```

## Project-Specific Conventions
- **Controllers**: Follow RESTful conventions. Place resource-specific logic in the corresponding controller.
- **Policies**: Authorization logic resides in `app/Policies/`.
- **Vue Components**: Organized under `resources/js/Components/`. Use PascalCase for filenames.
- **Blade Templates**: Extend layouts from `resources/views/layouts/`.

## Integration Points
- **Database**: Uses SQLite for local development (configured in `.env`).
- **Cloudinary**: Handles media uploads. Configuration is in `config/services.php`.
- **Inertia.js**: Bridges Laravel and Vue.js for SPA-like behavior.

## Tips for AI Agents
- Refer to `vite.config.js` for asset bundling details.
- Check `tailwind.config.js` for styling conventions.
- Use `php artisan` commands for common tasks (e.g., `make:model`, `make:controller`).
- Follow existing patterns in `tests/Feature/` and `tests/Unit/` for writing tests.

## Examples
### Adding a New Model
1. Generate the model and migration:
   ```bash
   php artisan make:model Example -m
   ```
2. Define the schema in the migration file.
3. Add relationships and business logic in the model.

### Creating a New Vue Component
1. Add the component in `resources/js/Components/`.
2. Import and register it in `resources/js/app.js`.
3. Use the component in a Blade template or another Vue component.

---
This document is a living guide. Update it as the project evolves.