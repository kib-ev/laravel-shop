<?php

namespace App\Services\Parser;

class WebParser
{
    protected $siteUrl = null;
    protected $pageContent = null;

    public function getPageContent($uri)
    {
        if ($this->siteUrl) {
            $this->pageContent = file_get_contents($this->siteUrl . $uri);

            return $this->pageContent;
        }

        return null;
    }

    public function setSiteUrl($url)
    {
        $this->siteUrl = $url;
    }
}
