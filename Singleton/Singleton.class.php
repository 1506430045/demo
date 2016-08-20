<?php
namespace Singleton;

class Singleton
{
    private static $_instance;
    private $pdo;

    private function __construct($host, $user, $pass, $dbname)
    {
        $dsn = "mysql:host=127.0.0.1;dbname=testdb";
        $this->pdo = new \PDO($dsn, $user, $pass, []);
    }

    public function __clone()
    {
        echo "can't clone";
    }

    public static function getInstance($host, $user, $pass, $dbname)
    {
        if (!isset(self::$_instance) || !(self::$_instance instanceof self)) {
            self::$_instance = new self($host, $user, $pass, $dbname);
        }
        return self::$_instance;
    }

    /**
     * @param $sql
     * @param array $input
     * @return array
     */
    public function getAll($sql, $input = [])
    {
        $re = [];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($input);
            $re = $stmt->fetchAll();
        } catch (\Exception $e) {
            trigger_error($e->getMessage());
        }
        return $re;
    }

    /**
     * @param $sql
     * @param array $input
     * @return array|mixed
     */
    public function getOne($sql, $input = [])
    {
        $re = [];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($input);
            $re = $stmt->fetch();
        } catch (\Exception $e) {
            trigger_error($e->getMessage());
        }
        return $re;
    }
}