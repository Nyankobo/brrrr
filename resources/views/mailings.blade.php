@extends('layouts.app')
@section("content")

<div class="m-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            + Add new mailings property
        </button>
    </div>
</div>

    <div class="grid grid-cols-1 gap-1 md:grid-cols-3 sm:grid-cols-2">
        @foreach ($mailings as $mailing)
            <div class="bg-white rounded-md p-5 m-5">
                <ul class="list-disc pl-5">
                    <li><b>Property:</b> {{ $mailing->property->getAddress() }}</li>
                    <li><b>Contact:</b> {{ $mailing->contact }}</li>
                    <li><b>Mailing Address:</b><br>
                        {!! $mailing->formatAddress() !!}
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
