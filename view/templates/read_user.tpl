<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="css/read_user.css">
</head>

<body>
    <header class="read_user_header">
        <h1>Read</h1>
    </header>

    <div class="read_user_form">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <select name="user_type">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name1" placeholder="Last Name1"><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="read_user" value="Read">
        </form> <br><br>
    </div>

    <div class="read_user_table">
        <table>
            <thead>
                <tr>
                    <td>User</td>
                    <td>Email</td>
                    <td>First Name</td>
                    <td>Last Name1</td>
                </tr>
            </thead>
            <tbody>
                {if isset($user_data)}
                    {foreach from=$user_data item=user}
                        <tr>
                            <td>{$user.username}</td>
                            <td>{$user.email}</td>
                            <td>{$user.first_name}</td>
                            <td>{$user.last_name1}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="4">No user data available.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</body>

</html>