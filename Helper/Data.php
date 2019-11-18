<?php
namespace SK\ProfilePic\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
	protected $_storeManager;

	protected $_skProfilePic;

	public function __construct(
		\SK\ProfilePic\Block\Customer\Account\ProfilePic $skProfilePic,
		\Magento\Store\Model\StoreManagerInterface $storeManager
	){
		$this->_skProfilePic = $skProfilePic;
		$this->_storeManager = $storeManager;
	}

	public function getProfilePicById($id){
		$mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
		return $mediaUrl.'sk_profile_pic/'.$this->_skProfilePic->getCustomer($id)->getSkProfilePic();
	}
}