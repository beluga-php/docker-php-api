<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ImageDeleteResponseItem extends \ArrayObject
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
     * The image ID of an image that was untagged.
     *
     * @var string|null
     */
    protected $untagged;
    /**
     * The image ID of an image that was deleted.
     *
     * @var string|null
     */
    protected $deleted;

    /**
     * The image ID of an image that was untagged.
     */
    public function getUntagged(): ?string
    {
        return $this->untagged;
    }

    /**
     * The image ID of an image that was untagged.
     */
    public function setUntagged(?string $untagged): self
    {
        $this->initialized['untagged'] = true;
        $this->untagged = $untagged;

        return $this;
    }

    /**
     * The image ID of an image that was deleted.
     */
    public function getDeleted(): ?string
    {
        return $this->deleted;
    }

    /**
     * The image ID of an image that was deleted.
     */
    public function setDeleted(?string $deleted): self
    {
        $this->initialized['deleted'] = true;
        $this->deleted = $deleted;

        return $this;
    }
}
