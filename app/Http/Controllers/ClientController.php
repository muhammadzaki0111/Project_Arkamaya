<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $client = Client::get();
        return view('client.index', [
            'tb_m_clients'=>$client
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name'=>'required',
            'client_address'=>'required'
        ]);
        $client = new Client();
        $client->client_name = $request -> input('client_name');
        $client->client_address = $request -> input('client_address');
        $client->save();

        return redirect('/client')->with('success','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('client.edit',[
            'tb_m_clients'=>Client::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'client_name' =>'required',
           'client_address' =>'required'
       ]);

       Client::where('id',$id)->update($validatedData);
       return redirect('/client')->with('pesan','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
    public function deleteSelected(Request $request)
    {
        $selectedClients = $request->input('selected_clients');

        if ($selectedClients) {
            // Lakukan penghapusan berdasarkan id yang terpilih
            Client::whereIn('id', $selectedClients)->delete();

            return redirect()->back()->with('success', 'Selected clients deleted successfully.');
        } else {
            return redirect()->back()->withErrors('No clients selected for deletion.');
        }
    }
}
