<?php
/**
 * @link http://www.veo.ru
 * @copyright Copyright (c) 2016 Tvip Ltd.
 */

namespace veo\ExtRest\actions;

use Yii;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;
use yii\rest\CreateAction as Action;

/**
 * @inheritdoc
 */
class CreateAction extends Action
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        /* @var $model \yii\db\ActiveRecord */
        $model = new $this->modelClass([
            'scenario' => $this->scenario,
        ]);
        $params = array_keys(Yii::$app->getRequest()->getBodyParams());
       

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
            if ($model->save()) {
                $response = Yii::$app->getResponse();
                $response->setStatusCode(201);
                $id = implode(',', array_values($model->getPrimaryKey(true)));
                $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));
            } elseif (!$model->hasErrors()) {
                throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
            }

     

            return [$model];
    }
}
?>