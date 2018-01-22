<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="css/bootstrap2.css">

<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<br><br>
<div class="container">
<div class="row">
        <div class="col-xs-6 row">
            <table border="1">
                <tr>
                    <td>User Id</td>
                    <td><input type="text" id="user" ></td>
                </tr>
                <tr><td>Name</td><td><span id="name"></span></td></tr>
                <tr><td>Level</td><td><span id="lv"></span></td></tr>
                <tr><td>Exp</td><td><div id="myProgress">
                                            <div class ="bar" id="xp"></div>
                                        </div></td></tr>
                <tr><td>Coins</td><td><span id="coins"></span></td></tr>
                <tr><td>HP</td><td><span  id="hp"></span>/100</td></tr>
                <tr><td>SP</td><td><span  id="sp"></span>/5 <span  id="sp_ctr"></span></td></tr>
                <tr><td>DEF</td><td>
                <img id="def1" class="def_img" src="">
                <img id="def2" class="def_img" src="">
                <img id="def3" class="def_img" src="">
                <img id="def4" class="def_img" src="">
                <img id="def5" class="def_img" src="">
                </td></tr>
                <tr><td></td><td></td></tr>
            </table>
        </div>

        <div class="col-md-1"></div>
         <div class="col-xs-5 row">

             <div class="col-md-4 box" >
             Rocks:
             <div id="myProgress">
                 <div class ="bar" id="get_rock"></div>
             </div>
             {{--<input type="button" value="mine" onclick="gather('rock')">(100 coins)--}}

             <hr>
             Lv <span id="miner1_level"></span><input type="button" value="Up" onclick="levelUp('miner1')">
             <br>
             <span id="miner1_box"></span></span>
             <br>
             <input type="button" value="Collect" onclick="collect('rock')">
             </div>
             <div class="col-md-4 box">
             Wood:
             <div id="myProgress">
                 <div class ="bar" id="get_wood"></div>
             </div>
             {{--<input type="button" value="mine" onclick="gather('wood')">(100 coins)--}}

             <hr>
             Lv <span id="miner2_level"></span><input type="button" value="Up" onclick="levelUp('miner2')">
                          <br>
             <span id="miner2_box"></span>
             <br>
             <input type="button" value="Collect" onclick="collect('wood')">
             </div>
             <div class="col-md-4 box">
             Grass:
             <div id="myProgress">
                 <div class ="bar" id="get_grass" ></div>
             </div>
             {{--<input type="button" value="mine" onclick="gather('grass')">(100 coins)--}}

             <hr>
             Lv <span id="miner3_level"></span><input type="button" value="Up" onclick="levelUp('miner3')">
                          <br>
             <span id="miner3_box"></span>
             <br>
             <input type="button" value="Collect" onclick="collect('grass')">
             </div>


         </div>

</div>



{{--ATK: <input type="text" id="atk"><input type="button" value="+" onclick="levelUp('atk')"><label id="req_atk"></label>--}}
{{--<br>--}}
{{--DEF: <input type="text" id="def"><input type="button" value="+" onclick="levelUp('def')"><label id="req_def"></label>--}}
{{--<br>--}}
<hr>




<table>
    <tr>
        <td>rock</td>
        <td> <input type="text" id="rock" readonly></td>
        <td> <input type="text"  id="qty_rock" value="1"></td>
        <td> <input type="button" value="BUY(50)" onclick="buy('rock')"></td>
        <td> <input type="button" value="SELL(20)" onclick="sell('rock')"></td>
    </tr>
    <tr>
            <td>wood</td>
            <td> <input type="text" id="wood" readonly></td>
            <td> <input type="text"  id="qty_wood" value="1"></td>
            <td> <input type="button" value="BUY(50)" onclick="buy('wood')"></td>
            <td> <input type="button" value="SELL(20)" onclick="sell('wood')"></td>
        </tr>
         <tr>
            <td>grass</td>
            <td> <input type="text" id="grass" readonly></td>
            <td> <input type="text"  id="qty_grass" value="1"></td>
            <td> <input type="button" value="BUY(50)" onclick="buy('grass')"></td>
            <td> <input type="button" value="SELL(20)" onclick="sell('grass')"></td>
        </tr>
        <tr>
            <td>gold</td>
            <td> <input type="text" id="gold" readonly></td>
            <td> <input type="text"  id="qty_gold" value="1"></td>
            <td> <input type="button" value="BUY(1000)" onclick="buy('gold')"></td>
            <td> <input type="button" value="SELL(500)" onclick="sell('gold')"></td>
        </tr>
