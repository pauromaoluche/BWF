<?php

//error_reporting(E_ALL ^ E_NOTICE);
//ini_set('display_errors', 1);
use common\helpers\Helpers;
use common\models\ConfigFacebook;
use common\models\ConfigGoogleAnalytics;
use common\models\ConfigTwitter;
use common\models\SocialNetwork;
use yii\helpers\Url;

/*
 * Ativa o buffer de saida
 */

//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
//    //ob_start("ob_gzhandler");
//    ob_start("stripBufferSkipTextareaTags");
//} else {
//    ob_start();
//    //ob_start("stripBufferSkipTextareaTags");
//}

/**
 * @param $buffer
 * @return string|string[]|null
 */
function sanitize_output($buffer)
{
  $search = array(
    '/\>[^\S ]+/s', //strip whitespaces after tags, except space
    '/[^\S ]+\</s', //strip whitespaces before tags, except space
    '/(\s)+/s'  // shorten multiple whitespace sequences
  );
  $replace = array(
    '>',
    '<',
    '\\1'
  );
  $buffer = preg_replace($search, $replace, $buffer);
  return $buffer;
}

/**
 * @param $buffer
 * @return string
 */
function stripBufferSkipTextareaTags($buffer)
{
  $poz_current = 0;
  $poz_end = strlen($buffer) - 1;
  $result = "";

  while ($poz_current < $poz_end) {
    $t_poz_start = stripos($buffer, "<textarea", $poz_current);
    if ($t_poz_start === false) {
      $buffer_part_2strip = substr($buffer, $poz_current);
      $temp = stripBuffer($buffer_part_2strip);
      $result .= $temp;
      $poz_current = $poz_end;
    } else {
      $buffer_part_2strip = substr($buffer, $poz_current, $t_poz_start - $poz_current);
      $temp = stripBuffer($buffer_part_2strip);
      $result .= $temp;
      $t_poz_end = stripos($buffer, "</textarea>", $t_poz_start);
      $temp = substr($buffer, $t_poz_start, $t_poz_end - $t_poz_start);
      $result .= $temp;
      $poz_current = $t_poz_end;
    }
  }
  return $result;
}

/**
 * @param $buffer
 * @return string|string[]|null
 */
function stripBuffer($buffer)
{
  // change new lines and tabs to single spaces
  $buffer = str_replace(["\r\n", "\r", "\n", "\t"], ' ', $buffer);
  // multispaces to single...
  $buffer = preg_replace('/ {2,}/', ' ', $buffer);
  // remove single spaces between tags
  $buffer = str_replace('> <', '><', $buffer);
  // remove single spaces around &nbsp;
  $buffer = str_replace(' &nbsp;', '&nbsp;', $buffer);
  $buffer = str_replace('&nbsp; ', '&nbsp;', $buffer);
  $buffer = preg_replace('/<!--(?!<!)[^\[>][\s\S]*?-->/', '', $buffer);
  return $buffer;
}

/**
 * setlocale(LC_ALL, 'ptb', 'pt_BR', 'portuguese-brazil', 'bra', 'brazil', 'pt_BR.utf-8', 'pt_BR.iso-8859-1', 'br');
 *
 * @param $lang
 */
function setLocalization($lang)
{
  if ($lang == 'pt-br') {
    setlocale(LC_ALL, "pt_BR", "ptb");
  } else if ($lang == 'es') {
    setlocale(LC_ALL, "esp", "pt");
  } else if ($lang == 'en') {
    setlocale(LC_ALL, "en", "us");
  }
}

/**
 * @param $params
 * @param null $scheme
 * @return string
 */
function url($params, $scheme = null)
{
    return Yii::$app->urlManager->createAbsoluteUrl($params, $scheme);
}

/**
 * @param $image
 * @return string
 */
function urlImage($image)
{
  return normalizePath(preg_replace(['/api/', '/backend/', '/establishment/'], '', Url::base(true) . $image));
}

/**
 * @param $message
 * @param string $category
 * @param array $params
 * @param null $language
 * @return string
 */
function t($message, $category = 'app', $params = [], $language = null)
{
  return Yii::t($category, $message, $params, $language);
}

/**
 * @param $name
 * @return string|null
 */
function config($name)
{
  return Helpers::config($name);
}

/**
 * @param $variable
 * @return string
 */
function config_twitter($variable)
{
  return ConfigTwitter::findOne(['variable' => $variable])->value;
}

/**
 * @param $variable
 * @return string
 */
function config_facebook($variable)
{
  $row = ConfigFacebook::findOne(['variable' => $variable]);
  return trim($row->value);
}

/**
 * @param $variable
 * @return string
 */
function google_analytics($variable)
{
  $row = ConfigGoogleAnalytics::findOne(['variable' => $variable]);
  return trim($row->value);
}

/**
 * @param $name
 * @return mixed
 */
function social_network($name)
{
  return SocialNetwork::uri($name);
}

/**
 * @param $bd
 * @param $attrib
 * @return bool|mixed|null
 */
function system_image($bd, $attrib)
{
  return Helpers::systemImage($bd, $attrib);
}

/**
 * @param $bd
 * @param $attrib
 * @return bool|mixed|null
 */
function system_file($bd, $attrib)
{
  return Helpers::systemFile($bd, $attrib);
}

