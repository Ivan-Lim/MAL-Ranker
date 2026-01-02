# MAL Ranker

This application uses the MyAnimeList API to retrieve a user's anime list and then provides options for them to rank certain animes on their list. It will then keep track of this and return a ranked listing based on their selections.

## Setup

1. Install PHP dependencies:
```bash
composer install
```

2. Install Node.js dependencies:
```bash
npm install
```

3. Generate app key:
```bash
php artisan key:generate
```

4. Start the development servers:

Terminal 1 - Laravel:
```bash
php artisan serve
```

Terminal 2 - Vite (React):
```bash
npm run dev
```

5. Open http://localhost:8000

## Project Structure

- `app/` - Laravel application code
- `resources/` - Frontend assets and views
- `routes/` - Route definitions
- `public/` - Public assets and entry point
