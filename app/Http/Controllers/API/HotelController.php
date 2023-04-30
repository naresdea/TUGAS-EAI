<?php

namespace App\Http\Controllers\API;

use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Hotel::all();

        if ($data) {
            return APIFormatter::createApi(200, 'Success, this is all data', $data);
        } else {
            return APIFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'deskripsi' => 'required',
                'lokasi' => 'required',
                'harga' => 'required',
                'cekkamar' => 'required'
            ]);

            $hotel = Hotel::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'harga' => $request->harga,
                'cekkamar' => $request->cekkamar
            ]);

            $data = Hotel::where('id', '=', $hotel->id)->get();
            
            if ($data) {
                return APIFormatter::createApi(200, 'Success, this is all data', $data);
            } else {
                return APIFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return APIFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Hotel::where('id', '=', $id)->get();

        if ($data) {
            return APIFormatter::createApi(200, 'Success, this is hotel data', $data);
        } else {
            return APIFormatter::createApi(400, 'Failed');
        }
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
        $hotel = Hotel::find($id);
        $hotel->update($request->all());
        return $hotel; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $hotel = Hotel::findOrFail($id);

            $data = $hotel->delete();

            if ($data) {
                return APIFormatter::createApi(200, 'Success destory Data');
            } else {
                return APIFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * 
     *  @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        try {
            $request->validate([
                'harga' => 'required',
            ]);


            $hotel = Hotel::findOrFail($id);

            $hotel->update([
                'harga' => $request->harga,
            ]);

            $data = Hotel::where('id', '=', $hotel->id)->get();

            if ($data) {
                return APIFormatter::createApi(200, 'Success update the room', $data);
            } else {
                return APIFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for check room.
     * 
     * @return \Illuminate\Http\Response
     */

    public function check(Request $request, $id)
    {
        try {
            $request->validate([
                'cekkamar' => 'required',
            ]);


            $hotel = Hotel::findOrFail($id);

            $hotel->update([
                'cekkamar' => $request->cekkamar,
            ]);

            $data = Hotel::where('id', '=', $hotel->id)->get();

            if ($data) {
                return APIFormatter::createApi(200, 'Success update the room', $data);
            } else {
                return APIFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createApi(400, 'Failed');
        }
    }

}
