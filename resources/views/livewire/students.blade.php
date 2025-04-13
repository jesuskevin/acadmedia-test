<div class="max-w-5xl mx-auto px-6 py-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">👨‍🎓 Estudiantes Registrados</h1>

        <a href="{{ route('students.create') }}"
            class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl transition">
            Registar Estudiante
        </a>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 text-green-700 bg-green-100 dark:text-green-200 dark:bg-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($students as $student)
        <div
            class="p-5 mb-4 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-2xl shadow-sm flex items-start justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $student->first_name }}
                    {{ $student->last_name }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Tutor: {{ $student->tutor->user->name }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Fecha de nacimiento: {{ $student->birthdate }}
                </p>
            </div>

            <div class="ml-6 mt-2">
                <a href="{{ route('students.edit', $student) }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl transition">
                    ✏️ Editar
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-600 dark:text-gray-300 text-sm">No hay cursos aún.</p>
    @endforelse
    <div class="mt-6">
        {{ $students->links('pagination::tailwind') }}
    </div>
</div>
