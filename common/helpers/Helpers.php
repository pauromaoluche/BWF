<?php

namespace common\helpers;

use common\models\AreaIntendedFunction;
use common\models\City;
use common\models\Config;
use common\models\ConfigEmail;
use common\models\Curriculum;
use common\models\Institutional;
use common\models\Menu;
use common\models\PageInformation;
use common\models\Region;
use common\models\System;
use common\models\SystemFile;
use common\models\SystemImage;
use common\models\Zone;
use DateTime;
use Yii;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * Class Helpers
 * @package common\helpers
 */
class Helpers
{

  public static function config($variable)
  {
    $config = Config::findOne(['variable' => $variable]);
    return isset($config->value) ? $config->value : null;
  }

  public static function configEmail($param)
  {
    $config = ConfigEmail::findOne(1);
    return isset($config->{$param}) ? $config->{$param} : null;
  }

  public static function system($table_db, $attrib)
  {

    $row = System::findOne(['table_db' => $table_db]);
    return isset($row->{$attrib}) && !is_null($row->{$attrib}) ? $row->{$attrib} : false;
  }

  public static function systemImage($table_db, $attrib)
  {
    $row = SystemImage::findOne(['table_db' => $table_db]);
    return isset($row->{$attrib}) && !is_null($row->{$attrib}) ? $row->{$attrib} : false;
  }

  public static function systemFile($table_db, $attrib)
  {
    $row = SystemFile::findOne(['table_db' => $table_db]);
    return isset($row->{$attrib}) && !is_null($row->{$attrib}) ? $row->{$attrib} : false;
  }

  public static function institutional($variable, $var)
  {
    $row = Institutional::findOne(['variable' => $variable]);
    return isset($row->{$var}) ? $row->{$var} : null;
  }

  public static function pageInformation($code, $var)
  {
    $row = PageInformation::findOne(['code' => $code]);
    return isset($row->{$var}) ? $row->{$var} : null;
  }

  public static function htmlToText($string)
  {

    // ----- remove HTML TAGs -----
    $string = preg_replace('/<[^>]*>/', ' ', $string);

    // ----- remove control characters -----
    $string = str_replace("\r", '', $string); // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));

    return $string;
  }

  public static function limitChar($text, $quantity = 81, $etc = true)
  {
    $p = explode(' ', strip_tags($text));
    $c = 0;
    $cut = '';
    foreach ($p as $p1) {
      if ($c < $quantity && ($c + strlen($p1) <= $quantity)) {
        $cut .= ' ' . $p1;
        $c += strlen($p1) + 1;
      } else {
        break;
      }
    }
    return trim(strlen($text) > $quantity ? $cut . ($etc ? '...' : '') : $cut);
  }

  public static function limitWords($text, $quantity = 81, $etc = true)
  {
    $words = explode(' ', strip_tags($text));
    $cut = '';
    for ($i = 0; $i < $quantity; $i++) {
      if (isset($words[$i]))
        $cut .= $words[$i] . " ";
    }
    return trim(count($words) > $quantity ? $cut . ($etc ? '...' : '') : $cut);
  }

  public static function countDays($startTimeStamp, $endTimeStamp, $format = 'd/m/Y')
  {
    $startTimeStamp = DateTime::createFromFormat($format, $startTimeStamp);
    $endTimeStamp = DateTime::createFromFormat($format, $endTimeStamp);
    return $endTimeStamp->diff($startTimeStamp)->format('%a');
  }

  public static function idParent($id)
  {
    $model = ProductCategory::findOne($id);

    if (is_null($model->parent_id)) {
      $row = $model->primaryKey;
    } else {
      $row = self::idParent($model->parent_id);
    }
    return $row;
  }

  public static function listParent($id, $class, $order = 'DESC')
  {
    $model = "app\\models\\" . $class;
    $model = $model::findOne($id);
    $row = '';
    if ($order == 'DESC')
      $row .= $id . ',';
    if (!is_null($model->parent_id))
      $row .= self::listParent($model->parent_id, $class, $order);
    if ($order == 'ASC')
      $row .= $id . ',';
    return $row;
  }

