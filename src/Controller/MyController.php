<?php 
namespace App\Controller ;

use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyController extends AbstractController {
    /**
     * @Route("/api/recupererarticle", name="RecupererArticles")
     */
    public function RecupererArticles()
    {
        $article = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();
        foreach ($article as $key => $article) {
            $data[$key]['title'] = $article->getTitle();
            $data[$key]['content'] = $article->getContent();
            $data[$key]['created'] = $article->getCreated();
            
        }
        return new JsonResponse($data);
    }
}