<?php
return array(
    'edit' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'Edit own adverts',
        'bizRule' => null,
        'data' => null
    ),
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
            'guest', 'edit'
        ),
        'bizRule' => null,
        'data' => null
    ),

    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => array(
            'user',
        ),
        'bizRule' => null,
        'data' => null
    ),


);