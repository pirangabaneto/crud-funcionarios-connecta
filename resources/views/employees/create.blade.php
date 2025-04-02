<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cadastrar Funcionário
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Nome</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="w-full border rounded-md p-2 dark:bg-gray-700 dark:text-white"
                        required>
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">CPF</label>
                    <input type="text" name="cpf" value="{{ old('cpf') }}" 
                        class="w-full border rounded-md p-2 dark:bg-gray-700 dark:text-white">
                    @error('cpf') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" 
                        class="w-full border rounded-md p-2 dark:bg-gray-700 dark:text-white">
                    @error('birth_date') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Telefone</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" 
                        class="w-full border rounded-md p-2 dark:bg-gray-700 dark:text-white">
                    @error('phone_number') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700 dark:text-gray-300">Gênero</label>
                    <select name="gender" class="w-full border rounded-md p-2 dark:bg-gray-700 dark:text-white" required>
                        <option value="">Selecione</option>
                        <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Feminino" {{ old('gender') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                        <option value="Outro" {{ old('gender') == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('gender') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('employees.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
