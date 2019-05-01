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
        'dashboard' => 'admin.dashboard',
        'commande_index' => 'admin.commande.index',
        'commande_abandonnees' => 'admin.commande.abandonnee',
        'code_promo' => 'admin.discount.index',
        'profile' => "#",
        'logout' => "#",
        'commande_search' => 'admin.commande.search'
    ],
    "icons_breadcrumb" => [
        "dashboard" => [
            "name" => "Dashboard",
            "icon" => "fa fa-home"
        ]
    ]
];