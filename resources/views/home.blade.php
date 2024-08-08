@extends('layouts.master')

@section('content')
<div class="font-regular fixed flex z-20 mb-4 lg:w-[450px] w-96 mt-4 ml-2 rounded-lg bg-blue-500 p-4 text-base leading-5 text-white opacity-100">
  <div class="rounded-full w-6 h-6 text-center inline px-2 font-bold border border-white mr-1">i</div><h1> Study-Rq Updated to Version 1.0.12 <a class="underline hover:font-semibold" href="/changelog">see the changelog</a></h1>
</div>
<div
class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center h-screen"
style="background-image: url('{{ asset('images/class-bg.jpg') }}'); ">
<div
  class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
  style="background-color: rgba(0, 0, 0, 0.6)">
  <div class="flex h-full items-center justify-center">
    <div class="text-white">
      <h2 class="mb-4 text-4xl font-semibold">Selamat Datang di Study Rq</h2>
      <h4 class="mb-6 text-xl font-semibold">platform untuk pembelajaran TIK berbasis Online</h4>
      <a href="/kelas"
        type="button"
        class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
        >
        Menuju Materi
      </a>
    </div>
  </div>
</div>
</div>
@endsection