<?php
include 'session.php'; // Make sure this path is correct
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 54.5px 0;
        }
        .section {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Vertically center content within the section */
            align-items: center; /* Horizontally center content within the section */
        }
        .section h3 {
            margin: 2rem 0;
            text-align: center;
            text-decoration: underline;
            text-underline-offset: 5px;
        }
        /* Styling for the table-based forms */
        .section form table {
            width: 100%; /* Make the table take full width of its container */
            border-collapse: collapse; /* Collapse borders between cells */
            /* Add borders to the table itself to enclose it with the 2px black border */
            border: 2px solid black; /* This border will now form the main outer border of the table content */
            margin-bottom: 20px; /* Space between table and button if button is outside table */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }
        .section form table tr {
            height: 4rem; /* Set a consistent height for table rows */
            /* Remove border-bottom from tr, borders will be applied to td */
        }
        .section form table td {
            padding: 5px 10px; /* Padding for table cells */
            vertical-align: middle; /* Vertically align content in the middle */
            /* Apply internal borders to table cells to connect to the outer border */
            /* border-right: 1px solid #ccc; Lighter vertical line */
            border-bottom: 2px solid black; /* Lighter horizontal line */
            box-sizing: border-box;
        }
        /* Style for the first column (labels) */
        .section form table td:first-child {
            width: 25%; /* Allocate space for labels */
            text-align: center; /* Align labels to the right */
            padding-right: 20px; /* Space between label and input */
            border-left: none; /* No double left border */
        }
        /* Style for the last column (inputs) */
        .section form table td:last-child {
            width: 75%; /* Allocate space for inputs */
            text-align: left; /* Align inputs to the left */
            border-right: none; /* No double right border */
        }
        /* Remove bottom border from cells in the last row of the table */
        .section form table tr:last-child td {
            border-bottom: none;
        }
        /* Adjust last column of the last row for the button if needed */
        .section form table tr:last-child td:last-child {
             /* Remove right border if it's a colspan button cell */
        }

        .section form table input[type="text"],
        .section form table input[type="email"],
        .section form table input[type="password"] {
            width: calc(100% - 30px); /* Adjust width to account for padding */
            height: 3rem;
            border-radius: 1.5rem;
            box-sizing: border-box;
            border: 1px solid #ccc; /* Add a subtle border to inputs */
            padding: 0 15px; /* Padding inside the input field */
            display: block; /* Make input a block element to control its width better */
        }
        .section form table label {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 1.2rem; /* Adjusted label font size */
            display: block; /* Make label a block element for alignment */
        }
        .section .fieldfieldset {
            /* Removed border here as the table now handles the main border */
            border: none; /* No border directly on fieldfieldset anymore */
            width: 80%;
            margin: auto;
            padding: 0; /* Remove padding to let table borders align perfectly */
            box-sizing: border-box;
        }
        .line2 {
            font-family: 'Arial Black', sans-serif;
            line-height: 54.2px;
            overflow: hidden;
            position: absolute;
            width: max-content;
            height: 54.2px;
            background-color: black;
            top: 0;
            left: -5px;
            text-transform: uppercase;
            box-sizing: border-box;
            color: white;
            white-space: nowrap; /* Prevent text wrapping */
        }
        .line3 {
            font-family: "Arial Black", sans-serif;
            line-height: 54.2px;
            overflow: hidden;
            position: absolute;
            width: max-content;
            height: 54.2px;
            background-color: black;
            bottom: 0;
            left: -5px;
            text-transform: uppercase;
            box-sizing: border-box;
            color: white;
            white-space: nowrap; /* Prevent text wrapping */
        }
        .btn {
            background-color: black;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 15px; /* Space between table and button */
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: fit-content;
        }
        .btn:hover {
            background-color: #45a049;
        }
        #contact{
            width: 70%;
        }
        .button-btn{
            display: flex;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php' ?>
    <div class="container">
        <div class="line2">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>

        <?php
        // Check if user is logged in
        if (!isset($_SESSION["id_login"])) {
            header("Location: login.php");
            exit();
        }

        // Prepare and execute statement to get admin data
        $stmt = mysqli_prepare($conn, "SELECT * FROM t_admin WHERE id_admin = ?");
        mysqli_stmt_bind_param($stmt, "i", $_SESSION["id_login"]);
        mysqli_stmt_execute($stmt);
        $query_result = mysqli_stmt_get_result($stmt);
        $d = mysqli_fetch_object($query_result);

        // Check if data was retrieved
        if (!$d) {
            echo "<p>Error: User data not found.</p>";
        }
        ?>

        <div class="section">
            <form id="contact" action="" method="post">
                <h3>Profil</h3>
                <div class="fieldfieldset">
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="nama">nama:</label></td>
                                <td><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo htmlspecialchars($d->admin_name ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="username">username:</label></td>
                                <td><input type="text" name="username" id="username" placeholder="Username" value="<?php echo htmlspecialchars($d->username ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="hp">phone:</label></td>
                                <td><input type="text" name="hp" id="hp" placeholder="No hp" value="<?php echo htmlspecialchars($d->phone ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="email">email:</label></td>
                                <td><input type="email" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($d->admin_email ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="alamat">address:</label></td>
                                <td><input type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo htmlspecialchars($d->admin_address ?? ''); ?>" required></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button-btn">
                        <butto class="btn" name="" id="contact-submit" onclick="window.location='../logout.php'">Log out</butto>
                        <button type="submit" class="btn" name="submit" id="contact-submit">change profile</button>
                    </div>
            </form>
        </div>

        <div class="section">
            <form action="" id="contact" method="post">
                <h3>Ubah Password</h3>
                <div class="fieldfieldset">
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="pass1">New Password:</label></td>
                                <td><input type="password" name="pass1" id="pass1" placeholder="Password Baru" required></td>
                            </tr>
                            <tr>
                                <td><label for="pass2">Confirm Password:</label></td>
                                <td><input type="password" name="pass2" id="pass2" placeholder="Konfirmasi password Baru" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center; border-bottom: none; border-left: none; border-right: none;">
                                    <button type="submit" class="btn" name="ubah_password" id="contact-submit">Ubah password</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="line3">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $nama   = ucwords($_POST["nama"]);
        $user   = $_POST["username"];
        $hp     = $_POST["hp"];
        $email  = $_POST["email"];
        $alamat = ucwords($_POST["alamat"]);
        $update = mysqli_query($conn, "UPDATE t_admin SET admin_name = '$nama', username = '$user', phone = '$hp', admin_email = '$email', admin_address = '$alamat' WHERE id_admin = '" . $_SESSION['id_login']. "'");
        if ($update) {
            echo "
                <script>
                    alert('Ubah Data Berhasil');
                    // window.location = 'profile_user.php';
                </script>
                ";
        } else {
            echo 'gagal' . mysqli_error($conn);
        }
    }

    if (isset($_POST["ubah_password"])) {
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        if ($pass1 == $pass2) {
            echo "<script>
                            alert('Ubah kata sandi Berhasil');
                        </script>";
            $u_pass = mysqli_query($conn, "UPDATE t_admin SET password = '$pass1' WHERE id_admin = '" . $_SESSION['id_login'] . "'");
            if ($u_pass) {
                echo "
                        <script>
                            window.location = 'profile_user.php';
                        </script>
                        ";
            } else {
                echo 'gagal' . mysqli_error($conn);
            }
        } elseif ($pass2 != $pass1) {
            echo "
                <script>
                    alert('Konfirmasi Password Tidak sesuai')
                </script>
                ";
        } elseif ($pass2 == $pass1) {
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>