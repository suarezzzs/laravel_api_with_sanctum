<?php

namespace App\Http\Controllers;

use App\Http\Services\ApiResponse;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    /**
     * Lista os clientes de forma paginada para melhor performance.
     */
    public function index()
    {
       
        $clients = Client::paginate(15);

        return ApiResponse::success($clients);
    }

    /**
     * Armazena um novo cliente no banco de dados.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "name" => "required|string|max:255",
                "email" => "required|email|unique:clients,email",
                "phone" => "required|string|max:20",
            ]);

            $client = Client::create($validatedData);

            return ApiResponse::created($client);

        } catch (ValidationException $e) {
            return ApiResponse::validationError($e->errors());
        }
    }

    /**
     * Exibe um cliente específico.
     * Graças ao Route Model Binding, o Laravel já nos entrega a instância de Client
     * ou retorna um erro 404 se não for encontrado.
     */
    public function show(Client $client)
    {
        return ApiResponse::success($client);
    }

    /**
     * Atualiza um cliente específico.
     * O Route Model Binding também se aplica aqui.
     */
    public function update(Request $request, Client $client)
    {
        try {
            $validatedData = $request->validate([
                "name" => "required|string|max:255",
                "email" => "required|email|unique:clients,email," . $client->id,
                "phone" => "required|string|max:20",
            ]);

            $client->update($validatedData);

            return ApiResponse::success($client);

        } catch (ValidationException $e) {
            return ApiResponse::validationError($e->errors());
        }
    }

    /**
     * Remove um cliente do banco de dados.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return ApiResponse::success(null, "Client deleted successfully");
    }
}