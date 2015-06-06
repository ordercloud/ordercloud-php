<?php namespace Ordercloud\Support\Http;

use League\Url\Url;

class LeagueUrlParameteriser implements UrlParameteriser
{
    /**
     * @param string $url
     * @param array  $parameters
     *
     * @return string
     */
    public function appendParametersToUrl(array $parameters, $url)
    {
        if (strpos($url, '//') === false) {
            $url = 'dummy.host/' . ltrim($url, '/');
        }

        $leagueUrl = Url::createFromUrl($url);

        $leagueUrl->getQuery()->modify($parameters);

        return $this->stripParameterArrayBrackets($leagueUrl->getRelativeUrl());
    }

    /**
     * @param string $leagueUrl
     *
     * @return string
     */
    private function stripParameterArrayBrackets($leagueUrl)
    {
        return preg_replace('/%5B\d+%5D/', '', $leagueUrl);
    }
}
