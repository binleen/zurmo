<?php
	/*********************************************************************************
	 * Zurmo Custom Modules are developed by Fireals Ltd.,
	 * and RIGHTS received by XGATE Corp. Ltd. Copyright (C) 2013 XGATE Corp. Ltd.
	 *
	 * Zurmo custom modules are enterprise plugins;
	 * you can NOT redistribute it and/or modify it without rights given by XGATE Corp. Ltd.
	 *
	 * Zurmo is distributed in the hope that it will be useful for XGATE services.
	 *
	 * You can contact XGATE Corp. Ltd. with a mailing address at Unit 107, 1/F.,
	 * Building 6, Bio-Informatics Centre No.2 Science Park West Avenue
	 * Hong Kong Science Park, Shatin, N.T., HK or at email address info@xgate.com.hk.
	 ********************************************************************************/
/**
 * Specific custom management for the XGATE Custom Modules.
*/
class ZurmoModuleCustomManagement extends CustomManagement
{
	/**
	 * (non-PHPdoc)
	 * @see CustomManagement::runBeforeInstallationAutoBuildDatabase()
	 */
	public function runBeforeInstallationAutoBuildDatabase(MessageLogger $messageLogger)
	{
		EmailCampaignInstallUtil::resolveCustomMetadataAndLoad();
		//WebformInstallUtil::resolveCustomMetadataAndLoad();
		//ProspectsInstallUtil::resolveCustomMetadataAndLoad();
		//DmsListsInstallUtil::resolveCustomMetadataAndLoad();
		//WechatCampaignInstallUtil::resolveCustomMetadataAndLoad();
		//WechatMessagingInstallUtil::resolveCustomMetadataAndLoad();
	}

	/**
	 * (non-PHPdoc)
	 * @see CustomManagement::resolveIsCustomDataLoaded()
	 */
	public function resolveIsCustomDataLoaded()
	{
		EmailCampaignInstallUtil::resolveCustomMetadataAndLoad();
		//WebformInstallUtil::resolveCustomMetadataAndLoad();
	//	ProspectsInstallUtil::resolveCustomMetadataAndLoad();
		//DmsListsInstallUtil::resolveCustomMetadataAndLoad();
	//	WechatCampaignInstallUtil::resolveCustomMetadataAndLoad();
	//	WechatMessagingInstallUtil::resolveCustomMetadataAndLoad();
	}
}
?>