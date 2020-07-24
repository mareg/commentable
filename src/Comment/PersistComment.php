<?php declare(strict_types=1);

namespace App\Comment;

interface PersistComment
{
    public function persistComment(Comment $comment): void;
}
