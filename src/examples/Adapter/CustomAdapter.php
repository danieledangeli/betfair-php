<?php
namespace examples\Adapter;

use Betfair\Adapter\AdapterInterface;

class CustomAdapter implements AdapterInterface
{

    /**
     * @param $response
     * @return mixed response
     */
    public function adaptResponse($response)
    {
        $data = json_decode($response, true);
        $data = $this->arrayToObject($data[0]['result']);
        return $data;
    }

    function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new \stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name=>$value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = $this->arrayToObject($value);
                }
            }
            return $object;
        }
        else {
            return FALSE;
        }
    }
}