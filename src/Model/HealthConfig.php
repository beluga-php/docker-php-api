<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class HealthConfig implements AdditionalPropertiesInterface
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
     * The test to perform. Possible values are:
     *
     * - `[]` inherit healthcheck from image or parent image
     * - `["NONE"]` disable healthcheck
     * - `["CMD", args...]` exec arguments directly
     * - `["CMD-SHELL", command]` run command with system's default shell
     *
     * A non-zero exit code indicates a failed healthcheck:
     * - `0` healthy
     * - `1` unhealthy
     * - `2` reserved (treated as unhealthy)
     * - other values: error running probe
     *
     * @var list<string>|null
     */
    protected $test;
    /**
     * The time to wait between checks in nanoseconds. It should be 0 or at
     * least 1000000 (1 ms). 0 means inherit.
     *
     * @var int|null
     */
    protected $interval;
    /**
     * The time to wait before considering the check to have hung. It should
     * be 0 or at least 1000000 (1 ms). 0 means inherit.
     *
     * If the health check command does not complete within this timeout,
     * the check is considered failed and the health check process is
     * forcibly terminated without a graceful shutdown.
     *
     * @var int|null
     */
    protected $timeout;
    /**
     * The number of consecutive failures needed to consider a container as
     * unhealthy. 0 means inherit.
     *
     * @var int|null
     */
    protected $retries;
    /**
     * Start period for the container to initialize before starting
     * health-retries countdown in nanoseconds. It should be 0 or at least
     * 1000000 (1 ms). 0 means inherit.
     *
     * @var int|null
     */
    protected $startPeriod;
    /**
     * The time to wait between checks in nanoseconds during the start period.
     * It should be 0 or at least 1000000 (1 ms). 0 means inherit.
     *
     * @var int|null
     */
    protected $startInterval;

    /**
     * The test to perform. Possible values are:
     *
     * - `[]` inherit healthcheck from image or parent image
     * - `["NONE"]` disable healthcheck
     * - `["CMD", args...]` exec arguments directly
     * - `["CMD-SHELL", command]` run command with system's default shell
     *
     * A non-zero exit code indicates a failed healthcheck:
     * - `0` healthy
     * - `1` unhealthy
     * - `2` reserved (treated as unhealthy)
     * - other values: error running probe
     *
     * @return list<string>|null
     */
    public function getTest(): ?array
    {
        return $this->test;
    }

    /**
     * The test to perform. Possible values are:
     *
     * - `[]` inherit healthcheck from image or parent image
     * - `["NONE"]` disable healthcheck
     * - `["CMD", args...]` exec arguments directly
     * - `["CMD-SHELL", command]` run command with system's default shell
     *
     * A non-zero exit code indicates a failed healthcheck:
     * - `0` healthy
     * - `1` unhealthy
     * - `2` reserved (treated as unhealthy)
     * - other values: error running probe
     *
     * @param list<string>|null $test
     */
    public function setTest(?array $test): self
    {
        $this->initialized['test'] = true;
        $this->test = $test;

        return $this;
    }

    /**
     * The time to wait between checks in nanoseconds. It should be 0 or at
     * least 1000000 (1 ms). 0 means inherit.
     */
    public function getInterval(): ?int
    {
        return $this->interval;
    }

    /**
     * The time to wait between checks in nanoseconds. It should be 0 or at
     * least 1000000 (1 ms). 0 means inherit.
     */
    public function setInterval(?int $interval): self
    {
        $this->initialized['interval'] = true;
        $this->interval = $interval;

        return $this;
    }

    /**
     * The time to wait before considering the check to have hung. It should
     * be 0 or at least 1000000 (1 ms). 0 means inherit.
     *
     * If the health check command does not complete within this timeout,
     * the check is considered failed and the health check process is
     * forcibly terminated without a graceful shutdown.
     */
    public function getTimeout(): ?int
    {
        return $this->timeout;
    }

    /**
     * The time to wait before considering the check to have hung. It should
     * be 0 or at least 1000000 (1 ms). 0 means inherit.
     *
     * If the health check command does not complete within this timeout,
     * the check is considered failed and the health check process is
     * forcibly terminated without a graceful shutdown.
     */
    public function setTimeout(?int $timeout): self
    {
        $this->initialized['timeout'] = true;
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * The number of consecutive failures needed to consider a container as
     * unhealthy. 0 means inherit.
     */
    public function getRetries(): ?int
    {
        return $this->retries;
    }

    /**
     * The number of consecutive failures needed to consider a container as
     * unhealthy. 0 means inherit.
     */
    public function setRetries(?int $retries): self
    {
        $this->initialized['retries'] = true;
        $this->retries = $retries;

        return $this;
    }

    /**
     * Start period for the container to initialize before starting
     * health-retries countdown in nanoseconds. It should be 0 or at least
     * 1000000 (1 ms). 0 means inherit.
     */
    public function getStartPeriod(): ?int
    {
        return $this->startPeriod;
    }

    /**
     * Start period for the container to initialize before starting
     * health-retries countdown in nanoseconds. It should be 0 or at least
     * 1000000 (1 ms). 0 means inherit.
     */
    public function setStartPeriod(?int $startPeriod): self
    {
        $this->initialized['startPeriod'] = true;
        $this->startPeriod = $startPeriod;

        return $this;
    }

    /**
     * The time to wait between checks in nanoseconds during the start period.
     * It should be 0 or at least 1000000 (1 ms). 0 means inherit.
     */
    public function getStartInterval(): ?int
    {
        return $this->startInterval;
    }

    /**
     * The time to wait between checks in nanoseconds during the start period.
     * It should be 0 or at least 1000000 (1 ms). 0 means inherit.
     */
    public function setStartInterval(?int $startInterval): self
    {
        $this->initialized['startInterval'] = true;
        $this->startInterval = $startInterval;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['test' => ['Test', 'getTest', 'setTest'], 'interval' => ['Interval', 'getInterval', 'setInterval'], 'timeout' => ['Timeout', 'getTimeout', 'setTimeout'], 'retries' => ['Retries', 'getRetries', 'setRetries'], 'startPeriod' => ['StartPeriod', 'getStartPeriod', 'setStartPeriod'], 'startInterval' => ['StartInterval', 'getStartInterval', 'setStartInterval']];
    }
}
