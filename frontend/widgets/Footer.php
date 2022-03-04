<?php

namespace frontend\widgets;

use yii\base\Widget;

/**
 * Class Footer
 * @package frontend\widgets
 */
class Footer extends Widget
{
  /**
   * @return string
   */
  public function run()
  {
    return $this->render('footer');
  }
}
