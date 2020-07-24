<?php declare(strict_types=1);

namespace App\Adapter\Doctrine\Repository;

use App\Video\FindVideos;
use App\Video\Video;
use App\Video\VideoNotFound;
use Doctrine\ORM\EntityManagerInterface;

final class VideosDoctrineRepository implements FindVideos
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findOneByIdentifier(string $identifier): Video
    {
        $video = $this->entityManager->find(Video::class, $identifier);
        if (!$video instanceof Video) {
            throw VideoNotFound::withIdentifier($identifier);
        }

        return $video;
    }

    public function findRecentVideos(int $numberOfRecentVideos = 10): \Generator
    {
        $repository = $this->entityManager->getRepository(Video::class);

        foreach ($repository->findBy([], [], $numberOfRecentVideos) as $video) {
            yield $video;
        }
    }
}
