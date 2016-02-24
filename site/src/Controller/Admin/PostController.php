<?php

namespace Controller\Admin;

use Doctrine\DBAL\Connection;
use Silex\Application as App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        
        $post = $this->db->fetchAssoc('SELECT * FROM post WHERE id = ?',[$id]);

        return $this->twig->render('/admin/post/edit.twig', array(
            'post' => $post,
        ));
    }

    public function editFormAction(Request $request){
//$c = $this->app->;
//        return new Response($c,201);
        die("Edit Form Action");
    }
}