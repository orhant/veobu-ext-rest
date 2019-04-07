<?php
/**
 * @link http://www.veo.ru
 * @copyright Copyright (c) 2016 Tvip Ltd.
 */

namespace veo\ExtRest;

use veo\ExtRest\data\Serializer;
use yii\rest\ActiveController as BaseController;

/**
 * @inheritdoc
 */
class ActiveController extends BaseController
{
    /**
     * @inheritdoc
     */

    /**
     * $collectionEnvelope
     *
     * @var string
     */
    public $collectionEnvelope = 'data';

    public function actions()
    {
        return [
            'index' => [
                'class' => 'veo\ExtRest\actions\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'create' => [
                'class' => 'veo\ExtRest\actions\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'veo\ExtRest\actions\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'delete' => [
                'class' => 'yii\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function serializeData($data)
    {
        $s=\Yii::createObject(['class' => Serializer::className()]);
        $s->__set('collectionEnvelope',$this->collectionEnvelope);
        return $s->serialize($data);
    }
}
