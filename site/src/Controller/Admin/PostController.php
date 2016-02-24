<?php

namespace Controller\Admin;

use Doctrine\DBAL\Connection;
use Silex\Application as App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;

class PostController {
    /** @var Connection $db */
    private $db;

    /** @var \Twig_Environment $twig */
    private $twig;

    /** @var ..\Silex\Application $app   */
    private $app;


    /**
     * @return UrlGenerator
     */
    private function getUrlGenerator() {
        return $this->app['url_generator'];
    }

    /**
     * @param string $path
     * @param array $params
     * @param int $refetenceType
     * @return string
     */
    private function generateUrl($path, $params=[], $refetenceType = UrlGenerator::ABSOLUTE_PATH) {
        return $this->getUrlGenerator()->generate($path,$params,$refetenceType);
    }

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
    public function editAction(Request $request, $id){

        if ($request->isMethod('POST')) {
//            var_dump($request->request->all());
//            die();

            $this->db->update('post', [
                'published' => $request->request->has('published'),
                'heading' => $request->request->get('heading'),
                'content' => $request->request->get('content'),
                'created_at' => $request->request->get('created_at'),
            ],[
                'id' => $id,
            ]);

            $url = $this->generateUrl('admin_post_edit',[
                'id' => $id,
            ]);
            return $this->app->redirect($url,302);

        } else {
//        var_dump($request->query->all()); //For Get
        }
        
//        var_dump($request->server->all()); //For _SERVER


        $post = $this->db->fetchAssoc('SELECT * FROM post WHERE id = ?',[$id]);

        return $this->twig->render('/admin/post/edit.twig', array(
            'post' => $post,
        ));
    }

    public function newAction(Request $request){
        if ($request->isMethod('POST')) {

//$c = $this->app->;
//        return new Response($c,201);
//        throw new \RuntimeException('Parameters file not found');
//        var_dump($_POST);        if ($request->isMethod('POST')) {
//            var_dump($request->request->all());
//            die();

        $this->db->insert('post', [
            'published' => $request->request->has('published'),
            'heading' => $request->request->get('heading'),
            'content' => $request->request->get('content'),
            'created_at' => $request->request->get('created_at'),
        ]);

//        $url = $this->generateUrl('admin_post_index');
        $url = $this->generateUrl('admin_post_edit',[
            'id' => $this->db->lastInsertId(),
        ]);
        return $this->app->redirect($url,302);

    } else {
//        var_dump($request->query->all()); //For Get
}
        return $this->twig->render('/admin/post/new.twig',[]);
//        Try catch
        die("Edit New Action");
    }
}