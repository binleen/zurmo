<?php
/*********************************************************************************
 * Zurmo EmailCampaigns is a custom module developed by Fireals Ltd.,
* and RIGHTS received by XGATE Corp. Ltd. Copyright (C) 2013 XGATE Corp. Ltd.
*
* Zurmo EmailCampaigns module is an enterprise plugin;
* you can NOT redistribute it and/or modify it without rights given by XGATE Corp. Ltd.
*
* Zurmo is distributed in the hope that it will be useful for XGATE services.
*
* You can contact XGATE Corp. Ltd. with a mailing address at Unit 107, 1/F.,
* Building 6, Bio-Informatics Centre No.2 Science Park West Avenue
* Hong Kong Science Park, Shatin, N.T., HK or at email address info@xgate.com.hk.
********************************************************************************/

class EmailCampaignClientScript
{
	private static $_assetsUrl;
	
	public static function getAssetsUrl()
	{
// 		$assetsPath = Yii::getPathOfAlias('application.modules.emailCampaigns.assets');
		
// 		if(YII_DEBUG === true)
// 			self::$_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath, false, -1, true);
// 		else
// 			self::$_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
		
		self::$_assetsUrl = Yii::app()->getBaseUrl(true) . '/protected/modules/emailCampaigns/assets';
		
		return self::$_assetsUrl;
	}
	
	public static function registerModuleScripts()
	{
		$assetsUrl = self::getAssetsUrl();
		
		$cs = Yii::app()->clientScript;
		
		$cs->registerCssFile( $assetsUrl . '/css/style.css' );
		$cs->registerScriptFile ( $assetsUrl . '/js/common.js' );
	}

    public function actionEdit($id)
    {
        $emailCampaign           = Campaign::getById(intval($id));
        ControllerSecurityUtil::resolveAccessCanCurrentUserWriteModel($emailCampaign);

        // check if press button "save and next"
        $request = Yii::app()->request;
        $isNext = $request->getPost('save_and_next', null);
        if(!empty($isNext)) {
            //Redirect to the next step: Setup Content if Save and Next clicked.
            $emailCampaign = $this->attemptToSaveModelFromPost($emailCampaign, 'marketingList');
        }

        $breadcrumbLinks    = static::getDetailsAndEditBreadcrumbLinks();
        $breadcrumbLinks[]  = StringUtil::getChoppedStringContent(strval($emailCampaign), 25);
        //todo: wizard
        $gridViewId              = 'notUsed';
        $pageVar                 = 'notUsed';
        $tabView = new EmailCampaignTabView(
            'default',
            'emailCampaigns',
            $emailCampaign, //Just to fill in a marketing model
            $gridViewId,
            $pageVar,
            false,
            'EmailCampaignCreateLink');

        $describeView                   = new EmailCampaignDescribeView($this->getId(), $this->getModule()->getId(),
            $this->attemptToSaveModelFromPost($emailCampaign),
            Zurmo::t('Default', 'Describe Email'));

        $gridView = new GridView(2, 1);
        $gridView->setView($tabView, 0, 0);
        $gridView->setView($describeView, 1, 0);

        $view               = new EmailCampaignsPageView(ZurmoDefaultViewUtil::
            makeViewWithBreadcrumbsForCurrentUser($this, $gridView,
                $breadcrumbLinks, 'MarketingBreadCrumbView'));
        echo $view->render();
    }

    public function actionMarketingList($id)
    {
        $emailCampaign           = Campaign::getById(intval($id));
        ControllerSecurityUtil::resolveAccessCanCurrentUserWriteModel($emailCampaign);

        // check if press button "save and next"
        $request = Yii::app()->request;
        $isNext = $request->getPost('save_and_next', null);
        if(!empty($isNext)) {
            //Redirect to the next step: Setup Content if Save and Next clicked.
            $emailCampaign = $this->attemptToSaveModelFromPost($emailCampaign, 'content');
        }

        $breadcrumbLinks    = static::getDetailsAndEditBreadcrumbLinks();
        $breadcrumbLinks[]  = StringUtil::getChoppedStringContent(strval($emailCampaign), 25);
        //todo: wizard
        $gridViewId              = 'notUsed';
        $pageVar                 = 'notUsed';
        $tabView = new EmailCampaignTabView(
            'default',
            'emailCampaigns',
            $emailCampaign, //Just to fill in a marketing model
            $gridViewId,
            $pageVar,
            false,
            'EmailCampaignMarketingListLink');

        $describeView                   = new EmailCampaignMarketingListView($this->getId(), $this->getModule()->getId(),
            $this->attemptToSaveModelFromPost($emailCampaign),
            Zurmo::t('Default', 'Select Marketing List'));

        $gridView = new GridView(2, 1);
        $gridView->setView($tabView, 0, 0);
        $gridView->setView($describeView, 1, 0);

        $view               = new EmailCampaignsPageView(ZurmoDefaultViewUtil::
            makeViewWithBreadcrumbsForCurrentUser($this, $gridView,
                $breadcrumbLinks, 'MarketingBreadCrumbView'));
        echo $view->render();
    }

    public function actionContent($id)
    {
        $emailCampaign           = Campaign::getById(intval($id));
        ControllerSecurityUtil::resolveAccessCanCurrentUserWriteModel($emailCampaign);

        // check if press button "save and next"
        $request = Yii::app()->request;
        $isNext = $request->getPost('save_and_next', null);
        if(!empty($isNext)) {
            //Redirect to the next step: Preview Campaign if Save and Next clicked.
            $emailCampaign = $this->attemptToSaveModelFromPost($emailCampaign, 'preview');
        }

        $breadcrumbLinks    = static::getDetailsAndEditBreadcrumbLinks();
        $breadcrumbLinks[]  = StringUtil::getChoppedStringContent(strval($emailCampaign), 25);
        //todo: wizard
        $gridViewId              = 'notUsed';
        $pageVar                 = 'notUsed';
        $tabView = new EmailCampaignTabView(
            'default',
            'emailCampaigns',
            $emailCampaign, //Just to fill in a marketing model
            $gridViewId,
            $pageVar,
            false,
            'EmailCampaignContentLink');

        $contentView                   = new EmailCampaignContentView($this->getId(), $this->getModule()->getId(),
            $this->attemptToSaveModelFromPost($emailCampaign),
            Zurmo::t('Default', 'Build My Email'));

        $gridView = new GridView(2, 1);
        $gridView->setView($tabView, 0, 0);
        $gridView->setView($contentView, 1, 0);

        $view               = new EmailCampaignsPageView(ZurmoDefaultViewUtil::
            makeViewWithBreadcrumbsForCurrentUser($this, $gridView,
                $breadcrumbLinks, 'MarketingBreadCrumbView'));
        echo $view->render();
    }

}

?>