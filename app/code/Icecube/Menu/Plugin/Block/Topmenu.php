<?php 

namespace Icecube\Menu\Plugin\Block;

use Magento\Framework\Data\Tree\NodeFactory;

class Topmenu
{
    /**
     * @var NodeFactory
     */
    protected $nodeFactory;
	
	private $_objectManager;
	
    public function __construct(
        NodeFactory $nodeFactory,
        \Magento\Framework\ObjectManagerInterface $objectmanager
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->_objectManager = $objectmanager;
    }

    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $topmenu, $html) {
    		$url = $this->getBase();
	        $html .= $this->addMenu('Home',$url,1,$html);
	        $html .= $this->addMenu('Products',$url.'products/',2,$html);
	        $html .= $this->addMenu('Blog',$url.'blog/',3,$html);
	        $html .= $this->addMenu('Navigate',$url.'navigate/',4,$html);
	        $html .= $this->addMenu('About Us',$url.'about-us/',5,$html);
	        $html .= $this->addMenu('Contact Us',$url.'contacts/',6,$html);
	        $html .= $this->addMenu('RSS Syndication',$url.'rss-syndication/',7,$html);
	        return $html;
    }
    
    protected function addMenu($itemname,$url,$position,$html)
    {
		$html = "<li class=\"level0 nav-$position level-top parent ui-menu-item\">".
        			"<a href=\"" . $url . "\" class=\"level-top ui-corner-all\" aria-haspopup=\"true\" tabindex=\"-1\" role=\"menuitem\"><span class=\"ui-menu-icon ui-icon ui-icon-carat-1-e\"></span><span>" . __($itemname) . "</span></a>".
        		"</li>";
        return $html;
	}
    
    protected function subMenu()
    {
			$html .= "<li class=\"level0 nav-4 level-top parent ui-menu-item\">";
	        $html .= "<a href=\"" . "EXTERNAL_URL" . "\" class=\"level-top ui-corner-all\" aria-haspopup=\"true\" tabindex=\"-1\" role=\"menuitem\"><span class=\"ui-menu-icon ui-icon ui-icon-carat-1-e\"></span><span>" . __("EXTERNAL_URL_TITLE") . "</span></a>";
	        $html .= "<ul class=\"level0 submenu ui-menu ui-widget ui-widget-content ui-corner-all\" role=\"menu\" aria-expanded=\"false\" style=\"display: none; top: 47px; left: -0.4375px;\" aria-hidden=\"true\">";

	        $html .= "<li class=\"level1 nav-5-1 first ui-menu-item\" role=\"presentation\">";
	        $html .= "<a href=\"" . "EXTERNAL_URL" . "\" class=\"ui-corner-all\" tabindex=\"-1\" role=\"menuitem\"><span>" . __("EXTERNAL_URL_TITLE") . "</span></a>";
	        $html .= "</li>";

	        $html .= "<li class=\"level1 nav-5-1 first ui-menu-item\" role=\"presentation\">";
	        $html .= "<a href=\"" . "EXTERNAL_URL" . "\" class=\"ui-corner-all\" tabindex=\"-1\" role=\"menuitem\"><span>" . __("EXTERNAL_URL_TITLE") . "</span></a>";
	        $html .= "</li>";

	        $html .= "<li class=\"level1 nav-5-1 first ui-menu-item\" role=\"presentation\">";
	        $html .= "<a href=\"" . "EXTERNAL_URL" . "\" class=\"ui-corner-all\" tabindex=\"-1\" role=\"menuitem\"><span>" . __("EXTERNAL_URL_TITLE") . "</span></a>";
	        $html .= "</li>";

	        $html .= "</ul>";
	        $html .= "</li>";
	}
	protected function getBase()
	{
		 return $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface')->getStore()->getBaseUrl();
	}
}