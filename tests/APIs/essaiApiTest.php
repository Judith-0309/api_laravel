<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\essai;

class essaiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_essai()
    {
        $essai = factory(essai::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/essais', $essai
        );

        $this->assertApiResponse($essai);
    }

    /**
     * @test
     */
    public function test_read_essai()
    {
        $essai = factory(essai::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/essais/'.$essai->id
        );

        $this->assertApiResponse($essai->toArray());
    }

    /**
     * @test
     */
    public function test_update_essai()
    {
        $essai = factory(essai::class)->create();
        $editedessai = factory(essai::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/essais/'.$essai->id,
            $editedessai
        );

        $this->assertApiResponse($editedessai);
    }

    /**
     * @test
     */
    public function test_delete_essai()
    {
        $essai = factory(essai::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/essais/'.$essai->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/essais/'.$essai->id
        );

        $this->response->assertStatus(404);
    }
}
