@extends('layout')
@section('title', 'Registration')
@section('content')
<div class="bg-yellow-400 h-screen overflow-hidden flex items-center justify-center">
  <div class="bg-white lg:w-6/12 md:7/12 w-8/12 shadow-3xl rounded-xl">
    <div class="bg-gray-800 shadow shadow-gray-200 absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="#FFF">
        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8V22h19.2v-2.8c0-3.2-6.4-4.8-9.6-4.8z"/>
      </svg>
    </div>

    <form class="p-12 md:p-24">
      {{-- Full Name --}}
      <div class="flex items-center text-lg mb-6">
        <input type="text" name="name"
          class="bg-gray-200 rounded pl-4 py-2 md:py-4 focus:outline-none w-full"
          placeholder="Full Name" />
      </div>

      {{-- Username --}}
      <div class="flex items-center text-lg mb-6">
        <input type="text" name="username"
          class="bg-gray-200 rounded pl-4 py-2 md:py-4 focus:outline-none w-full"
          placeholder="Username" />
      </div>

      {{-- Email --}}
      <div class="flex items-center text-lg mb-6">
        <input type="email" name="email"
          class="bg-gray-200 rounded pl-4 py-2 md:py-4 focus:outline-none w-full"
          placeholder="Email Address" />
      </div>

      {{-- Password --}}
      <div class="flex items-center text-lg mb-6">
        <input type="password" name="password"
          class="bg-gray-200 rounded pl-4 py-2 md:py-4 focus:outline-none w-full"
          placeholder="Password" />
      </div>

      {{-- Confirm Password --}}
      <div class="flex items-center text-lg mb-8">
        <input type="password" name="password_confirmation"
          class="bg-gray-200 rounded pl-4 py-2 md:py-4 focus:outline-none w-full"
          placeholder="Confirm Password" />
      </div>

      <button
        class="bg-gradient-to-b from-gray-700 to-gray-900 font-medium p-2 md:p-4 text-white uppercase w-full rounded">
        Register
      </button>
    </form>
  </div>
</div>
@endsection
