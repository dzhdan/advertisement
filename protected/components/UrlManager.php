<?php

class UrlManager extends \CUrlManager
{

    public function createUrl($route, $params = [], $ampersand = '&')
    {
        $route = preg_replace_callback('/(?<![A-Z])[A-Z]/', function ($matches) {
            return '-' . lcfirst($matches[0]);
        }, $route);
        return parent::createUrl($route, $params, $ampersand);
    }

    public function createWebHashbangUrl($route, $params = [])
    {
        if ($params) {
            return \Yii::app()->params['frontendBaseUrl'] . '/#/' . $route . '?' . http_build_query($params);
        } else {
            return \Yii::app()->params['frontendBaseUrl'] . '/#/' . $route;
        }
    }

    public function createWebAbsoluteUrl($route, $params = [], $ampersand = '&')
    {
        $url = $this->createUrl($route, $params, $ampersand);

        if (strpos($url, '/api') !== false && strpos($url, '/api') == 0) {
            $url = substr($url, 4);
        }

        if (strpos($url, 'http') === 0) {
            return $url;
        } else {
            return \Yii::app()->params['frontendBaseUrl'] . $url;
        }
    }

    public function parseUrl($request)
    {
        $route = parent::parseUrl($request);
        return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $route))));
    }
}