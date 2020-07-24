<?php declare(strict_types=1);

namespace App\Controller;

use App\Comment\FindComments;
use App\Video\FindVideos;
use App\Video\Video;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class VideoController
{
    private FindVideos $videos;
    private FindComments $comments;

    public function __construct(FindVideos $videos, FindComments $comments)
    {
        $this->videos = $videos;
        $this->comments = $comments;
    }

    /**
     * @Route("/videos", methods={"GET"})
     */
    public function list(): Response
    {
        return new JsonResponse([
            'videos' => iterator_to_array($this->videos->findRecentVideos()),
        ]);
    }


    /**
     * @Route("/videos/{video}", methods={"GET"})
     */
    public function view(Video $video): Response
    {
        $comments = $this->comments->findLatestByCommentable($video);

        return new JsonResponse([
            'video' => $video,
            'comments' => iterator_to_array($comments),
        ]);
    }
}
