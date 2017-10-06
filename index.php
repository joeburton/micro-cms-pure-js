<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Micro - CMS</title>
	<meta name="description" content="Micro CMS - read, update and delete items">
	<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" media="all" href="assets/css/reset.css"/>
	<link rel="stylesheet" media="all" href="assets/css/text.css"/>
	<link rel="stylesheet" media="all" href="assets/css/main.css"/>
	<script>
    window.Promise || document.write('<script src="https://unpkg.com/es6-promise@3.2.1/dist/es6-promise.min.js"><\/script>');
    window.fetch || document.write('<script src="https://unpkg.com/whatwg-fetch@1.0.0/fetch.js"><\/script>');
    </script>
</head>
<body>
    <div class="success"></div>
    <div id="fog"></div>
    <!-- Update listing -->
    <div class="panel">
        <div class="create-new">
            <ul class="portal-text-fields">
                <li>
                    <input id="id" type="hidden" name="id" />
                    <label for="job-title">Job Title</label>
                    <input class="job-title" type="text" name="job-title" />
                </li>
                <li>            
                    <label for="country">Country</label>
                    <input class="country" type="text" name="country" />
                </li>
                <li>
                    <label for="comp-name">Company Name</label>
                    <input class="comp-name" type="text" name="comp-name" />
                </li>
                <li>
                    <label for="details">Details</label>
                    <input class="details" type="text" name="details" />
                </li>
            </ul>
            <div class="ad-buttons update" style="margin: 10px 0px 0px;">
                <a href="#" class="update-listing">Update</a>
                <a href="#" class="close-panel">Cancel</a>
            </div> 
            <div class="ad-buttons add" style="margin: 10px 0px 0px;">
                <a href="#" class="add-listing">Add</a>
                <a href="#" class="close-panel">Cancel</a>
            </div> 
            <div class="saving">
            <img src="assets/images/108.gif" alt="saving" width="70" height="64" class="saving-icon" />
            </div>
        </div>
    </div>
    <!-- Update listing -->
    <div class="wrapper">
		<div class="inner">
            <h1>Micro CMS</h1>
            <nav class="mod">
                <h2>Filter</h2>
                <form id="update" class="update-form" action="#">
                    <label>Job Search</label>
                    <select name="customers" class="customers">
                        <option>Please Select Category</option>
                        <?php
                            include "config.php";
                            $q = "SELECT DISTINCT JobTitle FROM job_listings";
                            $r = mysql_query($q);
                            while ($row = mysql_fetch_array($r)) {
                                echo '<option value=' . '"' . $row['JobTitle'] . '"' . '>' . $row['JobTitle'] . '</option>';
                            }
                        ?>
                    </select>
                </form>
                <div class="nav-items">
                    <a href="#" class="show-listings">View all</a>
                    <a href="#" class="clear-results">Clear results</a>
                    <a href="#" class="add-listing-details float-right">Add new Job</a>
                </div>
            </nav>
            <div class="mod add-content">
                <ul id="results">
                </ul>
            </div>
            <div class="response"></div>
		</div>
	</div>
<script type="text/javascript" src="assets/js/main.js"></script>
<script id="template-list-item" type="text/template">
    <li>
        <div class="float-right">
            <ul>
            <div class="float-right"><ul> 
                <li><a href="#" class="open-update-listing" data-id="{{id}}" data-jobtitle="{{jobTitle}}" data-country="{{country}}" data-compname="{{compName}}" data-details="{{details}}">Update Listing</a></li>
                <li><a href="#" class="delete-listing" data-id="{{id}}" >Delete Listing</a></li></ul></div>
            </ul>
        </div>
        <h3>{{id}} - {{jobTitle}}</h3>
        <h4>{{country}} - {{compName}}</h4>
        <p>{{details}}</p>
    </li>
</script>
</body>
</html>
