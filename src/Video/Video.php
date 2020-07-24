<?php declare(strict_types=1);

namespace App\Video;

use App\Comment\CommentParentId;
use App\Comment\Commentable;
use Ramsey\Uuid\Uuid;

final class Video implements Commentable, \JsonSerializable
{
    private string $identifier;
    private string $title;
    private string $videoUrl;
    private \DateTimeInterface $createdAt;
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->identifier = (string) Uuid::uuid4();
    }

    public function commentParentId(): CommentParentId
    {
        return new CommentParentId($this->identifier, Video::class);
    }

    public function jsonSerialize(): array
    {
        return [
            'identifier' => $this->identifier,
            'title' => $this->title,
            'video_url' => $this->videoUrl,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $this->updatedAt->format('Y-m-d H:i:s'),
        ];
    }
}
