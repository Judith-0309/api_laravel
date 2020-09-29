<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ClientParticulier;

class ClientParticulierApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_particuliers', $clientParticulier
        );

        $this->assertApiResponse($clientParticulier);
    }

    /**
     * @test
     */
    public function test_read_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_particuliers/'.$clientParticulier->id
        );

        $this->assertApiResponse($clientParticulier->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->create();
        $editedClientParticulier = factory(ClientParticulier::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_particuliers/'.$clientParticulier->id,
            $editedClientParticulier
        );

        $this->assertApiResponse($editedClientParticulier);
    }

    /**
     * @test
     */
    public function test_delete_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_particuliers/'.$clientParticulier->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_particuliers/'.$clientParticulier->id
        );

        $this->response->assertStatus(404);
    }
}
