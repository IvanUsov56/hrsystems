<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\Delivery;
use App\Models\Warehouse;
use Illuminate\Http\Client\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse = Warehouse::all();

        return view('delivery.create',compact('warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryRequest $request)
    {
        $validated = $request->validated();

        Delivery::create($validated);
        return redirect('/')->with('status', 'Поставка создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        if ($delivery->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Запись успешно удалена',
                'data' => ['deletedId' => $delivery]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при удалении записи'
            ], 500); // HTTP статус код ошибки
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySelected(\Illuminate\Http\Request $request)
    {

        Delivery::whereIn('id',$request['delivery_selected'])->delete();
        return redirect('/')->with('status', 'Поставки успешно удалены!');
    }
}