</table>

{{--<input type="text"  id="qty_rocks" value="1"><input type="button" value="BUY(50)" onclick="buy('rock')"><input type="button" value="SELL(20)" onclick="sell('rock')">--}}

{{--wood: <input type="text" id="wood" readonly>--}}
{{--<input type="text"  id="qty_wood" value="1"><input type="button" value="BUY(50)" onclick="buy('wood')"><input type="button" value="SELL(20)" onclick="sell('wood')">--}}
{{--<br>--}}
{{--grass: <input type="text" id="grass" readonly>--}}
{{--<input type="text"  id="qty_grass" value="1"><input type="button" value="BUY(50)" onclick="buy('grass')"><input type="button" value="SELL(20)" onclick="sell('grass')">--}}
{{--<br>--}}
{{--golds: <input type="text" id="gold" readonly>--}}
{{--<input type="text"  id="qty_golds" value="1"><input type="button" value="BUY(1000)" onclick="buy('golds')"><input type="button" value="SELL(500)" onclick="sell('golds')">--}}

<hr>


<table border="1">
    <tr>
        <td>Item Name</td>
        <td>Item Description</td>

        <td>Requirement</td>
        <td>Action</td>
    </tr>
    <tr>
        <td>Potion</td>
        <td>+20 HP</td>

        <td>100 coins. 30 Woods. 30 Grass</td>
        <td><input type="button" value="BUY" onclick="useItem('potion')"></td>
    </tr>
</table>

<hr>

<table border="1" id="userlist">

</table><br>
<div id="message" class="box"></div>

<style>
.def_img{
height:40px;
}
#message{
height:200px;
overflow: scroll;
}
    .box {
        border: 1px solid black;
    }

    #userlist td{
    height: 20px;
    }

    #myProgress {
        width: 100px;
        background-color: white;
        border: 1px solid black;
    }

    .bar {
        width: 0%;
        height: 10px;
        background-color: green;
    }

</style>

