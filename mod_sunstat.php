<?php
# @version		$version 0.1 Amvis United Company Limited  $
# @copyright	Copyright (C) 2017 AUnited Co Ltd. All rights reserved.
# @license		GNU/GPL, see LICENSE.php
# Updated		5th January 2017
#
# Site: http://aunited.ru
# Email: info@united.ru
# Phone
#
# Joomla! is free software. This version may have been modified pursuant
# to the GNU General Public License, and as distributed it includes or
# is derivative of works licensed under the GNU General Public License or
# other free or open source software licenses.
# See COPYRIGHT.php for copyright notices and details.

#Prefixes
# mr_ = MailRu
# ym_ = Yandex
# ga_ = Google
# pwk_ = Piwik
# li_ = LiveInternet
# hl_ = Hotlog
# rr_ = Rambler
# os_ = OpenStat (SpyLog)

// no direct access
defined('_JEXEC') or die;
$exit = "У Вас нет счетчиков";

function MailRuCounter($mrid)
{
    $style[1]   = array("base" => 600, "width" => 88, "height" => 40);
    $style[2]   = array("base" => 578, "width" => 88, "height" => 40);
    $style[3]   = array("base" => 555, "width" => 88, "height" => 40);
    $style[4]   = array("base" => 532, "width" => 88, "height" => 40);
    $style[5]   = array("base" => 509, "width" => 88, "height" => 31);
    $style[6]   = array("base" => 486, "width" => 88, "height" => 31);
    $style[7]   = array("base" => 463, "width" => 88, "height" => 31);
    $style[8]   = array("base" => 440, "width" => 88, "height" => 31);
    $style[9]   = array("base" => 417, "width" => 88, "height" => 31);
    $style[10]  = array("base" => 394, "width" => 88, "height" => 31);
    $style[11]  = array("base" => 371, "width" => 88, "height" => 18);
    $style[12]  = array("base" => 348, "width" => 88, "height" => 18);
    $style[13]  = array("base" => 325, "width" => 88, "height" => 18);
    $style[14]  = array("base" => 302, "width" => 88, "height" => 15);
    $style[15]  = array("base" => 279, "width" => 31, "height" => 38);
    $style[16]  = array("base" => 256, "width" => 31, "height" => 38);

    $color = array(
        1   => "#777777",
        2   => "#333333",
        3   => "#000000",
        4   => "#4c1f66",
        5   => "#c23066",
        6   => "#d4666d",
        7   => "#6e0a0a",
        8   => "#914900",
        9   => "#8a7807",
        10  => "#436925",
        11  => "#106e61",
        12  => "#185421",
        13  => "#197b94",
        14  => "#1e5d78",
        15  => "#54739c",
        16  => "#054a80"
    );
    $style_id = 1;
    $color_id = 1;
    $type = $style[$style_id]["base"] + $color_id; //17types*16 colors
    $width = $style[$style_id]["width"];
    $height = $style[$style_id]["height"];
    $color_hex = $color[$color_id];
    if ($style_id == "wot")
    {
        return '<!-- Rating Mail.ru wot-logo --><a href="http://top.mail.ru/wot?id=' . $mrid . '"><img src="//top-fwz1.mail.ru/wot-logo?id=' . $mrid . '" style="border:0;" height="87" width="214" alt="Рейтинг Mail.ru" /></a><!-- //Rating Mail.ru wot-logo -->';
    }
    else
    {
        return '<!-- Rating Mail.ru logo --><a href="http://top.mail.ru/jump?from=' . $mrid . '"><img src="//top-fwz1.mail.ru/counter?id=' . $mrid . ';t=' . $type . ';l=1" style="border:0;" height="' . $height . '" width="' . $width . '" alt="Рейтинг Mail.ru" /></a><!-- //Rating Mail.ru logo -->';
    }
}

function YandexCounter($ymid)
{
    $type=''; //88x31 80x31 80x15 (1/2/3)
    $mode=''; //visits/pageviews/uniques
    $font_color=''; //black, white (0/1)
    $arrow_color=''; // violet, gray (0/1)
    $informer_color='';
    $gradient_color='';
    $gradient_enabled='';
    $advanced = '';// 0/1

    if (!$gradient_enabled){ $gradient_color .= $informer_color; }
    if ($advanced) { $acode='class="ym-advanced-informer" data-cid="' . $ymid . '" data-lang="ru"'; }
    if ($type == '3') { $mode = 'uniques'; }
    switch ($type){
        case '3': $width = '88'; $height ='31'; break;
        case '2': $width = '80'; $height ='31'; break;
        case '1': $width = '80'; $height ='15'; break;
    }

    return '<!-- Yandex.Metrika informer --><a href="https://metrika.yandex.ru/stat/?id=' . $ymid . '&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/' . $ymid . $type . $arrow_color . '_'.$gradient_color.'_'.$informer_color.'_'.$font_color.'_'.$mode.'" style="width:'.$width.'; height:'.$height.'; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня" '.$acode.' /></a> <!-- /Yandex.Metrika informer -->';
}
echo $exit;

?>
