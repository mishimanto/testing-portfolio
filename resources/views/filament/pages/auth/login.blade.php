<div class="portfolio-login">
    <div class="portfolio-login-header">
        <h1>Welcome Back</h1>
    </div>

    <form class="portfolio-login-form" wire:submit="authenticate">
        <div class="portfolio-input-group">
            <label for="admin-email">Email</label>
            <div class="portfolio-input-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.69 5.52a2.25 2.25 0 0 1-2.42 0L2.25 6.75" />
                </svg>
                <input id="admin-email" type="email" wire:model="data.email" placeholder="Enter your email" autocomplete="username" autofocus required>
            </div>
            @error('data.email') <p class="portfolio-field-error">{{ $message }}</p> @enderror
        </div>

        <div class="portfolio-input-group" x-data="{ showPassword: false }">
            <label for="admin-password">Password</label>
            <div class="portfolio-input-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75v-6a2.25 2.25 0 0 1 2.25-2.25Z" />
                </svg>
                <input id="admin-password" :type="showPassword ? 'text' : 'password'" wire:model="data.password" placeholder="Enter your password" autocomplete="current-password" required>
                <button type="button" class="portfolio-password-toggle" @click="showPassword = ! showPassword" aria-label="Show or hide password">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.04 12.32a1.01 1.01 0 0 1 0-.64C3.42 7.51 7.36 4.5 12 4.5c4.64 0 8.58 3.01 9.96 7.18.07.21.07.43 0 .64C20.58 16.49 16.64 19.5 12 19.5c-4.64 0-8.58-3.01-9.96-7.18Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
            </div>
            @error('data.password') <p class="portfolio-field-error">{{ $message }}</p> @enderror
        </div>

        <div class="portfolio-form-options">
            <label class="portfolio-remember">
                <input type="checkbox" wire:model="data.remember">
                <span>Remember me</span>
            </label>
            <a href="{{ filament()->getRequestPasswordResetUrl() }}">Forgot password?</a>
        </div>

        <button type="submit" class="portfolio-login-button" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="authenticate">Login</span>
            <span wire:loading wire:target="authenticate">Signing in...</span>
        </button>
    </form>
</div>
