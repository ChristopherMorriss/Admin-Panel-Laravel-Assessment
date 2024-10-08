<x-layout>
    <x-slot:title>
        Add Employee 
    </x-slot:title>
    <div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/employees">
                @csrf
            <div>Company Details</div>
            <div class="Input">
                <div>Name</div>
                <input id="name" type="name" name="Name" required>
                <div>Email</div>
                <input id="email" type="email" name="email" required>
                <div>Website</div>
                <input id="name" type="website" name="website">
                @auth
                    @if (Auth::user()->admin == 1)
                        <button type="submit">Submit</button>
                    @endif
                @endauth
            </div>
            
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