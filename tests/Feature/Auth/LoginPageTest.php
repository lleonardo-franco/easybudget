<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertSeeText('Entre na sua conta');
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('SenhaForte123!'),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'SenhaForte123!',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_login_with_remember_me_enabled(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('MinhaSenha!123'),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'MinhaSenha!123',
            'remember' => 'on',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);

        $recaller = Auth::guard()->getRecallerName();
        $response->assertCookie($recaller);
    }

    public function test_user_cannot_login_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('SenhaValida!123'),
        ]);

        $response = $this->from(route('login'))->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'senha-invalida',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_unverified_users_are_blocked_until_email_is_confirmed(): void
    {
        $user = User::factory()->unverified()->create([
            'password' => bcrypt('SenhaSegura!321'),
        ]);

        $response = $this->from(route('login'))->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'SenhaSegura!321',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_is_rate_limited_after_too_many_attempts(): void
    {
        $email = 'pessoa@example.com';
        $key = $this->throttleKeyFor($email);
        RateLimiter::clear($key);
        Event::fake([Lockout::class]);

        for ($i = 0; $i < 5; $i++) {
            $this->from(route('login'))->post(route('login.store'), [
                'email' => $email,
                'password' => 'senha-invalida',
            ]);
        }

        $response = $this->from(route('login'))->post(route('login.store'), [
            'email' => $email,
            'password' => 'senha-invalida',
        ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors('email');
    self::assertTrue(RateLimiter::tooManyAttempts($key, 5));
        Event::assertDispatched(Lockout::class);

        RateLimiter::clear($key);
    }

    public function test_authenticated_user_can_logout_and_session_is_invalidated(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('SenhaUltra!456'),
        ]);

        $this->actingAs($user);

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('status', 'Sessão encerrada com sucesso.');
        $this->assertGuest();
    }

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    private function throttleKeyFor(string $email): string
    {
        return strtolower($email) . '|127.0.0.1';
    }
}
