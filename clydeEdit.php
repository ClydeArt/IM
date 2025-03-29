<?php
    require 'clyderouter.php';
    $id = $_GET['id'];
    $user = getUser($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="Rform.css">
</head>

<body>
    <div class="form-head">
        <h1><span>Edit</span><span id="two">User</span></h1>
        <form id="userform" method="post">
            First Name <input type="text" name="fname" id="fname" placeholder="First Name" value="<?= $user['fname'] ?>"> <br>
            Last Name <input type="text" name="lname" id="lname" placeholder="Last Name" value="<?= $user['lname'] ?>"> <br>
            Middle Name <input type="text" name="mname" id='mname' placeholder="Middle Name" value="<?= $user['mname'] ?>"> <br>
            Age <input type="text" name="age" id='age' placeholder="Age" value="<?= $user['age'] ?>"> <br>
            Address <input type="text" name="address" id='address' placeholder="Address" value="<?= $user['address'] ?>"> <br>
            Contact Number <input type="text" name="contact" id='contact' placeholder="Contact" value="<?= $user['contact'] ?>"> <br>
            <br>
            <input type="hidden" name="id" id="id" value="<?= $id ?>">
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
                let id = $('#id').val().trim();

                if (!fname || !lname || !mname || !age || !address || !contact) {
                    alert("All fields are required!");
                    return;
                }

                const frm = new FormData();
                frm.append("method", "editUser");
                frm.append("fname", fname);
                frm.append("lname", lname);
                frm.append("mname", mname);
                frm.append("age", age);
                frm.append("address", address);
                frm.append("contact", contact);
                frm.append("id", id);

                axios.post("clydeEditHandler.php", frm)
                    .then(function(response) {
                        if (response.data && response.data.ret == 1) {
                            alert("User updated!");
                            window.location.href = "/"
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