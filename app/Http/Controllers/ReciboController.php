<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
 use App\Services\Recibo;

class ReciboController extends Controller
{
    public function gerarRecibo()
    {
        // Criar uma instância do recibo
        $recibo = new Recibo(
            '00123',
            now()->format('d/m/Y'),
            'João Manuel',
            1500.00,
            'Pagamento de medicamentos'
        );

        // Gerar o PDF em formato A4 horizontal
        $pdf = PDF::loadView('recibo', compact('recibo'))
                  ->setPaper('a4', 'landscape'); // Define papel A4 em horizontal

        return $pdf->stream('recibo.pdf');
    }
}
?>