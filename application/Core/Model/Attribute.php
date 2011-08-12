<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Attribute extends ModelAbstract
{
    /**
     * _name 
     * 
     * @var string
     * @access protected
     */
    protected $_name;

    /**
     * _value 
     * 
     * @var string
     * @access protected
     */
    protected $_value;
 
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
     * Get value.
     *
     * @return value
     */
    public function getValue()
    {
        return $this->_value;
    }
 
    /**
     * Set value.
     *
     * @param $value the value to be set
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }
}
