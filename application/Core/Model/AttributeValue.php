<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class AttributeValue extends ModelAbstract
{
    /**
     * _attributeValueId 
     * 
     * @var int
     * @access protected
     */
    protected $_attributeValueId;

    /**
     * _name 
     * 
     * @var string
     * @access protected
     */
    protected $_name;
 
    /**
     * Get attributeValueId.
     *
     * @return attributeValueId
     */
    public function getattributeValueId()
    {
        return $this->_attributeValueId;
    }
 
    /**
     * Set attributeValueId.
     *
     * @param $attributeValueId the value to be set
     */
    public function setattributeValueId($attributeValueId)
    {
        $this->_attributeValueId = (int) $attributeValueId;
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
