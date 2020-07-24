<?php declare(strict_types=1);

namespace App\Controller;

use App\Comment\Commentable;
use App\Comment\NewComment;
use App\Comment\NewCommentHandler;
use App\Comment\PersistComment;
use App\Post\Post;
use App\Video\Video;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CommentController
{
    private NewCommentHandler $newCommentHandler;

    public function __construct(NewCommentHandler $newCommentHandler)
    {
        $this->newCommentHandler = $newCommentHandler;
    }

    /**
     * @Route("/posts/{post}/comment", methods={"POST"})
     */
    public function onPost(Post $post, NewComment $newComment): Response
    {
        $comment = $this->newCommentHandler->newCommentForCommentable($newComment, $post);

        return new JsonResponse($comment, 201);
    }

    /**
     * @Route("/videos/{video}/comment", methods={"POST"})
     */
    public function onVideo(Video $video, NewComment $newComment): Response
    {
        $comment = $this->newCommentHandler->newCommentForCommentable($newComment, $video);

        return new JsonResponse($comment, 201);
    }
}
