<?php

class EnlightenedTitle {
    /**
     * @static
     */
    public function onBeforePageDisplay ( OutputPage &$out, Skin &$skin ) {
        global $wgSitename;
        $title_string = $out->getPageTitle();
        $title = Title::newFromText($title_string);
        $html_title = $out->getHTMLTitle();

        if ($title->isMainPage()) {
            return;
        } else {
            // Only modify view page, not edit page, history page, etc.
            if ( $_GET['action'] ) {
                return;
            }

            // Modify <h1></h1>
            $out->setPageTitle( $title->getSubpageText() );

            $new_title_string = implode( ' - ' , self::parsePageName( $title->getText(), true ) );

            $namespace = $title->getNsText();
            if ($namespace && $namespace !== $wgSitename) {
                $new_title_string .= ' - ' . $namespace;
            }

            $new_html_title = preg_replace($title_string, $new_title_string, $html_title);

            // Modify <title></title>
            $out->setHTMLTitle($new_html_title);
        }
    }

    /**
     *
     * @static
     *
     * @param string $name Page name without prefix, namespace and hash
     * @param boolean $reverse Reverse result list order
     * @return string[] List of names of parent and child pages
     */
    private function parsePageName($name, $reverse = false) {
        $names = explode('/', $name);
        if ($reverse) {
            return array_reverse($names);
        }
        return $names;
    }
}