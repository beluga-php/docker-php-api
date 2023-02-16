<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmSpecRaft extends \ArrayObject
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
     * The number of log entries between snapshots.
     *
     * @var int|null
     */
    protected $snapshotInterval;
    /**
     * The number of snapshots to keep beyond the current snapshot.
     *
     * @var int|null
     */
    protected $keepOldSnapshots;
    /**
     * The number of log entries to keep around to sync up slow followers
     * after a snapshot is created.
     *
     * @var int|null
     */
    protected $logEntriesForSlowFollowers;
    /**
     * The number of ticks that a follower will wait for a message from
     * the leader before becoming a candidate and starting an election.
     * `ElectionTick` must be greater than `HeartbeatTick`.
     *
     * A tick currently defaults to one second, so these translate
     * directly to seconds currently, but this is NOT guaranteed.
     *
     * @var int|null
     */
    protected $electionTick;
    /**
     * The number of ticks between heartbeats. Every HeartbeatTick ticks,
     * the leader will send a heartbeat to the followers.
     *
     * A tick currently defaults to one second, so these translate
     * directly to seconds currently, but this is NOT guaranteed.
     *
     * @var int|null
     */
    protected $heartbeatTick;

    /**
     * The number of log entries between snapshots.
     */
    public function getSnapshotInterval(): ?int
    {
        return $this->snapshotInterval;
    }

    /**
     * The number of log entries between snapshots.
     */
    public function setSnapshotInterval(?int $snapshotInterval): self
    {
        $this->initialized['snapshotInterval'] = true;
        $this->snapshotInterval = $snapshotInterval;

        return $this;
    }

    /**
     * The number of snapshots to keep beyond the current snapshot.
     */
    public function getKeepOldSnapshots(): ?int
    {
        return $this->keepOldSnapshots;
    }

    /**
     * The number of snapshots to keep beyond the current snapshot.
     */
    public function setKeepOldSnapshots(?int $keepOldSnapshots): self
    {
        $this->initialized['keepOldSnapshots'] = true;
        $this->keepOldSnapshots = $keepOldSnapshots;

        return $this;
    }

    /**
     * The number of log entries to keep around to sync up slow followers
     * after a snapshot is created.
     */
    public function getLogEntriesForSlowFollowers(): ?int
    {
        return $this->logEntriesForSlowFollowers;
    }

    /**
     * The number of log entries to keep around to sync up slow followers
     * after a snapshot is created.
     */
    public function setLogEntriesForSlowFollowers(?int $logEntriesForSlowFollowers): self
    {
        $this->initialized['logEntriesForSlowFollowers'] = true;
        $this->logEntriesForSlowFollowers = $logEntriesForSlowFollowers;

        return $this;
    }

    /**
     * The number of ticks that a follower will wait for a message from
     * the leader before becoming a candidate and starting an election.
     * `ElectionTick` must be greater than `HeartbeatTick`.
     *
     * A tick currently defaults to one second, so these translate
     * directly to seconds currently, but this is NOT guaranteed.
     */
    public function getElectionTick(): ?int
    {
        return $this->electionTick;
    }

    /**
     * The number of ticks that a follower will wait for a message from
     * the leader before becoming a candidate and starting an election.
     * `ElectionTick` must be greater than `HeartbeatTick`.
     *
     * A tick currently defaults to one second, so these translate
     * directly to seconds currently, but this is NOT guaranteed.
     */
    public function setElectionTick(?int $electionTick): self
    {
        $this->initialized['electionTick'] = true;
        $this->electionTick = $electionTick;

        return $this;
    }

    /**
     * The number of ticks between heartbeats. Every HeartbeatTick ticks,
     * the leader will send a heartbeat to the followers.
     *
     * A tick currently defaults to one second, so these translate
     * directly to seconds currently, but this is NOT guaranteed.
     */
    public function getHeartbeatTick(): ?int
    {
        return $this->heartbeatTick;
    }

    /**
     * The number of ticks between heartbeats. Every HeartbeatTick ticks,
     * the leader will send a heartbeat to the followers.
     *
     * A tick currently defaults to one second, so these translate
     * directly to seconds currently, but this is NOT guaranteed.
     */
    public function setHeartbeatTick(?int $heartbeatTick): self
    {
        $this->initialized['heartbeatTick'] = true;
        $this->heartbeatTick = $heartbeatTick;

        return $this;
    }
}
