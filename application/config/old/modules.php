<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
  
    'modules' => array(
        
        array(
            'controller' => 'category',
            'title' => 'Category Management',
            'actions'    => array(
                'view', 'create', 'edit', 'delete'
            )
        ),
        array(
            'controller' => 'translations',
            'title' => 'Translations',
            'actions'    => array(
                'view', 'create', 'edit', 'delete'
            )
        ),
        array(
            'controller' => 'user',
            'title' => 'User Management',
            'actions'    => array(
                'view', 'create', 'edit', 'delete'
            )
        ),
        array(
            'controller' => 'user_group',
            'title' => 'User Group Management',
            'actions'    => array(
                'view', 'create', 'edit', 'delete'
            )
        ),
        array(
            'controller' => 'settings',
            'title' => 'Settings Management',
            'actions'    => array(
                'general', 'mail', 'images', 'social', 'advertisement', 'comment', 'currency', 'language'
            )
        ),
        array(
            'controller' => 'newsletter',
            'title' => 'Newsletter Management',
            'actions'    => array(
                'settings', 'manage_templates', 'contact_list', 'send'
            )
        ),
        array(
            'controller' => 'subscribers',
            'title' => 'Subscribers Management',
            'actions'    => array(
                'settings', 'create', 'view', 'edit', 'approval', 'delete'
            )
        ),
        array(
            'controller' => 'tools',
            'title' => 'Options Management',
            'actions'    => array(
                'import_database', 'repair_database'
            )
        )
        
    )
    
);

