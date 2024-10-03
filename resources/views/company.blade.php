<x-layout>
    <x-slot:title>
        Create Company
    </x-slot:title>
    <div class="company-list">
        <div class="article-container">
            <article class="article">
                    <strong>Name: {{$company->Name}}</strong>
                    <strong>ID: {{$company['id']}}</strong>
                    <strong>Email: {{$company['email']}}</strong>
                    <strong>Website: {{$company['website']}}</strong>
            </article>
            <a href="/companies/{{$company->id}}/edit">Edit Company</a>
        </div>
    </div>
</x-layout>