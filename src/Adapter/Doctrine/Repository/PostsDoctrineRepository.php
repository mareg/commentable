<?php declare(strict_types=1);

namespace App\Adapter\Doctrine\Repository;

use App\Post\FindPosts;
use App\Post\Post;
use App\Post\PostNotFound;
use Doctrine\ORM\EntityManagerInterface;

final class PostsDoctrineRepository implements FindPosts
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findOneByIdentifier(string $identifier): Post
    {
        $post = $this->entityManager->find(Post::class, $identifier);
        if (!$post instanceof Post) {
            throw PostNotFound::withIdentifier($identifier);
        }

        return $post;
    }

    public function findRecentPosts(int $numberOfRecentPosts = 10): \Generator
    {
        $repository = $this->entityManager->getRepository(Post::class);

        foreach ($repository->findBy([], [], $numberOfRecentPosts) as $post) {
            yield $post;
        }
    }
}
