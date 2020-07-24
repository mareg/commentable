<?php declare(strict_types=1);

namespace App\Post;

interface FindPosts
{
    public function findOneByIdentifier(string $identifier): Post;

    public function findRecentPosts(int $numberOfRecentPosts = 10): \Generator;
}
