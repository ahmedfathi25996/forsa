@extends("email.main_layout")

@section("subview")
    <table class="email-body_inner" width="570" cellpadding="0" cellspacing="0">
        <!-- Body content -->
        <tr>
            <td >
                <h1>Welcome</h1>
                <p>
                    Please Click On Link To Activate Your Account <b> <a href= {{$url}}>Activate</a>.</b>
                </p>

                <p>Cheers,
                    <br>{{env('APP_NAME')}} Team</p>
            </td>
        </tr>
    </table>

@endsection


