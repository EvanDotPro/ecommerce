<?php
class Core_Model_CategoryTest extends PHPUnit_Framework_TestCase
{
    protected $_model;
    
    protected function setUp()
    {
        parent::setUp();
        $this->_model = new \Core\Model\Category();
    }

    public function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testModelIsEmpty()
    {
        $this->assertInstanceOf('\Core\Model\Category',$this->_model);
        $this->assertNull($this->_model->getCategoryId());
        $this->assertNull($this->_model->getName());
    }

    public function modelDataProvider()
    {
        return array (
            array (array (
                'category_id'   => 1,
                'name'          => 'Category',
            ))
        );
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelContainsCorrectData($data)
    {
        $this->_model->setCategoryId($data['category_id'])
                     ->setName($data['name']);
        $this->assertSame($this->_model->toArray(), $data);
    }

    /**
     * @dataProvider modelDataProvider
     */
    public function testModelCanBePopulatedAtConstruct($data)
    {
        $model = new \Core\Model\Category($data);
        $this->assertSame($model->toArray(), $data);
    }
}

