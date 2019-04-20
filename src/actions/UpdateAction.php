<?php
/**
 * @link http://www.veo.ru
 * @copyright Copyright (c) 2016 Tvip Ltd.
 */

namespace veo\ExtRest\actions;

use Yii;
use yii\rest\UpdateAction as Action;
use yii\web\ServerErrorHttpException;

/**
 * @inheritdoc
 */
class UpdateAction extends Action
{

    /**
     * @inheritdoc
     */
    // public function run($id)
    // {
    //     /* @var $model ActiveRecord */
    //     $model = $this->findModel($id);

    //     if ($this->checkAccess) {
    //         call_user_func($this->checkAccess, $this->id, $model);
    //     }

    //     $model->scenario = $this->scenario;
    //     $model->load(Yii::$app->getRequest()->getBodyParams(), '');
    //     if ($model->save() === false && !$model->hasErrors()) {
    //         throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
    //     }

    //     return $model;
    // }
    public function run($id)
    {

        /* @var $model ActiveRecord */
        $model = $this->findModel($id);

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        $model->scenario = $this->scenario;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;

    }
}
