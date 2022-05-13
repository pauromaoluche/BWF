<?php
	
	namespace app\widgets;
	
	use app\models\Blog;
	use Yii;
	
	/**
	 * Description of Footer
	 *
	 * @author Hericson
	 */
	class Newsletter extends \yii\bootstrap4\Widget
	{
		
		public function run()
		{
			
			return $this->render('newsletter');
		}
		
	}
