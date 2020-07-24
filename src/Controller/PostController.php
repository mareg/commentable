<?php declare(strict_types=1);

namespace App\Controller;

use App\Comment\FindComments;
use App\Post\FindPosts;
use App\Post\Post;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PostController
{
    private FindPosts $posts;

    private FindComments $comments;

    public function __construct(FindPosts $posts, FindComments $comments)
    {
        $this->posts = $posts;
        $this->comments = $comments;
    }

    /**
     * @Route("/posts", methods={"GET"})
     */
    public function list(): Response
    {
        return new JsonResponse([
            'posts' => iterator_to_array($this->posts->findRecentPosts()),
        ]);
    }

    /**
     * @Route("/posts/{post}", methods={"GET"})
     */
    public function view(Post $post): Response
    {
        $comments = $this->comments->findLatestByCommentable($post);

        return new JsonResponse([
            'post' => $post,
            'comments' => iterator_to_array($comments),
        ]);
    }
}
