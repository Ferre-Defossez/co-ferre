<?php
    class ErrorController {
        protected \Doctrine\DBAL\Connection $connection;
        protected \Twig\Environment $twig;


        public function __construct () {
            //database connection
            $this->connection = \Services\DatabaseConnector::getConnection();

            //twig
            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../resources/templates/');
            $this->twig = new \Twig\Environment($loader, [
                'cache' => __DIR__ . '/../../storage/cache',
                'auto_reload' => true //set to false on production
            ]);
            if (isset($_SESSION['username']) && $_SESSION['username'] !== ''){
                $this->twig->addGlobal('username', $_SESSION['username']);     }
        }

        public function error404(){
            echo $this->twig->render('404.twig');
        }

    }