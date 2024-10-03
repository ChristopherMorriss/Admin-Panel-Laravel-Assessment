<x-layout>
    <x-slot:title>
        Edit Company: {{ $company->Name}}
    </x-slot:title>
    <div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/companies/{{$company->id}}">
                @csrf
                @method('PATCH')
                <div class="Input">
                    <div>Name</div>
                    <input id="name" type="name" name="Name" required value="{{$company->Name}}">
                    <div>Email</div>
                    <input id="email" type="email" name="email" required value="{{$company->email}}">
                    
                    <!-- <div>Website</div>
                    <input id="name" type="name" name="name" required> -->
                </div>
                <a href="/companies/{{$company->id}}">Cancel</a>
                <button type="submit">Update</button>
            </form>
        </div>
        @if($errors->any())
            <div class="container error-container">
                @foreach($errors->all() as $error)
                    <div class="error-pos">{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>