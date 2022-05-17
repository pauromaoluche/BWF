<?php

namespace backend\widgets;

use yii\base\Widget;
use common\models\User;

/**
 * Class Footer
 * @package frontend\widgets
 */
class Header extends Widget
{
  /**
   * @return string
   */
  public function run()
  {
    return $this->render('header');
  }
}
