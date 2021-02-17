<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>

    #bookin-form {
        margin-top: 100px;
    }
    .card {
        width: 350px;
        background-color: #fff;
    }

    .booking input {
        width: 85%;
        border: 0;
        height: 40px;
        margin: 10px;
        /*border: 1px solid #000;*/
        background-color: #f2f2f2;
        /*transition: all .1s;*/
        box-shadow: .09px .4px 2px 1px rgba(0,0,0,.3)

    }
    .booking input:hover {
        transform: scale(1.01);
        box-shadow: .2px .6px 3px 1px rgba(0,0,0,.3)

    }

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body class="bg-dark">




<section id="booking-form">
    <div class="container d-flex justify-content-center">
        <section class="booking">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title text-center">تم تغيير كلمه المرور يمكنك الدخول  </h4>


                    <div id="message" class="col-md-12" style="margin-top: 10px;">  </div>

                </div>
            </div>
        </section>
    </div>
</section>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!--font awesome js-->
<script src="https://use.fontawesome.com/109510bfae.js"></script>

<script >



    $("body").on("click", ".register_btn", function () {

        console.log('heeer');

        if ($(".password").val() != $(".password_confirm").val()) {
            $('#message').html("<div class='alert alert-danger'>password does not match</div>");
            return false;
        }
    })

</script>


</body>
</html>