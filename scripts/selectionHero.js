Array.from(document.getElementsByClassName("choixHero")).forEach(function(elem) {
    elem.addEventListener("click", function() {
        var clickBtnValue = elem.querySelector('.card').querySelector('.card-content').querySelector('.media').querySelector('.media-content').querySelector('.title').innerText;
        alert(clickBtnValue);
        var ajaxurl = '/DungeonXplorer/private/tool/ajax',
        data =  {'type': 'selection', 'hero': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });
});