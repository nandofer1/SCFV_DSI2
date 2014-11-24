<?php
class Trip extends AppModel
{//VALIDACION DE LOS CAMPOS
      
public $belongsTo=array('Dossier');

public $hasAndBelongsToMany = array(
		'Tool' => array(
			'className' => 'Tool',
			'joinTable' => 'cleaningtoolsuseds',
			'foreignKey' => 'trip_id',
			'associationForeignKey' => 'tool_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);



}