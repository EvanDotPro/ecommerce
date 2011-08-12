<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Distributor extends ModelAbstract
{
    /**
     * _distributorId 
     * 
     * @var int
     */
    protected $_distributorId;

    /**
     * _name 
     * 
     * @var string
     */
    protected $_name;
 
    /**
     * Get distributorId.
     *
     * @return distributorId
     */
    public function getDistributorId()
    {
        return $this->_distributorId;
    }
 
    /**
     * Set distributorId.
     *
     * @param $distributorId the value to be set
     */
    public function setDistributorId($distributorId)
    {
        $this->_distributorId = $distributorId;
        return $this;
    }
 
    /**
     * Get name.
     *
     * @return name
     */
    public function getName()
    {
        return $this->_name;
    }
 
    /**
     * Set name.
     *
     * @param $name the value to be set
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * __toString 
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
