<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $datos['clients']=Clients::paginate(1);

        return view('clients.index',$datos);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Names'=>'required|string|max:100',
            'LastName'=>'required|string|max:100',
            'Address'=>'required|string|max:100',
            'Cellphone'=>'required|string|max:100',
            'Email'=>'required|email',
            'Photo'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Message=['required'=>'The :attribute is required'];
        
        $this->validate($request,$campos,$Message);
        
        //$datosClient=request()->all();

        $datosClient=request()->except('_token');

        if($request->hasFile('Photo')) {

            $datosClient['Photo']=$request->file('Photo')->store('uploads','public');
        }

        Clients::insert($datosClient);

        //return response()->json($datosClient);
        return redirect('clients')->with('Message','Client added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client= Clients::findOrFail($id);

        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Names'=>'required|string|max:100',
            'LastName'=>'required|string|max:100',
            'Address'=>'required|string|max:100',
            'Cellphone'=>'required|string|max:100',
            'Email'=>'required|email',
            
        ];
       
        if($request->hasFile('Photo')) {
        
            $campos+=['Photo'=>'required|max:10000|mimes:jpeg,png,jpg'];
            
        }
        $Message=['required'=>'The :attribute is required'];
        
        $this->validate($request,$campos,$Message);
        

        $datosClient=request()->except(['_token','_method']);

        
        if($request->hasFile('Photo')) {

            $client= Clients::findOrFail($id);

            Storage::delete('public/'.$client->Photo);

            $datosClient['Photo']=$request->file('Photo')->store('uploads','public');
        }

        Clients::where('id','=',$id)->update($datosClient);

        //$client= Clients::findOrFail($id);
        //return view('clients.edit',compact('client'));

        return redirect('clients')->with('Message','Client successfully modified');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $client= Clients::findOrFail($id);

       if(Storage::delete('public/'.$client->Photo)) {
        Clients::destroy($id);
       }

        return redirect('clients')->with('Message','Client removed');

    }
}
