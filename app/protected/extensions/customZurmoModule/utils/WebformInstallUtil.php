<?php
/*********************************************************************************
 * Zurmo Webforms is a custom module developed by Fireals Ltd.,
 * and RIGHTS received by XGATE Corp. Ltd. Copyright (C) 2013 XGATE Corp. Ltd.
 *
 * Zurmo Webforms module is an enterprise plugin;
 * you can NOT redistribute it and/or modify it without rights given by XGATE Corp. Ltd.
 *
 * Zurmo is distributed in the hope that it will be useful for XGATE services.
 *
 * You can contact XGATE Corp. Ltd. with a mailing address at Unit 107, 1/F.,
 * Building 6, Bio-Informatics Centre No.2 Science Park West Avenue
 * Hong Kong Science Park, Shatin, N.T., HK or at email address info@xgate.com.hk.
 ********************************************************************************/

/**
 * Helper class for XGATE Web Form customizations.
*/
class WebformInstallUtil
{
	public static function resolveCustomMetadataAndLoad()
	{
		$shouldSaveZurmoModuleMetadata = false;
		$metadata                      = ZurmoModule::getMetadata();
		if(!in_array('webforms', $metadata['global']['tabMenuItemsModuleOrdering']))
		{
			$metadata['global']['tabMenuItemsModuleOrdering'][] = 'webforms';
			$shouldSaveZurmoModuleMetadata = true;
		}
		if($shouldSaveZurmoModuleMetadata)
		{
			ZurmoModule::setMetadata($metadata);
			GeneralCache::forgetAll();
		}

		$metadata = Activity::getMetadata();
		if(!in_array('Webform', $metadata['Activity']['activityItemsModelClassNames']))
		{
			$metadata['Activity']['activityItemsModelClassNames'][] = 'Webform';
			Activity::setMetadata($metadata);
			GeneralCache::forgetAll();
		}

		Yii::import('application.extensions.zurmoinc.framework.data.*');
		Yii::import('application.modules.webforms.data.*');
		$defaultDataMaker = new WebformsDefaultDataMaker();
		$defaultDataMaker->make();
	}
}
?>