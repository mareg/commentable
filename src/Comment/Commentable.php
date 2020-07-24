<?php declare(strict_types=1);

namespace App\Comment;

interface Commentable
{
    public function commentParentId(): CommentParentId;
}
