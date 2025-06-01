<div>
    <form wire:submit.prevent="register">
        <div>
            <input type="text" wire:model="name" placeholder="Name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <input type="email" wire:model="email" placeholder="Email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <input type="password" wire:model="password" placeholder="Password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Register</button>
    </form>
</div>
