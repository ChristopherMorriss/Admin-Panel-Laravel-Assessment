<x-layout>
<div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/companies">
                @csrf
            <div>Company Details</div>
            <div class="Input">
                <div>Name</div>
                <input id="name" type="name" name="name" required>
                <div>Email</div>
                <input id="email" type="email" name="email" required>
                <!-- <div>Website</div>
                <input id="name" type="name" name="name" required> -->
                <button type="submit">Submit</button>
            </div>
            
            </form>
        </div>
    </div>
    @if($errors->any())
        <div class="container error-container">
            @foreach($errors->all() as $error)
                <div class="error-pos">{{ $error }}</div>
            @endforeach
        </div>
    @endif
</x-layout>