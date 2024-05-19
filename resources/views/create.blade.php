<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="container mx-auto py-8">
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/kelas" method="POST" class="block rounded-xl bg-white border-2 border-red-700 px-10 py-10 max-w-2xl mx-auto">
            @csrf

            <div class="mb-4">
                <label for="judul" class="block text-red-700 mb-2">Judul</label>
                <input type="text" name="judul" id="judul" class="block w-full border-2 border-red-700 rounded p-2 bg-transparent focus:outline-none focus:ring-1 focus:ring-red-700 focus:border-red-700" value="{{ old('judul') }}" required autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="dosen" class="block text-red-700 mb-2">Dosen</label>
                <input type="text" name="dosen" id="dosen" class="block w-full border-2 border-red-700 rounded p-2 bg-transparent focus:outline-none focus:ring-1 focus:ring-red-700 focus:border-red-700" value="{{ old('dosen') }}" required autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-red-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="block w-full border-2 border-red-700 rounded p-2 bg-transparent focus:outline-none focus:ring-1 focus:ring-red-700 focus:border-red-700" rows="5" required autocomplete="off">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-red-700 mb-2">Slug</label>
                <input type="text" name="slug" id="slug" class="block w-full border-2 border-red-700 rounded p-2 bg-transparent focus:outline-none focus:ring-1 focus:ring-red-700 focus:border-red-700" value="{{ old('slug') }}" required autocomplete="off">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-red-700 text-white mt-5 px-4 py-2 rounded hover:bg-red-600">Simpan</button>
            </div>
        </form>
    </div>
</x-layout>
