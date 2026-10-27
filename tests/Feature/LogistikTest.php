<?php

namespace Tests\Feature;

use Tests\TestCase;

class LogistikTest extends TestCase
{
    public function test_guest_can_open_the_logistics_calculator(): void
    {
        $response = $this->get('/logistik');

        $response->assertOk()
            ->assertSee('Kalkulator Kebutuhan Logistik Pengungsi')
            ->assertSee('Login');
    }

    public function test_calculator_returns_supply_estimates_for_refugee_count_and_duration(): void
    {
        $response = $this->post('/logistik', [
            'pengungsi' => 2,
            'hari' => 3,
        ]);

        $response->assertOk()
            ->assertSee('Hasil perhitungan')
            ->assertSee('2,4 kg')
            ->assertSee('90,0 liter')
            ->assertSee('12,0 bungkus')
            ->assertSee('2,0 lembar');
    }

    public function test_calculator_rejects_invalid_refugee_count(): void
    {
        $response = $this->from('/logistik')->post('/logistik', [
            'pengungsi' => 0,
            'hari' => 3,
        ]);

        $response->assertRedirect('/logistik')
            ->assertSessionHasErrors('pengungsi');
    }
}
