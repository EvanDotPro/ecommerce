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
     * _uoms 
     * 
     * @var array
     * @access protected
     */
    protected $_uoms = array();

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
        $this->_attributes = array();
        foreach ($attributes as $attribute) {
            $this->addAttribute($attribute);
        }
        return $this;
    }

    /**
     * addAttribute 
     * 
     * @param mixed $attribute 
     */
    public function addAttribute($attribute)
    {
        if (is_array($attribute)) {
            $this->_attributes[] = new Attribute($attribute);
        } elseif ($attribute instanceof Attribute) {
            $this->_attributes[] = $attribute;
        } else {
            throw new \InvalidArgumentException('No valid attribute provided');
        }
        return $this;
    }
 
    /**
     * Get uoms.
     *
     * @return uoms
     */
    public function getUoms()
    {
        return $this->_uoms;
    }
 
    /**
     * Set uoms.
     *
     * @param $uoms the value to be set
     */
    public function setUoms($uoms)
    {
        $this->_uoms = array();
        foreach ($uoms as $uom) {
            $this->addUom($uom);
        }
        return $this;
    }

    /**
     * addUom 
     * 
     * @param mixed $uom 
     */
    public function addUom($uom)
    {
        if (is_array($uom)) {
            $this->_uoms[] = new Uom($uom);
        } elseif ($uom instanceof Uom) {
            $this->_uoms[] = $uom;
        } else {
            throw new \InvalidArgumentException('No valid uom provided');
        }
        return $this;
    }
}
