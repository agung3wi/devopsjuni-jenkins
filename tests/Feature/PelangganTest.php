<?php

namespace Tests\Feature;

use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PelangganTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_data_masuk()
    {
        // DB::beginTransaction();
        $countAwal = Pelanggan::count(); // Menghitung jumlah data awal
        $response = $this->postJson('/api/pelanggan', [
            "nama" => "Agung",
            "kelamin" => "L",
            "phone" => "087123456789",
            "alamat" => "Semarang"
        ]);
        $countAkhir = Pelanggan::count(); // Menghitung jumlah data akhir (setelah penambahan data)
        $this->assertTrue($countAkhir == $countAwal + 1);
        // DB::rollBack();
    }
}
