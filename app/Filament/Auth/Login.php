<?php

namespace App\Filament\Auth;

use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Login extends BaseLogin
{
    public $email = '';
    public $password = '';

    //protected static string $view = 'filament.auth.login';

    /**
     * Аутентификация через API.
     */
    public function authenticate(): ?LoginResponse
    {
        // URL вашего API для логина
        // $apiLoginUrl = config('services.api.url') . '/api/login';
        $apiLoginUrl = 'http://127.0.0.1:8000/api/login';

        try {
            // Создаем внутренний запрос
            $request = Request::create($apiLoginUrl, 'POST', [
                'email' => $this->email,
                'password' => $this->password,
            ]);

            // Обрабатываем запрос с помощью App
            $response = App::handle($request);

            // Декодируем ответ
            $data = json_decode($response->getContent(), true);

            // Проверяем наличие токена
            if (!isset($data['access_token'])) {
                Notification::make()
                    ->title('Ошибка API')
                    ->body('Не удалось получить токен доступа.')
                    ->danger()
                    ->send();

                return null;
            }

            $accessToken = $data['access_token'];

            // Сохраняем токен в сессии
            session(['api_token' => $accessToken]);

            Notification::make()
                ->title('Успешный вход')
                ->body('Вы вошли в систему.')
                ->success()
                ->send();

            // Перенаправляем пользователя в панель управления
            return app(LoginResponse::class);

        } catch (\Exception $e) {
            Notification::make()
                ->title('Ошибка')
                ->body('Произошла ошибка при попытке входа. Пожалуйста, попробуйте снова.')
                ->danger()
                ->send();

            return null;
        }

        
    }
}