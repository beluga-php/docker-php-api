<?php

declare(strict_types=1);

namespace Docker\API\Model;

class HealthcheckResult extends \ArrayObject
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
     * Date and time at which this check started in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var \DateTimeInterface|null
     */
    protected $start;
    /**
     * Date and time at which this check ended in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string|null
     */
    protected $end;
    /**
     * ExitCode meanings:.
     *
     * - `0` healthy
     * - `1` unhealthy
     * - `2` reserved (considered unhealthy)
     * - other values: error running probe
     *
     * @var int|null
     */
    protected $exitCode;
    /**
     * Output from last check.
     *
     * @var string|null
     */
    protected $output;

    /**
     * Date and time at which this check started in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    /**
     * Date and time at which this check started in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setStart(?\DateTimeInterface $start): self
    {
        $this->initialized['start'] = true;
        $this->start = $start;

        return $this;
    }

    /**
     * Date and time at which this check ended in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getEnd(): ?string
    {
        return $this->end;
    }

    /**
     * Date and time at which this check ended in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setEnd(?string $end): self
    {
        $this->initialized['end'] = true;
        $this->end = $end;

        return $this;
    }

    /**
     * ExitCode meanings:.
     *
     * - `0` healthy
     * - `1` unhealthy
     * - `2` reserved (considered unhealthy)
     * - other values: error running probe
     */
    public function getExitCode(): ?int
    {
        return $this->exitCode;
    }

    /**
     * ExitCode meanings:.
     *
     * - `0` healthy
     * - `1` unhealthy
     * - `2` reserved (considered unhealthy)
     * - other values: error running probe
     */
    public function setExitCode(?int $exitCode): self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;

        return $this;
    }

    /**
     * Output from last check.
     */
    public function getOutput(): ?string
    {
        return $this->output;
    }

    /**
     * Output from last check.
     */
    public function setOutput(?string $output): self
    {
        $this->initialized['output'] = true;
        $this->output = $output;

        return $this;
    }
}
