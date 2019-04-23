<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 04:11
 */
return [
    'develop' => true,
    'route' => [
        'dashboard' => 'dashboard',
        'commande_index' => 'commande.index',
        'commande_abandonnees' => 'commande.abandonnee',
        'code_promo' => 'discount.index',
        'profile' => "#",
        'logout' => "#",
        'commande_search' => '#'
    ],
    "icons_breadcrumb" => [
        "dashboard" => [
            "name" => "Dashboard",
            "icon" => "fa fa-home"
        ]
    ]
];