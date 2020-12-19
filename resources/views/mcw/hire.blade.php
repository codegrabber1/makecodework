@extends(env("THEME").'.layouts.main')
@section('sidebar')
    @include(env('THEME').'.inner-sidebar')
@endsection
@section('content')
    <section class="bg-white shadow-sm px-4 mr-6">
        <h3 class="text-3xl font-head">You can leave a message to hire me</h3>
        <div class="my-2 text-base leading-6">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, amet assumenda, blanditiis consequatur
                culpa doloremque esse, est fuga illo laborum magnam magni maxime nostrum nulla porro quae quaerat quo
                sapiente.
            </div>
            <div>Atque culpa cum cupiditate dolore et neque, quia temporibus ullam. Consequuntur nobis totam ullam?
                Aliquam amet aut eius facilis fuga id incidunt, iusto magnam maiores, nobis, optio voluptatibus!
                Adipisci, nisi!
            </div>
            <div>Adipisci aspernatur dolorem ipsa nesciunt officia quam repellendus! Animi aspernatur commodi
                consectetur cum cumque distinctio dolores exercitationem laboriosam perferendis quidem. Architecto
                asperiores doloremque enim et expedita, mollitia ratione velit voluptate!
            </div>
        </div>
        <div class="flex p-4 border border-b_color bg-white w-full mx-auto m-4 shadow-sm">
            <ul class="flex justify-between w-full">
                <li class="w-1/4"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-youtube"></i></a></li>
                <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-telegram-plane"></i></a></li>
                <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-viber"></i></a></li>

            </ul>
        </div>
        
        <div id="respond" class="overflow-hidden  py-3 ">
            <div id="mess_result"></div>
            <div class="w-full">
                @include('admin.includes.message')
            </div>
            <form action="{{ route('hireme.store') }}" method="post" id="messageform">
                @csrf
                <div class="flex justify-between my-3">
                    <div class="w-full mr-1">
                        <label class="block mb-3">Name: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" name="username" type="text">
                    </div>
                    <div class="w-full ml-1">
                        <label class="block mb-3">Email Adress: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" name="useremail" type="email">
                    </div>
                </div>
                <div class="flex justify-between my-3">
                    <div class="w-full ml-1">
                        <label class="block mb-3">Your phone: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" type="text" name="userephone" placeholder="Your phone">
                    </div>

                    <div class="w-full ml-1">
                        <label class="block mb-3">Type of web-sites: <span class="required text-red-500">*</span></label>
                        <div class="ui selection dropdown w-full">
                            <input type="hidden" name="webtype">
                            <i class="dropdown icon"></i>
                            <div class="default text">Choose what can I do: </div>
                            <div class="menu">
                                <div class="item" data-value="Landing Page">Web Site</div>
                                <div class="item" data-value="Mobile app">Mobile App</div>
                                <div class="item" data-value="smth else">Other...</div>
                            </div>
                        </div>
                    </div>

                </div>

                <label class="block mb-3">Add additional message: <span class="required text-red-500">*</span></label>
                <div class="my-2">
                    <div class="comment-box">
                        <textarea class="form-control border w-full" rows="7" name="usermessage" ></textarea>
                        <i>Note: HTML is not translated!</i>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="button-set">
                    <span class="required float-left text-red-500"><b>*</b> Required Field</span>
                    <input type="submit" name="user_submit" id="sendmessage"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right" value="Send a message ">
                </div>

            </form>
        </div>

    </section>
@endsection