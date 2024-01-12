<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <title>IFPI Financeiro</title>
</head>

<body>
    <div class="title">
        <h2>Controle Financeiro</h2>
        <span class="user">Bem vindo, Usuário</span>
    </div>

    <div class="resume">
        <div class="card">
            <div class="card-title">
                Entradas
            </div>
            <span class="card-value">
                <?= 'R$ ' . number_format($resume['totalIn'] ?? 0, 2, ',', '.') ?>
            </span>
        </div>

        <div class="card">
            <div class="card-title">
                Saídas
            </div>
            <span class="card-value">
                <?= 'R$ ' . number_format($resume['totalOut'] ?? 0, 2, ',', '.') ?>
            </span>
        </div>

        <div class="card">
            <div class="card-title">
                Total
            </div>
            <span class="card-value">
                <?= 'R$ ' . number_format($resume['total'] ?? 0, 2, ',', '.') ?>
            </span>
        </div>
    </div>

    <div class="form">
        <form action="?action=insert" method="POST">
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="value">Valor</label>
                <input type="number" name="value" id="value" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type_id">Tipo</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    <option value="">Selecione</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">ADICIONAR</button>
            </div>
        </form>
    </div>

    <div class="container-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($resultData as $financial): ?>
                    <tr>
                        <td>
                            <?= $financial['description'] ?>
                        </td>
                        <td>
                            <?= 'R$ ' . number_format($financial['value'], 2, ',', '.') ?>
                        </td>
                        <td>
                            <?= $financial['type_name'] ?>
                        </td>
                        <td>
                            <a href="?action=delete&id=<?= $transaction['id'] ?>"
                                onclick="return confirm('Tem certeza que deseja excluir esta transação?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #008081;
            position: relative;
            width: 100%;
            padding-top: 20px;
            padding-bottom: 100px;
        }

        .title h2 {
            padding: 10px;
            color: #fff;
        }

        .title .user {
            position: absolute;
            right: 10px;
            color: #fff;
        }

        .resume {
            z-index: 15;
            margin-top: -50px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 50px;
        }


        .card {
            z-index: 15;
            width: 100%;
            height: 120px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin: 0 10px;
            gap: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: 500;
            color: #000;
        }

        .card-value {
            font-size: 30px;
            font-weight: 700;
            color: #008081;
        }

        .form {
            margin-top: 50px;
            padding: 0 60px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 20px;
            gap: 15px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: 500;
            color: #000;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 40px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 0 10px;
            margin-top: 10px;
        }

        .form-group button {
            height: 40px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 0 10px;
            margin-top: 10px;
            background-color: #008081;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #006666;
        }

        .form-group button:active {
            background-color: #004d4d;
        }

        .form-group button:focus {
            outline: none;
        }

        .container-table {
            margin-top: 50px;
            padding: 0 60px;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #ccc;
        }

        .table td {
            text-align: center;
        }
    </style>

</body>

</html>