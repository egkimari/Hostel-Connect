# HostelConnect

HostelConnect is a web-based platform that simplifies finding and managing hostel accommodations for students and landlords.

## Installation

1. Clone the repository
    ```bash
    git clone https://github.com/yourusername/hostelconnect.git
    cd hostelconnect
    ```

2. Install dependencies
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Configure environment variables
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run migrations and seed the database
    ```bash
    php artisan migrate --seed
    ```

5. Start the local development server
    ```bash
    php artisan serve
    ```

## Usage

- Access the admin panel at `http://localhost:8000/admin`
- Manage hostels and users through the admin interface

