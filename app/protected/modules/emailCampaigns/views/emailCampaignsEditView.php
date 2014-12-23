<?php
    /*********************************************************************************
     * Zurmo is a customer relationship management program developed by
     * Zurmo, Inc. Copyright (C) 2014 Zurmo Inc.
     *
     * Zurmo is free software; you can redistribute it and/or modify it under
     * the terms of the GNU Affero General Public License version 3 as published by the
     * Free Software Foundation with the addition of the following permission added
     * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
     * IN WHICH THE COPYRIGHT IS OWNED BY ZURMO, ZURMO DISCLAIMS THE WARRANTY
     * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
     *
     * Zurmo is distributed in the hope that it will be useful, but WITHOUT
     * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
     * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
     * details.
     *
     * You should have received a copy of the GNU Affero General Public License along with
     * this program; if not, see http://www.gnu.org/licenses or write to the Free
     * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
     * 02110-1301 USA.
     *
     * You can contact Zurmo, Inc. with a mailing address at 27 North Wacker Drive
     * Suite 370 Chicago, IL 60606. or at email address contact@zurmo.com.
     *
     * The interactive user interfaces in original and modified versions
     * of this program must display Appropriate Legal Notices, as required under
     * Section 5 of the GNU Affero General Public License version 3.
     *
     * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
     * these Appropriate Legal Notices must retain the display of the Zurmo
     * logo and Zurmo copyright notice. If the display of the logo is not reasonably
     * feasible for technical reasons, the Appropriate Legal Notices must display the words
     * "Copyright Zurmo Inc. 2014. All rights reserved".
     ********************************************************************************/

    class emailCampaignsEditView extends SecuredEditView
    {
        public static function getDefaultMetadata()
        {
        }

        protected function renderContent()
        {
            $content  = 'Hello World<br>';

            return $content;

        }

        protected function renderAfterFormLayout($form)
        {
            $content = 'Hello I am after layout<br>';
            return ZurmoHtml::tag('div', array('class' => 'emailCampaigns'), $content);
        }
//    protected function resolveTabbedContent($plainTextContent, $htmlContent)
//    {
//        $this->registerTabbedContentScripts();
//        //Register the dynamic image related sources
//        $this->registerDynamicImgRes();
//        //Create the Controller instance
//        list($controller) = Yii::app()->createController('emailCampaigns/default/content');
//
//        //           Yii::app()->clientScript->registerScriptFile ( Yii::app()->getBaseUrl(true) . '/protected/modules/emailCampaigns/assets/js/dynamicImg.js' );
//        $dynamicImgLink 	= '<a class="active" herf="javascript:void(0);" onclick="setupDynamicImg(\'' . $this->getEditableInputId(static::HTML_CONTENT_INPUT_NAME) . '\', \'' . $this->model->id . '\', \'' . Yii::app()->getBaseUrl(true) . '/protected/modules/emailCampaigns/assets/ajax/handleImg.php\');"><h1>Setup Dynamic Image</h1></a>';
//        $dynamicImgContent  = ZurmoHtml::tag('div', array('id' => 'dynamic-img-setup', 'class' => 'dynamic-img-setup'), $dynamicImgLink);
//
//        $previewImgLink 	= '<a class="active" herf="javascript:void(0);" onclick="previewDynamicContent(\'' . $this->getEditableInputId(static::HTML_CONTENT_INPUT_NAME) . '\', \'' . Yii::app()->getBaseUrl(true) . '/protected/modules/emailCampaigns/assets/images/' . Yii::app()->user->name . '/' . $this->model->id . '_outImg/\');"><h1>Preview Dynamic Image</h1></a>';
//        $previewImgContent  = ZurmoHtml::tag('div', array('id' => 'dynamic-img-preview', 'class' => 'dynamic-img-setup'), $previewImgLink);
//
//        $htmlTabHyperLink   = ZurmoHtml::link($this->renderHtmlContentAreaLabel(), '#htmlTabLink', array('class' => 'active-tab'));
//        $textTabHyperLink   = ZurmoHtml::link($this->renderTextContentAreaLabel(), '#textTabLink');
//        if ($this->form)
//        {
//            $controllerId           = $this->getControllerId();
//            $moduleId               = $this->getModuleId();
//            $modelId                = $this->model->id;
//        }
//        $tabContent         = ZurmoHtml::tag('div', array('class' => 'tabs-nav'), $htmlTabHyperLink . $textTabHyperLink);
//
//        $htmlContentDiv     = ZurmoHtml::tag('div',
//            array('id' => 'htmlTab', 'style' => 'display:block',
//                'class' => 'active-tab tab email-template-' . static::HTML_CONTENT_INPUT_NAME),
//            $htmlContent);
//
//        $plainTextDiv       = ZurmoHtml::tag('div',
//            array('id' => 'textTab', 'style' => 'display:none',
//                'class' => 'tab email-template-' . static::TEXT_CONTENT_INPUT_NAME),
//            $plainTextContent);
//
//        return ZurmoHtml::tag('div', array('class' => 'email-template-content'), $dynamicImgContent  .  $previewImgContent  .  $tabContent . $htmlContentDiv . $plainTextDiv);
//    }

    }
?>