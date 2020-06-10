<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Serie;
use App\Temporada;
use App\Episodio;


use App\Http\Requests\seriesFormRequest;
use App\Services\CriadorDeSerie;

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


    }


    public function store(seriesFormRequest $request,CriadorDeSerie $criadorDeSerie){




    //$nome = $request->nome;

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

     $request->session()->flash(
             'mensagem',
             "serie {$serie->id} criada com sucesso {$serie->nome}"
     );

     return redirect()->route('listar_series');
    }

    public function destroy(Request $request){

        $serie = Serie::find($request->id);
        $nomeSerie = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function(Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();

        });
        $serie->delete();

        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            "Série removida com sucesso"
            );

            return redirect()->route('listar_series');
        }

}









