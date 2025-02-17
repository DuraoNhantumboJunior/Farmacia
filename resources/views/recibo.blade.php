<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo Farmacêutico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 120px;
        }
        .header h1 {
            margin: 10px 0 5px;
            font-size: 1.8em;
            color: #2c3e50;
        }
        .header p {
            color: #7f8c8d;
        }
        .details {
            margin-bottom: 20px;
        }
        .details th, .details td {
            padding: 5px;
            text-align: left;
        }
        .details th {
            color: #34495e;
        }
        .table-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table-items th, .table-items td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .table-items th {
            background-color: #2980b9;
            color: #fff;
        }
        .table-items tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-items tr:hover {
            background-color: #dff9fb;
        }
        .total {
            text-align: right;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #7f8c8d;
        }
        .footer p {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path($recibo['logotipo']) }}" alt="Farmacia Algrave">
            <h1>Farmacia Algrave</h1>
            <p>Saúde ao seu alcance</p>
        </div>

        <table class="details">
            <tr>
                <th>Cliente:</th>
                <td>{{ $recibo['cliente'] }}</td>
                <th>Nº Recibo:</th>
                <td>{{ $recibo['numero_recibo'] }}</td>
            </tr>
            <tr>
                <th>Data:</th>
                <td>{{ $recibo['data_recibo'] }}</td>
            </tr>
        </table>

        <table class="table-items">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recibo['itens'] as $item)
                <tr>
                    <td>{{ $item['descricao'] }}</td>
                    <td>{{ number_format($item['preco_unitario'], 2) }} MT</td>
                    <td>{{ $item['quantidade'] }}</td>
                    <td>{{ number_format($item['preco_unitario'] * $item['quantidade'], 2) }} MT</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total Geral: {{ number_format($recibo['total'], 2) }} MT
        </div>

        <div class="footer">
            <p><strong>Termos e Condições</strong></p>
            <p>{{ $recibo['termos'] }}</p>
            <p>Obrigado pela sua preferência!</p>
        </div>
    </div>
</body>
</html>
