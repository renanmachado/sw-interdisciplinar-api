<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::get(); 
        return response()->json(['status' => 'success','result' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = \Validator::make($data, [
            'name' => 'required',
            'cpf' => 'required|unique:clients',
            'cep' => 'required|unique:clients',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->messages()]);
        }

        if (Client::create($request->all())) {
            return response()->json(['status' => 'success', 'msg' => 'Salvo com sucesso!']);
        } else {
            return response()->json(['status' => 'fail', 'error' => [0 => 'Erro ao salvar']]);
        }
    }
}