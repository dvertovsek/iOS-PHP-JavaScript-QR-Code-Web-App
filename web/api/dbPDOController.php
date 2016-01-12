<?php

    define('DB_HOST', getenv('OPENSHIFT_POSTGRESQL_DB_HOST'));
    define('DB_PORT', getenv('OPENSHIFT_POSTGRESQL_DB_PORT'));
    define('DB_USER', getenv('OPENSHIFT_POSTGRESQL_DB_USERNAME'));
    define('DB_PASS', getenv('OPENSHIFT_POSTGRESQL_DB_PASSWORD'));
    define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));

    class Db
    {

      private static $instance;

      public static function getDBInstance(){
        if (self::$instance == null)
        {
            self::$instance = self::initiatePDOObject();
        }

        return self::$instance;
      }

      private function initiatePDOObject()
      {
        $dsn = 'pgsql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
        $dbh = new PDO($dsn, DB_USER, DB_PASS);
        return $dbh;
      }

    }
?>
