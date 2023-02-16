<?php

namespace Docker\API\Model;

class ContainersIdArchiveHeadTextplainResponse400 extends \ArrayObject
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
     * Represents an error.
     *
     * @var ErrorResponse|null
     */
    protected $errorResponse;
    /**
    * The error message. Either "must specify path parameter"
    (path cannot be empty) or "not a directory" (path was
    asserted to be a directory but exists as a file).
    
    *
    * @var string|null
    */
    protected $message;
    /**
     * Represents an error.
     *
     * @return ErrorResponse|null
     */
    public function getErrorResponse() : ?ErrorResponse
    {
        return $this->errorResponse;
    }
    /**
     * Represents an error.
     *
     * @param ErrorResponse|null $errorResponse
     *
     * @return self
     */
    public function setErrorResponse(?ErrorResponse $errorResponse) : self
    {
        $this->initialized['errorResponse'] = true;
        $this->errorResponse = $errorResponse;
        return $this;
    }
    /**
    * The error message. Either "must specify path parameter"
    (path cannot be empty) or "not a directory" (path was
    asserted to be a directory but exists as a file).
    
    *
    * @return string|null
    */
    public function getMessage() : ?string
    {
        return $this->message;
    }
    /**
    * The error message. Either "must specify path parameter"
    (path cannot be empty) or "not a directory" (path was
    asserted to be a directory but exists as a file).
    
    *
    * @param string|null $message
    *
    * @return self
    */
    public function setMessage(?string $message) : self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}