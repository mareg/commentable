<?php declare(strict_types=1);

namespace App\Comment;

interface FindComments
{
    public function findLatestByCommentable(Commentable $commentable, int $numberOfComments = 10): \Generator;
}
