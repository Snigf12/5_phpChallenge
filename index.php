<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Challenge 4</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./src/favicon.png">
    </head>

    <body>
        <!--This is the header with the logout button and the logo title-->
        <div class="header-container">
            <button class="lbutton">
                Logout
            </button>
            <div class="cnetLogo">
                <img class="logo" src="./src/cnet.png">
            </div>
        </div>
        <!--This is the form-->
        <div class="form-container">
            <h1>Enter Course Grades</h1>
            <form class="form" onsubmit="return writeInTable()">
                <div class="form-item">
                    <label for="fname">First Name :&nbsp</label>
                    <input type="text" id="fname" placeholder="First Name">
                </div>
                <div class="form-item">
                    <label for="lname">Last Name :&nbsp</label>
                    <input type="text" id="lname" placeholder="Last Name">
                </div>
                <div class="form-item">
                    <label for="course">Course Number :&nbsp</label>
                    <select id="course">
                        <option value="" disabled selected>Select Course</option>
                        <option value="CNET2050">CNET-2050 Powershell and Enterprise Systems</option>
                        <option value="CNET2050">CNET-2310 Technology Project</option>
                        <option value="CNET2220">CNET-2220 Service Based Infrastructure II</option>
                        <option value="CNET2030">CNET-2030 Web Technologies</option>
                        <option value="CNET2020">CNET-2020 Email Management</option>
                        <option value="CNET2011">CNET-2011 Connecting Networks</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="grade">Final Grade :&nbsp</label>
                    <input type="number" id="grade" min="0" max="100">
                </div>
                <div class="form-item">
                    <input type="submit" name="submit" class="button">
                </div>
                <div class="form-item">
                    <input type="reset" class="button">
                </div>
            </form>
        </div>
        <!--This is the title of the table and then the table information-->
        <div class="table-container">
            <h2>
                The table below displays the contents of the FinalGrades.txt file located on the Webserver
            </h2>
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course #</th>
                    <th>Grade</th>
                    <th>Letter Grade</th>
                </tr>
        <!-- This is going to be updated by PHP -->
        <?php
        // Function to convert grade to letter grade
        function convertGrade($grade) {
            if ($grade >= 95) {
                return 'A+';
            } elseif ($grade >= 90) {
                return 'A';
            } elseif ($grade >= 85) {
                return 'A-';
            } elseif ($grade >= 80) {
                return 'B+';
            } elseif ($grade >= 75) {
                return 'B';
            } elseif ($grade >= 70) {
                return 'B-';
            } elseif ($grade >= 65) {
                return 'C+';
            } elseif ($grade >= 60) {
                return 'C';
            } elseif ($grade >= 55) {
                return 'C-';
            } elseif ($grade >= 50) {
                return 'D';
            } else {
                return 'F';
            }
        }
        
        // Open the CSV file for reading
        $csvFile = fopen('students.csv', 'r');
        
        // Check if the file was opened successfully
        if ($csvFile !== FALSE) {
            // Read each line from the CSV file
            while (($data = fgetcsv($csvFile)) !== FALSE) {
                // Output the table rows
                echo '<tr>';
                    echo '<td>' . $data[0] . '</td>'; // First Name
                    echo '<td>' . $data[1] . '</td>'; // Last Name
                    echo '<td>' . $data[2] . '</td>'; // Course ID
                    echo '<td>' . $data[3] . '</td>'; // Grade
                    echo '<td>' . convertGrade($data[3]) . '</td>'; // Letter Grade
                echo '</tr>';
            }    
            // Close the CSV file
            fclose($csvFile);
        } else {
            // Error handling if the file couldn't be opened
            echo 'Error: Unable to open the CSV file.';
        }
        ?>
            </table>
            <button class="button">Clear Text file</button>
        </div>
        <script src="script.js"></script>
    </body>
</html>