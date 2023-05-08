<h1 class="text-center my-3">Find Jobseekers</h1>
<form action="#" method="GET" class="mx-4 my-4">
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
                <input class="form-control" type="text" name="location" id="location" placeholder="Ho Chi Minh City">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="certificate" class="form-label">Certificate</label>
                <br>
                <input class="form-control" type="text" name="certificate" id="certificate" placeholder="IT Engineer">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="uni" class="form-label">College/University</label>
                <br>
                <input class="form-control" type="text" name="uni" id="uni" placeholder="IT Engineer">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="exp" class="form-label">Experiences</label><br>
                <input class="form-control" type="number" name="min_exp" id="min_exp" placeholder="Min"><br>
                <input class="form-control" type="number" name="max_exp" id="max_exp" placeholder="Max">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Degree</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="deg1" id="deg1">
                    <label class="form-check-label" for="deg1" class="form-label">
                        Associate
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="deg2" id="deg2">
                    <label class="form-check-label" for="deg2" class="form-label">
                        Bachelor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="deg3" id="deg3">
                    <label class="form-check-label" for="deg3" class="form-label">
                        Master
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="deg4" id="deg4">
                    <label class="form-check-label" for="deg4" class="form-label">
                        Doctoral
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="deg5" id="deg5">
                    <label class="form-check-label" for="deg5" class="form-label">
                        None
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Skills</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sk1" id="sk1">
                    <label class="form-check-label" for="defaultCheck1" class="form-label">
                        HTML, CSS, JavaScript
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sk2" id="sk2">
                    <label class="form-check-label" for="defaultCheck1" class="form-label">
                        PHP, MySQL
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sk3" id="sk3">
                    <label class="form-check-label" for="defaultCheck1" class="form-label">
                        C/C++
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sk4" id="sk4">
                    <label class="form-check-label" for="defaultCheck1" class="form-label">
                        Python
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sk5" id="sk5">
                    <label class="form-check-label" for="defaultCheck1" class="form-label">
                        Java
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sk6" id="sk6">
                    <label class="form-check-label" for="defaultCheck1" class="form-label">
                        Others
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12"><button type="submit" class="btn btn-primary my-3">Submit</button></div>
    </div>
</form>

<div class="m-4">
    <?php $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT users.id, users.full_name, resumes.headline, resumes.contact, resumes.skills, resumes.education, resumes.url FROM users JOIN resumes ON users.id = resumes.user_id ORDER BY users.id";
    $result = $conn->query($sql);
    ?>
    <div class="table-responsive ">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Skills</th>
                    <th>College/University</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['contact'] = json_decode($row['contact'], true);
                    $row['skills'] = json_decode($row['skills'], true);
                    $row['education'] = json_decode($row['education'], true); ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["full_name"] ?></td>
                <td><?php
                            echo $row["contact"]['address'] ?></td>
                <td><?php
                            echo implode(', ', $row['skills']) ?></td>
                <td><?php
                            echo implode(', ', $row['education'][0]) ?></td>
                <td>
                    <a href=<?php echo SITE_URL . "resume/" . $row['url'] ?> class="btn btn-info me-md-2"
                        role="button">View</a>
                    <!-- <a href="#" class="btn btn-success" role="button">Accept</a> -->
                </td>
            </tr>
            <?php }
            } else {
                echo "No CV found";
            }?>
        </table>
    </div>
</div>
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
?>
<script type="text/javascript">
function showResult(str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "live_search?q=" + str, true);
    xmlhttp.send();
}
</script>