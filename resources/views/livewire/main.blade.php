<div>

    <div class="min-h-screen bg-gray-300 dark:bg-gray-900">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        <header class="shadow bg-slate-200 dark:bg-gray-800">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        {{ __('Notícias') }}
                    </h2>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>

            <!-------------------------------Mensagens Flash----------------------------->
            @if (session()->has('message'))
            <div
                class="fixed z-50 p-4 mx-auto font-bold text-white transform -translate-x-1/2 bg-yellow-600 rounded-lg left-1/2 bg-opacity-90 flash-message">
                {{ session('message') }}
            </div>
            @endif
            @if(session()->has('success'))
            <div
                class="fixed z-50 p-4 mx-auto font-bold text-white transform -translate-x-1/2 bg-green-600 rounded-lg left-1/2 bg-opacity-90 flash-message">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div
                class="fixed z-50 p-4 mx-auto font-bold text-white transform -translate-x-1/2 bg-red-600 rounded-lg left-1/2 bg-opacity-90 flash-message">
                {{ session('error') }}
            </div>
            @endif

            <livewire:noticia.index />

        </main>
    </div>
</div>
