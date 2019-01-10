<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $stores = Store::paginate(18);
        $stores = DB::table('stores')->orderBy('created_at', 'DESC')->paginate(18);
        return view('stores.index', ['stores' => $stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->validate([
        'name'=>'required|max:255',
        'address'=> 'required|String',
        'phone_number'=> 'required',
        'rate'=> 'required|integer|max:5',
        'website'=> 'required|URL',
      ]);
      $store = tap(new Store($data))->save();
      return redirect('/store')->with('success', 'Store has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Store::find($id);
        return view('stores.show', ['item' => $item]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);

        return view('stores.edit', compact('store'));
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
      $data = $request->validate([
        'name'=>'required|max:255',
        'address'=> 'required|String',
        'phone_number'=> 'required',
        'rate'=> 'required|integer|max:5',
        'website'=> 'required|URL',
      ]);

      $updatedStore = Store::find($id);
      $updatedStore->fill($data)->save();
      return redirect()->route('store.show', ['id'=> $id])->with('success', 'Store has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect('/store')->with('success', 'Store has been added');
    }
}
