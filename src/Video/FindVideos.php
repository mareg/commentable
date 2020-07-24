<?php declare(strict_types=1);

namespace App\Video;

interface FindVideos
{
    public function findOneByIdentifier(string $identifier): Video;

    public function findRecentVideos(int $numberOfRecentVideos = 10): \Generator;
}
