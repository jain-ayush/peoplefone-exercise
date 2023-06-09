
<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                <strong>Update User</strong>
                </div>
                <div class="card mx-auto" style="width: 50%;">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <form action="{{ url('update-user/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Name*</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email*</label>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control">
                        </div>
                        <div class="form-group mb-1 col-12" style="display:flex">
                            <div class="form-group mb-1 col-8">
                                <label for="">Phone Number*</label>
                                <input type="text"  pattern="[0-9]{10}" name="phone_number" id="phone_number" value="{{$user->phone_number}}" class="form-control">
                                <p class="text-danger"><small>Length should be of 10 digit</small></p>
                            </div>
                            <div class="form-group col-4 p-4">
                                <button type="button" class="btn btn-primary" onclick="sendOtp()">Send OTP</button> 
                            </div>
                           
                        </div>
                        <div class="form-group mb-3 col-4" id="otp-div" style="display: none;">
                            <label for="">Enter OTP*</label>
                            <input type="text" name="otp"  value="" class="form-control" >
                            </div>
                        <div class="form-group mb-3">
                            <!-- <label for="">Notification Switch</label>
                            <input type="text" name="notification_switch" value="{{$user->notification_switch}}" class="form-control"> -->
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="notification_switch" type="checkbox" value="1" role="switch" id="flexSwitchCheckDefault" {{ $user->notification_switch == 1 ? 'checked' : ''}} />
                            <label class="form-check-label" for="flexSwitchCheckDefault">Recieve Notifications</label>
                        </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>

                    </form>

                </div>
            </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
<script>
    function sendOtp()
    {
        var phone_number = document.getElementById("phone_number").value;
        var regex = '^[0-9]{10}$';
        if(!phone_number.match(regex))
        {
            alert('Enter Valid phone number')
        } else{
            $.ajax({
                method:'POST',
                url:"{{ route('sendOtp') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    phone_number:phone_number
                },
                success:function(data){
                    if(data){
                        alert('OTP Sent Successfully');
                        $('#otp-div').show();
                    }
                }
            });
        }
        
    }

</script>