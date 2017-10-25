<?php

namespace Overblog\GraphiQLBundle\Config\GraphQLEndpoint;

use Overblog\GraphiQLBundle\Config\GraphiQLControllerEndpoint;

final class RootResolver implements GraphiQLControllerEndpoint
{
    public function getBySchema($name)
    {
        if ($name === 'default') {
            return $this->getDefault();
        }

        throw GraphQLEndpointInvalidSchema::forSchemaAndResolver($name, self::class);
    }

    public function getDefault()
    {
        return '/';
    }
}
