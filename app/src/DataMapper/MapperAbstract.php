<?php

abstract class MapperAbstract
{
    /**
     * @var PDO
     */
    private $dbAdapter;
    
    /**
     * Create a new instance of the domain object. If the $data parameter is specified
     * then the object will be populated with it.
     *
     * @param array $data
     *
     * @return DomainObjectAbstract
     */
    public function create(array $data = null)
    {
        $obj = $this->_create();
        if ($data) {
            $obj = $this->populate($obj, $data);
        }
        return $obj;
    }
    
    /**
     * Save the domain object
     *
     * @param DomainObjectAbstract $obj
     */
    public function save(Application_Model_Abstract $obj)
    {
        if (is_null($obj->getId())) {
            $this->_insert($obj);
        } else {
            $this->_update($obj);
        }
    }
    
    /**
     * Delete the domain object
     *
     * @param DomainObjectAbstract $obj
     */
    public function delete(Application_Model_Abstract $obj)
    {
        $this->_delete($obj);
    }
    
    /**
     * Populate the domain object with the values from the data array.
     *
     * @param DomainObjectAbstract $obj
     * @param array $data
     *
     * @return DomainObjectAbstract
     */
    abstract public function populate(Application_Model_Abstract $obj, array $data);
    
    /**
     * Create a new instance of a domain object
     *
     * @return DomainObjectAbstract
     */
    abstract protected function _create();
    
    /**
     * Insert the domain object into the database
     *
     * @param DomainObjectAbstract $obj
     */
    abstract protected function _insert(Application_Model_Abstract $obj);
    
    /**
     * Update the domain object in persistent storage
     *
     * @param DomainObjectAbstract $obj
     */
    abstract protected function _update(Application_Model_Abstract $obj);
    
    /**
     * Delete the domain object from peristent Storage
     *
     * @param DomainObjectAbstract $obj
     */
    abstract protected function _delete(Application_Model_Abstract $obj);
}