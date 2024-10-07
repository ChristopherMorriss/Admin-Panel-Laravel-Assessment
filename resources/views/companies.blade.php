<x-layout>
    <x-slot:title>
        Companies
    </x-slot:title>
    <div class="company-list">
        @foreach ($companies as $company)
        <div class="article-container">
            <article class="logo-article">
                <a href="/companies/{{$company['id']}}" class="logo-box"> 
                    <img src="https://picsum.photos/seed/50/50" class="logo-img">
                    <div class="contents">
                        <strong>{{$company['Name']}}</strong></br>
                        <strong>{{$company['email']}}</strong>
                    </div>
                </a>
            </article>
        </div>
        @endforeach
        <div>
            {{$companies->links()}}
        </div>
    </div>
</x-layout>