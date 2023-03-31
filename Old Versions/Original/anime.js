
        var page = require('webpage').create();
        page.open('https://www1.animeultima.to/a/plunderer_435746/episode-21_770926-sub', function () {
            console.log(page.content); //page source
            phantom.exit();
        });