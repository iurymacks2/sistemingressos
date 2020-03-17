<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model_Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;

class ClientController extends Controller
{

    private $objClient;

    public function __construct(){
        $this->objClient = new Model_Client();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->objClient = new Model_Client();
        if (Auth::check()) {
            // The user is logged in...
            $clients = $this->objClient->all();
            //dd($clients);
            return view('clients', compact('clients'));
        }
        else{
            return Redirect::to("login")->withSuccess('Opps! Você não tem acesso!!');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastrarCliente');
        //return view('create', compact('events', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->objClient->create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf
        ]);
        $clients = $this->objClient->all();
        return view('clients', compact('clients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = $this->objClient->find($id);
        return view('clientdata', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = $this->objClient->find($id);
        return view('cadastrarCliente', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objClient->where(['id'=>$id])->update([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf
        ]);
        $clients = $this->objClient->all();
        return view('clients', compact('clients'));
        //dd($request);
        //return redirect('clients', compact('clients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objClient->destroy($id);
        return($del)?"sim":"não";
    }
}
