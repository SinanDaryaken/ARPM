<?php

namespace Tests\Unit;

use App\Services\SpreadsheetService;
use PHPUnit\Framework\MockObject\Exception as MockObjectException;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Jobs\ProcessProductImage;

class SpreadsheetServiceTest extends TestCase
{
    /**
     * @return void
     * @throws MockObjectException
     */
    public function testProcessSpreadsheet()
    {
        $importer = $this->createMock(Importer::class);
        $importer->method('import')->willReturn([
            ['product_code' => 'ABC123', 'quantity' => 5],
            ['product_code' => 'DEF456', 'quantity' => 10],
        ]);
        app()->instance('importer', $importer);

        Validator::shouldReceive('make')->andReturnSelf();
        Validator::shouldReceive('fails')->andReturn(false);
        Validator::shouldReceive('validated')->andReturn([
            'product_code' => 'ABC123',
            'quantity' => 5,
        ]);

        $product = $this->createMock(Product::class);
        Product::shouldReceive('create')->andReturn($product);

        ProcessProductImage::shouldReceive('dispatch')->once();
        $service = new SpreadsheetService();
        $service->processSpreadsheet('dummy/file/path.xlsx');

        $this->assertEquals(2, Product::create()->count());
    }
}
