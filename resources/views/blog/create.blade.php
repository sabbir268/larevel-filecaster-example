<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('blog.store') }}" class="mt-6 space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            {{-- content --}}
                            <x-input-label for="content" :value="__('content')" />
                            <textarea id="content" name="content" type="text" class="mt-1 block w-full" :value="old('content')" required
                                autofocus autocomplete="content">
                            </textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div>
                            {{-- image --}}
                            <x-input-label for="image" :value="__('Image')" />
                            <input type="file" name="image" class="file">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div>
                            {{-- pdf --}}
                            <x-input-label for="pdf" :value="__('PDF')" />
                            <input type="file" name="pdf" class="file">
                            <x-input-error class="mt-2" :messages="$errors->get('pdf')" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>

                            @if (session('status') === 'blog-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Created.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
