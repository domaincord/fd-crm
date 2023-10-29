<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Domains</title>
    <meta name="description" content="Curated, affordable domain names delivered to inbox every morning">
</head>
<style>
    html {
        height: 100vh;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 22px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    form {
        width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 1rem;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }

    /* Customize the label (the container) */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>

<body>
    <form action="/subscribe.php" method="post">

        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="jdoe@example.com" />

        <label for="unsubscribe" class="container">Unsubscribe instead?
            <input type="checkbox" name="unsubscribe" id="unsubscribe" />
            <span class="checkmark"></span>
        </label>
        
        <input type="submit" value="Subscribe" />
    </form>

    <script type="text/javascript">
        window.addEventListener("DOMContentLoaded", function() {
            const queryString = new URLSearchParams(window.location.search)

            const unsubscribe = queryString.get("unsubscribe");
            const subscribe = queryString.get("subscribe");

            if (unsubscribe === "1") {
                document.querySelector("#unsubscribe").checked = true;

                const form = document.querySelector("form");

                form.action = "/unsubscribe.php";
                form.querySelector("input[type='submit']").value = "Unsubscribe";
            }

            const regex = new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$");

            const email = queryString.get("email");

            if (email && regex.test(email)) {
                document.querySelector("#email").value = email;
            }

            if ((unsubscribe === "1" || subscribe === "1") && email && regex.test(email)) {
                document.querySelector("form").submit();
            }

            document.querySelector("#unsubscribe").addEventListener("change", function () {
                if (this.checked) {
                    this.form.action = "/unsubscribe.php";
                    this.form.querySelector("input[type='submit']").value = "Unsubscribe";
                } else {
                    this.form.action = "/subscribe.php";
                    this.form.querySelector("input[type='submit']").value = "Subscribe";

                    if (unsubscribe === "1") {
                        window.history.replaceState({}, document.title, "/");
                    }
                }
            });
        })
    </script>
</body>

</html>