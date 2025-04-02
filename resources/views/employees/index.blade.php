<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Funcionários
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Novo Funcionário
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr class="text-left">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nome</th>
                        <th class="border border-gray-300 px-4 py-2">CPF</th>
                        <th class="border border-gray-300 px-4 py-2">Data de Nascimento</th>
                        <th class="border border-gray-300 px-4 py-2">Telefone</th>
                        <th class="border border-gray-300 px-4 py-2">Gênero</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr class="border-t border-gray-300">
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->cpf ?? 'N/A' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->birth_date ? \Carbon\Carbon::parse($employee->birth_date)->format('d/m/Y') : 'N/A' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->phone_number ?? 'N/A' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->gender }}</td>
                            <td class="border border-gray-300 px-4 py-2 flex justify-center gap-2">
                                <a href="{{ route('employees.show', $employee) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
