<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Model\Product');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $products = [];
	public function __construct()
	{
		 ///parent::__construct();
		parent::__construct();
        $this->setTemplate('view/admin/product/grid.php');	
		// $this->setController(new Controller_Product());
	}

	public function setProduct()		
	{

			$product = \Mage::getModel('Model\Product');
			$productData = $product->fetchAll();
			$this->products = $productData;
			return $this;
	}

	public function getProduct(){
			if(!$this->products){
				$this->setProduct();
			}
		   return $this->products;
	}

}

?>