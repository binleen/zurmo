<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/10/17
 * Time: 20:51
 */

class EmailCampaignsModule extends  SecurableModule {
    const RIGHT_CREATE_LEADS  = 'Create emailCampaigns';
    const RIGHT_DELETE_LEADS  = 'Delete emailCampaigns';
    const RIGHT_ACCESS_LEADS  = 'Access emailCampaigns Tab';
    const RIGHT_CONVERT_LEADS = 'Convert emailCampaigns';

    public function getDependencies()
    {
        return array(
            'configuration',
            'zurmo',
        );
    }

    public function getRootModelNames()
    {
        return array('emailCampaigns');
    }
} 