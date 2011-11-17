<?php
/*
Plugin Name: Hide Title on Browse Path
Version: auto
Description: Hide the photo title on Browse Path
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=589
Author: plg
Author URI: http://piwigo.wordpress.com
*/

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

add_event_handler('loc_end_picture', 'hide_title_on_browse_path');
function hide_title_on_browse_path()
{
  global $template;
      
  $template->set_prefilter('picture', 'hide_title_on_browse_path_prefilter');
}

function hide_title_on_browse_path_prefilter($content, &$smarty)
{
  $pattern = '#\{\$LEVEL_SEPARATOR\}\{\$current.TITLE\}#ms';
  $replacement = '';
  return preg_replace($pattern, $replacement, $content);
}
?>
