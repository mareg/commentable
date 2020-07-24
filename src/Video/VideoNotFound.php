<?php declare(strict_types=1);

namespace App\Video;

final class VideoNotFound extends \RuntimeException
{
    public static function withIdentifier(string $identifier): VideoNotFound
    {
        return new self(
            sprintf('Video identified by `%s` was not found', $identifier)
        );
    }
}
