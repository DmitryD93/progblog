<?php

namespace App\Livewire\auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class UserLogin extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required')]
    public $password;

    public $remember = false;
    public $isLoading = false;

    public function userLogin()
    {
        $this->isLoading = true;

        $validated = $this->validate();

        if (Auth::attempt($validated, $this->remember)) {
            $this->isLoading = false;
            session()->flash('success', 'Вы успешно авторизовались!');
            return redirect()->route('home');
        }

        $this->isLoading = false;
        session()->flash('error', 'Неверные учетные данные.');
        $this->addError('email', 'Неверный email или пароль');
        $this->addError('password', 'Неверный email или пароль');
    }



    public function render()
    {
        return view('livewire.auth.user-login');
    }
}
