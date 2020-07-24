<?php declare(strict_types=1);

namespace App\Comment;

final class NewComment
{
    private string $comment;
    private string $author;

    public function __construct(string $comment, string $author)
    {
        $this->comment = $comment;
        $this->author = $author;
    }

    public function forCommentable(Commentable $commentable): Comment
    {
        return new Comment($commentable->commentParentId(), $this->comment, $this->author);
    }
}
