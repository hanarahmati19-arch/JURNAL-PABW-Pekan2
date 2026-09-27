<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BanjirReportTest extends TestCase
{
    use WithoutMiddleware;

    public function test_form_page_can_be_opened(): void
    {
        $response = $this->get('/banjir');

        $response->assertStatus(200);
        $response->assertSee('Form Pelaporan Banjir');
    }

    public function test_form_submission_can_be_processed(): void
    {
        $response = $this->post('/banjir', [
            'nama' => 'Andi',
            'alamat' => 'Bandung',
            'telepon' => '081234567890',
        ]);

        $response->assertStatus(200);
        $response->assertSee('Laporan berhasil dikirim');
        $response->assertSee('Andi');
    }
}
