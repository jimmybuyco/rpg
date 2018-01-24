@extends('header')

@section('content')
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<br><br>


    <div class="row">
        <div class="col-md-4 row">
            <table border="1">
                <tr>
                    <td>User Id</td>
                    <td><input type="text" id="user"><a href="logout">Logout</a></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><span id="name"></span></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td><span id="lv"></span></td>
                </tr>
                <tr>
                    <td>Exp</td>
                    <td>
                        <div id="myProgress">
                            <div class="bar" id="xp"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Coins</td>
                    <td><span id="coins"></span></td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td><span id="hp"></span>/100</td>
                </tr>
                <tr>
                    <td>SP</td>
                    <td><span id="sp"></span>/5 <span id="sp_ctr"></span></td>
                </tr>
                <tr>
                    <td>DEF</td>
                    <td>
                        <button onclick="myFunction(0)"><img id="def1" class="def_img" src=""></button>
                        <button onclick="myFunction(1)"><img id="def2" class="def_img" src=""></button>
                        <button onclick="myFunction(2)"><img id="def3" class="def_img" src=""></button>
                        <button onclick="myFunction(3)"><img id="def4" class="def_img" src=""></button>
                        <button onclick="myFunction(4)"><img id="def5" class="def_img" src=""></button>
                    </td>
                </tr>
                <tr>
                    <td>items</td>
                    <td><div id="items"></div></td>
                </tr>
                <tr>
                    <td>Achievements</td>
                    <td><div id="achive"></div></td>
                </tr>
            </table>
        </div>

        <div class="col-md-4  ">

            <table>
                <tr>
                    <td><img class="img_icon_small" src="img/rock.jpg" title="rock"></td>
                    <td><input type="text" class="txt_qty" id="rock" readonly></td>
                    <td><input type="text" class="txt_qtyB" id="qty_rock" value="1"></td>
                    <td><input type="button" value="BUY(50)" onclick="buy('rock')"></td>
                    <td><input  type="button" value="SELL(20)" onclick="sell('rock')"></td>
                </tr>
                <tr>
                    <td><img class="img_icon_small" src="img/wood.jpg" title="wood"></td>
                    <td><input type="text" class="txt_qty" id="wood" readonly></td>
                    <td><input type="text" class="txt_qtyB" id="qty_wood" value="1"></td>
                    <td><input type="button" value="BUY(50)" onclick="buy('wood')"></td>
                    <td><input type="button" value="SELL(20)" onclick="sell('wood')"></td>
                </tr>
                <tr>
                    <td><img class="img_icon_small" src="img/grass.jpg" title="grass"></td>
                    <td><input type="text" class="txt_qty" id="grass" readonly></td>
                    <td><input type="text" class="txt_qtyB" id="qty_grass" value="1"></td>
                    <td><input type="button" value="BUY(50)" onclick="buy('grass')"></td>
                    <td><input type="button" value="SELL(20)" onclick="sell('grass')"></td>
                </tr>
                <tr>
                    <td><img class="img_icon_small" src="img/gold.jpg" title="gold"></td>
                    <td><input type="text" class="txt_qty" id="gold" readonly></td>
                    <td><input type="text" class="txt_qtyB" id="qty_gold" value="1"></td>
                    <td><input type="button" value="BUY(1000)" onclick="buy('gold')"></td>
                    <td><input type="button" value="SELL(500)" onclick="sell('gold')"></td>
                </tr>
            </table>

        </div>
        <div class="col-md-4 row">

            <div class="col-md-4 box">
                Rocks:

                {{--<input type="button" value="mine" onclick="gather('rock')">(100 coins)--}}
                <div id="myProgress">
                    <div class="bar" id="get_rock"></div>
                </div>
                <hr>
                Lv <span id="miner1_level"></span><input type="button" value="Up" onclick="levelUp('miner1')">
                <br>
                <span id="miner1_box"></span></span>
                <br>
                <input type="button" value="Collect" onclick="collect('rock')">
                <br>

            </div>
            <div class="col-md-4 box">
                Wood:
                <div id="myProgress">
                    <div class="bar" id="get_wood"></div>
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
                    <div class="bar" id="get_grass"></div>
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
            <td><img class="img_icon" src="img/potion.jpg">Potion</td>
            <td>+20 HP</td>

            <td>100 coins. 30 Woods. 30 Grass.</td>
            <td><input type="button" value="BUY" onclick="useItem('potion')"></td>
        </tr>
        <tr>
            <td><img class="img_icon" src="img/sword.jpg">Sword</td>
            <td>+2 ATK</td>

            <td>10 Gold.</td>
            <td><input type="button" value="BUY" onclick="useItem('sword')"></td>
        </tr>
        <tr>
            <td><img class="img_icon" src="img/shield.jpg">Sheild</td>
            <td>+2 DEF</td>

            <td>10 Gold.</td>
            <td><input type="button" value="BUY" onclick="useItem('shield')"></td>
        </tr>
    </table>

    <hr>
    <div class="row">
        <div class="col-md-5">
            <table border="1" id="userlist">

            </table>
        </div>
        <div class="col-md-7">
            <div id="message" class="box"></div>
        </div>

    </div>
    <br>



    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Change Defence</h3>
                <span class="close">&times;</span>

            </div>
            <div class="row modal-body">
                <div class="col-md-3"></div>
                <div class="col-md-6 " align="center">
                    <input type="text" id="index" hidden>
                    <button onclick="updateDef(1)"><img id="def1" class="def_img" src="img/1.jpg"></button>
                    <button onclick="updateDef(2)"><img id="def2" class="def_img" src="img/2.jpg"></button>
                    <button onclick="updateDef(3)"><img id="def3" class="def_img" src="img/3.jpg"></button>

                </div>
                <div class="col-md-3"></div>

            </div>
            <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div>
        </div>

    </div>


    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";

        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>





@endsection