<?php declare(strict_types=1);

namespace App\Post;

use App\Comment\CommentParentId;
use App\Comment\Commentable;
use Ramsey\Uuid\Uuid;

final class Post implements Commentable, \JsonSerializable
{
    private string $identifier;
    private string $subject;
    private string $body;
    private \DateTimeInterface $createdAt;
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->identifier = (string) Uuid::uuid4();
        $this->createdAt = new \DateTimeImmutable('now');
        $this->updatedAt = new \DateTimeImmutable('now');
    }

    public function commentParentId(): CommentParentId
    {
        return new CommentParentId($this->identifier, Post::class);
    }

    public function jsonSerialize(): array
    {
        return [
            'identifier' => $this->identifier,
            'subject' => $this->subject,
            'body' => $this->body,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $this->updatedAt->format('Y-m-d H:i:s'),
        ];
    }
}
