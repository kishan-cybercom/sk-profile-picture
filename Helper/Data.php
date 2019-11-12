<?php
namespace SK\ProfilePic\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
	public function __construct(
		\SK\ProfilePic\Block\Customer\Account\ProfilePic $skProfilePic
	){
		$this->_skProfilePic = $skProfilePic;
	}
	public function getProfilePicById($id){
		return $this->_skProfilePic->getCustomer($id)->getAvatar();
	}
}