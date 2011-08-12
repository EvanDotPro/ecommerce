<?php
class Core_Model_UomTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Uom();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Uom',$this->_model);
        $this->assertNull($this->_model->getUomCode());
        $this->assertNull($this->_model->getDescription());
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'uom_code'    => 'EA',
                'description' => 'Each',
            ))
        );
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectData($data)
    {
        $this->_model->setUomCode($data['uom_code'])
                     ->setDescription($data['description']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Uom($data);
        $this->assertSame($model->toArray(), $data);
    }
}

