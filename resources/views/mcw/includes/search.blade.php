<div class="w-full search m-4 mx-auto shadow-sm">
    <form action="{{ route('search') }}" method="get" class="ui form">
        <div class="ui left fluid icon input">
            <input class="w-full p-2 rounded outline-none" type="text" name="s" placeholder="search" required>   <i class="search icon"></i>
        </div>
    </form>
</div>