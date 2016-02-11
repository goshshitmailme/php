<?php

namespace Controller;

use Doctrine\DBAL\Connection;
use Silex\Application as App;

class PostController
{
    public function indexAction(App $app){
       $posts = $app['db']->fetchAll('SELECT * FROM post WHERE published = 1');
var_dump($posts);
        /** @var \Twig_Environment $twig */
        $twig = $app['twig'];
        return $twig->render('post/index.twig', array(
            'post' => $posts,
        ));
    }

    public function showAction(App $app, $id){
        /** @var Connection $db */
        $db = $app['db'];
//        echo get_class($db);

//        SQL Injection
//        $post = $db->fetchAssoc("SELECT * FROM post WHERE id = ?", [$id]);
        $post = $db->fetchAssoc("
    SELECT * FROM post
    WHERE 1
    AND id = :id
    AND published = 1
    ", [
            "id"=>$id,
        ]);
        if (!$post) {
            $app->abort(404,"Post ID:$id not found");
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
