<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelStoreRequest;
use App\Http\Requests\ParcelUpdateRequest;
use App\Models\Parcel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ParcelController extends Controller
{
    public function store(ParcelStoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $parcel = Parcel::create($validatedData);

        return response()->json([
            'message' => 'Parcel created successfully!',
            'parcel' => $parcel
        ]);
    }

    public function update(Parcel $parcel, ParcelUpdateRequest $request): JsonResponse
    {
        $parcel->update($request->validated());

        return response()->json(['parcel' => Parcel::find($parcel->id)]);
    }
}
