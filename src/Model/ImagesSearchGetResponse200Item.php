<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImagesSearchGetResponse200Item implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
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
    protected $description;
    /**
     * @var bool|null
     */
    protected $isOfficial;
    /**
     * Whether this repository has automated builds enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated and will always
     * > be "false" in future.
     *
     * @var bool|null
     */
    protected $isAutomated;
    /**
     * @var string|null
     */
    protected $name;
    /**
     * @var int|null
     */
    protected $starCount;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    public function getIsOfficial(): ?bool
    {
        return $this->isOfficial;
    }

    public function setIsOfficial(?bool $isOfficial): self
    {
        $this->initialized['isOfficial'] = true;
        $this->isOfficial = $isOfficial;

        return $this;
    }

    /**
     * Whether this repository has automated builds enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated and will always
     * > be "false" in future.
     */
    public function getIsAutomated(): ?bool
    {
        return $this->isAutomated;
    }

    /**
     * Whether this repository has automated builds enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated and will always
     * > be "false" in future.
     */
    public function setIsAutomated(?bool $isAutomated): self
    {
        $this->initialized['isAutomated'] = true;
        $this->isAutomated = $isAutomated;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getStarCount(): ?int
    {
        return $this->starCount;
    }

    public function setStarCount(?int $starCount): self
    {
        $this->initialized['starCount'] = true;
        $this->starCount = $starCount;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['description' => ['description', 'getDescription', 'setDescription'], 'isOfficial' => ['is_official', 'getIsOfficial', 'setIsOfficial'], 'isAutomated' => ['is_automated', 'getIsAutomated', 'setIsAutomated'], 'name' => ['name', 'getName', 'setName'], 'starCount' => ['star_count', 'getStarCount', 'setStarCount']];
    }
}
