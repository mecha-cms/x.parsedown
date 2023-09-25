<?php

return [
    'abbreviationData' => [
        'API' => 'Application Programming Interface',
        // Must comes before “AJAX” because it contains “XML” in the value
        'XML' => 'eXtensible Markup Language',
        'AJAX' => 'Asynchronous JavaScript and XML',
        'ASCII' => 'American Standard Code for Information Interchange',
        'CMS' => 'Content Management System',
        'CPU' => 'Central Proccessing Unit',
        'CSS' => 'Cascading Style Sheet',
        'FTP' => 'File Transfer Protocol',
        'GUI' => 'Graphical User Interface',
        'HTML' => 'Hyper Text Markup Language',
        'HTML5' => 'Hyper Text Markup Language Version 5',
        'HTTP' => 'Hyper Text Transfer Protocol',
        'IE' => 'Internet Explorer',
        'IP' => 'Internet Protocol',
        'JPEG' => 'Joint Photographic Experts Group',
        'JPG' => 'Joint Photographic Experts Group',
        'JS' => 'JavaScript',
        'JSON' => 'JavaScript Object Notation',
        'RSS' => 'Rich Site Summary',
        'RTE' => 'Rich Text Editor',
        'SFTP' => 'SSH File Transfer Protocol',
        'SGML' => 'Standard Generalized Markup Language',
        'UA' => 'User Agent',
        'UI' => 'User Interface',
        'URL' => 'Uniform Resource Locator',
        'WYSIWYG' => 'What You See is What You Get',
        'YAML' => 'YAML Ain’t Markup Language'
    ],
    'figuresEnabled' => true,
    'footnoteAttributes' => [
        'class' => null,
        'role' => 'doc-endnotes'
    ],
    'footnoteLinkAttributes' => function ($number, $attributes, &$element, $name) {
        return [
            'class' => null,
            'href' => '#to:' . $name,
            'role' => 'doc-noteref'
        ];
    },
    'footnoteReferenceAttributes' => function ($number, $attributes, &$element, $name, $index) {
        return ['id' => 'from:' . $name . '.' . $index];
    },
    'footnoteBackLinkAttributes' => function ($number, $attributes, &$element, $name, $index) {
        return [
            'class' => null,
            'href' => '#from:' . $name . '.' . $index,
            'rev' => null,
            'role' => 'doc-backlink'
        ];
    },
    'footnoteBackReferenceAttributes' => function ($number, $attributes, &$element, $name, $total) {
        return [
            'id' => 'to:' . $name
        ];
    },
    'linkAttributes' => function ($html, $attributes, &$element, $internal) {
        return $internal ? [] : [
            'rel' => 'nofollow',
            'target' => '_blank'
        ];
    },
    'voidElementSuffix' => '>', // HTML5
];