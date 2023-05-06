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
    <div class='h4 text-white'>MY CONTACT LIST</div>
    </div>
    </div>
    <div class='container'>
        <div class='d-flex justify-content-between py-3'>

            <div>
                <a href="{{route('contacts.create')}}" class='btn btn-primary'>Create</a>
            </div>
        </div>
        <div>
           @if(Session::has('success'))
           <div class='alert alert-success'>
             {{Session::get('success')}}
           </div>
           @endif 
        </div>
        <div class='card border-0 shadow-lg'>
            <div class='card-body'>
                <table class='table table-striped'>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                        
                    </tr>

                    @if($contacts->isNotEmpty())
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->first_name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td>
                            <a href="{{ route('contacts.edit',$contact->id)}}" class='btn btn-primary btn-sm'>Edit</a>
                            <a href='#'  onclick="deleteContact({{ $contact->id }})" class='btn btn-danger btn-sm'>Delete</a>
                       <form id='contact-edit-action-{{ $contact->id }}' action="{{ route('contacts.destroy',$contact->id) }}" method="post">
                        @csrf
                        @method('delete')
                       </form>
                       
                        </td>
                        
                    </tr>
                    @endforeach
                    @else
                    <tr> <td colspan='6'>Record not found</td></tr>
                    @endif
                </table>
            </div>

        </div>
    </div>
   


</body>
</html>
<script>
    function deleteContact(id){
     if(confirm('Are you sure you want to delete this contact?')){
        document.getElementById('contact-edit-action-'+id).submit();
     }

    }
</script>