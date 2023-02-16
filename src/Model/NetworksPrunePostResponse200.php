<?php

namespace Docker\API\Model;

class NetworksPrunePostResponse200 extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Networks that were deleted
     *
     * @var string[]|null
     */
    protected $networksDeleted;
    /**
     * Networks that were deleted
     *
     * @return string[]|null
     */
    public function getNetworksDeleted() : ?array
    {
        return $this->networksDeleted;
    }
    /**
     * Networks that were deleted
     *
     * @param string[]|null $networksDeleted
     *
     * @return self
     */
    public function setNetworksDeleted(?array $networksDeleted) : self
    {
        $this->initialized['networksDeleted'] = true;
        $this->networksDeleted = $networksDeleted;
        return $this;
    }
}