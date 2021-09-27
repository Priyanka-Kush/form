<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .error {
            color: #FF0000;
        }

        .countdown {
            color: #FF0000;
        }

        #thank_msg {
            color: green;
        }
    </style>

</head>

<body>
    <div class="container">
        <h3> User details</h3>
        <hr>
        <div class="countdown"></div>
        <form action="" id="frmdata" method="post" enctype='multipart/form-data'>
            <div class="row" id="formdata">
                <div id="thank_msg"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="Name" required>

                    </div>
                    <div class="form-group">
                        <lable>Email</lable>
                        <input type="email" name="email" id="email" value="" class="form-control" placeholder="Email" required>

                    </div>
                    <div class="form-group">
                        <lable>Date Of Birth</lable>
                        <input type="date" name="dob" id="dob" value="" class="form-control" placeholder="DOB" required>

                    </div>

                    <div class="form-group">
                        <lable>About yourself</lable>
                        <textarea id="about_yourself" name="about_yourself" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-10">
                                <lable>Captcha</lable>
                                <input type="text" name="captcha" id="captcha" value="" class="form-control" placeholder="Enter Captcha">
                            </div>
                            <div class="col-lg-2" style="margin-top:22px;">
                                <img src="captcha.php" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_detail" id="add_detail" class="btn btn-primary btn-block btn-flat " value="Submit">

                    </div>
                </div>

            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        // next:
        var timer2 = "3:01";
        var interval = setInterval(function() {
            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) {
                clearInterval(interval)
                alert("You Time Is Out");
                setTimeout(function() {
                    window.location = "index.php";
                }, 1000);
            };
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.countdown').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
        }, 1000);

        $('#frmdata').on('submit', function(e) {
            $('#add_detail').val('Please wait....');
            $('#add_detail').attr('disabled', true);
            e.preventDefault();
            $.ajax({
                url: 'insert.php',
                type: 'post',
                data: $('#frmdata').serialize(),
                success: function(data) {

                    if (data == "Please enter valid captcha code") {
                        $('#add_detail').val('Submit');
                        $('#add_detail').attr('disabled', false);
                        alert('Please enter correct captcha')
                        $('#captcha').reset();
                    } else {
                        alert(data);
                        setTimeout(function() {
                            window.location = "index.php";
                        }, 1000);
                        // $('#add_detail').val('submit Now');
                        // $('#add_detail').attr('disabled', false);
                        // $('#frmdata')['0'].reset();

                    }
                }
            });
        });
    </script>
</body>

</html>