  public static function categories($model, $class, $parent, $loop = false, $order = 'title ASC', $children = true)
  {
    set_time_limit(0);
    $class = "app\models\\" . $class;
    if (!is_array($parent)) {
      if ($model->isNewRecord) {
        $records = $class::find()->where("{$parent} is NULL")->orderBy($order)->all();
      } else {
        $records = $class::find()->where("{$parent} is NULL AND id <> {$model->primaryKey}")->orderBy($order)->all();
      }
    } else {
      $key = array_keys($parent)[0];
      $records = $class::find()->where("{$key} is NULL")->orderBy($order)->all();
    }
    foreach ($records as $record) {
      $row['key'] = "$record->primaryKey";
      $row['title'] = $record->title;
      $row['folder'] = true;
      $row['lazy'] = false;
      if (!$model->isNewRecord) {
        if (!is_array($parent)) {
          if (!is_null($model->{$parent}) && $model->{$parent} == $record->primaryKey) {
            $row['selected'] = true;
          }
          if ($model->primaryKey == $record->primaryKey) {
            $row['unselectable'] = true;
          }
        } else {
          if (!is_null($model->{$parent[$key]}) && $model->{$parent[$key]} == $record->{$key}) {
            //$row['selected'] = true;
            $row['unselectable'] = true;
          }
          if ($model->primaryKey == $record->primaryKey) {
            $row['unselectable'] = true;
            $row['hideCheckbox'] = true;
          }
          if (count($record->categories) > 0) {
            $row['unselectable'] = true;
            $row['hideCheckbox'] = true;
            $row['lazy'] = true;
          }
        }
      } else {
        if (count($record->categories) > 0) {
          $row['unselectable'] = true;
          $row['hideCheckbox'] = true;
          $row['lazy'] = true;
        }
      }
      if ($children)
        $row['children'] = self::childs($record->primaryKey, $model, $class, $parent, $loop, $order);
      $data[] = $row;
    }
    return $data;
  }

  public static function childs($id, $model, $class, $parent, $loop, $order)
  {
    if (!is_array($parent)) {
      $records = $class::find()->where("{$parent} = :{$parent}", [":{$parent}" => $id])->orderBy($order)->all();
    } else {
      $key = array_keys($parent)[0];
      $records = $class::find()->where("{$key} = :{$key}", [":{$key}" => $id])->orderBy($order)->all();
    }
    foreach ($records as $record) {
      $row['key'] = "$record->primaryKey";
      $row['title'] = $record->title;
      //$row['expanded'] = true;
      $row['lazy'] = false;
      if (!$model->isNewRecord) {
        if (!is_array($parent)) {
          if (!is_null($model->{$parent}) && $model->{$parent} == $record->primaryKey) {
            $row['selected'] = true;
          }
          if ($model->primaryKey == $record->primaryKey) {
            $row['unselectable'] = true;
          }
          if (!is_null($record->parent_id) && count($record->categories) > 0) {
            $row['unselectable'] = true;
            $row['lazy'] = true;
          }
        } else {
          //					if (!is_null($model->{$parent[$key]}) && $model->{$parent[$key]} == $record->{$key}) {
          //						//$row['selected'] = true;
          //						$row['unselectable'] = true;
          //						$row['hideCheckbox'] = true;
          //					}
          //					if ($model->primaryKey == $record->primaryKey) {
          //						$row['unselectable'] = true;
          //						$row['hideCheckbox'] = true;
          //					}
          $row['unselectable'] = true;
          $row['hideCheckbox'] = true;
        }
      } else {
        if (count($record->categories) > 0) {
          $row['unselectable'] = true;
          $row['hideCheckbox'] = true;
          $row['lazy'] = false;
        }
      }
      if ($loop) {
        $row['children'] = self::childs($record->primaryKey, $model, $class, $parent, $loop, $order);
      }
      $data[] = $row;
    }

    return $data;
  }

