<?php
class Dossier extends AppModel
{
     public $displayField='vehicle_id';
    public $hasMany=array('Trip');
}