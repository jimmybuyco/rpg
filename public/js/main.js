

var interval = 1000;
$(document).ready(function () {
    update();

});

function myFunction(id) {
    $("#index").val(id);
    var txt;
    var modal = document.getElementById('myModal');
    modal.style.display = "block";
//            var def = prompt("Please enter value (1=scissor, 2=paper, 3=rock):", "");
//            if (def == 1 || def == 2 || def == 3) {
//                $.ajax({
//                    url: "defChange?user=" + $('#user').val()+"&index="+id+"&val="+def,
//                    async: false,
//                    type: 'get',
//                    success: function (data) {
//                        update();
//                    },
//                    error: function () {
//                    }
//                });
//            } else {
//                txt = "Wrong input.";
//            }
    document.getElementById("demo").innerHTML = txt;
}

function updateDef(def) {
    $.ajax({
        url: "defChange?user=" + $('#user').val()+"&index="+$("#index").val()+"&val="+def,
        async: false,
        type: 'get',
        success: function (data) {
            update();
            var modal = document.getElementById('myModal');
            modal.style.display = "none";
        },
        error: function () {
        }
    });
}

function update() {
    $.ajax({
        url: 'stats?user=' + $("#user").val(),
        type: 'get',
        async: false,
        success: function (data) {
            $("#coins").text(data['coins']);
            $("#name").text(data['name']);
            $("#hp").text(data['hp']);
            $("#sp").text(data['sp']);
            $("#user").val(data['id']);
            if (data['sp_ctr'] > 0)
                $("#sp_ctr").text(": Recharge in " + data['sp_ctr'] + " sec/s");
            else
                $("#sp_ctr").text("");
            $("#lv").text(data['level']);

            var req_rocks = (data['atk'] % 10) * 20;
            var req_golds = Math.floor((data['atk'] / 10) * 2);
            $("#req_atk").text("Required: Rocks=" + req_rocks + " Golds=" + req_golds);
            var def = data['def'].split("");
            $("#def").text('');
            var ctr = 1;
            def.forEach(function (defence) {

                document.getElementById("def" + ctr).src = "img/" + defence + ".jpg";
                ctr++;
//                $("#def").text($("#def").text() + img);

            });

            var req_rocks = (data['def'] % 10) * 20;
            var req_golds = Math.floor((data['def'] / 10) * 2);
            $("#req_def").text("Required: Rocks=" + req_rocks + " Golds=" + req_golds);

            $("#miner1_box").text(data['miner1_box'] + "/" + data['miner1']);
            $("#miner2_box").text(data['miner2_box'] + "/" + data['miner2']);
            $("#miner3_box").text(data['miner3_box'] + "/" + data['miner3']);

            $("#miner1_level").text(data['miner1'] / 10);
            $("#miner2_level").text(data['miner2'] / 10);
            $("#miner3_level").text(data['miner3'] / 10);

            $("#rock").val(data['rock']);
            $("#wood").val(data['wood']);
            $("#grass").val(data['grass']);
            $("#gold").val(data['gold']);
            $("#def").val(data['def']);
            var options = {
                weekday: "long", year: "numeric", month: "short",
                day: "numeric", hour: "2-digit", minute: "2-digit"
            };
            var d = new Date();
            $("#message").html("");
            var message = data['message'];
            message.forEach(function (entry) {
                $("#message").html($("#message").html()+"<br>"+d.toLocaleTimeString("en-us", options) + ": " + entry['message'] );
            });

//                    if (data['message'])
//                        $("#message").html(d.toLocaleTimeString("en-us", options) + ": " + data['message'] + "<br>" + $("#message").html());
            move("get_rock", data['miner1'], data['miner1_box']);
            move("get_wood", data['miner2'], data['miner2_box']);
            move("get_grass", data['miner3'], data['miner3_box']);
            move("xp", 0, data['xp']);
            var rank = data['ranking'];
            $("#ranking").html('');
            var ctr = 1;

            var table = document.getElementById("userlist");
            $("#userlist").children().remove();
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = "RANK";
            cell2.innerHTML = "NAME";
            cell3.innerHTML = "LEVEL";
            cell4.innerHTML = "HP";
            cell5.innerHTML = "ACTION";
            $("#items").html('');
            $("#achive").html('');
//                    console.clear();
            var items = data['items'];
            items.forEach(function (entry) {
//                        $("#items").text("<img src='img/1.jpg'>");
//                        document.getElementById("def" + ctr).src = "img/" + defence + ".jpg";

                var img=document.createElement("img");

                var lifespan = (entry['lifespan'] / 600) * 100;
                img.src="img/"+entry['name']+".jpg";
                img.title=entry['attribute']+"+"+entry['value']+" "+Math.floor(lifespan)+"%";

                var foo = document.getElementById("items");
                foo.appendChild(img);
            });

            var achive = data['achive'];
            achive.forEach(function (entry) {

                var img=document.createElement("img");
                img.src="img/"+entry['icon'];
                img.title=entry['title']+" - "+entry['desc'];

                var foo = document.getElementById("achive");
                foo.appendChild(img);
            });


            rank.forEach(function (entry) {

                var row = table.insertRow(ctr);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = ctr;
                cell2.innerHTML = "<a href='user/"+entry['id']+"'>"+entry['name']+"</a>";
                var level = Math.floor(entry['xp'] / 1800) + 1;
                cell3.innerHTML = level + " xp:" + entry['xp'];
                cell4.innerHTML = entry['hp'] + "/100";
                if (entry['id'] != $("#user").val() && entry['hp'] > 0 && data['hp'] >= 5 && data['sp'] > 0)
//                    cell5.innerHTML = "<input type='button' class='attack' value='attack' onclick='attack("+entry['id']+")'>";
                    cell5.innerHTML = "<a href='#' class='attack' onclick='attack(" + entry['id'] + ")'>Attack</a>";
                ctr++;
            });


        },
        error: function () {
//                    setTimeout(update, interval);
        }
    }); // end ajax call

    setTimeout(update, interval);
}

