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
}
