<?php

class DateFormatter
{

    public static function strToDate($str)
    {
        $month = [
            'Января',
            'Февраля',
            'Марта',
            'Апреля',
            'Мая',
            'Июня',
            'Июля',
            'Августа',
            'Сентября',
            'Октября',
            'Ноября',
            'Декабря'
        ];

        $date = getdate(strtotime($str));
        if ($date['minutes'] <= 9) {
            $date['minutes'] = '0' . $date['minutes'];
        }

        return $date['mday'] . ' ' . $month[$date['mon'] - 1] . ' ' . $date['year'] . ' г. ' . $date['hours'] . ':' . $date['minutes'];
    }

}