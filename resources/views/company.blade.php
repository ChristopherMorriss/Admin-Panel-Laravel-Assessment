<x-layout>
    <x-slot:title>
        Company Information
    </x-slot:title>
    <div class="company-list">
        <div class="article-container container">
            <article class="article">
                    <strong>Name: {{$company->Name}}</strong>
                    <strong>ID: {{$company['id']}}</strong>
                    <strong>Email: {{$company['email']}}</strong>
                    <strong>Website: {{$company['website']}}</strong>
                    <strong>Logo: {{$company->logo}}</strong>
            </article>
            @auth
                <a href="/companies/{{$company['id']}}/edit">Edit Company</a>
            @endauth
        </div>
    </div>
</x-layout>