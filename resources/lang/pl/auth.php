<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Wprowadzono nieprawidłowe dane.',
    'throttle' => 'Zbyt wiele prób logowania. Spróbuj ponownie za :seconds sekund.',

    'register' => 'Rejestracja',
    'login' => 'Logowanie',
    'logout' => 'Wyloguj się',
    'verify' => 'Zweryfikuj swój adres email',
    'passwords' => [
        'confirm' => 'Potwierdź hasło',
        'reset' => 'Zresetuj hasło',
        'send' => 'Wyślij link do zresetowania hasła',
    ],
    'fpc' => [
        'title' => 'Forced password change',
        'line1' => 'Your account has been temporarily blocked for security reasons. To unblock it, please change your password.',
        'line2' => 'If you need more information or have problems unlocking your account, please contact the site administrator.',
        'action' => 'Change my password',
    ],
    'name' => 'Nazwa Użytkownika',
    'email' => 'Adres e-mail',
    'password' => 'Hasło',
    'confirm_password' => 'Wpisz hasło ponownie',
    'current_password' => 'Bieżące hasło',

    'conditions' => 'Akceptuję <a href=":url" target="_blank">warunki</a>.',

    '2fa' => [
        'code' => 'Kod 2FA',
        'invalid' => 'Nieprawidłowy kod',
    ],

    'suspended' => 'To konto jest zawieszone.',

    'maintenance' => 'Strona jest w trakcie konserwacji.',

    'remember' => 'Zapamiętaj mnie',
    'forgot_password' => 'Nie pamiętasz hasła?',

    'verification' => [
        'sent' => 'Nowy odnośnik weryfikacyjny został wysłany na Twój adres e-mail.',
        'check' => 'Przed kontynuowaniem, sprawdź, czy na Twoją skrzynkę pocztową dostarczono odnośnik weryfikacyjny.',
        'request' => 'Jeśli nie otrzymano wiadomości, możesz poprosić o kolejną.',
        'resend' => 'Wyślij ponownie',
    ],

    'confirmation' => 'Potwierdź swoje hasło przed kontynuowaniem.',

    'mail' => [
        'reset' => [
            'subject' => 'Powiadomienie o zresetowaniu hasła',
            'line1' => 'Otrzymujesz tę wiadomość, ponieważ otrzymaliśmy prośbę o zresetowanie hasła dla Twojego konta.',
            'action' => 'Zresetuj hasło',
            'line2' => 'Ten link resetowania hasła wygaśnie za :count minut.',
            'line3' => 'Jeśli nie prosiłeś o zresetowanie hasła, dalsze działania nie są wymagane.',
        ],

        'verify' => [
            'subject' => 'Zweryfikuj swój adres email',
            'line1' => 'Kliknij poniższy przycisk, aby zweryfikować swój adres e-mail.',
            'action' => 'Zweryfikuj swój adres e-mail',
            'line2' => 'Jeśli nie utworzyłeś konta, dalsze działania nie są wymagane.',
        ],
    ],
];
