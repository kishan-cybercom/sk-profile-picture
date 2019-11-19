<?php
namespace SK\ProfilePic\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class Data extends AbstractHelper
{
	protected $_storeManager;

	protected $_skProfilePic;

	protected $_assetRepo;

	protected $_filesystem;

	public function __construct(
		\SK\ProfilePic\Block\Customer\Account\ProfilePic $skProfilePic,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Framework\View\Asset\Repository $assetRepo,
		\Magento\Framework\Filesystem $filesystem
	){
		$this->_skProfilePic = $skProfilePic;
		$this->_storeManager = $storeManager;
		$this->_assetRepo = $assetRepo;
		$this->_filesystem = $filesystem;
	}

	public function getProfilePicById($id){
		$mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
		$url = $this->_assetRepo->getUrl('SK_ProfilePic/media/default.jpg');
		$mediapath = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
		
		if(file_exists($mediapath.'sk_profile_pic/'.$this->_skProfilePic->getCustomer($id)->getSkProfilePic())){
			$url = $mediaUrl.'sk_profile_pic/'.$this->_skProfilePic->getCustomer($id)->getSkProfilePic();
		}

		return $url;
	}
}