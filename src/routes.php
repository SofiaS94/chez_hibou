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
    'item/entrees' => ['ItemController', 'listByType', ['type']],
    'item/platschauds' => ['ItemController', 'listByType', ['type']],
    'item/platsfroids' => ['ItemController', 'listByType', ['type']],
    'item/salades' => ['ItemController', 'listByType', ['type']],
    'item/accompagnements' => ['ItemController', 'listByType', ['type']],
    'item/desserts' => ['ItemController', 'listByType', ['type']],
    'item/boissons' => ['ItemController', 'listByType', ['type']],
    'restaurant/presentation' => ['HomeController', 'restaurant',],
    // 'items/edit' => ['ItemController', 'edit', ['id']],
    // 'item/list' => ['ItemController', 'list', ['id']],
    // 'items/add' => ['ItemController', 'add',],
    // 'items/delete' => ['ItemController', 'delete',],
    'cart/show' => ['CartController', 'show', ['code']],
    // 'cart/edit' => ['CartController', 'edit', ['id']],
    // 'cart/delete' => ['CartController', 'delete',],
    'login' => ['UserController', 'login'],
    'register' => ['UserController', 'register'],
    'logout' => ['UserController', 'logout'],
    'item/add' => ['CartController', 'add', ['id'],],
    'item/delete' => ['CartController', 'delete', ['id'],],
    'profil' => ['UserController', 'profil'],

    'modifyprofil' => ['UserController', 'modifyprofil'],
    'modifyprofil/edit' => ['UserController', 'edit'],

];
