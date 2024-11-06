<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;


class LevelController extends Controller
{
    public function index()
    {
        return Level::all();
    }


    public function store(Request $request)
    {
        $level = Level::create($request->all());
        return response()->json($level, 201);
    }


    public function show(Level $level)
    {
        return Level::find($level);
    }


    public function update(Request $request, Level $level)
    {
        $level->update($request->all());
        return Level::find($level);
    }


    public function destroy(Level $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}



