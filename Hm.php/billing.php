<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing and Invoicing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('1.jpeg');
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            height: 100vh; /* Ensure full viewport height */
            position: relative; /* Set position relative for overlay */
        }
        .content {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 8px;
        }
        
        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input, form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #home {
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-align: topleft;
        }

        #details {
            /* background-color: white; */
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2{
            text-align: center;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        input[type="text"], input[type="email"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="button"], input[type="reset"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            color: #fff;
            padding-top: 20px;
        }

        #close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
        }

        #msg {
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
        }

        #reciept {
            text-align: center;
            margin-top: 20px;
        }

        #payment {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }

        #error {
            display: none;
            text-align: center;
            color: red;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            input[type="text"], input[type="email"], select, textarea {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    
    <div id="home">
        <a href="dashboard.php"><img src="home.png" title="Go to Home" id="homeimg"></a>
    </div>
    <div id="details">
        <form>
            <h1>BILLING</h1>
            <table>
                <tr>
                    <td><label>FIRST NAME:</label></td>
                    <td><input type="text" name="FNAME" placeholder="FIRST NAME" maxlength="25" id="t1" onfocus="f1()" onblur="f0()"></td>
                </tr>
                <tr>
                    <td><label>LAST NAME:</label></td>
                    <td><input type="text" name="LNAME" placeholder="LAST NAME" maxlength="25" id="t2" onfocus="f2()" onblur="f0()"></td>
                </tr>
                <tr>
                    <td><label>ENTER YOUR AGE:</label></td>
                    <td><input type="text" name="AGE" placeholder="Enter your age" maxlength="3" id="t3" onfocus="f3()" onblur="f0()"></td>
                </tr>
                <tr>
                    <td><label>GENDER:</label></td>
                    <td id="rad">
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female
                    </td>
                </tr>
                <tr>
                    <td><label>ENTER YOUR CONTACT NUMBER:</label></td>
                    <td><input type="text" name="Contact" placeholder="Enter your contact number" maxlength="10" id="t4"></td>
                </tr>
                    <td><label>ENTER YOUR EMAIL:</label></td>
                    <td><input type="email" name="EMAIL" placeholder="Enter your Email Id" maxlength="25" id="t5" onfocus="f5()" onblur="f0()"></td>
                </tr> 
                <tr>
                    <td><label>Room type:</label></td>
                    <td>
                        <select id="sel2">
                            <option>Choose your Room Type</option>
                            <option>Single Bed</option>
                            <option>Double Bed</option>
                            <option>Family Room</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Check In Date:</label></td>
                    <td><input type="date" id="date1"></td>
                </tr>
                <tr>
                    <td><label>Check Out Date:</label></td>
                    <td><input type="date" id="date2" onchange="cal()"></td>
                </tr>
                <tr>
                    <td><label>Discount Availed (In %):</label></td>
                    <td><input type="text" name="amount" placeholder="Discount Availed To user" maxlength="3" id="discount" value="0" readonly></td>
                </tr>
                <tr>
                    <td><label>AMOUNT TO BE PAID:</label></td>
                    <td><input type="text" name="amount" placeholder="Amount" maxlength="10" id="dollar" readonly></td>
                </tr>
                <tr>
                    <td><label>AMOUNT TO BE PAID (IN Rs.):</label></td>
                    <td><input type="text" name="amountrs" placeholder="Amount in Rupee" maxlength="10" id="rupee" readonly></td>
                </tr>
                <tr class="center">
                    <td colspan="2"><input type="button" id="book" value="Book" onclick="validate()"></td>
                </tr>
                <tr class="center">
                    <td colspan="2"><input type="reset" id="clear" value="Clear"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="overlay">
        <button onclick="off()" id="close" onmouseover="show()" onmouseout="hide()">X</button>
        <div id="msg">Click Here To Close</div>
        <div id="reciept">
            <table>
                <caption>Final Receipt</caption>
                <tr>
                    <td><label>Name:</label></td>
                    <td><label id="l1"></label></td>
                </tr>
                <tr>
                    <td><label>Age:</label></td>
                    <td><label id="l2"></label></td>
                </tr>
                <tr>
                    <td><label>Gender:</label></td>
                    <td><label id="l5"></label></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><label id="l3"></label></td>
                </tr>
                <tr>
                    <td><label>Contact No.:</label></td>
                    <td><label id="l4"></label></td>
                </tr>
                <tr>
                    <td><label>Room Type:</label></td>
                    <td><label id="l7"></label></td>
                </tr>
                <tr>
                    <td><label>Checkin Date:</label></td>
                    <td><label id="l8"></label></td>
                </tr>
                <tr>
                    <td><label>Checkout Date:</label></td>
                    <td><label id="l9"></label></td>
                </tr>
                <tr>
                    <td><label>Amount to be paid:</label></td>
                    <td><label id="l10"></label></td>
                </tr>
            </table>
            <button onclick="payment()" id="payment">Make Payment</button>
        </div>
    </div>
    <div id="error">
        <p style="color: red;">Sorry for inconvenience :( </p>
        <p>According To Our Criteria, You need to be over the age of 18 for booking hotel rooms!!</p>
    </div>
    <script>
        function validate() {
            // Add your validation logic here
            // Example: Check if required fields are filled
            var firstName = document.getElementById("t1").value;
            var lastName = document.getElementById("t2").value;
            var age = document.getElementById("t3").value;
            var email = document.getElementById("t5").value;

            if (firstName === "" || lastName === "" || age === "" || email === "") {
                alert("Please fill out all required fields.");
                return false;
            }

            // Example: If all validation passed, show receipt overlay
            document.getElementById("overlay").style.display = "block";

            // Assign values to receipt elements
            document.getElementById("l1").textContent = firstName + " " + lastName;
            document.getElementById("l2").textContent = age;
            document.getElementById("l5").textContent = document.querySelector("input[name='gender']:checked").value;
            document.getElementById("l3").textContent = email;
            document.getElementById("l4").textContent = document.getElementById("t4").value;
            document.getElementById("l6").textContent = document.getElementById("sel1").value;
            document.getElementById("l7").textContent = document.getElementById("sel2").value;
            document.getElementById("l8").textContent = document.getElementById("date1").value;
            document.getElementById("l9").textContent = document.getElementById("date2").value;
            document.getElementById("l10").textContent = document.getElementById("dollar").value + " USD";
        }

        function payment() {
            // Implement your payment logic here
            alert("Redirecting to payment gateway...");
            // Assuming the payment is successful, close the overlay
            document.getElementById("overlay").style.display = "none";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }

        function show() {
            document.getElementById("msg").style.display = "block";
        }

        function hide() {
            document.getElementById("msg").style.display = "none";
        }

        // Additional functions for calculating amount, discount, etc.
        function cal() {
            // Implement your calculation logic here
            // Example: Calculate amount based on dates, room type, etc.
            var amount = 100; // Sample amount calculation
            document.getElementById("dollar").value = amount;
            document.getElementById("rupee").value = amount * 75; // Assuming conversion rate
        }

        // Function to handle radio button selection
        $(":radio").click(function() {
            $(this).attr("id", "gender");
            a = $(this).attr("value");
            document.getElementById("gender").value = a;
        });
    </script>
</body>
</html>
