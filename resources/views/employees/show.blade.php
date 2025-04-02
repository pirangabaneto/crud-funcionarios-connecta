<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do Funcionário
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ $employee->name }}</h3>

            <div class="space-y-2">
                <p><strong class="text-gray-700 dark:text-gray-300">CPF:</strong> {{ $employee->cpf ?? 'Não informado' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Data de Nascimento:</strong> {{ $employee->birth_date ? \Carbon\Carbon::parse($employee->birth_date)->format('d/m/Y') : 'Não informado' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Telefone:</strong> {{ $employee->phone_number ?? 'Não informado' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Gênero:</strong> {{ $employee->gender }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Criado em:</strong> {{ $employee->created_at->format('d/m/Y H:i')  }}</p>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('employees.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
                    Voltar
                </a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    Editar
                </a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
