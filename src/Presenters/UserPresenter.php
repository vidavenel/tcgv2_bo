<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:05
 */

namespace Tcgv2\Bo\Presenters;


class UserPresenter
{
    public $id = 1;
    public $name = "admin";

    public function hasRole()
    {
        return 'superadmin';
    }
}