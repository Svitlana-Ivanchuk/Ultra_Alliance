<?php
add_action('customize_register', function ($customizer) {
    $customizer->add_section(
        'top-head',
        array(
            'title' => 'Top-Head',
            'priority' => 11,
            'description' => "change tel, adress, work time",
            /*
                $id — уникальный идентификатор
                $args — массив аргументов
                В массиве $args может быть несколько позиций, а именно:
                title — как секция будет называться
                description — описание секции (необязательно)
                priority — какой по счету будет располагаться секция или ее приоритет (по-умолчанию 10)
                capability — права пользователя, необходимые для изменения данного параметра. Т.е. разные параметры могут видеть разные группы пользователей. Круто! (необязательно)
                theme_supports — указывает на то, что текущая тема должна поддерживать описанную в параметре функцию (необязательно)
             */
        )
    );

    $customizer->add_setting(
        'phone',
        array(
            'default' => '',
            'sanitize_callback' => function ($value) {
                return preg_replace('/[^\d+()-]/', '', $value); },
        )
    );

    $customizer->add_control(
        'phone',
        array(
            'label' => 'Введите tel',
            'section' => 'top-head',
            'type' => 'text',
        )
    );

});