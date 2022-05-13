<?php

return [
    'translations' => [
        'yii' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@yii/messages',
            'sourceLanguage' => 'en'
        ],
        'app' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => "@common/language",
            'sourceLanguage' => 'pt-BR',
            'forceTranslation' => true
        ],
        'backend' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => "@backend/language",
            'sourceLanguage' => 'pt-BR',
            'forceTranslation' => true
        ],
        'frontend' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => "@frontend/language",
            'sourceLanguage' => 'pt-BR',
            'forceTranslation' => true
        ],
        'mail' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => "@common/language",
            'sourceLanguage' => 'pt-BR',
            'forceTranslation' => true
        ],
        'model*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => "@common/language",
            'sourceLanguage' => 'pt-BR',
            'forceTranslation' => true
        ],
    ]
];
