<?php

    class Database {
        private static $instance = null;
        private $connection = null;

        const DB_HOST = 'localhost';
        const DB_USER = 'postgres';
        const DB_PASS = '1234';
        const DB_NAME = 'Biblioteka';

        private function __construct() {}

        /**
         * @return Database
         */
        public static function getInstance()
        {
            if (is_null(static::$instance)) {
                static::$instance = new Database();
            }

            return static::$instance;
        }

        /**
         * @return PDO
         */
        private function getConnection()
        {
            if (is_null($this->connection)) {
                $dbName = self::DB_NAME;
                $dbHost = self::DB_HOST;

                $this->connection = new PDO("pgsql:host=$dbHost;dbname=$dbName", self::DB_USER, self::DB_PASS);
            }

            return $this->connection;
        }

        public function query($sql, $params = [])
        {
            try {
                $connection = self::getConnection();

                $prepareQuery = $connection->prepare($sql);
                $prepareQuery->execute($params);
            } catch (Exception $e) {
                die('Во время выполнения запроса произошла ошибка: ' . $e->getMessage());
            } finally {
                return $prepareQuery;
            }
        }
    }