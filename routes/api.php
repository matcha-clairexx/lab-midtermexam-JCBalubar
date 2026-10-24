<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/create', function (Request $request) {
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    return response()->json([
        'token' => $user->createToken('school-token')->plainTextToken,
    ]);
});

Route::middleware('auth:sanctum')->get('/students', function () {
    return \App\Models\Student::with('course')->get()->map(function ($student) {
        return [
            'id' => $student->id,
            'name' => $student->name,
            'email' => $student->email,
            'course' => [
                'id' => $student->course?->id,
                'name' => $student->course?->name,
            ],
            'user_id' => $student->user_id,
        ];
    });
});
