<?php
 class IndexView extends ZurmoDefaultPageView{
     protected function getSubtitle()
     {
         return Zurmo::t('CampaignsModule', 'Campaigns');
     }

//     protected $tipContent;
//
//     protected $splashImageName;
//
//     protected $hasDashboardAccess;
//
//
//
//
//     /**
//      * @param string $tipContent
//      * @param bool $hasDashboardAccess
//      */
//     public function __construct($tipContent, $hasDashboardAccess)
//     {
//         assert('is_string($tipContent)');
//         assert('is_bool($hasDashboardAccess)');
//         $this->tipContent                = $tipContent;
//         $this->hasDashboardAccess        = $hasDashboardAccess;
//        // var_dump( $this->tipContent);
//     }

//    public function
//        array(
//        'class'=>'FButtonColumn',
//        'header'=>Yii::t('Trade','Actions'),
//        'template'=>'$data->getTemplate()',
//        'buttons'=>array(
//        'reject'=>array(
//        'label'=>Yii::t('Trade','Reject'),
//        'imageUrl'=>Yii::app()->theme->BaseUrl.'/images/refuse.png',
//        'url'=> '"javascript:oops(\"".$data->id."\");"',
//        ),
//        'update'=>array(
//        'label'=>Yii::t('Trade','Edit'),
//        'url'=>'Yii::app()->controller->createUrl("edit", array("Id"=>$data->primaryKey))',
//        ),
//        ),
//        'htmlOptions'=>array('class'=>'alignLeft','style'=>'width:25%;'),
//        )
//


 }
?>
