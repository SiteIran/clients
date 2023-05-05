<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function store(Request $request)
    {
        // اعتبارسنجی داده‌های درخواستی
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'mobile' => 'required|mobile|unique:clients,mobile',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->mobile = $request->mobile;
        $client->save();

        return response()->json($client);
    }

    public function show($id)
    {
        $clinet = Client::find($id);
        return response()->json($clinet);
    }

    public function update(Request $request, $id)
    {
        // اعتبارسنجی داده‌های درخواستی
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,'.$id,
            'mobile' => 'required|mobile|unique:clients,mobile,'.$id,
        ]);
    
        $client = Client::find($id);
        $client->name = $validatedData['name'];
        $client->email = $validatedData['email'];
        $client->mobile = $validatedData['mobile'];
        $client->save();
    
        return response()->json($client);
    }

    public function destroy($id)
    {
        $clinet = Client::find($id);
        $clinet->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
