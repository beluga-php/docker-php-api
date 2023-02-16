<?php

namespace Docker\API\Model;

class ServiceSpecMode extends \ArrayObject
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
     * 
     *
     * @var ServiceSpecModeReplicated|null
     */
    protected $replicated;
    /**
     * 
     *
     * @var ServiceSpecModeGlobal|null
     */
    protected $global;
    /**
    * The mode used for services with a finite number of tasks that run
    to a completed state.
    
    *
    * @var ServiceSpecModeReplicatedJob|null
    */
    protected $replicatedJob;
    /**
    * The mode used for services which run a task to the completed state
    on each valid node.
    
    *
    * @var ServiceSpecModeGlobalJob|null
    */
    protected $globalJob;
    /**
     * 
     *
     * @return ServiceSpecModeReplicated|null
     */
    public function getReplicated() : ?ServiceSpecModeReplicated
    {
        return $this->replicated;
    }
    /**
     * 
     *
     * @param ServiceSpecModeReplicated|null $replicated
     *
     * @return self
     */
    public function setReplicated(?ServiceSpecModeReplicated $replicated) : self
    {
        $this->initialized['replicated'] = true;
        $this->replicated = $replicated;
        return $this;
    }
    /**
     * 
     *
     * @return ServiceSpecModeGlobal|null
     */
    public function getGlobal() : ?ServiceSpecModeGlobal
    {
        return $this->global;
    }
    /**
     * 
     *
     * @param ServiceSpecModeGlobal|null $global
     *
     * @return self
     */
    public function setGlobal(?ServiceSpecModeGlobal $global) : self
    {
        $this->initialized['global'] = true;
        $this->global = $global;
        return $this;
    }
    /**
    * The mode used for services with a finite number of tasks that run
    to a completed state.
    
    *
    * @return ServiceSpecModeReplicatedJob|null
    */
    public function getReplicatedJob() : ?ServiceSpecModeReplicatedJob
    {
        return $this->replicatedJob;
    }
    /**
    * The mode used for services with a finite number of tasks that run
    to a completed state.
    
    *
    * @param ServiceSpecModeReplicatedJob|null $replicatedJob
    *
    * @return self
    */
    public function setReplicatedJob(?ServiceSpecModeReplicatedJob $replicatedJob) : self
    {
        $this->initialized['replicatedJob'] = true;
        $this->replicatedJob = $replicatedJob;
        return $this;
    }
    /**
    * The mode used for services which run a task to the completed state
    on each valid node.
    
    *
    * @return ServiceSpecModeGlobalJob|null
    */
    public function getGlobalJob() : ?ServiceSpecModeGlobalJob
    {
        return $this->globalJob;
    }
    /**
    * The mode used for services which run a task to the completed state
    on each valid node.
    
    *
    * @param ServiceSpecModeGlobalJob|null $globalJob
    *
    * @return self
    */
    public function setGlobalJob(?ServiceSpecModeGlobalJob $globalJob) : self
    {
        $this->initialized['globalJob'] = true;
        $this->globalJob = $globalJob;
        return $this;
    }
}