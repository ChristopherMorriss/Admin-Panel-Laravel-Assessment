<x-layout>
    <x-slot:title>
        Create Company
    </x-slot:title>
    <div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/companies" enctype="multipart/form-data">
                @csrf
            <div>Company Details</div>
            <div class="Input">
                <div>Name</div>
                <input id="name" type="name" name="Name" required>
                <div>Email</div>
                <input id="email" type="email" name="email" required><br>
                <div>Logo</div>
                <input type="file" name="logo"><br>
                <div>Website</div>
                <input id="name" type="url" name="website" required>
                @auth
                    @if (Auth::user()->admin == 1)
                        <button type="submit">Submit</button>
                        <!-- Only the admin user is allowed to create a company -->
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