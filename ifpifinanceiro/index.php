<?php
require_once('./controllers/financialController.php');

$controller = new FinancialController();

$allowedActions = ['index', 'insert', 'delete'];

$action = $_GET['action'] ?? 'index';

if (!in_array($action, $allowedActions)) {
    echo "Ação não permitida.";
    exit();
}

switch ($action) {
    case 'index':
        $controller->getAll();
        break;
    case 'insert':
        $controller->insert();
        break;
    case 'delete':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $controller->delete();
        } else {
            echo "ID inválido para exclusão.";
        }
        break;
    default:
        echo "Ação não encontrada.";
        break;
}
?>