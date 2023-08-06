<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- create button --}}


            <a href="{{ route('blog.create') }}"
                class="my-2 bg-blue-500 hover:bg-blue-700 text-black border border-red-400 font-bold py-2 px-4 rounded btn">{{ __('Create') }}</a>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                {{-- table to show blog data --}}
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border">
                            <th class="px-4 py-2">{{ __('Title') }}</th>
                            <th class="px-4 py-2">{{ __('Image') }}</th>
                            <th class="px-4 py-2">{{ __('Author') }}</th>
                            <th class="px-4 py-2">{{ __('Created') }}</th>
                            <th class="px-4 py-2">{{ __('Updated') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td class="border px-4 py-2">{{ $blog->title }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                        class="w-20 h-20 object-cover">
                                </td>
                                <td class="border px-4 py-2">{{ $blog->user->name }}</td>
                                <td class="border px-4 py-2">{{ $blog->created_at->format('d/m/Y H:i') }}</td>
                                <td class="border px-4 py-2">{{ $blog->updated_at->format('d/m/Y H:i') }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('blog.edit', $blog) }}"
                                        class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                                    <form method="post" action="{{ route('blog.destroy', $blog) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
