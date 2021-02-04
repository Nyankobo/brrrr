@section("content")
    @foreach ($properties as $property)

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                            {!! $property->formatAddress() !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
