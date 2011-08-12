<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Attribute extends ModelAbstract
{
    /**
     * _attributeId 
     * 
     * @var int
     * @access protected
     */
    protected $_attributeId;

    /**
     * _name 
     * 
     * @var string
     * @access protected
     */
    protected $_name;
 
    /**
     * Get attributeId.
     *
     * @return attributeId
     */
    public function getAttributeId()
    {
        return $this->_attributeId;
    }
 
    /**
     * Set attributeId.
     *
     * @param $attributeId the value to be set
     */
    public function setAttributeId($attributeId)
    {
        $this->_attributeId = (int) $attributeId;
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
