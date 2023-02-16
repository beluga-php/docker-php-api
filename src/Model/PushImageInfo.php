<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PushImageInfo extends \ArrayObject
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
    protected $error;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $progress;
    /**
     * @var ProgressDetail|null
     */
    protected $progressDetail;

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getProgress(): ?string
    {
        return $this->progress;
    }

    public function setProgress(?string $progress): self
    {
        $this->initialized['progress'] = true;
        $this->progress = $progress;

        return $this;
    }

    public function getProgressDetail(): ?ProgressDetail
    {
        return $this->progressDetail;
    }

    public function setProgressDetail(?ProgressDetail $progressDetail): self
    {
        $this->initialized['progressDetail'] = true;
        $this->progressDetail = $progressDetail;

        return $this;
    }
}
