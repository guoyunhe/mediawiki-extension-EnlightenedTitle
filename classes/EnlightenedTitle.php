<?php

class EnlightenedTitle {
    public function onBeforePageDisplay ( OutputPage &$out, Skin &$skin ) {
        $title_string = $out->getPageTitle();
        $html_title = $out->getHTMLTitle();
        $out->setHTMLTitle('hahaha');
    }
}