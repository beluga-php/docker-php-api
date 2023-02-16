<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmSpecOrchestration extends \ArrayObject
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
     * The number of historic tasks to keep per instance or node. If
     * negative, never remove completed or failed tasks.
     *
     * @var int|null
     */
    protected $taskHistoryRetentionLimit;

    /**
     * The number of historic tasks to keep per instance or node. If
     * negative, never remove completed or failed tasks.
     */
    public function getTaskHistoryRetentionLimit(): ?int
    {
        return $this->taskHistoryRetentionLimit;
    }

    /**
     * The number of historic tasks to keep per instance or node. If
     * negative, never remove completed or failed tasks.
     */
    public function setTaskHistoryRetentionLimit(?int $taskHistoryRetentionLimit): self
    {
        $this->initialized['taskHistoryRetentionLimit'] = true;
        $this->taskHistoryRetentionLimit = $taskHistoryRetentionLimit;

        return $this;
    }
}
