<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">

        <div class="w-96 p-8 bg-white rounded-2xl shadow-lg space-y-6">
            <form method="POST" action="/calculator">
                @csrf
                <div>
                    <label for="numero" class="block text-lg font-semibold text-gray-700">Número</label>
                    <input
                        type="number"
                        name="value"
                        id="numero"
                        min="0"
                        value="{{ old('value') }}"
                        class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 text-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        placeholder="Ingresa un número"
                    />
                </div>

                <div>
                    <span class="block text-lg font-semibold text-gray-700 mt-4">Resultado:</span>
                    <p id="resultado" class="mt-2 text-xl text-gray-900 font-bold">
                        @if($operation)
                            {{ number_format($operation->result) }}
                        @else
                            —
                        @endif
                    </p>
                    
                    @if($operation)
                        <p class="text-sm text-gray-600 mt-1">
                            {{ ucfirst($operation->operation) }} de {{ $operation->value }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <button 
                        type="submit" 
                        name="operation_type" 
                        value="factorial"
                        class="px-6 py-3 text-lg bg-cyan-700 text-white rounded-lg hover:bg-cyan-800 transition-colors"
                    >
                        Factorial
                    </button>

                    <button 
                        type="submit" 
                        name="operation_type" 
                        value="fibonacci"
                        class="px-6 py-3 text-lg bg-cyan-700 text-white rounded-lg hover:bg-cyan-800 transition-colors"
                    >
                        Fibonacci
                    </button>

                    <button 
                        type="submit" 
                        name="operation_type" 
                        value="ackerman"
                        class="px-6 py-3 text-lg bg-cyan-700 text-white rounded-lg hover:bg-cyan-800 transition-colors"
                    >
                        Ackerman
                    </button>

                    <a 
                        href="{{ url('/') }}"
                        class="px-6 py-3 text-lg bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-center inline-block"
                    >
                        Limpiar
                    </a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>