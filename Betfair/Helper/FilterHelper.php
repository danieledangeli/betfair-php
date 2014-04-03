<?php

namespace Betfair\Helper;

class FilterHelper
{
    public static function getEmptyFilter()
    {
        return '{"filter":{}}';
    }

    public static function getFilterFillByParamArray($paramArray)
    {
        $json_array = array();

        foreach($paramArray as $key => $value) {
            $json_array['filter'][$key] = $value;
        }

        return json_encode($json_array);

    }

} 