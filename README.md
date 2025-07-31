# JAWARI

## About This Project

This is a Laravel application built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire). It serves as a content management system for 'Artikel' (Articles), 'Galeri' (Gallery), and 'Kesenian' (Arts). The application features an administrative panel powered by Filament and a public-facing frontend developed using Livewire components.

## Technologies Used

- **Language:** PHP ^8.2
- **Framework:** Laravel ^11.31
- **Frontend Stack:**
  - Tailwind CSS ^3.4.13
  - Alpine.js (implicitly used with Livewire)
  - Livewire
- **Admin Panel:** Filament ^3.3
- **Build Tool:** Vite ^6.0.11
- **Other Key Libraries:**
  - Spatie/laravel-permission ^6.20
  - Spatie/laravel-sitemap ^7.3
  - Intervention/image ^3.11
  - Graham-campbell/markdown ^16.0

## Local Development Setup

Follow these steps to get the application running on your local machine:

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/Ftthreign/jawari-app.git
    cd jawari-app
    ```

2.  **Install PHP Dependencies:**
    Make sure you have Composer installed.

    ```bash
    composer install
    ```

3.  **Install JavaScript Dependencies:**
    Make sure you have Node.js and npm (or Yarn) installed.

    ```bash
    npm install
    # or
    yarn install
    ```

4.  **Environment Configuration:**
    Copy the example environment file and generate an application key.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Edit the `.env` file and configure your database connection.

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

5.  **Run Database Migrations and Seeders:**
    This will create the necessary tables and populate them with some initial data.

    ```bash
    php artisan migrate --seed
    ```

6.  **Start the Development Server:**
    You can run both the Laravel development server and Vite for asset compilation concurrently.

    ```bash
    npm run dev
    # This command uses 'concurrently' to run:
    # - php artisan serve
    # - php artisan queue:listen --tries=1
    # - php artisan pail --timeout=0
    # - npm run dev (Vite)
    ```

    Alternatively, you can run them separately:

    ```bash
    php artisan serve
    # In a separate terminal:
    npm run dev
    ```

7.  **Access the Application:**
    Once the servers are running, you can access the application in your web browser, usually at `http://127.0.0.1:8000`.

## Contributor

| Name                    | Role                   | GitHub                                     |
| ----------------------- | ---------------------- | ------------------------------------------ |
| M. Arifin Syam          | Backend Developer      | [@aku-mars](https://github.com/aku-mars)   |
| Fadhil Abdul Fattah     | Frontend Developer     | [@Ftthreign](https://github.com/Ftthreign) |
| Arya Dila Citra Permata | Code Reviewer & Mentor | [@aryadilas](https://github.com/aryadilas) |
