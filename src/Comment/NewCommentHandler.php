<?php declare(strict_types=1);

namespace App\Comment;

final class NewCommentHandler
{
    private PersistComment $comments;

    public function __construct(PersistComment $comments)
    {
        $this->comments = $comments;
    }

    public function newCommentForCommentable(NewComment $newComment, Commentable $commentable): Comment
    {
        $comment = $newComment->forCommentable($commentable);

        $this->comments->persistComment(
            $newComment->forCommentable($commentable)
        );

        return $comment;
    }
}
