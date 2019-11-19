<?php
namespace SK\ProfilePic\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
	protected $_skProfilePic;

	public function __construct(
		\SK\ProfilePic\Block\Customer\Account\ProfilePic $skProfilePic
	){
		$this->_skProfilePic = $skProfilePic;
	}

	public function getProfilePicById(){
		return $this->_skProfilePic->getProfilePic();
	}
}