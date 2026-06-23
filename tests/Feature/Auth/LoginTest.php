<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    // Mengosongkan database otomatis setiap kali tes dimulai
    use RefreshDatabase;

    /** @test */
    public function test_pengguna_bisa_login_dengan_kredensial_yang_benar()
    {
        // 1. Siapkan data pengguna tiruan di database terlebih dahulu
        $user = User::create([
            'username' => 'budi_toko',
            'password' => Hash::make('Rahasia123!'), // Password di-hash
        ]);

        // 2. Simulasikan robot mengirim data login yang BENAR ke route POST
        $response = $this->post(route('user.login'), [
            'username' => 'budi_toko',
            'password' => 'Rahasia123!',
        ]);

        // 3. Pastikan dialihkan (redirect) ke halaman utama/dashboard setelah sukses
        $response->assertRedirect(route('dashboard'));

        // 4. Pastikan sistem Laravel mengenali bahwa user tersebut sudah resmi login
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function test_pengguna_gagal_login_jika_password_salah()
    {
        // 1. Siapkan data pengguna tiruan di database
        $user = User::create([
            'username' => 'budi_toko',
            'password' => Hash::make('Rahasia123!'),
        ]);

        // 2. Simulasikan robot mengirim data login dengan password yang SALAH
        $response = $this->post(route('user.login'), [
            'username' => 'budi_toko',
            'password' => 'PasswordSalah123',
        ]);

        // 3. Pastikan kembali ke halaman sebelumnya (form login) karena gagal
        $response->assertStatus(302);

        // 4. Pastikan ada pesan error validasi yang dikembalikan untuk kolom username/password
        $response->assertSessionHasErrors('username');

        // 5. Pastikan status pengguna tetap dianggap BELUM login (guest)
        $this->assertGuest();
    }
}
