<?php
$location = '';
$certificate = '';
$uni = '';
$min_exp = '';
$max_exp = '';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT users.id, users.full_name, resumes.contact, resumes.skills, resumes.education, resumes.experience, resumes.url
FROM users 
JOIN resumes ON users.id = resumes.user_id 
WHERE resumes.contact LIKE '%" . $location . "%'
AND JSON_SEARCH(JSON_EXTRACT(resumes.education, '$[*].college'), 'one', '%" . $uni . "%') IS NOT NULL
AND resumes.certificate LIKE '%" . $certificate . "%'";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $certificate = $uni = $min_exp = $max_exp = "";
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (!empty($_POST['location'])) {
        $location = test_input($_POST['location']);
    }

    if (!empty($_POST['uni'])) {
        $uni = test_input($_POST['uni']);
    }

    if (!empty($_POST['certificate'])) {
        $certificate = test_input($_POST['certificate']);
    }

    if (!empty($_POST['min_exp'])) {
        $min_exp = test_input($_POST['min_exp']);
    }

    if (!empty($_POST['max_exp'])) {
        $max_exp = test_input($_POST['max_exp']);
    }

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT users.id, users.full_name, resumes.contact, resumes.skills, resumes.education, resumes.experience, resumes.url
    FROM users 
    JOIN resumes ON users.id = resumes.user_id 
    WHERE resumes.contact LIKE '%" . $location . "%'
    AND JSON_SEARCH(JSON_EXTRACT(resumes.education, '$[*].college'), 'one', '%" . $uni . "%') IS NOT NULL
    AND resumes.certificate LIKE '%" . $certificate . "%' ";

    if (!empty($_POST['degree'])) {
        $degrees = $_POST['degree'];
        foreach ($degrees as $degree) {
            $sql = $sql . "AND JSON_SEARCH(JSON_EXTRACT(resumes.education, '$[*].course'), 'one', '%" . $degree . "%') IS NOT NULL ";
        }
    }

    if (!empty($_POST['skills'])) {
        $checkboxSkills = ["HTML", "CSS", "Javascript", "PHP", "SQL", "C", "C++", "Python", "Java"];
        $otherSkills = ['C#', 'R', 'TypeScript', 'Objective-C', 'Swift', 'MatLab', 'Go', 'Ruby', 'Scala', 'Dart', 'ANTLR'];

        $otherSkills = array_diff($otherSkills, $checkboxSkills);
        $skills = $_POST['skills'];

        foreach ($skills as $skill) {
            if ($skill == 'Others') {
                $skill = implode(",", $otherSkills);
            }
            $sql .= "AND (";
            $first = true;
            $skill = explode(",", $skill);
            foreach ($skill as $s) {
                $s = trim($s);
                if ($first) {
                    if ($s == "C") {
                        $sql .= "resumes.skills REGEXP CONCAT('\\\b', 'C', '\\\b') ";
                    } else {
                        $sql .= "resumes.skills LIKE '%" . $s . "%' ";
                    }
                    $first = false;
                } else {
                    $sql .= "OR resumes.skills LIKE '%" . $s . "%' ";
                }
            }
            $sql .= ") ";
        }
    }

    $result = $conn->query($sql);
}
?>
<h1 class="text-center my-3">Find Jobseekers</h1>
<form action="search" method="POST" class="mx-4 my-4">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        </div>
        <input type="search" class="form-control" placeholder="Search (ex. Name,...)" aria-label="Username"
            aria-describedby="basic-addon1" onkeyup="showResult(this.value)">
    </div>
    <div id="livesearch" class="mb-4 py-3 px-1"></div>
    <div class="row mt-4 g-4 bg-info-subtle mx-1">
        <div class="col-md-4">
            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <br>
                <input class="form-control" type="text" name="location" id="location" placeholder="Ho Chi Minh City"
                    value="<?php echo $location ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="certificate" class="form-label">Certificate</label>
                <br>
                <input class="form-control" type="text" name="certificate" id="certificate" placeholder="IT Engineer"
                    value="<?php echo $certificate ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="uni" class="form-label">College/University</label>
                <br>
                <input class="form-control" type="text" name="uni" id="uni" placeholder="IT Engineer"
                    value="<?php echo $uni ?>">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="exp" class="form-label">Experiences</label><br>
                <input class="form-control" type="number" name="min_exp" id="min_exp" placeholder="Min"
                    value="<?php echo $min_exp ?>"><br>
                <input class="form-control" type="number" name="max_exp" id="max_exp" placeholder="Max"
                    value="<?php echo $max_exp ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Degree</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Associate" name="degree[]">
                    <label class="form-check-label" for="deg1" class="form-label">
                        Associate
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Bachelor" name="degree[]">
                    <label class="form-check-label" for="deg2" class="form-label">
                        Bachelor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Master" name="degree[]">
                    <label class="form-check-label" for="deg3" class="form-label">
                        Master
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Doctoral" name="degree[]">
                    <label class="form-check-label" for="deg4" class="form-label">
                        Doctoral
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Skills</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="HTML, CSS, Javascript" name="skills[]">
                    <label class="form-check-label" for="sk1" class="form-label">
                        HTML, CSS, JavaScript
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="PHP, SQL" name="skills[]">
                    <label class="form-check-label" for="sk2" class="form-label">
                        PHP, SQL
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="C, C++" name="skills[]">
                    <label class="form-check-label" for="sk3" class="form-label">
                        C/C++
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Python" name="skills[]">
                    <label class="form-check-label" for="sk4" class="form-label">
                        Python
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Java" name="skills[]">
                    <label class="form-check-label" for="sk5" class="form-label">
                        Java
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Others" name="skills[]">
                    <label class="form-check-label" for="sk6" class="form-label">
                        Others
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12"><button type="submit" class="btn btn-primary my-3">Submit</button></div>
    </div>
