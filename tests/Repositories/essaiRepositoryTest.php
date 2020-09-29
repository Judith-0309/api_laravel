<?php namespace Tests\Repositories;

use App\Models\essai;
use App\Repositories\essaiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class essaiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var essaiRepository
     */
    protected $essaiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->essaiRepo = \App::make(essaiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_essai()
    {
        $essai = factory(essai::class)->make()->toArray();

        $createdessai = $this->essaiRepo->create($essai);

        $createdessai = $createdessai->toArray();
        $this->assertArrayHasKey('id', $createdessai);
        $this->assertNotNull($createdessai['id'], 'Created essai must have id specified');
        $this->assertNotNull(essai::find($createdessai['id']), 'essai with given id must be in DB');
        $this->assertModelData($essai, $createdessai);
    }

    /**
     * @test read
     */
    public function test_read_essai()
    {
        $essai = factory(essai::class)->create();

        $dbessai = $this->essaiRepo->find($essai->id);

        $dbessai = $dbessai->toArray();
        $this->assertModelData($essai->toArray(), $dbessai);
    }

    /**
     * @test update
     */
    public function test_update_essai()
    {
        $essai = factory(essai::class)->create();
        $fakeessai = factory(essai::class)->make()->toArray();

        $updatedessai = $this->essaiRepo->update($fakeessai, $essai->id);

        $this->assertModelData($fakeessai, $updatedessai->toArray());
        $dbessai = $this->essaiRepo->find($essai->id);
        $this->assertModelData($fakeessai, $dbessai->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_essai()
    {
        $essai = factory(essai::class)->create();

        $resp = $this->essaiRepo->delete($essai->id);

        $this->assertTrue($resp);
        $this->assertNull(essai::find($essai->id), 'essai should not exist in DB');
    }
}
