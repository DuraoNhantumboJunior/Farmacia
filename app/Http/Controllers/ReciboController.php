<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReciboController extends Controller
{
    public function gerarRecibo($id)
    {
        // Simulação de dados do recibo
        $recibo = [
            'empresa' => 'Farmacia Algrave',
            'logotipo' => 'path_to_logo/farmacia_logo.png', // Caminho para o logo
            'cliente' => 'Durão Nhantumbo Junior',
            'numero_recibo' => '100',
            'data_recibo' => now()->format('d/m/Y'),
            'itens' => [
                ['descricao' => 'cao', 'preco_unitario' => 8000, 'quantidade' => 1],
                ['descricao' => 'pato', 'preco_unitario' => 1000, 'quantidade' => 1],
            ],
            'total' => 9000,
            'termos' => 'O pagamento tem de ser feito dentro de 15 dias.',
        ];

        // Carregar a view com os dados
        $pdf = PDF::loadView('recibo', compact('recibo'));

        // Retornar o PDF para download
        return $pdf->stream('recibo.pdf');
    }
}
