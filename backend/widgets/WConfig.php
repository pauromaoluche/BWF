<?php

namespace backend\widgets;

use yii\base\Widget;
use common\models\User;
use common\models\Config;

/**
 * Class Footer
 * @package frontend\widgets
 */
class WConfig extends Widget
{
  /**
   * @return string
   */
  public function run()
  {

    $queryConfig = Config::find()->released()->orderBy('id ASC');
    return $this->render('config', []);
  }
}
