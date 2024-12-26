Array.from(document.getElementsByClassName("chapitreButton")).forEach(function(elem) {
    elem.addEventListener("click", function() {
        let clickBtnValue = elem.name;
        let query = "update Hero set chapter_id = " + clickBtnValue + " where name = '" + document.getElementById("heroValue").innerHTML + "' and hero_id in (select hero_id from Account a join Hero_list hl on a.account_id = hl.account_id where a.name = '" + document.getElementById("userValue").innerHTML + "')";
        let ajaxurl = '/DungeonXplorer/private/tool/ajax';
        data =  {'type': 'query', 'query': query};
        $.post(ajaxurl, data, function (response) {
            location.reload();
        });
    });
});