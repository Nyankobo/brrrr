@section("content")
    <div class="m-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                + Add new property
            </button>
        </div>
    </div>

        <div class="grid grid-cols-1 gap-1 md:grid-cols-3 sm:grid-cols-2">
            @foreach ($properties as $property)
                <div class="bg-white rounded-md p-5 m-5">
                        {{ $property->getAddress() }}<br>
                        @if($property->is_mailing)
                            <div class="float-right italic">Mailing</div>
                        @endif
                </div>
            @endforeach
        </div>
@endsection
