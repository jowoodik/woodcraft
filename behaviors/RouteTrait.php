<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.04.16
 * Time: 17:34
 */

namespace app\behaviors;


trait RouteTrait
{
    public $_title;

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($data)
    {
        $this->_title = $data;
    }
}
