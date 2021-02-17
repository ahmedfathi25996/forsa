@extends("email.main_layout")

@section("subview")

    <?php
        $full_url = url("/change/password?user_code=$user_code");
    ?>

    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
        <!-- Body content -->
        <tr>
            <td class="content-cell">
                <h1>Welcome {{$user_obj->full_name}},</h1>
                <p>
                    You have requested to change your password please click the button below to reset your password.
                </p>

                <!-- Action -->
                <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <a href="{{$full_url}}" class="button button--green" target="_blank">Reset Password</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <p>Cheers,
                    <br>{{env('APP_NAME')}} Team</p>
                <!-- Sub copy -->
                <table class="body-sub">
                    <tr>
                        <td>
                            <p class="sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                            <p class="sub">{{$full_url}}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

@endsection