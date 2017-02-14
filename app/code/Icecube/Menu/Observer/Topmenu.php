<?php

namespace Icecube\Menu\Observer;

use \Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Data\Tree\Node;
class Topmenu implements ObserverInterface
{
	protected $_cmsBlock;
		
    public function __construct(
        \Magento\Cms\Block\Block $cmsBlock
    )
    {
        $this->_cmsBlock = $cmsBlock;
    }
    
	public function execute(Observer $observer)
	{    
		$event = $observer->getEvent()->getName();
		if($event == 'page_block_html_topmenu_gethtml_before'){
			
            $menu = $observer->getMenu();
	        $tree = $menu->getTree();
	        $data = [
	            'name'      => __('Menu item label here'),
	            'id'        => 'some-unique-id-here',
	            'url'       => 'url goes here',
	            'is_active' => FALSE
	        ];
	        $data1 = [
	            'name'      => __('Menu item label here 1'),
	            'id'        => 'some-unique-id-here',
	            'url'       => 'url goes here',
	            'is_active' => FALSE
	        ];
	        $node = new Node($data, 'id', $tree, $menu);
	        $menu->addChild($node);
	        $node1 = new Node($data1, 'id', $tree, $menu);
	        $menu->addChild($node1);
	        return $this;
        }
	}
}