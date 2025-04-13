{{-- Curso --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Curso</label>
    <select id="duration" wire:model="course_id"
        class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        <option value="">Seleccionar Curso</option>
        @forelse ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @empty
        @endforelse
    </select>
    @error('course_id')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Estudiante --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estudiante</label>
    <select id="duration" wire:model="student_id"
        class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        <option value="">Seleccionar Estudiante</option>
        @forelse ($students as $student)
            <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
        @empty
        @endforelse
    </select>
    @error('student_id')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
