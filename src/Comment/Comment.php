<?php declare(strict_types=1);

namespace App\Comment;

use Ramsey\Uuid\Uuid;

final class Comment implements \JsonSerializable
{
    private string $identifier;
    private CommentParentId $commentParentId;
    private string $comment;
    private string $author;
    private \DateTimeInterface $createdAt;

    public function __construct(CommentParentId $commentParentId, string $comment, string $author)
    {
        $this->identifier = (string) Uuid::uuid4();
        $this->commentParentId = $commentParentId;
        $this->comment = $comment;
        $this->author = $author;
        $this->createdAt = new \DateTimeImmutable('now');
    }

    public function jsonSerialize(): array
    {
        return [
            'identifier' => $this->identifier,
            'comment' => $this->comment,
            'author' => $this->author,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
        ];
    }
}
