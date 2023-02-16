<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ContainerSummaryItemHostConfig extends \ArrayObject
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
     * @var string|null
     */
    protected $networkMode;

    public function getNetworkMode(): ?string
    {
        return $this->networkMode;
    }

    public function setNetworkMode(?string $networkMode): self
    {
        $this->initialized['networkMode'] = true;
        $this->networkMode = $networkMode;

        return $this;
    }
}
