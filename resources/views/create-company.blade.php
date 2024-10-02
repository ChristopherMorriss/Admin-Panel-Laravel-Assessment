<x-layout>
<div class="company-list">
        <div class="container">
            <form class="box" method="POST" action="/companies">
                @csrf
            <div>Company Details</div>
            <div class="Input">
                <div>Name</div>
                <input id="name" type="name" name="name">
                <div>Email</div>
                <input id="email" type="email" name="email">
                <button type="submit">Submit</button>
            </div>
            
            </form>
        </div>

    </div>
</x-layout>