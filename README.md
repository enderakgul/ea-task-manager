# EA Task Manager

This project receives tasks from various providers and assigns them to developers based on their workload.

## Installation

1.  Clone the repository:

    ```bash
    git clone [https://github.com/enderakgul/ea-task-manager.git](https://github.com/enderakgul/ea-task-manager.git)
    ```

2.  Navigate to the project directory:

    ```bash
    cd ea-task-manager
    ```

3.  Install PHP dependencies:

    ```bash
    composer install
    ```

4.  Install JavaScript dependencies (if applicable):

    ```bash
    npm install
    ```

5.  Configure your environment:

    *   Copy `.env.example` to `.env`:

        ```bash
        cp .env.example .env
        ```

    *   **Generate an application key:**

        ```bash
        php artisan key:generate
        ```

6.  Run database migrations and seeders:
    Developers insert to table

    ```bash
    php artisan migrate --seed
    ```

7. Run fetch command to get the tasks from providers

    ```bash
    php artisan app:fetch-command
    ```

8.  Start the development server:

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://127.0.0.1:8000` (or the port shown in your terminal).
