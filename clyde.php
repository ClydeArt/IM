<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Rform.css">
</head>

<body>
    <div class="form-head">
        <h1><span>REGISTRA</span><span id="two">TION FORM</span></h1>
        <form id="userform" method="post">
            First Name <input type="text" name="fname" id="fname" placeholder="First Name"> <br>
            Last Name <input type="text" name="lname" id="lname" placeholder="Last Name"> <br>
            Middle Name <input type="text" name="mname" id='mname' placeholder="Middle Name"> <br>
            Age <input type="text" name="age" id='age' placeholder="Age"> <br>
            Address <input type="text" name="address" id='address' placeholder="Address"> <br>
            Contact Number <input type="text" name="contact" id='contact' placeholder="Contact"> <br>
            <br>
            <input type="submit" value="Save" id="save">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#userform').submit(function(e) {
                e.preventDefault();
                let fname = $('#fname').val().trim();
                let lname = $('#lname').val().trim();
                let mname = $('#mname').val().trim();
                let age = $('#age').val().trim();
                let address = $('#address').val().trim();
                let contact = $('#contact').val().trim();

                if (!fname || !lname || !mname || !age || !address || !contact) {
                    alert("All fields are required!");
                    return;
                }

                const frm = new FormData();
                frm.append("method", "saveUser");
                frm.append("fname", fname);
                frm.append("lname", lname);
                frm.append("mname", mname);
                frm.append("age", age);
                frm.append("address", address);
                frm.append("contact", contact);

                axios.post("clydeHandler.php", frm)
                    .then(function(response) {
                        if (response.data && response.data.ret == 1) {
                            alert("User saved!");
                        } else {
                            alert("Error: " + (response.data.msg || "Unknown error"));
                        }
                    })
                    .catch(function(error) {
                        console.error("Request failed:", error);
                        alert("Something went wrong!");
                    });
            });
        });
    </script>
</body>

</html>