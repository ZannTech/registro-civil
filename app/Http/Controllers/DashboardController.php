<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

function ajaxResponse($text, $success = true)
{
    if ($success == true) {
        echo json_encode(['message' => $text, 'success' => true]);
    } else {
        echo json_encode(['message' => $text, 'error' => true]);
    }
}

class DashboardController extends Controller
{
    public function index()
    {
        return $this->matrimonio();
    }
    public function nacimiento()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', [
            'type' => 'acta_nacimiento',
            'name' => 'nacimiento',
            'data' => $this->getDetail('acta_nacimiento')

        ]);
    }
    public function defuncion()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', [
            'type' => 'acta_defuncion',
            'name' => 'defuncion',
            'data' => $this->getDetail('acta_defuncion')
        ]);
    }
    public function matrimonio()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', [
            'type' => 'acta_matrimonio',
            'name' => 'matrimonio',
            'data' => $this->getDetail('acta_matrimonio')
        ]);
    }
    public function getDetail($type){
        return DB::select("SELECT * FROM $type");
    }
    public function genCrud(Request $request){
        $type  = $request->post('type');
        $method = $request->post('method');
        switch($type){
           
            case 'acta_nacimiento':
                $nro = $request->post('nro');
                $nombre_completo = $request->post('nombre_completo');
                $nombre_padre = $request->post('nombre_padre');
                $nombre_madre = $request->post('nombre_madre');
                $id = $request->post('id');

                if($id == ''){
                    $c = DB::insert("INSERT INTO $type (id, nro, nombre_completo, nombre_padre, nombre_madre, fecha_registro, status)
                    VALUES(null, ?, ?, ?, ?, ?, ?)", [
                        $nro,$nombre_completo, $nombre_padre, $nombre_madre, date('Y-m-d H:i:s'), 'a'
                    ]);
                    ajaxResponse("Dato insertado correctamente", true);
                }else{
                    $id = $request->post('id');
                    $c = DB::selectOne("SELECT * FROM $type WHERE id = ?", [$id]);
                    DB::update("UPDATE $type set nombre_completo = ?, nombre_padre = ?, nombre_madre = ? WHERE id = ?", [$nombre_completo, $nombre_padre, $nombre_madre, $id]);
                    ajaxResponse("Dato actualizado correctamente", true);

                }
            break;
            case 'acta_matrimonio':
                $nro = $request->post('nro');
                $nombre_mujer = $request->post('nombre_mujer');
                $id = $request->post('id');

                $nombre_hombre = $request->post('nombre_hombre');
                if($id == ''){
                    $c = DB::insert("INSERT INTO $type (id, nro, nombre_hombre, nombre_mujer, fecha_registro, status)
                    VALUES(null, ?, ?, ?, ?, ?)", [
                        $nro,$nombre_hombre, $nombre_mujer, date('Y-m-d H:i:s'), 'a'
                    ]);
                    ajaxResponse("Dato insertado correctamente", true);

                }else{
                    $c = DB::selectOne("SELECT * FROM $type WHERE id = ?", [$id]);
                    DB::update("UPDATE $type set nombre_hombre = ?, nombre_mujer = ? WHERE id = ?", [$nombre_hombre, $nombre_mujer, $id]);
                    ajaxResponse("Dato actualizado correctamente", true);

                }
            break;
            case 'acta_defuncion':
                $nro = $request->post('nro');
                $id = $request->post('id');
                $nombre_completo = $request->post('nombre_completo');
                if($id == ''){
                    $c = DB::insert("INSERT INTO $type (id, nro,fecha, nombre_completo, status)
                    VALUES(null, ?, ?, ?, ?)", [
                        $nro, date('Y-m-d H:i:s') ,$nombre_completo,'a'
                    ]);
                    ajaxResponse("Dato insertado correctamente", true);

                }else{
                    $c = DB::selectOne("SELECT * FROM $type WHERE id = ?", [$id]);
                    DB::update("UPDATE $type set nombre_completo = ? WHERE id = ?", [$nombre_completo, $id]);
                    ajaxResponse("Dato actualizado correctamente", true);

                }
            break;
        }
      
    }
    public function addRectificacion($table, $id_field, $changed_value, $old_data){

    }
    public function deleteRow(Request $request){
        $type  = $request->post('type');
        $id = $request->post('id');
        DB::delete("DELETE FROM $type WHERE id = ?", [$id]);
        ajaxResponse("Dato eliminado correctamente", true);

    }
    public function getField(Request $request){
        $id = $request->post('id');
        $type  = $request->post('type');

       return DB::selectOne("SELECT * FROM $type WHERE id = ?", [$id]);

            
    }
}
