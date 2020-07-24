<?php declare(strict_types=1);

namespace App\Adapter\Doctrine\Repository;

use App\Comment\Comment;
use App\Comment\FindComments;
use App\Comment\Commentable;
use App\Comment\PersistComment;
use Doctrine\ORM\EntityManagerInterface;

final class CommentsDoctrineRepository implements FindComments, PersistComment
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findLatestByCommentable(Commentable $commentable, int $numberOfComments = 10): \Generator
    {
        $repository = $this->entityManager->getRepository(Comment::class);

        $commentParentId = $commentable->commentParentId();

        $criteria = [
            'commentParentId.identifier' => $commentParentId->identifier(),
            'commentParentId.commentable' => $commentParentId->commentable(),
        ];

        foreach ($repository->findBy($criteria, [], $numberOfComments) as $comment) {
            yield $comment;
        }
    }

    public function persistComment(Comment $comment): void
    {
        $this->entityManager->persist($comment);
        $this->entityManager->flush();
    }
}
