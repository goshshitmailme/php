<?php

namespace Controller;

use Doctrine\DBAL\Connection;
use Silex\Application as App;

class PostController
{
    public function indexAction(App $app){
       $posts = $app['db']->fetchAll('SELECT * FROM post');
        var_dump($posts);
        return '';
    }

    public function showAction(App $app, $id){
        /** @var Connection $db */
        $db = $app['db'];
        echo get_class($db);

//        SQL Injection
        $post = $db->fetchAssoc("SELECT *
          FROM post
          WHERE id=$id"
        );


//        $post = $app['db']->fetchAssoc("SELECT *
//          FROM post
//          WHERE id=$id"
//        );
        var_dump($post);
        die('show'.$id);
    }
}
//Last 5 or rating
//Doctrine Service Provider Read
//Doctrine DBL
