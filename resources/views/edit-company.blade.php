<x-layout>
    <x-slot:title>
        Edit Company: {{$company->Name}}
    </x-slot:title>
    <div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/companies/{{$company['id']}}">
                @csrf
                @method('PATCH')
                <div class="input">
                    <div>Name</div>
                    <input id="name" type="name" name="Name" required value="{{$company->Name}}">
                    <div>Email</div>
                    <input id="email" type="email" name="email" value="{{$company->email}}">
                    <div>Website</div>
                    <input id="website" type="url" name="website" value="{{$company->website}}">
                    <div>Logo</div>
                    <input id="logo" type="file" name="logo" value="{{$company->logo}}">
                </div>
                <a href="/companies/{{$company['id']}}">Cancel</a>
                <!-- can('edit',$companies) -->
                <!-- <button type="submit">Update</button> -->
                <!-- Only appears if the user is allowed to modify the job -->
                <!-- endcan -->
                <button type="submit">Update</button>
                @auth
                    @if (Auth::user()->admin == 1)
                        <button type="submit" form="delete-form">Delete</button>
                    @endif
                @endauth
                @if($errors->any())
                    <div class="container error-container">
                        @foreach($errors->all() as $error)
                            <div class="error-pos">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            </form>
            <form class="box" method="POST" action="/companies/{{$company['id']}}" class="hidden" id="delete-form">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-layout>