<?php

namespace echoooxx\admin\controllers;

use echoooxx\admin\components\ItemController;
use yii\rbac\Item;

/**
 * RoleController implements the CRUD actions for AuthItem model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class RoleController extends ItemController
{
    public $type = Item::TYPE_ROLE;

}
