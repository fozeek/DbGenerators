<?php

    DbGenerators\Generator('all', array( // sql | dal | all
        'prefixe_table_name' => 'test_',
        'objects' => array(
            'user' => array(
                'table_name' => 'user',
                'attributs' => array(
                    'id' => array(
                        'type' => 'int',
                        'auto_incrementation' => true
                        'begin' => 1,
                    ),
                    'pseudo' => array(
                        'is_unique' => true,
                        'max_size' => 32,
                        'min_size' => 6,
                        'collables' => array(
                            'String.Filter::trim',
                            'String.Filter::noSpaces',
                            'String.Filter::sanitize', // Pas confondre avec slugify
                        ),
                    ),
                    'password' => array(
                        'type' => 'string',
                        'max_size' => 32,
                        'min_size' => 6,
                        'nullable' => false,
                        'collable' => 'Auth.Filter::pwd', // Auth\Filter::pwd() FROM Auth\Filter\Pwd::__invoke()
                    ),
                    'name' => array(
                        'type' => 'string', 
                        'max_size' => 32,
                        'min_size' => 6,
                        'callable' => 'checkName', // Créer la fonction dans la DAL et appel de celle si dans la verification update et create
                        'nullable' => false,
                    ),
                    'description' => array(
                        'type' => 'text'
                        'max_size' => '520',
                        'nullable' => true,
                    ),
                    'rights' => array(
                        'reference' => 'right',
                        'type' => 'ManyToMany',
                    ),
                ),
            ),
            'right' => array(
                'attributs' => array(
                    'id' => array(
                        'type' => 'int',
                        'auto_incrementation' => true
                        'begin' => 1,
                    ),
                    'code' => array(
                        'type' => 'string',
                        'max_size' => 32,
                    ),
                    'name' => array(
                        'type' => 'string',
                        'max_size' => 32,
                        'min_size' => 6,
                        'callable' => 'String.Filter::trim',
                        'nullable' => false,
                    ),
                )
            ),
        ),
    );