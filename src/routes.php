<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'list',],
    'item/entrees' => ['ItemController', 'listByType'],
    'item/platschauds' => ['ItemController', 'listByType'],
    'item/platsfroids' => ['ItemController', 'listByType'],
    'item/salades' => ['ItemController', 'listByType'],
    'item/accompagnements' => ['ItemController', 'listByType'],
    'item/desserts' => ['ItemController', 'listByType'],
    'item/boissons' => ['ItemController', 'listByType'],
    'restaurant/presentation' => ['HomeController', 'restaurant',],
    // 'items/edit' => ['ItemController', 'edit', ['id']],
    // 'item/list' => ['ItemController', 'list', ['id']],
    // 'items/add' => ['ItemController', 'add',],
    // 'items/delete' => ['ItemController', 'delete',],
    'cart/show' => ['CartController', 'show', ['id']],
    // 'cart/edit' => ['CartController', 'edit', ['id']],
    // 'cart/delete' => ['CartController', 'delete',],
    'login' => ['UserController', 'login'],
    'register' => ['UserController', 'register'],
    'logout' => ['UserController', 'logout'],
    'profil' => ['UserController', 'profil'],
    'item/add' => ['CartController', 'add', ['id'],],
];
