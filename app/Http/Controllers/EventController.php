<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model_Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;

class EventController extends Controller
{

    private $objEvent;

    public function __construct(){
        $this->objEvent = new Model_Event();
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
            $events = $this->objEvent->all();
            //dd($clients);
            return view('events', compact('events'));
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
        return view('cadastrarEvento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->objEvent->create([
            'cidade' => $request->cidade,           
            'categoria' => $request->categoria,
            'date_event' => $request->date_event,
            'name' => $request->name
        ]);
        $events = $this->objEvent->all();
        return view('events', compact('events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->objEvent->find($id);
        return view('eventdata', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->objEvent->find($id);
        return view('cadastrarEvento', compact('event'));
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
        $this->objEvent->where(['id'=>$id])->update([
            'cidade' => $request->cidade,           
            'categoria' => $request->categoria,
            'date_event' => $request->date_event,
            'name' => $request->name
        ]);
        $events = $this->objEvent->all();
        //return view('clients', compact('clients'));
        //dd($request);
        return view('events', compact('events'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objEvent->destroy($id);
        return($del)?"sim":"não";
    }
}
