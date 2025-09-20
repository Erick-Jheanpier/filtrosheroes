<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Spipu\Html2Pdf\Html2Pdf;

class SuperheroeController extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $publishers = $this->db->query("
            SELECT id, IFNULL(publisher_name, '') AS publisher_name 
            FROM publisher
        ")->getResultArray();

        return view('superheroes_view', [
            'publishers' => $publishers
        ]);
    }

    public function getByPublisher()
    {
        $publisher_id = $this->request->getPost('publisher_id');
        if ($publisher_id === '') {
            $publisher_id = null; // para traer todos
        }

        $heroes = $this->db->query("CALL sp_get_superheroes(?)", [$publisher_id])->getResultArray();

        $publishers = $this->db->query("
            SELECT id, IFNULL(publisher_name, '') AS publisher_name 
            FROM publisher
        ")->getResultArray();

        return view('superheroes_view', [
            'publishers'   => $publishers,
            'heroes'       => $heroes,
            'publisher_id' => $publisher_id
        ]);
    }
    public function exportPdf($publisher_id)
{
    if ($publisher_id == 0) {
        $publisher_id = null;
    }

    // Obtener datos
    $heroes = $this->db->query("CALL sp_get_superheroes(?)", [$publisher_id])->getResultArray();

    // Renderizar vista como string
    $html = view('superheroes_pdf', ['heroes' => $heroes]);

    // Limpiar cualquier salida previa
    if (ob_get_length()) {
        ob_end_clean();
    }

    // Generar PDF
    $pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'es');
    $pdf->writeHTML($html);

    // Forzar cabeceras correctas y mostrar en visor
    $this->response->setHeader('Content-Type', 'application/pdf');
    $pdf->output('superheroes.pdf', 'I');
}

}
