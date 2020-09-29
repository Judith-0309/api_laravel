<?php namespace Tests\Repositories;

use App\Models\ClientParticulier;
use App\Repositories\ClientParticulierRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientParticulierRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientParticulierRepository
     */
    protected $clientParticulierRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientParticulierRepo = \App::make(ClientParticulierRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->make()->toArray();

        $createdClientParticulier = $this->clientParticulierRepo->create($clientParticulier);

        $createdClientParticulier = $createdClientParticulier->toArray();
        $this->assertArrayHasKey('id', $createdClientParticulier);
        $this->assertNotNull($createdClientParticulier['id'], 'Created ClientParticulier must have id specified');
        $this->assertNotNull(ClientParticulier::find($createdClientParticulier['id']), 'ClientParticulier with given id must be in DB');
        $this->assertModelData($clientParticulier, $createdClientParticulier);
    }

    /**
     * @test read
     */
    public function test_read_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->create();

        $dbClientParticulier = $this->clientParticulierRepo->find($clientParticulier->id);

        $dbClientParticulier = $dbClientParticulier->toArray();
        $this->assertModelData($clientParticulier->toArray(), $dbClientParticulier);
    }

    /**
     * @test update
     */
    public function test_update_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->create();
        $fakeClientParticulier = factory(ClientParticulier::class)->make()->toArray();

        $updatedClientParticulier = $this->clientParticulierRepo->update($fakeClientParticulier, $clientParticulier->id);

        $this->assertModelData($fakeClientParticulier, $updatedClientParticulier->toArray());
        $dbClientParticulier = $this->clientParticulierRepo->find($clientParticulier->id);
        $this->assertModelData($fakeClientParticulier, $dbClientParticulier->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_particulier()
    {
        $clientParticulier = factory(ClientParticulier::class)->create();

        $resp = $this->clientParticulierRepo->delete($clientParticulier->id);

        $this->assertTrue($resp);
        $this->assertNull(ClientParticulier::find($clientParticulier->id), 'ClientParticulier should not exist in DB');
    }
}
