<?php

namespace Controller\Admin;

use Doctrine\DBAL\Connection;
use Silex\Application as App;

class PostController {
    /** @var Connection $db */
    private $db;

    /** @var \Twig_Environment $twig */
    private $twig;

    /** @var ..\Silex\Application $app   */
    private $app;

    public function __construct(App $app) {
        $this->app = $app;
        $this->db = $app['db'];
        $this->twig = $app['twig'];
    }
    public function indexAction(){

        $posts = $this->db->fetchAll('SELECT * FROM post');

        return $this->twig->render('/admin/post/index.twig', array(
            'posts' => $posts,
        ));
    }
    public function editAction($id){

        die("Edit $id");
    }
}