<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Read</h1>

    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <select name="user_type">
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
        </select>
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name1" placeholder="Last Name1">
        <input type="text" name="last_name2" placeholder="Last Name2"><br><br>
        <a href="index.php?action=admin_dashboard">Back</a> or
        <input type="submit" name="read_user" value="Read">
    </form> <br><br>

    <table>
        <thead>
            <tr>
                <td>Username</td>
                <td>User Type</td>
                <td>First Name</td>
                <td>Last Name 1</td>
                <td>Last Name 2</td>
            </tr>
        </thead>
        <tbody>
            <td>
                {* {foreach from=$result item=$student_data}
                    {$student_data} <br>
                {/foreach} *}
            </td>
        </tbody>
    </table>
</body>

</html>