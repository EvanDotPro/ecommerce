<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class ProductAttribute extends ModelAbstract
{
    /**
     * _attribute 
     * 
     * @var Core\Model\Attribute
     * @access protected
     */
    protected $_attribute;

    /**
     * _value 
     * 
     * @var Core\Model\AttributeValue
     * @access protected
     */
    protected $_value;
 
 
    /**
     * Get attribute.
     *
     * @return attribute
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }
 
    /**
     * Set attribute.
     *
     * @param $attribute the value to be set
     */
    public function setAttribute($attribute)
    {
        if (is_array($attribute)) {
            $this->_attribute = new Attribute($attribute);
        } elseif ($attribute instanceof Attribute) {
            $this->_attribute = $attribute;
        } else {
            throw new \InvalidArgumentException('No valid attribute provided');
        }
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
        if (is_array($value)) {
            $this->_value = new Value($value);
        } elseif ($value instanceof Value) {
            $this->_value = $value;
        } else {
            throw new \InvalidArgumentException('No valid value provided');
        }
        return $this;
    }
}
