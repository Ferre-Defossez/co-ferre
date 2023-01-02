<?php

class EventController{
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

    public function overview(){
        $stmt = $this->connection->prepare('SELECT * FROM events');
        $result = $stmt->executeQuery();
        $events = $result->fetchAllAssociative();

        echo $this->twig->render('index.twig', [
            'events' => $events
        ]);
    }

    public function overviewEvents(){
        $stmt = $this->connection->prepare('SELECT * FROM events');
        $result = $stmt->executeQuery();
        $events = $result->fetchAllAssociative();

        echo $this->twig->render('events.twig', [
            'events' => $events
        ]);
    }
    public function home(){
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        if(!$user){
            header('location: login.php');
            exit();
        }

        $template = $this->twig->load('menu.twig');
        echo $template->render([
            'logged' => $user
        ]);

    }

    public function eventid($id){
        $stmt = $this->connection->prepare('SELECT * FROM events WHERE id = ?');
        $result = $stmt->executeQuery([$id]);
        $event = $result->fetchAssociative();
        if (empty($event)){
            echo $this->twig->render('404.twig');
            exit();
        }
        $stmt = $this->connection->prepare('SELECT name,email FROM users WHERE id = ?');
        $result = $stmt->executeQuery([$event['user_id']]);
        $contact = $result->fetchAssociative();
        $stmt = $this->connection->prepare('SELECT * FROM slots WHERE event_id = ?');
        $result = $stmt->executeQuery([$id]);
        $slots = $result->fetchAllAssociative();
        //var_dump($contact);
        //var_dump($slots);
        //var_dump($_POST);
        //var_dump($_GET);

        echo $this->twig->render('event.twig', [
            'event' => $event,
            'contact' => $contact,
            'slots' => $slots
        ]);
    }

}


//    $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
//    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
