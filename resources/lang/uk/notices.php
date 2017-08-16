<?php

return [
    //id of actions that can get notices
    //'actions' => [1,2,3,8,9,11,13],
    //links to the source type of actions
    'links' => [
        'order' => route('orders.show_order', ['source_id']),
    ],
    //templates to the actions types
    'templates' => [
        'order:open'       => 'Було розміщено нове замовлення #[source_id].',
        'order:pending'    => 'Ваше замовлення #[source_id] очікує на розгляд',
        'order:comment'    => 'У замовленні #[source_id] є новий коментар',
        'order:closed'     => 'Замовлення #[source_id] закрито',
        'order:cancelled'  => 'Замовлення #[source_id] скасовано.',
        'order:sent'       => 'Замовлення #[source_id] відправлено.',
        'order:rate'       => 'Замовлення #[source_id] оціненио.',
        'order:received'   => 'Замовлення #[source_id] отримано.',
        'order:processing' => 'Замовлення #[source_id] оброблено.',
    ],

    'all_title'   => 'Повідомлення',
    'all_summary' => 'Тут ви зможете переглянути всі повідомлення, які до вас дійшли. Крім того, ви можете натиснути кнопку, щоб переглянути їх деталі.',
];
