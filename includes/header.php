<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  if ($messageStack->size('header') > 0) {
    echo '<div class="grid_24">' . $messageStack->output('header') . '</div>';
  }
?>

<div id="header" class="grid_24">
  <div id="storeLogo"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_IMAGES . 'store_logo.png', STORE_NAME) . '</a>'; ?></div>

  <div id="countdown">
<div id="nxtXmas">Christmas Countdown</div><br />

<script type="text/javascript" language="javascript">
  <!-- 
  function iCounter() {
   	var nxtXmas=(new Date().getMonth()>=11 && new Date().getDate()>25)? (new Date().getFullYear())+1 : new Date().getFullYear();
	var cDateTime=new Date();
	var tDateTime=new Date("December 25, "+nxtXmas+" 0:0:00");
	//var tDateTime=new Date("June 11, "+nxtXmas+" 0:0:00");
	var timeDiff=(tDateTime-cDateTime)/1000; //difference btw target date and current date, in seconds
	var oneMin=60; //1 minute in seconds
	var oneHour=60*60; //1 hour in seconds
	var oneDay=60*60*24; //1 day in seconds
	var totalDay=Math.floor(timeDiff/oneDay);
	var totalHour=Math.floor((timeDiff-totalDay*oneDay)/oneHour);
	var totalMin=Math.floor((timeDiff-totalDay*oneDay-totalHour*oneHour)/oneMin);
	var totalSec=Math.floor((timeDiff-totalDay*oneDay-totalHour*oneHour-totalMin*oneMin));
	//Disply Christmas Countdown to Web Browser
	document.getElementById("nxtXmas").innerHTML = totalDay + ' <span>Days,</span> ' + totalHour +' <span>Hours,</span> '+ totalMin +' <span>Minute,</span> '+ totalSec +' <span>Seconds,</span><br /> Remain till the Christmas';
	setTimeout("iCounter()",1000);
  } 

  iCounter(); 
  -->
</script> 
  </div>
  <div id="headerShortcuts">
<?php
  echo tep_draw_button(HEADER_TITLE_CART_CONTENTS . ($cart->count_contents() > 0 ? ' (' . $cart->count_contents() . ')' : ''), 'cart', tep_href_link(FILENAME_SHOPPING_CART)) .
       tep_draw_button(HEADER_TITLE_CHECKOUT, 'triangle-1-e', tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) .
       tep_draw_button(HEADER_TITLE_MY_ACCOUNT, 'person', tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));

  if (tep_session_is_registered('customer_id')) {
    echo tep_draw_button(HEADER_TITLE_LOGOFF, null, tep_href_link(FILENAME_LOGOFF, '', 'SSL'));
  }
?>
  </div>

<script type="text/javascript">
  $("#headerShortcuts").buttonset();
</script>
</div>

<div class="grid_15 ui-widget infoBoxContainer">
  <div class="ui-widget-header infoBoxHeading" ><?php echo '&nbsp;&nbsp;' . $breadcrumb->trail(' &raquo; '); ?></div>
</div>

<?php
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerError">
    <td class="headerError"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?></td>
  </tr>
</table>
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerInfo">
    <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
  </tr>
</table>
<?php
  }
?>
