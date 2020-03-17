<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model_Ingressos;
use App\Models\Model_Event;
use App\Models\Model_Client;
Use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;

class IngressoController extends Controller
{
    private $objIngressos;
    private $objUser;
    private $objEvent;
    private $objClient;

    public function __construct(){
        $this->objUser = new User();
        $this->objIngressos = new Model_Ingressos();
        $this->objEvent = new Model_Event();
        $this->objClient = new Model_Client();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            if(!isset($ingressos))
                $ingressos = $this->objIngressos->all();
            return view('ingressos', compact('ingressos'));
        }
        else{
            return Redirect::to("login")->withSuccess('Opps! Você não tem acesso!!');
        }
    }

    public function busca(Request $request){
        $ingressos = Model_Ingressos::where($request->choice, 'LIKE', '%'. $request->search .'%')->get();  
        return view('ingressos', compact('ingressos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = $this->objEvent->all();
        $clients = $this->objClient->all();
        return view('cadastrarIngresso', compact('events', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventSelected = DB::table('events')->where('categoria', $request->categoria)->first();
        $this->objIngressos->create([
            'categoria' => $request->categoria,
            'client_id' => $request->clientChoice,
            'event_id' => $eventSelected->id,
            'descricao' => $request->descricao,
            'price' => $request->price,
            'paid' => '1'
        ]);
        $ingressos = $this->objIngressos->all();
        return view('ingressos', compact('ingressos'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingresso = $this->objIngressos->find($id);
        return view('ingressodata', compact('ingresso'));
        //echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingresso = $this->objIngressos->find($id);
        $clientName = $this->objClient->where(['id'=>$id])->first()->name;
        $events = $this->objEvent->all();
        $clients = $this->objClient->all();
        return view('cadastrarIngresso', compact('ingresso', 'clientName', 'events', 'clients'));
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
        $eventSelected = $this->objEvent->where(['categoria'=>$request->categoria])->first();        
        $this->objIngressos->where(['id'=>$id])->update([
            'categoria' => $request->categoria,
            'client_id' => $request->clientChoice,
            'event_id' => $eventSelected->id,
            'descricao' => $request->descricao,
            'price' => $request->price,
            'paid' => '1'
        ]);
        $ingressos = $this->objIngressos->all();
        return view('ingressos', compact('ingressos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objIngressos->destroy($id);
        return($del)?"sim":"não";
    }
}