  public static function getBrowser()
  {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
      $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
      $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
      $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
      $bname = 'Mozilla Firefox';
      $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
      $bname = 'Google Chrome';
      $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
      $bname = 'Apple Safari';
      $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
      $bname = 'Opera';
      $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
      $bname = 'Netscape';
      $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
      ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
      // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
      //we will have two since we are not using 'other' argument yet
      //see if version is before or after the name
      if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
        $version = $matches['version'][0];
      } else {
        $version = $matches['version'][1];
      }
    } else {
      $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
      $version = "?";
    }

    return array(
      'userAgent' => $u_agent,
      'name' => $bname,
      'version' => $version,
      'platform' => $platform,
      'pattern' => $pattern
    );
  }

  public static function permission($controller)
  {
    $data = [];
    $controller = preg_replace('/-/', '_', $controller);
    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->user_group_id !== 1) {
      $permissions = Yii::$app->user->identity->userGroup->permission;
      $actions = [];

      if (isset($permissions->{$controller}) && !is_null($permissions->{$controller})) :

        foreach ($permissions->{$controller} as $action => $on) :
          if ($action == 'create' && self::System($controller, 'button_add') == '0')
            continue;

          if ($action == 'update' && self::System($controller, 'button_edit') == '0')
            continue;

          if ($action == 'delete' && self::System($controller, 'button_delete') == '0')
            continue;

          if ($action == 'sharetwitter' && self::System($controller, 'share_twitter') == '0')
            continue;

          if ($action == 'sharefacebook' && self::System($controller, 'share_facebook') == '0')
            continue;

          $actions[] = $action;
        endforeach;

        $data[0]['allow'] = true;
        $data[0]['actions'] = $actions;
        $data[0]['roles'] = ['@'];
      endif;
      $data[1]['allow'] = false;
      $data[1]['actions'] = ['*'];
      $data[1]['roles'] = ['*'];
    } else if (isset(Yii::$app->user->identity) && Yii::$app->user->identity->user_group_id === 1) {
      $data[0]['allow'] = true;
      $data[0]['roles'] = ['@'];
    }
    return $data;
  }

  public static function normalize($name, $encode = false)
  {
    $arrayName = explode(" ", $name);
    $arrayConnective = array('', 'da', 'de', 'di', 'do', 'du', 'das', 'dos', 'e');
    $nameNormalized = "";

    for ($cont = 0; $cont < count($arrayName); $cont++) {
      $temp = mb_strtolower($arrayName[$cont], Yii::$app->charset);
      if ($encode) {
        $temp = mb_strtolower(utf8_encode($arrayName[$cont]), Yii::$app->charset);
      }
      if (array_search($temp, $arrayConnective) == null)
        $nameNormalized .= mb_convert_case($temp, MB_CASE_TITLE, Yii::$app->charset) . " ";
      else
        $nameNormalized .= $temp . " ";
    }
    return trim($nameNormalized);
  }

  public static function Cities($model)
  {
    if ($model->isNewRecord && is_null($model->state_id)) {
      $cities = [];
    } else {
      $cities = City::find()->andWhere(['=', 'state_id', $model->state_id])->all();
      $row = [];
      foreach ($cities as $city)
        $row[$city->primaryKey] = self::normalize($city->title);

      $cities = $row;
    }
    return $cities;
  }

  public static function Region($model)
  {
    if ($model->isNewRecord && is_null($model->state_id)) {
      $rows = array();
    } else {
      $rows = Region::find()->andWhere(['=', 'state_id', $model->state_id])->all();
      $row = [];
      foreach ($rows as $model)
        $row[$model->primaryKey] = $model->title;
      $rows = $row;
    }
    return $rows;
  }

  public static function Zone($model)
  {
    if ($model->isNewRecord && is_null($model->state_id)) {
      $rows = array();
    } else {
      $rows = Zone::find()->where('state_id = :state_id', [':state_id' => $model->state_id])->all();
      $row = [];
      foreach ($rows as $model)
        $row[$model->primaryKey] = $model->iso_name . ' ' . $model->iso . ' - ' . self::normalize($model->title);
      $rows = $row;
    }
    return $rows;
  }

  public static function titleMenu($table_db)
  {
    $title = Menu::findOne(['table_db' => $table_db]);
    if ($title) {
      $title = preg_replace('/<span(.*?)>(.*?)<\/span>/i', '$2 - ', $title->title);
    } else {
      $title = $table_db;
    }
    return $title;
  }

  public static function menuMobile($title)
  {
    return preg_replace('/<span(.*?)>(.*?)<\/span>/i', '$2 -', $title);
  }

  public static function deleteRelations($model, $attribute, $id)
  {
    return $model::deleteAll("{$attribute} = :{$attribute}", [":{$attribute}" => $id]);
  }

  public static function deleteRelationsPolym($model, $bd, $id)
  {
    return $model::deleteAll('table_db = :table_db AND table_id = :table_id', [':table_db' => $bd, ':table_id' => $id]);
  }

  /**
   * @param $model
   * @param $class
   * @param $attribute
   */
  public static function saveRelations($model, $class, $attribute)
  {
    /**
     * @var ActiveRecord $className
     */
    if (Yii::$app->request->post($class)) {
      foreach (Yii::$app->request->post($class) as $value) {
        $newClass = '\\common\\models\\' . $class;
        $className = new $newClass;
        $attributes = json_decode($value, true);
        $className->attributes = $attributes[0];
        $className->{$attribute} = $model->primaryKey;
        if ($className->validate()) {
          $className->save();
        }
      }
    }
  }

  public static function saveRelationsPolym($model, $post, $class, $variables = "")
  {
    if (Yii::$app->request->post($class)) {
      foreach (Yii::$app->request->post($class) as $value) {
        $newClass = 'app\models\\' . $class;
        $className = new $newClass;
        $attributes = json_decode($value, true);
        $className->attributes = $attributes[0];
        //                if (is_array($variables)) {
        //                    foreach ($variables as $k => $v) {
        //                        if ($k == 'date' && !empty($className->$v))
        //                            $className->$v = formatarData($className->$v, '/');
        //                    }
        //                }
        $className->table_id = $model->primaryKey;
        $className->table_db = $model->className;
        if ($className->validate()) {
          $className->save();
        }
      }
    }
  }

  public static function saveRelationsOnlyId($model, $class, $relation_id, $params = [])
  {

    if (Yii::$app->request->post($class)) {
      foreach (Yii::$app->request->post($class) as $value) {
        $modelClass = 'app\\models\\' . $class;
        $isJson = !preg_match('/[^,:{}\\[\\]0-9.\\-+Eaeflnr-u \\n\\r\\t]/', preg_replace('/"(\\.|[^"\\\\])*"/', '', $value));
        $valueDecoded = [];
        if ($isJson) {
          $valueDecoded = Json::decode($value);
        }

        if ($valueDecoded) {
          $className = new $modelClass;
          foreach ($valueDecoded as $key => $array) {
            foreach ($array as $attribute => $v)
              if ($v)
                $className->{$attribute} = $v;
          }
          $className->{$relation_id} = $model->primaryKey;
          if (!empty($params)) {
            foreach ($params as $key => $value) {
              $className->{$key} = $value;
            }
          }
          $className->save();
        }
      }
    }
  }

  public static function tagsFrequency($tag)
  {
    $model = Tags::find()->where('title = :title', [':title' => $tag])->one();

    if (!is_null($model)) {
      $model->frequency += 1;
      if ($model->validate())
        $model->save();
    } else {
      $model = new Tags;
      $model->title = $tag;
      if ($model->validate())
        $model->save();
    }
  }

  public static function importCSV($model, $atribute)
  {
    $file = UploadedFile::getInstance($model, $atribute);
    if (!is_null($file)) {
      set_time_limit(0);
      $fp = fopen($file->tempName, 'r');
      while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
        $dados = explode(';', $data[0]);
        if (filter_var($dados[1], FILTER_VALIDATE_EMAIL)) {
          $verify = Email::find()->where('email_group_id = :email_group_id AND email = :email', [':email_group_id' => $model->primaryKey, ':email' => $dados[1]])->one();
          if (is_null($verify)) {
            $email = new Email;
            $email->email_group_id = $model->primaryKey;
            $email->name = empty($dados[0]) ? $dados[1] : utf8_encode($dados[0]);
            $email->email = $dados[1];
            $email->save();
          }
        }
      }
      fclose($fp);
    }
  }

  public static function mask($val, $mask)
  {
    $val = str_replace(" ", "", $val);
    for ($i = 0; $i < strlen($val); $i++) {
      $mask[strpos($mask, "#")] = $val[$i];
    }
    return $mask;
  }

  public static function compressHtml()
  {
    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
      //ob_start("ob_gzhandler");
      ob_start("stripBufferSkipTextareaTags");
    } else {
      ob_start();
      //ob_start("stripBufferSkipTextareaTags");
    }
  }

  public static function renderViewLanguage($view)
  {
    if (Yii::$app->language === Yii::$app->sourceLanguage) {
      $normalize = str_replace('_', '-', Yii::$app->language);
      $viewLanguage = str_replace('{language}', $normalize, $view);
      echo Yii::$app->getView()->render(Yii::getAlias($viewLanguage . '.php'));
    }

    foreach (Yii::$app->getRequest()->getAcceptableLanguages() as $language) {

      $normalize = str_replace('_', '-', $language);
      $viewLanguage = str_replace('{language}', $normalize, $view);
      $viewFile = Yii::getAlias("@webroot/web/views" . $viewLanguage . '.php');

      if (is_file($viewFile)) {
        echo Yii::$app->getView()->render(Yii::getAlias($viewLanguage . '.php'));
        break;
      }
    }
  }

  public static function removeWhiteSpace($text)
  {
    $text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
    $text = preg_replace('/([\s])\1+/', ' ', $text);
    $text = trim($text);
    return $text;
  }

  /**
   * @param Curriculum $model
   * @return array|AreaIntendedFunction[]
   */
  public static function AreaPretendidaFuncao(Curriculum $model)
  {
    if ($model->isNewRecord) {
      $rows = [];
    } else {
      $rows = AreaIntendedFunction::find()
        ->andWhere(['area_pretendida_id' => $model->area_intended_id])
        ->orderBy(['title' => SORT_ASC])
        ->all();

      $row = null;
      foreach ($rows as $value) {
        $row[$value->primaryKey] = $value->title;
      }

      if ($row) {
        $rows = $row;
      }
    }

    return $rows;
  }
}
