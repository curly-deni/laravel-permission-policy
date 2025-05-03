<?php

namespace Aesis\PermissionPolicy;

use Illuminate\Auth\Access\Gate;

class CustomGate extends Gate
{
    /**
     * {@inheritDoc}
     */
    public function resolvePolicy($class)
    {
        [$class, $params] = decodeClassWithParams($class);

        return $this->container->make($class, $params);
    }

    protected function guessPolicyName($class)
    {
        if (!method_exists($class, 'getPolicy'))
            return parent::guessPolicyName($class);

        return encodeClassWithParams($class::getPolicy(), ['model' => static::class]);
    }


}
