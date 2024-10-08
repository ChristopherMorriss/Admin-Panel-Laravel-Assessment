<x-layout>
    <x-slot:title>
        Create Company
    </x-slot:title>
    <div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/companies">
                @csrf
            <div>Company Details</div>
            <div class="Input">
                <div>Name</div>
                <input id="name" type="name" name="Name" required>
                <div>Email</div>
                <input id="email" type="email" name="email" required>
                <!-- <div>Website</div>
                <input id="name" type="name" name="name" required> -->
                <button type="submit">Submit</button>
                @guest
                    <div>You are a guest and do not have the required priviliges to create a company</div>
                @endguest
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