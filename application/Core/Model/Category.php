<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Category extends ModelAbstract
{
    /**
     * _categoryId 
     * 
     * @var int
     */
    protected $_categoryId;

    /**
     * _name 
     * 
     * @var string
     */
    protected $_name;
 
    /**
     * Get categoryId.
     *
     * @return categoryId
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
 
    /**
     * Set categoryId.
     *
     * @param $categoryId the value to be set
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = $categoryId;
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
}
