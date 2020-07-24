<?php declare(strict_types=1);

namespace App\Post;

final class PostNotFound extends \RuntimeException
{
    public static function withIdentifier(string $identifier): PostNotFound
    {
        return new self(
            sprintf('Post identified by `%s` was not found', $identifier)
        );
    }
}
