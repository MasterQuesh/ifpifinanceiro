<?php
require_once('./configuration/connect.php');
class FinancialModel extends Connect
{
    private $db;

    function __construct()
    {
        parent::__construct();
        $this->db = 'financial';
    }

    public function getAll()
    {
        $stmt = $this->connection->query("
            SELECT 
                financial.id as financial_id,
                financial.description,
                financial.value,
                financialtype.type as type_name
            FROM 
                financial
            INNER JOIN 
                financialtype ON financial.type_id = financialtype.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getBalance()
    {
        $sqlSelect = $this->connection->query("
            SELECT 
                SUM(value) as total
            FROM 
                financial
            WHERE 
                type_id = 1
        ");
        $result = $sqlSelect->fetch();
        $totalIn = $result['total'];

        $sqlSelect = $this->connection->query("
            SELECT 
                SUM(value) as total
            FROM 
                financial
            WHERE 
                type_id = 2
                ");

        $result = $sqlSelect->fetch();
        $totalOut = $result['total'];

        $total = $totalIn - $totalOut;

        return array(
            'totalIn' => $totalIn,
            'totalOut' => $totalOut,
            'total' => $total
        );
    }

    public function create($data)
    {
        $stmt = $this->connection->prepare("INSERT INTO financial (description, value, type_id) VALUES (?, ?, ?)");
        $stmt->execute([$data['description'], $data['value'], $data['type_id']]);
    }

    public function delete($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM financial WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>