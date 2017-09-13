<?php


$documentation=<<<EOF

test ethical

EOF;

variable_set('documentation', $documentation);

/**
 *
 * @author m.dandonneau
 *
 *         champ 'publis significatives' sur blocs
 *
 *   TODO le halID de la collection es t'il réelement un champ de type  halId_s (voir le page detail qui utilise egalement ce champ) ps: cela ne change rien a la requete mais à la dénomination

 *
 * @param string $delta
 *
 */
function amu_hal_block_configure($delta = '', $edit = array()) {

	if ($edit && isset ( $edit ['multiblock_delta'] )) {
		$instanceSuffix = '_' . $edit ['multiblock_delta'] ['#value'];
	}
	else
		$instanceSuffix = '';

	$config = _amu_hal_get_configuration ( $instanceSuffix );


	$form = array ();
	switch ($delta) {
		case 'hal_publications' :


		  /****************************************************
                      Retrieval method
       *****************************************************/

      $internal_link = t('<a href="@help-page" target="_blank">Voir le module d\'aide - Chapitre Fonctionnalités disponibles </a>', array('@help-page' => url('admin/help/amu_hal')));
			$form ['retrieval_method_select']= array (
					'#type' => 'select',
					'#title' => t('Méthode d\'importation'),
					"#options" => array (
							'by_docids' => t ( 'Liste de publications déterminées' ),
							'by_multi_hal_attributes' => t ( 'Publications d\'une structure ou collection' ),
							'by_user_fields' => t ( 'Publications par auteur.e.s' )
					),
        '#description' => t ( $internal_link),
					'#default_value' => $config->retrieval_method_select
			);

      /****************************************************
          Retrieval method - Publications significatives
       *****************************************************/
      $internal_link = t('Pour établir une liste de documents, listez les docids des documents dans le champ Publications significatives. <a href="@help-page" target="blank">Voir le module d\'aide - Chapitre Publications significatives</a>', array('@help-page' => url('admin/help/amu_hal')));
			$form ['docids_publis'] = array (
					'#type' => 'textarea',
					'#title' => t('Publications significatives'),
          '#states' => array(
            'visible' => array(
              ':input[name="retrieval_method_select"]' => array('value' => 'by_docids'),
            ),
          ),
					'#default_value' => $config->docids_publis,
          '#description' => t ($internal_link)
			);

      /****************************************************
          Retrieval method - Identifiant HAL de la collection
       *****************************************************/
      $form ['halId_s'] = [
					'#type' => 'textfield',
					'#title' => t('Identifiant HAL de la collection'),
          '#states' => array(
            'visible' => array(
              ':input[name="retrieval_method_select"]' => array('value' => 'by_multi_hal_attributes'),
            ),
          ),
        '#description' => t ('L\'identifiant de la collection est le HAL halId_s. Ce champ prévaut sur la champ Structure. Si ce champ est renseigné, l\'identifiant HAL de la structure ne sera pas considéré.'),

					'#default_value' => (! empty ( $config->halId_s )) ? $config->halId_s : ''
			];

      /****************************************************
          Retrieval method - Identifiant HAL de la structure
       *****************************************************/
      	$form ['structId_i'] = [
					'#type' => 'textfield',
					'#title' => t('Identifiant HAL de la structure'),
          '#states' => array(
            'visible' => array(
              ':input[name="retrieval_method_select"]' => array('value' => 'by_multi_hal_attributes'),
            ),
          ),
        '#description' => t ('L\'identifiant de la structure est le HAL structId_i. Si le champ identifiant de la collection, est renseigné, l\'identifiant HAL de la structure ne sera pas considéré.'),
        '#default_value' => (! empty ( $config->hal_struct_id )) ? $config->hal_struct_id : ''
			];

      /****************************************************
          Retrieval method - Publications par auteur.e.s
       *****************************************************/
      $form['readonly'] = array(
        '#type'=>'textarea',
        '#attributes' => array('readonly' => 'readonly'),
        '#default_value' =>'La liste des publications doit être renseignée DANS LES FICHES AUTEUR. Ne renseignez ici que les champs Affichage qui déterminent la façon dont les publications s\'affichent dans les fiches auteur.',
        '#states' => array(
          'visible' => array(
            ':input[name="retrieval_method_select"]' => array('value' => 'by_user_fields'),
          ),
        ),

      );

      /****************************************************
                      Filtres
       *****************************************************/

      $external_link = t('Vous pouvez filtrer le type de document à afficher dans le bloc. Un type de document par ligne. <a href="@hal-doctypes" target="_blank">Voir la liste des types de documents HAL (docTypes)</a>.', array('@hal-doctypes' => 'https://api.archives-ouvertes.fr/ref/doctype'));
      $form ['filters'] ['docType_s'] = array (
					'#type' => 'textarea',
					'#title' => t('Filtres'),
          '#states' => array(
            // Only show this field when the 'toggle_me' checkbox is enabled.
            'visible' => array(
              ':input[name="retrieval_method_select"]' => array('value' => 'by_multi_hal_attributes'),
            ),
          ),
        '#description' => t ($external_link),
        '#default_value' => (! empty ( $config->docType_s )) ? $config->docType_s : ''
			);


      /****************************************************
                    Affichage
       *****************************************************/
			$form ['display'] = array (
					'#type' => 'fieldset',
					'#title' => t ( 'Affichage' )
			);

      /****************************************************
                    Affichage - Champs à afficher
       *****************************************************/
      /****************Début popup text***************/

      $internal_link = t('Listez ici les champs qui apparaîtront dans la fiche de chaque publication. <b>Attention, le champ halId_s est obligatoire</b> <a href="@help-page" target="blank">Voir le module d\'aide - Chapitre Liste des champs HAL</a>', array('@help-page' => url('admin/help/amu_hal')));
      $form ['display'] ['displayed_fields'] = array (
					'#type' => 'textarea',
					'#title' => t('Champs à afficher'),
          '#description' => t ($internal_link),
          '#default_value' => (! empty ( $config->displayed_fields ) && '' != $config->displayed_fields) ? $config->displayed_fields : 'title_s,en_title_s,docid,label_s,en_label_s,docType_s,authIdHal_s,halId_s,structId_i,uri_s,keyword_s,en_keyword_s,authLastNameFirstName_s,journalTitle_s,abstract_s,en_abstract_s'

			);

      /****************************************************
                   Affichage - Type d'affichage
       *****************************************************/
//      $mode_affichage_popup_text='[popup title="Type d\'affichage"  activate=click effect=fade width=500   origin=top-right expand=bottom-right close text="Academic display est un affichage sous forme de <strong>liste</strong>. Fancy display est un affichage sous forme de <strong>cartes</strong> colorées."] ';
//      $title8 = check_markup($mode_affichage_popup_text,'popup_tags');
			$form ['display'] ['display_mode'] = array (
					'#type' => 'select',
					'#title' => t ( 'Type d\'affichage'),
					'#description' => t ( 'Academic display est un affichage sous forme de <strong>liste</strong>. Fancy display est un affichage sous forme de cartes colorées.' ),
					"#options" => array (
							'academic_display' => t ( 'academic display' ),
							'fancy_display' => t ( 'fancy display' )
					),
					'#default_value' => variable_get ( 'display_mode' . $instanceSuffix, '' )
			);
				
			break;

	}
	return $form;
}



