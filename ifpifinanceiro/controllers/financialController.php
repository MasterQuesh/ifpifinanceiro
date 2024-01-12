<?php
require_once('./models/FinancialModel.php');

class FinancialController
{
    private $model;

    public function __construct()
    {
        $this->model = new FinancialModel();
    }

    public function getAll()
    {
        $resultData = $this->model->getAll();
        $resume = $this->model->getBalance();
        require_once('./views/index.php');
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['description'], $_POST['value'], $_POST['type_id'])) {
                $data = array(
                    'description' => $_POST['description'],
                    'value' => $_POST['value'],
                    'type_id' => $_POST['type_id']
                );

                $this->model->create($data);
                header('Location: ./index.php');
            } else {
                echo "Campos do formulário não definidos corretamente.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->delete($id);
            header('Location: ./index.php');
        } else {
            echo "ID não especificado para exclusão.";
        }
    }
}
?>