<?php

namespace Controller;

use Doctrine\DBAL\Connection;
use Silex\Application as App;

class PostController
{
    /** @var Connection $db */
    private $db;

    /** @var \Twig_Environment $twig */
    private $twig;

    /** @var App  */
    private $app;

    public function __construct(App $app) {
        $this->app = $app;
        $this->db = $app['db'];
        $this->twig = $app['twig'];
    }

    public function indexAction(){
//        $this->init($app);

       $posts = $this->db->fetchAll('SELECT * FROM post');
//var_dump($posts);


        return $this->twig->render('post/index.twig', array(
            'posts' => $posts,
        ));
    }

    public function showAction($id){
//        $this->init($app);

//        echo get_class($db);

//        SQL Injection
//        $post = $db->fetchAssoc("SELECT * FROM post WHERE id = ?", [$id]);
        $post = $this->db->fetchAssoc("
    SELECT * FROM post
    WHERE 1
    AND id = :id
    AND published = 1
    ", [
            "id"=>$id,
        ]);
        if (!$post) {
            $this->app->abort(404,"Post ID:$id not found");
        }

//var_dump($post);
        /** @var \Twig_Environment $twig */
        $twig = $app['twig'];
        return $twig->render('post/show.twig', array(
            'post' => $post,
        ));

//        $post = $app['db']->fetchAssoc("SELECT *
//          FROM post
//          WHERE id=$id"
//        );
//        var_dump($post);
//        die('show'.$id);
    }
}
//Last 5 or rating
//Doctrine Service Provider Read
//Doctrine DBL
//Bootstrap
