var rolesToUpdate = {};
var usersByInitialRoles = {};
$(document).ready(function () {
    $("input[type=checkbox]").each(function () {
        var test = usersByInitialRoles["Hashim"];
        var initialRole = $(this).attr("name");
        var userName = $(this).parent().parent().attr("name");
        var checkedAttribute = $(this).attr("checked");
        var isChecked = typeof checkedAttribute !== typeof undefined && checkedAttribute !== false;
        var roleIsCheckedPair = {};
        roleIsCheckedPair[initialRole] = isChecked;
        var roleCheckedPairs = usersByInitialRoles[userName];
        if (typeof roleCheckedPairs === typeof undefined) {
            usersByInitialRoles[userName] = [];
        }

        usersByInitialRoles[userName].push(roleIsCheckedPair);
    });


    $("input").change(function (event) {

        var userName = $(this).parent().parent().attr("name");
        var roleName = $(this).attr("name");
        var isChecked = $(this).is(":checked");
        var initialRoleCheckedPairs = usersByInitialRoles[userName];
        if (typeof initialRoleCheckedPairs !== typeof undefined) {
            for (var i = 0; i < initialRoleCheckedPairs.length; i++) {
                var initialRoleCheckedPair = initialRoleCheckedPairs[i];
                var currentRoleIsChecked = initialRoleCheckedPair[roleName];
                if (typeof  currentRoleIsChecked === typeof undefined) {
                    continue;
                }

                if (currentRoleIsChecked === isChecked) {
                    var currentRolesOfUser = rolesToUpdate[userName];
                    if (typeof currentRolesOfUser !== typeof undefined) {
                        for (var index = 0; index < currentRolesOfUser.length; index++) {

                            var currentRoleStatusPair = currentRolesOfUser[index];
                            var currentRoleWasChecked = currentRoleStatusPair[roleName];
                            if (typeof currentRoleWasChecked !== typeof undefined) {
                                delete currentRolesOfUser[index];
                                return;
                            }
                        }
                    }
                }
            }
        }
        //
        //  AFTER CHECK
        //
        var roleIsCheckedPair = {};
        roleIsCheckedPair[roleName] = isChecked;
        var roleCheckedPairs = rolesToUpdate[userName];
        if (typeof roleCheckedPairs === typeof undefined) {
            rolesToUpdate[userName] = [];
        }

        rolesToUpdate[userName].push(roleIsCheckedPair);
    });

});


function saveChanges() {
    var url = "";
    var csrfHeader = $("meta[name='_csrf_header']").attr("content");
    var csrfToken = $("meta[name='_csrf']").attr("content");
    var headers = {};

    headers[csrfHeader] = csrfToken;
    $.ajax({
        url: url,
        type: "POST",
        data: rolesToUpdate,
        headers: headers,
        success: function () {
            location.reload();
        }
    });
}

var MouseIcon =
{
    offsetX: 15,
    offsetY: 15,
    shown: false,
    enabled: false,
    show: function (iconType) {
        $(document).mousemove(MouseIcon.updatePosition);
        var bkgImg = 'url(' + (iconType == "FAIL" ? 'http://seafight-14.level3.bpcdn.net/img/global/cursor/false_cursor.png?__cv=26f160f1ee7ced587d9aec66ec633200' : 'http://seafight-14.level3.bpcdn.net/img/global/cursor/true_cursor.png?__cv=57e073f3b4074299a477615221cf0000') + ')';
        $('#MouseIcon').css('background-image', bkgImg);
        MouseIcon.enabled = true;
    },
    hide: function () {
        $('#MouseIcon').fadeOut(1000, function () {
            MouseIcon.enabled = false;
            MouseIcon.shown = false;
        });
    },
    updatePosition: function (e) {
        if (!MouseIcon.enabled)
            return;
        if (!MouseIcon.shown) {
            MouseIcon.shown = true;
            $('#MouseIcon').fadeIn(1000);
            setTimeout(function () {
                MouseIcon.hide()
            }, 4000);
        }
        $('#MouseIcon').css('top', e.pageY + MouseIcon.offsetY + 'px');
        $('#MouseIcon').css('left', e.pageX + MouseIcon.offsetX + 'px');
    }
};