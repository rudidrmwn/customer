<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New Customer</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mx-auto mt-10 mb-10 px-10">
    <div class="grid grid-cols-8 gap-4 p-5">
        <div class="col-span-4 mt-2">
            <h1 class="text-3xl font-bold">
                CREATE NEW CUSTOMER
            </h1>
        </div>
        <div class="col-span-4">

        </div>
    </div>
    <div class="bg-white p-5 rounded shadow-sm">
        <form action="{{ route('profile.update',$profile->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="first_name">First Name<abbr title="required" class="text-red-500">*</abbr></label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="first_name" value="{{ $profile->first_name }}">

                <!-- error message untuk title -->
                @error('first_name')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="last_name">Last Name<abbr title="required" class="text-red-500">*</abbr></label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="last_name" value="{{$profile->last_name }}">

                <!-- error message untuk title -->
                @error('last_name')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="birth_date">Date of Birth</label>
                <input type="date" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="birth_date" value="{{ $profile->birth_date }}">

                @error('birth_date')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="phone_number">Phone Number<abbr title="required" class="text-red-500">*</abbr></label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="phone_number" value="{{ $profile->phone_number }}">

                @error('phone_number')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email_address">Email Address</label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="email_address" value="{{ $profile->email_address }}">

                <!-- error message untuk title -->
                @error('email_address')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="province_address">Province Address</label>
                <select name="province_address" class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded-full
                      transition
                      ease-in-out
                      m-0 focus:text-gray-700 focus:bg-white
                      focus:border-blue-600 focus:outline-none" id="province">
                    <option value="0">Choose The Province</option>
                    @foreach($provinces as $value)
                    <option value="{{$value->id}}" {{ $profile->province_address == $value->id ? 'selected' : '' }}>{{$value->province_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="city_address">City Address {{session('sess_province')}}  </label>
               <select name="city_address" class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded-full
                      transition
                      ease-in-out
                      m-0 focus:text-gray-700 focus:bg-white
                      focus:border-blue-600 focus:outline-none"  id="cities">
                    @if(old('province_address'))
                    <option selected disabled value="">Choose The City</option>
                    @else
                        @foreach($cities as $value)
                        <option value="{{ $value->id }}" {{ $profile->city_address == $value->id ? 'selected' : '' }}>{{$value->cities_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-5">
                <label for="street_address">Street Address</label>
                <textarea
                    name="street_address" id="content"
                    class="
                        form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                      "
                    cols="30" rows="10"
                    required>{{ $profile->street_address }}</textarea>
            </div>
            <div class="mb-5">
                <label for="zip_code">Zip Code</label>
                <input type="number" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="zip_code" value="{{ $profile->zip_code }}">
            </div>
            <div class="mb-5">
                <label for="ktp_number">KTP Number<abbr title="required" class="text-red-500">*</abbr></label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="ktp_number" value="{{ $profile->ktp_number }}">

                @error('ktp_number')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="current_position">Current Position Bank Account</label>
                <select name="current_position" class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded-full
                      transition
                      ease-in-out
                      m-0 focus:text-gray-700 focus:bg-white
                      focus:border-blue-600 focus:outline-none" id="province">
                    <option value="0">Choose The Current Position</option>
                    @foreach($jobPositions as $value)
                    <option value="{{$value->id}}" {{ $profile->current_position_bank_account == $value->id ? 'selected' : '' }}>{{$value->current_position_bank_account}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="bank_account">Bank Account</label>
                <input type="number" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="bank_account" value="{{ $profile->bank_account }}">
            </div>
            <div class="mt-3">
                <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Save
                </button>
                <a href="{{ route('profile.index') }}"
                   class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">back</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="{{ asset('js/regional.js') }}"></script>
</body>
</html>