<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Uom extends ModelAbstract
{
    /**
     * _uomCode 
     * 
     * @var string
     */
    protected $_uomCode;

    /**
     * _description 
     * 
     * @var string
     */
    protected $_description;

    /**
     * _quantity 
     * 
     * @var int
     * @access protected
     */
    protected $_quantity;

    /**
     * _price 
     * 
     * @var float
     * @access protected
     */
    protected $_price;

    /**
     * _availability 
     * 
     * @var array
     * @access protected
     */
    protected $_availability = array();

    /**
     * _enabled 
     * 
     * @var mixed
     */
    protected $_enabled;
 
    /**
     * Get uomCode.
     *
     * @return uomCode
     */
    public function getUomCode()
    {
        return $this->_uomCode;
    }
 
    /**
     * Set uomCode.
     *
     * @param $uomCode the value to be set
     */
    public function setUomCode($uomCode)
    {
        $this->_uomCode = $uomCode;
        return $this;
    }
 
    /**
     * Get description.
     *
     * @return description
     */
    public function getDescription()
    {
        return $this->_description;
    }
 
    /**
     * Set description.
     *
     * @param $description the value to be set
     */
    public function setDescription($description)
    {
        $this->_description = $description;
        return $this;
    }
 
    /**
     * Get quantity.
     *
     * @return quantity
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
 
    /**
     * Set quantity.
     *
     * @param $quantity the value to be set
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
        return $this;
    }
 
    /**
     * Get price.
     *
     * @return price
     */
    public function getPrice()
    {
        return $this->_price;
    }
 
    /**
     * Set price.
     *
     * @param $price the value to be set
     */
    public function setPrice($price)
    {
        $this->_price = $price;
        return $this;
    }
 
    /**
     * Get availability.
     *
     * @return availability
     */
    public function getAvailability()
    {
        return $this->_availability;
    }
 
    /**
     * Set availability.
     *
     * @param $availability the value to be set
     */
    public function setAvailability($availability)
    {
        $this->_availability = $availability;
        return $this;
    }

    /**
     * addAvailability 
     * 
     * @param mixed $distributor 
     * @param float $cost 
     */
    public function addAvailability($availability)
    {
        $this->_availability[] = $availability;
        return $this;
    }
 
    /**
     * Get enabled.
     *
     * @return enabled
     */
    public function getEnabled()
    {
        return $this->_enabled;
    }
 
    /**
     * Set enabled.
     *
     * @param $enabled the value to be set
     */
    public function setEnabled($enabled)
    {
        $this->_enabled = $enabled;
        return $this;
    }

    /**
     * enable 
     * 
     * @return void
     */
    public function enable()
    {
        $this->_enabled = true;
        return $this;
    }

    /**
     * disable 
     * 
     * @access public
     */
    public function disable()
    {
        $this->_enabled = false;
        return $this;
    }
}
