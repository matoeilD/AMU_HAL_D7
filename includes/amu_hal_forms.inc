<?php


/**
 * @todo valeurs par defaut globales des configs du module et comment elles sont utilisées et comment elles interagissent avec les configs des instances de blocs à analyser plus finement
 *
 * @param $form
 * @param $form_state
 *
 * @return mixed
 */
function form_admin_hal($form, &$form_state) {
  $hal_last_pub_rows = variable_get('hal_last_pub_rows', 5);
  $hal_collection_id = variable_get('hal_collection_id', "");
  $hal_date_start = variable_get('hal_date_start', '2000');
  $hal_struct_id = variable_get('hal_struct_id', '');

  $form['collection_id'] = [
    '#type' => 'textfield',
    '#title' => t('Identifiant HAL de la Collection du laboratoire'),
    '#description' => t('ex: LPC, DICE '),
    '#default_value' => $hal_collection_id,
  ];

  $form['struct_id'] = [
    '#type' => 'textfield',
    '#title' => t('Identifiant HAL du laboratoire'),
    '#description' => t('ex: 182200 '),
    '#default_value' => $hal_struct_id,
  ];

  $form['date_start'] = [
    '#type' => 'textfield',
    '#title' => t('Date Début Dépôt'),
    '#description' => t('Date (année) pour laquelle des données sont ccnsultable sur HAL'),
    '#default_value' => $hal_date_start,
  ];

  $form['last_pub_rows_count'] = [
    '#type' => 'textfield',
    '#title' => t('Dernières publications'),
    '#description' => t('Nombre de publications à afficher dans le bloc Dernières publications'),
    '#default_value' => $hal_last_pub_rows,
  ];

  $form['submit'] = [
    '#type' => 'submit',
    '#value' => t('Enregistrer'),
    '#submit' => [
      '_amu_hal_update_submit',
    ],
  ];

  $form['documentation'] = [
    '#type' => 'textarea',
    '#title' => t('Documentation'),
    '#disabled' => TRUE,
    '#default_value' => variable_get('documentation'),
    '#rows' => 50,
  ];

  if (!empty ($form_state['result'])) {
    $form['result'] = [
      '#markup' => render($form_state['result']),
    ];
  }

  return $form;
}