/**
 * @param $param
 * @return mixed|null
 */
function config_email($param)
{
  return Helpers::configEmail($param);
}

/**
 * @param $variable
 * @param string $var
 * @return mixed|null
 */
function institutional($variable, $var = 'text')
{
  return Helpers::institutional($variable, $var);
}

/**
 * @param $code
 * @param string $var
 * @return mixed|null
 */
function page_information($code, $var = 'text')
{
  return Helpers::pageInformation($code, $var);
}

/**
 * @param $controller
 * @param $value
 * @param $id
 * @param string $class
 * @param array $permissoes
 * @return mixed
 */
function categorias($controller, $value, $id, $class = 'ctreeview', $permissoes = array())
{
  return Helpers::categorias($controller, $value, $id, $class, $permissoes);
}

/**
 * @param $text
 * @param int $quantity
 * @return string
 */
function limitChars($text, $quantity = 81)
{
  return Helpers::limitChar($text, $quantity);
}

/**
 * @param $text
 * @param $quantity
 * @return string
 */
function limitWords($text, $quantity)
{
  return Helpers::limitWords($text, $quantity);
}

/**
 * @param $title
 * @return string
 */
function pageTitle($title)
{
  return !empty($title) ? $title . ' - ' . configuracao('titulo') : configuracao('titulo');
}

/**
 * @param $startTimeStamp
 * @param $endTimeStamp
 * @return string
 */
function countDays($startTimeStamp, $endTimeStamp)
{
  return Helpers::countDays($startTimeStamp, $endTimeStamp);
}

/**
 * @param $url
 * @param array $post
 * @param array $get
 * @return bool|string
 */
function curl($url, $post = array(), $get = array())
{
  $url = explode('?', $url, 2);
  if (count($url) === 2) {
    $temp_get = array();
    parse_str($url[1], $temp_get);
    $get = array_merge($get, $temp_get);
  }


  $ch = curl_init($url[0] . "?" . http_build_query($get));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0", rand(4, 5)));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $html = curl_exec($ch);
  curl_close($ch);
  return $html;
}

/**
 * @param $dir
 */
function recursiveDelete($dir)
{
  if (is_dir($dir)) {
    $files = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($files as $fileinfo) {
      if ($fileinfo->getFilename() !== '.gitignore') {
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');

        try {
          $todo($fileinfo->getRealPath());
        } catch (Exception $exc) {

        }
      }
    }
  }
}

/**
 * @param $source
 * @param $destination
 * @param $exclude
 */
function recurseCopy($source, $destination, $exclude)
{

  /**
   * @param SplFileInfo $file
   * @param mixed $key
   * @param RecursiveCallbackFilterIterator $iterator
   * @return bool True if you need to recurse or if the item is acceptable
   */
  $filters = function ($file, $key, $iterator) use ($source, $exclude) {
    if ($iterator->hasChildren() && !in_array(str_replace('\\', '/', str_replace($source, '', $file->getPathname())), $exclude)) {
      return true;
    } else if ($file->isFile() && in_array($file->getBaseName(), $exclude)) {
      return false;
    }
    return $file->isFile();
  };

  $innerIterator = new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS);
  $iterator = new RecursiveIteratorIterator(new RecursiveCallbackFilterIterator($innerIterator, $filters), RecursiveIteratorIterator::SELF_FIRST);

  $filter[] = $destination;

  try {
    @mkdir($destination, 0755, true);
    foreach ($iterator as $file) {
      $copydest = str_replace("//", DIRECTORY_SEPARATOR, $destination . DIRECTORY_SEPARATOR . str_replace($source, "", $file));
      $compare = rtrim($file, ".");

      if (is_dir($file)) {
        if (!is_dir($copydest)) {
          if (!in_array($compare, $filter)) {
            if (isset($skip) && !preg_match("!" . $skip . "!", $file) || !isset($skip))
              @mkdir($copydest, 0755, true);
            else
              $record[] = $copydest;
          } else {
            $skip = $compare;
          }
        }
      } elseif (is_file($file) && !in_array($file, $filter)) {
        copy($file, $copydest);
      } else {
        if ($file != '.' && $file != '..')
          $record[] = $copydest;
      }
    }
  } // This will catch errors in copying (like permission errors)
  catch (Exception $e) {
    $error[] = $e;
    dd($e);
  }

}

/**
 * @param $path
 * @return string
 */
function normalizePath($path)
{
  $parts = [];// Array to build a new path from the good parts
  $path = preg_replace('~(?<!https:|http:)[/\\\\]+~', "/", $path);// Replace backslashes with forwardslashes
  $segments = explode('/', $path);// Collect path segments

  foreach ($segments as $segment) {
    if ($segment != '.') {
      $test = array_pop($parts);
      if (is_null($test))
        $parts[] = $segment;
      else if ($segment == '..') {
        if ($test == '..')
          $parts[] = $test;

        if ($test == '..' || $test == '')
          $parts[] = $segment;
      } else {
        $parts[] = $test;
        $parts[] = $segment;
      }
    }
  }
  return implode('/', $parts);
}


function flush_buffers()
{
  flush();
  if (!isset($_SERVER['argv'])):
    ob_end_flush();
    flush();
  endif;
  ob_start();
}

