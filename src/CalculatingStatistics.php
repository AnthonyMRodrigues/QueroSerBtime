<?php
/**
 * Created by PhpStorm.
 * User: anthonyrodrigues
 * Date: 22/11/17
 * Time: 13:17
 */

namespace App;


class CalculatingStatistics
{
    public function calculate($values)
    {
        if(!$this->validate($values))
            return false;
        $values = str_replace(',', '.', $values);
        $data['min'] = min($values);
        $data['max'] = max($values);
        $data['sequence'] = count($values);
        $data['media'] = 0;
        foreach ($values as $item) {
            $data['media'] +=$item;
        }
        $data['media'] = ($data['media']/$data['sequence']);
        return $data;
    }
    public function validate($data)
    {
        if(empty($data) || !isset($data))
            return false;
        return true;
    }
}