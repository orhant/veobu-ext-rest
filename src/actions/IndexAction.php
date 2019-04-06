<?php
/**
 * @link http://www.Veobu.ru
 * @copyright Copyright (c) 2016 Tvip Ltd.
 */

namespace Veobu\ExtRest\actions;

use Yii;
use yii\rest\IndexAction as Action;
use Veobu\ExtRest\data\ActiveDataProvider;

/**
 * @inheritdoc
 */
class IndexAction extends Action
{
    /**
     * @inheritdoc
     */
    protected function prepareDataProvider()
    {
        if ($this->prepareDataProvider !== null) {
            return call_user_func($this->prepareDataProvider, $this);
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        return new ActiveDataProvider([
            'query' => $modelClass::find(),
        ]);
    }
}
