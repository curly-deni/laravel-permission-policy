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
        if (! method_exists($class, 'getPolicy')) {
            return parent::guessPolicyName($class);
        }

        return [encodeClassWithParams($class::getPolicy(), ['model' => $class])];
    }

    public function getPolicyFor($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        if (! is_string($class)) {
            return;
        }

        if (isset($this->policies[$class])) {
            return $this->resolvePolicy($this->policies[$class]);
        }

        foreach ($this->guessPolicyName($class) as $guessedPolicy) {
            [$class, $params] = decodeClassWithParams($guessedPolicy);
            if (class_exists($class)) {
                return $this->resolvePolicy($guessedPolicy);
            }
        }

        foreach ($this->policies as $expected => $policy) {
            if (is_subclass_of($class, $expected)) {
                return $this->resolvePolicy($policy);
            }
        }
    }
}
