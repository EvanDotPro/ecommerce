<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Product extends ModelAbstract
{
    /**
     * _productId 
     * 
     * @var int
     */
    protected $_productId;

    /**
     * _manufacturer 
     * 
     * @var \Core\Model\Manufacturer
     */
    protected $_manufacturer;

    /**
     * _name 
     * 
     * @var string
     */
    protected $_name;

    /**
     * _itemNumber 
     * 
     * @var string
     */
    protected $_itemNumber;

    /**
     * _attributes 
     * 
     * @var array
     */
    protected $_attributes = array();

    /**
     * Get productId.
     *
     * @return productId
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * Set productId.
     *
     * @param $productId the value to be set
     */
    public function setProductId($productId)
    {
        $this->_productId = (int) $productId;
        return $this;
    }

    /**
     * Get manufacturer.
     *
     * @return manufacturer
     */
    public function getManufacturer()
    {
        return $this->_manufacturer;
    }

    /**
     * Set manufacturer.
     *
     * @param $manufacturer the value to be set
     */
    public function setManufacturer($manufacturer)
    {
        if (is_array($manufacturer)) {
            $this->_manufacturer = new Manufacturer($manufacturer);
        } elseif ($manufacturer instanceof Manufacturer) {
            $this->_manufacturer = $manufacturer;
        } else {
            throw new \InvalidArgumentException('No valid manufacturer provided');
        }
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
     * Get itemNumber.
     *
     * @return itemNumber
     */
    public function getItemNumber()
    {
        return $this->_itemNumber;
    }
 
    /**
     * Set itemNumber.
     *
     * @param $itemNumber the value to be set
     */
    public function setItemNumber($itemNumber)
    {
        $this->_itemNumber = $itemNumber;
        return $this;
    }
 
    /**
     * Get attributes.
     *
     * @return attributes
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }
 
    /**
     * Set attributes.
     *
     * @param $attributes the value to be set
     */
    public function setAttributes($attributes)
    {
        $this->_attributes = $attributes;
        return $this;
    }

    /**
     * addAttribute 
     * 
     * @param mixed $attribute 
     */
    public function addAttribute($attribute)
    {
        $this->_attributes[] = $attribute;
        return $this;
    }
}
