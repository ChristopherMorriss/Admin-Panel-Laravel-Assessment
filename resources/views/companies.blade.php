<x-layout>
    <h1>Test</h1>
    <div>
        @foreach ($companies as $company)
            <article>
                <a href="/companies/{{ $company['id'] }}" class="hover:underline block px-4 py-6 border">
                    <strong>{{$company['Name']}}</strong>
                </a>
            </article>
        @endforeach
        <div>
            {{$companies->links()}}
        </div>
    </div>
</x-layout>
