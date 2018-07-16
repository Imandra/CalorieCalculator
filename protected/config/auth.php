<?php
return array(
    /* роли */
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest',
            'manageOwnProducts',
        ),
        'bizRule' => null,
        'data' => null
    ),
    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => array(
            'user',
            'manageProducts',
        ),
        'bizRule' => null,
        'data' => null
    ),
    /* операции */
    'manageProducts' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'Access to the user data',
        'bizRule' => null,
        'data' => null
    ),
    /* задачи */
    'manageOwnProducts' => array(
        'type' => CAuthItem::TYPE_TASK,
        'description' => 'Access to the own user data',
        'children' => array(
            'manageProducts',
        ),
        'bizRule' => 'return Yii::app()->user->id==$params["product"]->owner_id;',
        'data' => null
    ),
);