function mine() {
    $.ajax({
        url: "mine?user=" + $('#user').val(),
        async: false,
        type: 'get',

        success: function (data) {
            update()
        },
        error: function () {

        }
    }); // end ajax call
}

function useItem(type) {
    $.ajax({
        url: "useItem?type=" + type + "&user=" + $('#user').val(),
        async: false,
        type: 'get',

        success: function (data) {
            update()
        },
        error: function () {

        }
    }); // end ajax call
}

function gather(type) {
    $.ajax({
        url: "gather?type=" + type + "&user=" + $('#user').val(),
        async: false,
        type: 'get',

        success: function (data) {
            update()
        },
        error: function () {

        }
    }); // end ajax call
}

function collect(type) {
    if (event.originalEvent === undefined) {
        console.log('collect');
    }
    $.ajax({
        url: "collect?type=" + type + "&user=" + $('#user').val(),
        async: false,
        type: 'get',

        success: function (data) {
            update();
        },
        error: function () {

        }
    }); // end ajax call
}

function move(type, max, width) {

    var elem = document.getElementById(type);
    if (width < 1)
        elem.style.width = '0%';
    var tot = (width / max) * 100;
    if (type == "xp") {
        tot = (width / 1800) * 100;
    }
    elem.style.width = tot + '%';
}

function buy(type) {
    $.ajax({
        url: "buy?type=" + type + "&user=" + $('#user').val() + "&qty=" + $('#qty_' + type).val(),
        async: false,
        type: 'get',

        success: function (data) {
            update();
            $('#qty_' + type).val(1);
        },
        error: function () {

        }
    }); // end ajax call
}



function sell(type) {
    $.ajax({
        url: "sell?type=" + type + "&user=" + $('#user').val() + "&qty=" + $('#qty_' + type).val(),
        async: false,
        type: 'get',

        success: function (data) {
            update();
            $('#qty_' + type).val(1);
        },
        error: function () {

        }
    }); // end ajax call
}

function levelUp(type) {
    $.ajax({
        url: "levelUp?type=" + type + "&user=" + $('#user').val(),
        async: false,
        type: 'get',

        success: function (data) {
            update();
        },
        error: function () {

        }
    }); // end ajax call
}

function attack(id) {

    $(".attack").hide();

    $.ajax({
        url: "attack?defender=" + id + "&user=" + $('#user').val(),
        async: false,
        type: 'get',

        success: function (data) {
            update();
            var options = {
                weekday: "long", year: "numeric", month: "short",
                day: "numeric", hour: "2-digit", minute: "2-digit"
            };
            var d = new Date();
            $("#message").html(d.toLocaleTimeString("en-us", options) + ": " + data['message'] + "<br>" + $("#message").html());
        },
        error: function () {

        }
    });

}


