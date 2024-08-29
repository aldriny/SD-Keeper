# SD Keeper (Social Distance Keeper)

SD Keeper is a comprehensive system designed to monitor social distancing and crowd levels in various locations using infrared sensors installed at entrances and exits. This Laravel-based project comprises both a website for users to access location-based safety information and a separate interface for location owners to manage and receive notifications about their premises' status.

## Features

### User-Facing Website

- **Location Categorization**: Displays nearby locations, such as cafes, restaurants, hospitals, malls, etc., based on user proximity.
- **Safety Indicators**: Indicates the safety level of each location by assessing social distancing compliance and crowd density.
- **Distance Information**: Provides distance details between the user's current location and various places.
- **Real-Time Updates**: Regularly updates information based on sensor data for accurate safety assessment.

### Owner Management System

- **Location Monitoring**: Allows owners to view their location's status, including crowd density and safety level.
- **WhatsApp Notifications**: Sends real-time alerts to owners regarding their place's status, whether it's crowded or safe to visit.
- **Sensor Integration**: Connects with infrared sensors installed at entrances and exits to collect data for analysis.

## Installation and Setup

### Prerequisites

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- Database (e.g., MySQL, PostgreSQL)

### Installation Steps

1. Clone the repository: `git clone https://github.com/aldriny/SD-Keeper.git`
2. Navigate to the project directory: `cd SD-Keeper`
3. Install dependencies: `composer install`
4. Create a copy of the `.env.example` file: `cp .env.example .env`
5. Configure your database connection in the `.env` file.
6. Generate application key: `php artisan key:generate`
7. Run database migrations: `php artisan migrate`
8. Start the development server: `php artisan serve`

### Usage

- Access the user-facing website by navigating to [http://localhost:8000](http://localhost:8000) in your web browser.
- For location owners, log in to the owner management system using the provided credentials.
- Monitor location statuses, receive WhatsApp notifications, and manage safety information based on sensor data.

## Contributing

Contributions to SD Keeper are welcome! Feel free to fork the repository, make improvements, and submit pull requests.