</form>
<div class="table-responsive ">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Skills</th>
                <th scope="col">College/University</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['contact'] = json_decode($row['contact'], true);
                $row['skills'] = json_decode($row['skills'], true);
                $row['education'] = json_decode($row['education'], true);

                $experience = json_decode($row['experience'], true);
                $w_duration = $experience[0]['w_duration'];
                $years = explode("-", $w_duration);
                $start_year = $years[0];
                $end_year = $years[1];
                $exp_year = $end_year - $start_year;

                $html = "
                <tr>
                    <td>{$row['full_name']}</td>
                    <td>{$row['contact']['address']}</td>
                    <td>" . implode(', ', $row['skills']) . "</td>
                    <td>" . implode(', ', $row['education'][0]) . "</td>
                    <td class='position-relative'>
                        <a target='_blank' href='" . SITE_URL . "resume/" . $row['url'] . "' class='btn btn-info position-absolute top-50 start-50 translate-middle' role='button'>View</a>
                    </td>
                </tr>";

                if (!empty($_POST['min_exp'])) {
                    if ($exp_year >= $min_exp) {
                        if (!empty($_POST['max_exp'])) {
                            if ($exp_year <= $max_exp) {
                                echo $html;
                            }
                        } else echo $html;
                    }
                } else if (!empty($_POST['max_exp'])) {
                    if ($exp_year <= $max_exp) {
                        echo $html;
                    }
                } else {
                    echo $html;
                }
            }
        } else {
            echo '<h3 class="text-center text-danger py-2">No CV found</h3>';
        }

        ?>
    </table>
    <?php

    $sql = "SELECT users.id, users.full_name, resumes.contact, resumes.skills, resumes.education, resumes.url FROM users JOIN resumes ON users.id = resumes.user_id;";
    $result = $conn->query($sql);

    $xml = new XMLWriter();
    $xml->openURI("ajax_file.xml");
    $xml->startDocument();
    $xml->setIndent(true);
    $xml->startElement('Resumes');

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $xml->startElement('Resume');
            $xml->writeAttribute('ID', $row['id']);
            $xml->startElement('Name');
            $xml->writeRaw($row["full_name"]);
            $xml->endElement();
            $xml->startElement('Contact');
            $xml->writeRaw($row["contact"]);
            $xml->endElement();
            $xml->startElement('Skills');
            $xml->writeRaw(implode(', ', json_decode($row["skills"], true)));
            $xml->endElement();
            $xml->startElement('Education');
            $xml->writeRaw($row["education"]);
            $xml->endElement();
            $xml->startElement('Url');
            $xml->writeRaw(SITE_URL . "resume/" . $row['url']);
            $xml->endElement();
            $xml->endElement();
        }
    }

    $xml->endElement();
    $xml->flush();
    $conn->close();
    ?>