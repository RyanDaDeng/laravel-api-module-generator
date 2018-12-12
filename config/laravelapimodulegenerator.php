<?php

return [
    'modules' => [
        'PetStore' => [
            'enable' => true, // enable = true will generate the folder
            'folder_path' => app_path(), // root path to save the file, default is under your current local path: ../../app/
            'namespace' => 'App',  // class prefix namespace, use \
            'uri' => [
                [
                    'uri' => '/pets',
                    'rules' => [
                        'name' => 'required',
                        'id' => 'integer'
                    ],
                    'method' => 'get',
                    'function' => 'getPets',
                    'type' => 'web'// web, api
                ],
                [
                    'uri' => '/pets',
                    'rules' => [
                        'name' => 'required|nullable',
                        'id' => 'integer'
                    ],
                    'method' => 'post',
                    'function' => 'createPet',
                    'type' => 'web'// web, api
                ],
                [
                    'uri' => '/pets/{id}/{ss}',
                    'rules' => [
                        'name' => 'required',
                        'id' => 'integer'
                    ],
                    'method' => 'put',
                    'function' => 'updatePet',
                    'type' => 'api'// web, api
                ],
                [
                    'uri' => '/pets/{i}',
                    'rules' => [
                        'name' => 'required',
                        'id' => 'integer'
                    ],
                    'method' => 'patch',
                    'function' => 'updatePetWithSomething',
                    'type' => 'api'// web, api
                ],
            ],
            'models' => [
                'pet', 'store', 'customer'
            ]
        ]
    ]

];
