<?php

class UserMapper extends MapperAbstract
{
    private $dbAdapter;
    
    public function __construct($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }
    
    /**
     * Create a new Article domainobject
     */
    protected function _create()
    {
        return new User();
    }
    
    /**
     * Insert the DomainObject in persistent storage
     *
     * @param DomainObjectAbstract $obj
     */
    protected function _insert(DomainAbstract $obj)
    {
        // Insert Article object into database
        /* @var $obj Application_Model_User */
        $query = 'INSERT INTO users (username,password) VALUES (?,SHA1(?))';
        $ret = $this->dbAdapter->query($query, [
                                                 $obj->getUsername(),
                                                 $obj->getPassword()
                                             ]
        );
        
        // Assign the new user id to the Article object
        $obj->setId($this->dbAdapter->lastInsertId());
    }
    
    /**
     * Update
     *
     * @param DomainObjectAbstract $obj
     */
    protected function _update(DomainAbstract $obj)
    {
        // Update Article object in database
        $query = 'UPDATE users SET username=?,password=SHA1(?) WHERE id=?';
        $ret = $this->dbAdapter->query($query, [
            $obj->getUsername(),
            $obj->getPassword(),
            $obj->getId()
        ]);
    }
    
    /**
     * Delete the Article from the database
     *
     * @param DomainObjectAbstract $obj
     */
    protected function _delete(DomainAbstract $obj)
    {
        $query = 'DELETE FROM users WHERE id=?';
        $ret = $this->dbAdapter->query($query, [$obj->getId()]);
    }
    
    /**
     * Populate the Article (DomainObject) with the data array.
     *
     * @param DomainObjectAbstract $obj
     * @param array $data
     *
     * @return Article
     */
    public function populate(DomainAbstract $obj, array $data)
    {
        if (isset($data['id'])) {
            $obj->setId($data['id']);
        }
        
        if (isset($data['username'])) {
            $obj->setUsername($data['username']);
        }
        
        if (isset($data['password'])) {
            $obj->setPassword($data['password']);
        }
        
        return $obj;
    }
    
    
    /**
     * Retrieves user by userid
     *
     * @param int $userId
     *
     * @return User (null if not found)
     */
    public function findById($userId)
    {
        $sql = "SELECT id,username,password FROM users WHERE id=?";
        
        $data = $this->dbAdapter->fetchRow($sql, [$userId], Zend_Db::FETCH_ASSOC);
        
        $user = null;
        
        if ($data != false) {
            $user = $this->create($data);
        }
        
        return $user;
    }
    
    /**
     * Retrieves user by username
     *
     * @param string $username
     *
     * @return User (null if not found)
     */
    public function findByUsername($username)
    {
        $sql = "SELECT id,username,password FROM users WHERE username=?";
        
        $data = $this->dbAdapter->fetchRow($sql, [$username], Zend_Db::FETCH_ASSOC);
        
        $user = null;
        
        if ($data != false) {
            $user = $this->create();
        }
        
        return $user;
    }
}