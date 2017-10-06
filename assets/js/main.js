/*
Micro CMS
*/


// Create the namespace
var cms = cms || {};


// Retrieve the data
cms.showListings = function (str) {

    var results = document.getElementById('results');
    var output = '';
    var item = '';
    var jobTitle = '';
    var country = '';
    var compName = '';
    var details = '';
    var id = '';
    var i = 0;

    results.innerHTML = '';

    if (str === 'Please Select Category') {
        str = 'all';
    }

    fetch('data_json.php?role=' + str).then(function (response) {
        // Convert to JSON
        return response.json();
    }).then(function (items) {

        // Cache of the template
        var template = document.getElementById('template-list-item');
        // Get the contents of the template
        var templateHtml = template.innerHTML;
        // Final HTML variable as empty string
        var listHtml = '';

        // Loop through items, replace placeholder tags
        // with actual data, and generate final HTML
        for (var key in items) {
            listHtml += templateHtml
                .replace(/{{id}}/g, items[key]['id'])
                .replace(/{{jobTitle}}/g, items[key]['JobTitle'])
                .replace(/{{country}}/g, items[key]['Country'])
                .replace(/{{compName}}/g, items[key]['CompName'])
                .replace(/{{details}}/g, items[key]['Details']);
        }

        // Replace the HTML of #list with final HTML
        document.getElementById('results').innerHTML = listHtml;

    });

}


// Add listing
cms.addListingDetails = function () {

    cms.utils.openPanel();

    cms.utils.hide(document.querySelector('.update'));
    cms.utils.show(document.querySelector('.add'));

    // clear values
    document.querySelector('input#id').value = '';
    document.querySelector('input.job-title').value = '';
    document.querySelector('input.country').value = '';
    document.querySelector('input.comp-name').value = '';
    document.querySelector('input.details').value = '';

}


// Add a listing
cms.addListing = function () {

    var jobTitle = document.querySelector('input.job-title').value;
    var country = document.querySelector('input.country').value;
    var compName = document.querySelector('input.comp-name').value;
    var details = document.querySelector('input.details').value;

    dataString = {
        'JobTitle': jobTitle,
        'Country': country,
        'CompName': compName,
        'Details': details
    };

    cms.utils.show(document.querySelector('.saving'));

    fetch('addlisting.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'JobTitle=' + jobTitle + '&Country=' + country + '&CompName=' + compName + '&Details=' + details
    }).then((response) => {
        cms.utils.closePanel();
        cms.showListings(jobTitle);
        cms.utils.hide(document.querySelector('.saving'));
        console.log('Data saved: ' + 'Job Title: ' + jobTitle + '\n' + 'Country: ' + country + '\n' + 'Company Name: ' + compName + '\n' + 'Details: ' + details + '\n');
    });

}


// Select listing
cms.selectListing = function (id, jobTitle, country, compName, details) {

    cms.utils.openPanel();

    cms.utils.hide(document.querySelector('.add'));
    cms.utils.show(document.querySelector('.update'));

    document.querySelector('input#id').value = id;
    document.querySelector('input.job-title').value = jobTitle;
    document.querySelector('input.country').value = country;
    document.querySelector('input.comp-name').value = compName;
    document.querySelector('input.details').value = details;

}


// Update listing
cms.updateListing = function () {

    var id = document.querySelector('input#id').value;
    var jobTitle = document.querySelector('input.job-title').value;
    var country = document.querySelector('input.country').value;
    var compName = document.querySelector('input.comp-name').value;
    var details = document.querySelector('input.details').value;

    dataString = {
        'id': id,
        'JobTitle': jobTitle,
        'Country': country,
        'CompName': compName,
        'Details': details
    };

    cms.utils.show(document.querySelector('.saving'));

    fetch('updatelisting.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + id + '&JobTitle=' + jobTitle + '&Country=' + country + '&CompName=' + compName + '&Details=' + details
    }).then((response) => {
        cms.utils.closePanel();
        cms.showListings(jobTitle);
        cms.utils.hide(document.querySelector('.saving'));
        console.log('Data saved: ' + 'Job Title ' + jobTitle + '\n' + 'Country ' + country + '\n' + 'Company Name ' + compName + '\n' + 'Details ' + details + '\n');
    });

}


// Delete listing
cms.deleteListing = function (id) {

    var response = confirm('Are you sure you want to delete this listing?');

    if (response) {
        // delete listing
        fetch('deletelisting.php?id=' + id + '', {
            method: 'post',
        }).then(function (data) {
            cms.showListings('all');
            console.log('Listing deleted: ' + id);
        });
    } else {
        //do nothing
        return false;
    }

}


// Utils functions
cms.utils = {

    openPanel: function () {
        cms.utils.show(document.querySelector('.panel'));
        cms.utils.addMiniFog();
    },

    closePanel: function () {
        cms.utils.hide(document.querySelector('.panel'));
        cms.utils.hideMiniFog();
    },

    hideMiniFog: function () {
        cms.utils.hide(document.querySelector('#fog'));
    },

    addMiniFog: function () {
        cms.utils.show(document.querySelector('#fog'));
    },

    clearResults: function () {
        document.querySelector('#results').innerHTML = '';
    },

    hide: function (el) {
        el.style.display = 'none';
    },

    show: function (el) {
        el.style.display = 'block';
    }

}


// Bind events
document.addEventListener('DOMContentLoaded', function (event) {

    document.querySelector('.add-listing-details').addEventListener('click', function () {
        cms.addListingDetails();
    });

    document.querySelector('.show-listings').addEventListener('click', function () {
        cms.showListings('all');
    });

    document.querySelector('.clear-results').addEventListener('click', function () {
        cms.utils.clearResults();
    });

    document.querySelector('.update-listing').addEventListener('click', function () {
        cms.updateListing();
    });

    document.querySelector('.add-listing').addEventListener('click', function () {
        cms.addListing();
    });

    var closePanel = document.getElementsByClassName('close-panel');

    for (var i = 0; i < closePanel.length; i++) {
        closePanel[i].addEventListener('click', function () {
            cms.utils.closePanel();
        });
    }

    document.querySelector('.customers').addEventListener('change', function () {
        cms.showListings(this.value);
    });

    document.querySelector('#results').addEventListener('click', function (event) {

        if (event.target.classList.contains('open-update-listing')) {

            console.log('open-update-listing');

            var id = event.target.getAttribute('data-id');
            var jobTitle = event.target.getAttribute('data-jobtitle');
            var country = event.target.getAttribute('data-country');
            var compName = event.target.getAttribute('data-compname');
            var details = event.target.getAttribute('data-details');

            cms.selectListing(id, jobTitle, country, compName, details);
        }

        if (event.target.classList.contains('delete-listing')) {

            console.log('delete-listing');

            var id = event.target.getAttribute('data-id');

            cms.deleteListing(id)
        }

    });

    cms.showListings('all');

});

