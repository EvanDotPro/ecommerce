<?php
namespace Core\Model;
use BaseApp\Model\ModelAbstract;
class Availability extends ModelAbstract
{
    /**
     * _distributor 
     * 
     * @var mixed
     * @access protected
     */
    protected $_distributor;

    /**
     * _cost 
     * 
     * @var float
     * @access protected
     */
    protected $_cost;
 
    /**
     * Get distributor.
     *
     * @return distributor
     */
    public function getDistributor()
    {
        return $this->_distributor;
    }
 
    /**
     * Set distributor.
     *
     * @param $distributor the value to be set
     */
    public function setDistributor($distributor)
    {
        $this->_distributor = $distributor;
        return $this;
    }
 
    /**
     * Get cost.
     *
     * @return cost
     */
    public function getCost()
    {
        return $this->_cost;
    }
 
    /**
     * Set cost.
     *
     * @param $cost the value to be set
     */
    public function setCost($cost)
    {
        $this->_cost = $cost;
        return $this;
    }
}
