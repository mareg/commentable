<?php declare(strict_types=1);

namespace App\Comment;

final class CommentParentId
{
    private string $identifier;
    private string $commentable;

    public function __construct(string $identifier, string $commentable)
    {
        $this->identifier = $identifier;
        $this->commentable = $commentable;
    }

    public function identifier(): string
    {
        return $this->identifier;
    }

    public function commentable(): string
    {
        return $this->commentable;
    }
}
