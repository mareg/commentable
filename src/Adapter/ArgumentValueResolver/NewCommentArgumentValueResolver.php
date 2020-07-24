<?php declare(strict_types=1);

namespace App\Adapter\ArgumentValueResolver;

use App\Comment\NewComment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

final class NewCommentArgumentValueResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return NewComment::class === $argument->getType();
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        $payload = $request->getContent();
        $data = json_decode($payload, true);

        yield new NewComment($data['author'], $data['comment']);
    }
}
