<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Manufacturer extends ModelAbstract
{
    /**
     * _manufacturerId 
     * 
     * @var int
     */
    protected $_manufacturerId;

    /**
     * _name 
     * 
     * @var string
     */
    protected $_name;
 
    /**
     * Get manufacturerId.
     *
     * @return manufacturerId
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
 
    /**
     * Set manufacturerId.
     *
     * @param $manufacturerId the value to be set
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->_manufacturerId = (int) $manufacturerId;
        return $this;
    }
 
    /**
     * Get name.
     *
     * @return string name
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
