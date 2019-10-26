<?php

namespace tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testOverviewAbortsWhenNoCategoryFound(): void
    {
        $response = $this->get('/categorie/foo');
        $response->assertStatus(404);
    }

    public function testOverviewShowsCategoryInformation(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->get($category->path());
        $response->assertSee($category->title);
        $response->assertSee($category->description);
        $response->assertSee($category->image);
    }

    public function testOverviewShowsCrossSell(): void
    {
        $categories = factory(Category::class, 3)->create();

        $response = $this->get($categories->first()->path());
        $response->assertSee('Behandelingen');

        foreach ($categories as $category) {
            $response->assertSee($category->title);
            $response->assertSee($category->image);
        }
    }

}
