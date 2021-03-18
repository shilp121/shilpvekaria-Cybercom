<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Model\Admin');
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{	
	protected $admins = [];
	public function __construct()
	{
		parent::__construct();
        $this->setTemplate('view/admin/admin/grid.php');	
	}

	public function setAdmin()		
	{

			$admin = \Mage::getModel('Model\Admin');
			$adminData = $admin->fetchAll();
			$this->admins = $adminData;
			return $this;
	}

	public function getAdmin(){
			if(!$this->admins){
				$this->setAdmin();
			}
		   return $this->admins;
	}

}

?>