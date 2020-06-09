<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Serie;


class seriesController extends Controller
{

public function index(Request $request, Response $response){
   
$series = Serie::query()->orderBy('nome')->get();

$mensagem = $request->session()->get('mensagem');

return view('series.index',compact('series','mensagem'));

//return response()->json($series);
}

public function criar(Request $request){
   
    
    
    return view('series.create');
    //['series' => $series]
    /* $html = "<ul>";
            foreach ($series as $serie){
                $html .="<li>$serie</li>";
            }
            $html .= "</ul>";
    
            return $html;
        } */

    }


    public function store(Request $request){
   
    $nome = $request->nome;
     $serie = Serie::create([
         'nome' => $nome
     ]);

     $request->session()->flash(
             'mensagem',
             "serie {$serie->id} criada com sucesso {$serie->nome}"
     );
         
       return redirect('/series');
    }

    public function destroy(Request $request){
   
        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            "Série removida com sucesso"
            );
    
        return redirect('/series');

        }

}









    