<?php

namespace Tests\Unit;

use App\Category;
use App\Treatment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testPathCanBeRetrieved(): void
    {
        $category = factory(Category::class)->create();

        $this->assertSame("/categorie/{$category->slug}", $category->path());
    }

    public function testHasTreatmentsRelation(): void
    {
        $this->assertInstanceOf(Treatment::class, ($relation = (new Category)->treatments())->getRelated());
        $this->assertSame('treatments.category_id', $relation->getQualifiedForeignKeyName());
        $this->assertSame('categories.id', $relation->getQualifiedParentKeyName());
    }

}
