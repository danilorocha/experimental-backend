<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;
use App\Models\NumberType;

class NumberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index() {
        $numbers = Number::with('numberType')->get();

        $numberTypes = NumberType::select('id as type_id','description')->get();
        $parametrizedNumberType = array();

        foreach($numberTypes as $numberType){
            $parametrizedNumberType[$numberType['type_id']] = $numberType['description']; 
        }

        $numberList = Number::with('numberType')->orderBy('id', 'desc')->get();

        return view('home', ['numberTypes' => $parametrizedNumberType, 'numberList' => $numberList]);
    }

    public function store(Request $request) {
        $numberStore = [
            'type_id' => $request->type_id,
            'value' => $request->number_value ? $request->number_value : 0 
        ];

        $status = Number::create($numberStore) ? 'Número adicionado com sucesso!' : 'Erro ao adicionar número.';

        $numberList = Number::with('numberType')->orderBy('id', 'desc')->get();

        return back()->withInput(['numberList' => $numberList])->with('status', $status);
    }

    public function update(Request $request, $id) {
        $inputs = $request->all();
        $number = Number::find($id);

        if(!$number){
            $status = 'Esse número não existe.';

        }else{
            $number->fill($inputs);

            $number->save();

            $status = 'Número atualizado com sucesso!';
        }

        return back()->with('status', $status);
    }

    public function destroy($id) {
        $number = Number::find($id);

        if(!$number){
            $status = 'Esse número não existe.';

        }else{
            $number->delete();
            $status = 'Número removido com sucesso!';
        }

        $numberList = Number::with('numberType')->orderBy('id', 'desc')->get();

        return back()->with('status', $status);
    }
}