@extends('layouts.auth')

@section('auth-content')
    {{-- content --}}
    <div class="card">
        <div class="card-body">
            {{-- Logo --}}
            <div class="app-brand demo d-flex justify-content-center align-items-center">
                <a href="{{ route('/') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('assets/img/posindnew.png') }}" alt="Logo" style="width: 100px; height: auto;">
                    </span>
                </a>
        
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="align-middle bx bx-chevron-left bx-sm"></i>
                </a>
            </div>
            {{-- !Logo --}}
            <p class="mb-3">Please sign-in to your account first</p>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="emailOrUsername" class="form-label">Email / Username</label>
                    <input type="text" class="form-control" id="emailOrUsername" name="emailOrUsername" placeholder="Enter your email or username" autofocus />
                    <x-input-error :messages="$errors->get('emailOrUsername')" class="mt-2" />
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a href="{{ route('password.request') }}">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <span class="cursor-pointer input-group-text"><i class="bx bx-hide"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>
        </div>

        <p class="text-center">
            <span>Do not have account?</span>
            <a href="{{ route('register') }}">
                <span>Create an account</span>
            </a>
        </p>
    </div>
    {{-- !content --}}
@endsection