<script type="text/javascript">

    var interval =1000;
    $(document).ready(function () {
        update();
    });

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
                if(data['sp_ctr']>0)
                $("#sp_ctr").text(": Recharge in "+data['sp_ctr']+" sec/s");
                else
                $("#sp_ctr").text("");
                $("#lv").text(data['level']);

                var req_rocks =(data['atk']%10)*20;
                var req_golds =Math.floor((data['atk']/10)*2);
                $("#req_atk").text("Required: Rocks="+req_rocks+" Golds="+req_golds);
                var def = data['def'].split("");
                $("#def").text('');
                var ctr=1;
                def.forEach(function (defence) {

                document.getElementById("def"+ctr).src = "img/"+defence+".jpg";
                ctr++;
//                $("#def").text($("#def").text() + img);

                });

                var req_rocks =(data['def']%10)*20;
                var req_golds =Math.floor((data['def']/10)*2);
                $("#req_def").text("Required: Rocks="+req_rocks+" Golds="+req_golds);

                $("#miner1_box").text(data['miner1_box']+"/"+data['miner1']);
                $("#miner2_box").text(data['miner2_box']+"/"+data['miner2']);
                $("#miner3_box").text(data['miner3_box']+"/"+data['miner3']);

                $("#miner1_level").text(data['miner1']/10);
                $("#miner2_level").text(data['miner2']/10);
                $("#miner3_level").text(data['miner3']/10);

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
                if (data['message'])
                    $("#message").html(d.toLocaleTimeString("en-us", options) + ": "+data['message'] + "<br>"+$("#message").html());
                move("get_rock",data['miner1'],data['miner1_box']);
                move("get_wood",data['miner2'],data['miner2_box']);
                move("get_grass",data['miner3'],data['miner3_box']);
                move("xp",0,data['xp']);
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


                rank.forEach(function (entry) {

                    var row = table.insertRow(ctr);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    cell1.innerHTML = ctr;
                    cell2.innerHTML = entry['name'];
                    var level = Math.floor(entry['xp']/1800)+1;
                    cell3.innerHTML = level +" xp:"+entry['xp'];
                    cell4.innerHTML = entry['hp']+"/100";
                    if(entry['id']!=$("#user").val() && entry['hp']>0 && data['hp']>=5 && data['sp']>0)
//                    cell5.innerHTML = "<input type='button' class='attack' value='attack' onclick='attack("+entry['id']+")'>";
                    cell5.innerHTML = "<a href='#' class='attack' onclick='attack("+entry['id']+")'>Attack</a>";
                    ctr++;
                });

                    setTimeout(update, interval);
            },
            error: function () {
                setTimeout(update, interval);
            }
        }); // end ajax call
    }

    function mine() {
        $.ajax({
            url: "mine?user=" + $('#user').val(),
            async: false,
            type: 'get',

            success: function (data) {
//                update()
            },
            error: function () {

            }
        }); // end ajax call
    }

 function useItem(type) {
        $.ajax({
            url: "useItem?type="+type+"&user=" + $('#user').val(),
            async: false,
            type: 'get',

            success: function (data) {
//                update()
            },
            error: function () {

            }
        }); // end ajax call
    }

    function gather(type) {
        $.ajax({
            url: "gather?type="+type+"&user=" + $('#user').val(),
async: false,
            type: 'get',

            success: function (data) {
//                update()
            },
            error: function () {

            }
        }); // end ajax call
    }

    function collect(type) {
            $.ajax({
                url: "collect?type="+type+"&user=" + $('#user').val(),
async: false,
                type: 'get',

                success: function (data) {
//                    update()
                },
                error: function () {

                }
            }); // end ajax call
        }

    function move(type,max,width) {

        var elem = document.getElementById(type);
        if(width<1)
            elem.style.width ='0%';
        var tot = (width / max)*100;
        if(type=="xp"){
         tot = (width / 1800) * 100;
        }
        elem.style.width = tot + '%';
    }

    function buy(type) {
        $.ajax({
            url: "buy?type="+type+"&user=" + $('#user').val()+"&qty="+$('#qty_'+type).val(),
async: false,
            type: 'get',

            success: function (data) {
//                update();
                $('#qty_'+type).val(1);
            },
            error: function () {

            }
        }); // end ajax call
    }

    function sell(type) {
        $.ajax({
            url: "sell?type="+type+"&user=" + $('#user').val()+"&qty="+$('#qty_'+type).val(),
            async: false,
            type: 'get',

            success: function (data) {
//                update();
                $('#qty_'+type).val(1);
            },
            error: function () {

            }
        }); // end ajax call
    }

    function levelUp(type) {
        $.ajax({
            url: "levelUp?type="+type+"&user=" + $('#user').val(),
            async: false,
            type: 'get',

            success: function (data) {
//                update();
            },
            error: function () {

            }
        }); // end ajax call
    }

    function attack(id) {

        $(".attack").hide();

        $.ajax({
            url: "attack?defender="+id+"&user=" + $('#user').val(),
            async: false,
            type: 'get',

            success: function (data) {
//                update();
var options = {
                    weekday: "long", year: "numeric", month: "short",
                    day: "numeric", hour: "2-digit", minute: "2-digit"
                };
                var d = new Date();
            $("#message").html(d.toLocaleTimeString("en-us", options) + ": "+data['message'] + "<br>"+$("#message").html());
            },
            error: function () {

            }
        });

    }




</script></div>
</body></html>