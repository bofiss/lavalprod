<?php

use App\Core\Model\Model;
/*
 * Gestion des données utilisateur
 */
class Lesson extends Model
{

    public function __contruct()
    {
        parent::__construct('tlessons');
    }
}