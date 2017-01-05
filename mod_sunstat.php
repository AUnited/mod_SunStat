<?php
# @version		$version 0.1 Amvis United Company Limited  $
# @copyright	Copyright (C) 2017 AUnited Co Ltd. All rights reserved.
# @license		GNU/GPL, see LICENSE.php
# Updated		5th January 2017
#
# Site: http://aunited.ru
# Email: info@aunited.ru
# Phone: null
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

/**
 * @param $color
 * @param $case
 * @return string
 */
function ColorNormalise($color, $case)
{
    $color=ltrim($color, "#");
    switch($case)
    {
        case 'up': $color = strtoupper($color); break;
        case 'down': $color = strtolower($color); break;
    }
    return $color;
}

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
        default: die("Wrong counter type.");
    }
    $informer_color=ColorNormalise($informer_color, 'up');
    $gradient_color=ColorNormalise($gradient_color, 'up');

    return '<!-- Yandex.Metrika informer --><a href="https://metrika.yandex.ru/stat/?id=' . $ymid . '&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/' . $ymid . $type . $arrow_color . '_'.$gradient_color.'_'.$informer_color.'_'.$font_color.'_'.$mode.'" style="width:'.$width.'; height:'.$height.'; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня" '.$acode.' /></a> <!-- /Yandex.Metrika informer -->';
}

function LICounter($ymid)
{
    $type=0;
    $color='';

    switch ($type){
        case ($type>=11 && $type<=22)||($type>=52 && $type<=54)||($type>=57 && $type<=58): $width = '88'; $height ='31'; break;
        case ($type>=23 && $type<=26): $width = '88'; $height ='15'; break;
        case ($type>=38 && $type<=46): $width = '31'; $height ='31'; break;
        case ($type>=27 && $type<=29): $width = '88'; $height ='120'; break;
        default: die("Unable to detect correct LICounter ID");
    }

    switch ($color) {
        case '#ffffff': $color_id=1; break;
        case '#e2e2e2': $color_id=2; break;
        case '#c7c7c7': $color_id=3; break;
        case '#a9a9a9': $color_id=4; break;
        case '#8e8e8e': $color_id=5; break;
        case '#ffa002': $color_id=6; break;
        case '#ff5c1b': $color_id=7; break;
        case '#d16dd0': $color_id=8; break;
        case '#9c80c4': $color_id=9; break;
        case '#a4b4d5': $color_id=10; break;
        case '#607fc7': $color_id=11; break;
        case '#5f99a8': $color_id=12; break;
        case '#42ac94': $color_id=13; break;
        case '#2ec460': $color_id=14; break;
        case '#58ba3f': $color_id=15; break;
        case '#a6b345': $color_id=16; break;
        case '#f0e110': $color_id=17; break;
        case '#ffcab1': $color_id=18; break;
        default: $color_id=6; break;
    }


    return '<!--LiveInternet logo--><a href="//www.liveinternet.ru/click" target="_blank"><img src="//counter.yadro.ru/logo?'.$type.'.'.$color_id.'" title="LiveInternet" alt="" border="0" width="'.$width.'" height="'.$height.'"/></a><!--/LiveInternet-->';
}
echo $exit;

?>
