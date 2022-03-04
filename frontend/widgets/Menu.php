<?php

namespace frontend\widgets;

use yii\base\Widget;

/**
 * Class Menu
 * @package frontend\widgets
 */
class Menu extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        return $this->render('menu');
    }
}