/**
 *
 *  TODO check up module default values and how they are used
 *
 */
function form_admin_hal($form, &$form_state) {
	$hal_last_pub_rows = variable_get ( 'hal_last_pub_rows', 5 );
	$hal_collection_id = variable_get ( 'hal_collection_id', "" );
	$hal_date_start = variable_get ( 'hal_date_start', '2000' );
	$hal_struct_id = variable_get ( 'hal_struct_id', '' );

	

	
	$form ['collection_id'] = array (
			'#type' => 'textfield',
			'#title' => t ( 'Identifiant HAL de la Collection du laboratoire' ),
			'#description' => t ( 'ex: LPC, DICE ' ),
			'#default_value' => $hal_collection_id
	);

	$form ['struct_id'] = array (
			'#type' => 'textfield',
			'#title' => t ( 'Identifiant HAL du laboratoire' ),
			'#description' => t ( 'ex: 182200 ' ),
			'#default_value' => $hal_struct_id
	);

	$form ['date_start'] = array (
			'#type' => 'textfield',
			'#title' => t ( 'Date Début Dépôt' ),
			'#description' => t ( 'Date (année) pour laquelle des données sont ccnsultable sur HAL' ),
			'#default_value' => $hal_date_start
	);

	$form ['last_pub_rows_count'] = array (
			'#type' => 'textfield',
			'#title' => t ( 'Dernières publications' ),
			'#description' => t ( 'Nombre de publications à afficher dans le bloc Dernières publications' ),
			'#default_value' => $hal_last_pub_rows
	);
	
	$form ['submit'] = array (
			'#type' => 'submit',
			'#value' => t ( 'Enregistrer' ),
			'#submit' => array (
					'_amu_hal_update_submit'
			)
	);
	
	$form ['documentation'] = array (
			'#type' => 'textarea',
			'#title' => t ( 'Documentation' ),
			'#disabled' =>true,
			'#default_value' =>variable_get('documentation'),
			'#rows' => 50
	);



	if (! empty ( $form_state ['result'] )) {
		$form ['result'] = array (
				'#markup' => render ( $form_state ['result'] )
		);
	}

	return $form;
}

function _amu_hal_update_submit($form, &$form_state) {
	$form_state ['rebuild'] = TRUE;

	try {

		variable_set ( 'hal_last_pub_rows', $form_state ['values'] ['last_pub_rows_count'] );
		variable_set ( 'hal_collection_id', $form_state ['values'] ['collection_id'] );
		variable_set ( 'hal_date_start', $form_state ['values'] ['date_start'] );
		variable_set ( 'hal_struct_id', $form_state ['values'] ['struct_id'] );

		$form_state ['result'] = array (
				'#markup' => '<h3>Modifications enregistrées avec succès</h3>'
		);
	} catch ( Exception $e ) {
		drupal_set_message ( $e, "error" );
	}
}
