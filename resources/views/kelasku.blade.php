<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <article class ="py-8 max-w-screen">
      <h2 class="mb-1 text-3xl  text-red-700 font-bold">{{ $kelasku ['judul']}}</h2>
      <div class="text-base text-gray-500">
          <a href="#">{{ $kelasku ['dosen']}}</a> | {{ $kelasku->created_at->format('j F Y') }}
      </div>
      
      <p class="my-4 font-light text-justify"> {{ $kelasku ['deskripsi'] }} </p>
      <a href="/" class="font-medium text-red-700 hover:underline"> &laquo; Kembali ke Kelas Saya</a>
    </article>

</x-layout>
