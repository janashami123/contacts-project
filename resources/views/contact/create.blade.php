<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel='stylesheet' href="{{ asset('assets/css/bootstrap.min.css') }}">

</head>
<body>
    <div class='bg-dark py-3'>

    <div class='container'>
    <div class='h4 text-white'>ADD NEW CONTACT</div>
    </div>
    </div>
    <div class='container'>
        <div class='d-flex justify-content-between py-3'>
            <div>
                <a href="{{ route('contacts.index')}}" class='btn btn-primary'>Back</a>
            </div>
        </div>
        <form action="{{route('contacts.store')}}" method='post'>
           @csrf

        <div class='card border-0 shadow-lg'>
            <div class='card-body'>
               <div class='mb-3'>
                <label for='first_name'>First Name</label>
                <input type='text' name='first_name' id='first_name' placeholder='Enter your first name' class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}">
                @error('first_name')
                <p class='invalid-feedback'>{{ $message }}</p>
                  @enderror
               </div>
               <div class='mb-3'>
                <label for='last_name'>last Name</label>
                <input type='text' name='last_name' id='last_name' placeholder='Enter your last name' class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')}}">
                @error('last_name')
                <p class='invalid-feedback'>{{ $message }}</p>
                  @enderror
               </div>
               <div class='mb-3'>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' placeholder='Enter your email' class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                @error('email')
                <p class='invalid-feedback'>{{ $message }}</p>
                  @enderror
               </div>
               <div class='mb-3'>
                <label for='phone_number'>Phone</label>
                <input type='number' name='phone_number' id='phone_number' placeholder='Enter your phone number' class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}">
                @error('phone_number')
                <p class='invalid-feedback'>{{ $message }}</p>
                  @enderror
               </div>
               
            </div>

        </div>
        <button class='btn btn-primary mt-3'>Save Contact</button>
        </form>
    </div>
   


</body>
</html>
