<?php

namespace App;

/**
 * __NAMESCPACE__ = namespace courant
 * __DIR__ =  dossier courant
 * Class Autoloader
 * @package App
 */
class Autoloader {
    /**
     * chargement dynamiques des classe
     * Enregistre notre autoloader
     */
    static function register() {
        try {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        } catch (\Exception $e) {
            echo "Erreur dans l'autoload :" . $e->getMessage();
        }
    }

    /**
     * @param $class
     */
    static function autoload($class) {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require_once __DIR__ . '/' . $class . '.php';
        }
    }
}