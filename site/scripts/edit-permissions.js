var rolesToUpdate = [];
$(document).ready(function(){

$("select").change(function(event){
	var userId = $(this).attr("name");
	var role = $(this).find(":selected").text();
	var roleToUpdate = { userId : userId, role:role };
	for (var i = rolesToUpdate.length - 1; i >= 0; i--) {
		if(rolesToUpdate[i]["userId"] == userId){
			rolesToUpdate[i]["role"] = role;
			return;
		}
	}

	rolesToUpdate.push(roleToUpdate);
});

});


function saveChanges(){
	var url = "";
	$.post(url, {"rolesToUpdate":rolesToUpdate},function(data,status){
		window.location.reload(true);
		if (status == "success") 
		{
			if (data)
			{

			}
			else
			{

			}
		}
		else
		{

		}
	});
}

var MouseIcon =
        {
            offsetX: 15,
            offsetY: 15,
            shown: false,
            enabled: false,
            show: function (iconType)
            {
                $(document).mousemove(MouseIcon.updatePosition);
                var bkgImg = 'url(' + (iconType == "FAIL" ? 'http://seafight-14.level3.bpcdn.net/img/global/cursor/false_cursor.png?__cv=26f160f1ee7ced587d9aec66ec633200' : 'http://seafight-14.level3.bpcdn.net/img/global/cursor/true_cursor.png?__cv=57e073f3b4074299a477615221cf0000') + ')';
                $('#MouseIcon').css('background-image', bkgImg);
                MouseIcon.enabled = true;
            },
            hide: function ()
            {
                $('#MouseIcon').fadeOut(1000, function () {
                    MouseIcon.enabled = false;
                    MouseIcon.shown = false;
                });
            },
            updatePosition: function (e)
            {
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