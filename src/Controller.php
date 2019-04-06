<?php
/**
 * @link http://www.Veobu.ru
 * @copyright Copyright (c) 2016 Tvip Ltd.
 */

namespace Veobu\ExtRest;

use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller as BaseController;
use Veobu\ExtRest\data\Serializer;

/**
 * @inheritdoc
 */
class Controller extends BaseController
{
    /**
     * @inheritdoc
     */
    protected function serializeData($data)
    {
        return Yii::createObject(['class' => Serializer::className()])->serialize($data);
    }
}
