<?php
namespace Model\Core;

class Adapter
{
    private $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'ecommerce'
    ];

    private $connect = null;

    public function connection()
    {
        $connect = new \mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
        $this->setConnect($connect);
        if (!$connect) {
            return false;
        }
        return true;
    }
    public function getConnect()
    {
        return $this->connect;
    }
    public function setConnect(\mysqli $connect)
    {
        $this->connect = $connect;
        return $this;
    }
    public function insert($sql)
    {

        if (!$this->isConnected()) {
            $this->connection();
        }

        $result = $this->getConnect()->query($sql) or $this->error($this->getConnect()->errno, $this->getConnect()->error, $sql);

        if (!$result) {
            echo "not able";
        }
        return $this->getConnect()->insert_id;
    }
    function error($errno, $error, $sql)
    {
        echo "<div style='background-color:#faa'>";
        echo "<h4 style='background-color:#f00'>" . $errno . "-" . $error . "</h4>";
        echo $sql;
        echo "</div>";
        exit;
    }
    public function update($query)
    {
        if (!$this->getConnect()) {
            $this->connection();
        }
        if (!$this->getConnect()->query($query)) {
            return false;
        }

        return true;
    }
    public function isConnected()
    {
        if (!$this->getConnect()) {

            return false;
        }
        return true;
    }
    public function fetchAll($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (!$rows) {
            return false;
        }
        return $rows;
    }

    public function fetchPairs($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all();
        if (!$rows) {
            return [];
        }
        $columns = array_column($rows, '0');
        $values = array_column($rows, '1');

        return array_combine($columns, $values);
    }
    public function fetchRow($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $row = $result->fetch_assoc();

        if (!$row) {
            return false;
        }
        return $row;
    }
    public function delete($query)
    {
        if (!$this->getConnect()) {
            $this->connection();
        }
        if (!$this->getConnect()->query($query)) {
            return false;
        }
        return true;
    }


}
?>