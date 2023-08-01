# Symfony 6 Movies Project

![https://symfony.com/logos/symfony_black_02.png](https://symfony.com/logos/symfony_black_02.png)

This is the repository of the Symfony 6 project "symfony-movies," a web application to display information about movies. Below, you will find the components and technologies used in this project, along with the commands to run the development server and the Webpack server for Tailwind CSS.

## Requirements

Before running the application, make sure you have the following installed:

- PHP 8.0 or higher
- Composer ([https://getcomposer.org/](https://getcomposer.org/)) to manage Symfony dependencies
- XAMPP or another web server compatible with PHP and MySQL
- MySQL or another database engine compatible with Doctrine
- Node.js and npm ([https://nodejs.org/](https://nodejs.org/)) to install and compile Tailwind CSS assets

## Installation

1. Clone the repository from GitHub:

```bash
git clone <https://github.com/miryambathilde/symfony-movies.git>

```

1. Install Symfony dependencies with Composer:

```bash
composer install

```

1. Install Tailwind CSS dependencies with npm:

```bash
npm install

```

1. Compile Tailwind CSS assets:

```bash
npm run watch

```

1. Configure the database:
    - Create a database on your MySQL server.
    - Set up the database credentials in the `.env` file:
    
    ```bash
    DATABASE_URL=mysql://your_username:your_password@your_mysql_server/your_database_name
    
    ```
    
    - Run the following command to create tables in the database:
    
    ```bash
    php bin/console doctrine:migrations:migrate
    
    ```
    

## Running the Symfony Development Server

To run the Symfony local development server in the background, use the following command:

```bash
symfony serve -d

```

The server will be available at `http://127.0.0.1:8000/`.

## Opening the Browser

To automatically open the application in the default web browser, use the following command:

```bash
symfony open:local

```

## Running the Webpack Server for Tailwind CSS

To have the Webpack server running and always executing, use the following command:

```bash
npm run watch

```

This will allow changes made to style files to be reflected automatically in the application without the need to refresh the page.

## Documentation

- Symfony: Official Symfony documentation [https://symfony.com/doc/current/index.html](https://symfony.com/doc/current/index.html)
- Composer: Official Composer documentation [https://getcomposer.org/doc/](https://getcomposer.org/doc/)
- Doctrine: Official Doctrine documentation [https://www.doctrine-project.org/projects/doctrine-orm/en/2.10/index.html](https://www.doctrine-project.org/projects/doctrine-orm/en/2.10/index.html)
- Twig: Official Twig documentation [https://twig.symfony.com/doc/3.x/](https://twig.symfony.com/doc/3.x/)
- Font Awesome: Official Font Awesome documentation [https://fontawesome.com/](https://fontawesome.com/)
- Tailwind CSS: Official Tailwind CSS documentation [https://tailwindcss.com/docs/guides/symfony](https://tailwindcss.com/docs/guides/symfony)
- XAMPP: Official XAMPP documentation [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)

## Project Structure

- `config/`: Directory containing Symfony configuration files.
- `src/`: Directory containing the application's source code.
- `templates/`: Directory containing Twig templates for views.
- `public/`: Web-accessible directory containing public assets such as images, CSS, and JavaScript.
- `assets/`: Directory containing asset files, including styles, images, fonts, etc.
- `node_modules/`: Directory containing Node.js and npm dependencies.
- `vendor/`: Directory containing dependencies installed via Composer.
- `bin/`: Directory containing executable scripts.
- `tests/`: Directory containing automated tests.

## Contributing

If you wish to contribute to this project, follow these steps:

1. Fork the repository on GitHub.
2. Create a new branch on your fork with the new feature or bug fix.
3. Submit a pull request to this repository.
4. Your pull request will be reviewed, and once approved, it will be merged into the main project.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

---

Thank you for using our project! If you have any questions or issues, don't hesitate to open an issue on GitHub or contact us.

Happy coding with Symfony 6 and Tailwind CSS! 🚀
