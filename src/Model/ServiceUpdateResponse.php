<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ServiceUpdateResponse extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Optional warning messages.
     *
     * @var list<string>|null
     */
    protected $warnings;

    /**
     * Optional warning messages.
     *
     * @return list<string>|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * Optional warning messages.
     *
     * @param list<string>|null $warnings
     */
    public function setWarnings(?array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
