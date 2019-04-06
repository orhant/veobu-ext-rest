<?php
/**
 * @link http://www.Veobu.ru
 * @copyright Copyright (c) 2016 Tvip Ltd.
 */

namespace Veobu\ExtRest;

use Veobu\ExtRest\data\Serializer;
use yii\rest\ActiveController as BaseController;

/**
 * @inheritdoc
 */
class ActiveController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'Veobu\ExtRest\actions\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'create' => [
                'class' => 'Veobu\ExtRest\actions\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'Veobu\ExtRest\actions\UpdateAction',
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
        return \Yii::createObject(['class' => Serializer::className()])->serialize($data);
    }
}
