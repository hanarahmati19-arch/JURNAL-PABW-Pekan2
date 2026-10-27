<?php

namespace Tests\Feature;

use App\Models\Laporan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BanjirReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_page_can_be_opened(): void
    {
        $response = $this->get('/banjir');

        $response->assertOk();
        $response->assertSee('Nama pelapor');
    }

    public function test_report_list_redirects_guests_to_login(): void
    {
        $response = $this->get('/laporan');

        $response->assertRedirect('/login');
    }

    public function test_guest_can_submit_a_report_and_it_is_saved(): void
    {
        $response = $this->post('/proses', [
            'nama' => 'Andi',
            'lokasi' => 'Kecamatan Dayeuhkolot',
            'tinggi_genangan' => 35,
        ]);

        $response->assertOk();
        $response->assertSee('Laporan berhasil dikirim');
        $this->assertDatabaseHas('laporan', [
            'nama_pelapor' => 'Andi',
            'lokasi' => 'Kecamatan Dayeuhkolot',
            'tinggi_genangan' => 35,
        ]);
    }

    public function test_authenticated_staff_can_view_the_report_list_and_profile(): void
    {
        $user = \App\Models\User::factory()->create();
        Laporan::create([
            'nama_pelapor' => 'Andi',
            'lokasi' => 'Kecamatan Dayeuhkolot',
            'tinggi_genangan' => 35,
            'tanggal_kejadian' => now()->toDateString(),
        ]);

        $this->actingAs($user)
            ->get('/laporan')
            ->assertOk()
            ->assertSee('Andi');

        $this->get('/profil')
            ->assertOk()
            ->assertSee($user->name)
            ->assertSee($user->email);
    }
}
