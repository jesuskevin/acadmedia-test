<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Curso</label>
    <select id="duration" wire:model="course_id"
        class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 transition">
        <option value="">Seleccionar curso</option>
        @forelse ($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->name }}
            </option>
        @empty
        @endforelse
    </select>
    @error('course_id')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Titulo --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Titulo</label>
    <input type="text" wire:model="title"
        class="w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 transition" />
    @error('title')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Mensaje --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mensaje</label>
    <textarea wire:model="message" class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition"></textarea>
    @error('message')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>