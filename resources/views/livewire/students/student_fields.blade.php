@if (isset($tutors))
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tutor</label>
        <select id="duration" wire:model="tutor_id"
            class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            <option value="">Seleccionar tutor</option>
            @forelse ($tutors as $tutor)
                <option value="{{ $tutor->id }}" @if (auth()->user()->hasRole('tutor')) selected @endif>
                    {{ $tutor->user->name }}</option>
            @empty
            @endforelse
        </select>
        @error('tutor_id')
            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>
@endif

{{-- Nombre --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre(s)</label>
    <input type="text" wire:model="first_name"
        class="w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
    @error('first_name')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Apellido --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Apellido(s)</label>
    <input type="text" wire:model="last_name"
        class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
    @error('last_name')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Fecha de nacimiento --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de nacimiento</label>
    <input type="date" wire:model="birthdate"
        class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
    @error('birthdate')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
