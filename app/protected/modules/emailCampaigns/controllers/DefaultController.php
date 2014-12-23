<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/10/17
 * Time: 20:57
 */

class EmailCampaignsDefaultController  extends  ZurmoModuleController{
    public function run($actionID)
    {
        EmailCampaignClientScript::registerModuleScripts();//获取样式链接地址以及css样式的加载

        parent::run($actionID);
    }

    public static function getListBreadcrumbLinks()
    {
        $title = Zurmo::t('EmailCampaignsModule', 'Campaigns');//模块面包屑
        return array($title);
    }

    public static function getDetailsAndEditBreadcrumbLinks()
    {
        return array(Zurmo::t('EmailCampaignsModule', 'Campaigns') => array('default/list'));//面包屑默认名
    }

    public function filters()
    {
        $modelClassName   = $this->getModule()->getPrimaryModelName();
        $viewClassName    = $modelClassName . 'EditAndDetailsView';
        return array_merge(parent::filters(),
            array(
                array(
                    ZurmoBaseController::REQUIRED_ATTRIBUTES_FILTER_PATH . ' + create, createFromRelation, edit',
                    'moduleClassName' => get_class($this->getModule()),
                    'viewClassName'   => 'EmailCampaignEditAndDetailsView',//添加另一个界面导航标题
                ),
                array(
                    ZurmoModuleController::ZERO_MODELS_CHECK_FILTER_PATH . ' + list, index',//默认该模块首页
                    'controller' => $this,
                ),
            )
        );
    }


//         public function filters()
//    {
//        $modelClassName   = $this->getModule()->getPrimaryModelName();
//        $viewClassName    = $modelClassName . 'ContentView';
//        return array_merge(parent::filters(),
//            array(
//                array(
//                    ZurmoBaseController::RIGHTS_FILTER_PATH . ' - index',
//                    'moduleClassName' => 'EmailCampaignsModule',
//                    'rightName' => HomeModule::RIGHT_ACCESS_DASHBOARDS,
//                ),
//            )
//        );
//}
//             public function filters()
//         {
//             $modelClassName   = $this->getModule()->getPrimaryModelName();
//             $viewClassName    = $modelClassName . 'EmailCampaignsAndDetailsView';
//             return array_merge(parent::filters(),
//                 array(
//                     array(
//                         ZurmoBaseController::REQUIRED_ATTRIBUTES_FILTER_PATH . ' + create, createFromRelation, edit',
//                         'moduleClassName' => get_class($this->getModule()),
//                         'viewClassName'   => $viewClassName,
//                     ),
//                     array(
//                         ZurmoModuleController::ZERO_MODELS_CHECK_FILTER_PATH . ' + list, index',
//                         'controller' => $this,
//                     ),
//                 )
//             );
//    }

     public  function actionIndex(){
          $this->actionList();
     }

      public  function  actionList(){

         $campaign = new Campaign();
         $containView=new EmailCampaignDetailsView($this->getId(), $this->getModule()->getId(), $campaign);
         $view  = new IndexView(ZurmoDefaultViewUtil::makeStandardViewForCurrentUser($this,$containView));
          echo $view->render();
      }

    public function actionContent($id)
    {
        $emailCampaign           = Campaign::getById(intval($id));
      //  var_dump($emailCampaign);exit();
        ControllerSecurityUtil::resolveAccessCanCurrentUserWriteModel($emailCampaign);//创建一个可写的页面

        // check if press button "save and next"
        $request = Yii::app()->request;//获取请求
       // $isNext = $request->getPost('save_and_next', null);
//        if(!empty($isNext)) {
//            //Redirect to the next step: Preview Campaign if Save and Next clicked.
//            $emailCampaign = $this->attemptToSaveModelFromPost($emailCampaign, 'preview');
//        }

        $breadcrumbLinks    = static::getDetailsAndEditBreadcrumbLinks();//面包屑
        $breadcrumbLinks[]  = StringUtil::getChoppedStringContent(strval($emailCampaign), 25);
        //todo: wizard
        $gridViewId              = 'notUsed';
        $pageVar                 = 'notUsed';
//        $tabView = new EmailCampaignTabView(
//            'default',
//            'emailCampaigns',
//            $emailCampaign, //Just to fill in a marketing model
//            $gridViewId,
//            $pageVar,
//            false,
//            'EmailCampaignContentLink');

        $contentView                   = new EmailCampaignContentView($this->getId(), $this->getModule()->getId(),
            $this->attemptToSaveModelFromPost($emailCampaign),
            Zurmo::t('Default', 'Build My Email'));//内容视图

      //  $gridView = new GridView(2, 1);
       // $gridView->setView($tabView, 0, 0);
      //  $gridView->setView($contentView, 1, 0);
        $view               = new EmailCampaignsPageView(ZurmoDefaultViewUtil::
            makeViewWithBreadcrumbsForCurrentUser($this, null,
             null, 'MarketingBreadCrumbView'));
//        $view               = new EmailCampaignsPageView(ZurmoDefaultViewUtil::
//            makeViewWithBreadcrumbsForCurrentUser($this, $gridView,
//                $breadcrumbLinks, 'MarketingBreadCrumbView'));
        echo $view->render();
    }






} 