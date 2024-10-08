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
                <div>First Name</div>
                <input id="first_name" type="name" name="first_name" required>
                <div>Last Name</div>
                <input id="last_name" type="name" name="last_name" required>
                <div>Email</div>
                <input id="email" type="email" name="email" required>
                <div>Company</div>
                <input id="company" type="name" name="company" required>
                <div>Phone Number</div>
                <input id="phone_number" type="tel" name="phone_number" required>
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