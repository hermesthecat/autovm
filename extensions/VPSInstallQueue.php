<?php

namespace app\extensions;

use Yii;
use yii\base\BaseObject;
use app\extensions\Api;

class VPSInstallQueue extends BaseObject implements \yii\queue\JobInterface {

    public $data;
    
    public function execute($queue)
    {
        $api = new Api;
        $api->setUrl(Yii::$app->setting->api_url);
        $api->setData($this->data);

        $api->request(Api::ACTION_INSTALL);
    }
}