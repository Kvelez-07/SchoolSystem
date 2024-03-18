<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="css/read_subject.css">
</head>

<body>
    <header class="read_subject_header">
        <h1>Subject List</h1>
    </header>

    <div class="read_subject_form">
        <form action="index.php" method="POST">
            <select name="subject_name">
                <option value="spanish">Español</option>
                <option value="social_studies">Estudios Sociales</option>
                <option value="science">Ciencias</option>
                <option value="math">Mate</option>
            </select><br><br>
            <a href="index.php?action=admin_dashboard">Back</a> or
            <input type="submit" name="read_subject" value="Read">
        </form> <br><br>
    </div>

    <div class="read_subject_table">
        <table>
            <thead>
                <tr>
                    <td>Subject ID</td>
                    <td>School-Level ID</td>
                    <td>Teacher ID</td>
                    <td>Subject Name</td>
                </tr>
            </thead>
            <tbody>
                {if isset($subject_data)}
                    {foreach from=$subject_data item=subject}
                        <tr>
                            <td>{$subject.id}</td>
                            <td>{$subject.school_levels_id}</td>
                            <td>{$subject.teacher_id}</td>
                            <td>{$subject.subject_name}</td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <!-- match empty spaces with header -->
                        <td colspan="4">No subject data available.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</body>

</html>