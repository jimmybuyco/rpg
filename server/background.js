var mysql = require('mysql');
var interval = 1000;
var interval2 = 5000;
var interval3 = 600000;
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "asdf",
    database: "rpg"
});

update();
updatePerSecond();
updateThird();

function update() {
    con.connect(function(err) {
        sql="update users set sp_ctr = sp_ctr-1 where sp_ctr>-1 and sp<5;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("updated sp: ");

        });

        sql="update users set sp = sp+1,sp_ctr=-2 where sp_ctr=-1 and sp<5;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("updated coins: ");

        });

        sql="update users set sp_ctr = 60 where sp<5 and sp_ctr=-2;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("updated coins: ");
        });

    });
    setTimeout(update, interval);
}

function updatePerSecond() {
    con.connect(function(err) {
        sql="update users set miner1_box=miner1_box+1 where miner1 >miner1_box;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("updated miner1");
        });

        sql="update users set miner2_box=miner2_box+1 where miner2 > miner2_box;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("updated miner2");
        });

        sql="update users set miner3_box=miner3_box+1 where miner3 > miner3_box;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("updated miner3");
        });
    });
    setTimeout(updatePerSecond, interval2);
}

function updateThird() {



    con.connect(function(err) {
        sql="select id from users;";
        con.query(sql, function (err, result) {
            if (err) throw err;
            result.forEach(function (entry) {
                var def = getRandom();
                // console.log(entry["id"]);
                sql2="update users set defence="+def+" where id ="+entry["id"]+" ;";
                con.query(sql2, function (err, results) {
                    if (err) throw err;
                    console.log("updated defence for "+entry["id"]);
                });
            });
        });


        // sql="update users set defence="+def+" id ="+id+" ;";
        // con.query(sql, function (err, result) {
        //     if (err) throw err;
        //     console.log("updated miner1");
        // });

    });
    setTimeout(updateThird, interval3);
}

    function getRandom(){
    var def=[];
    for(var x=0;x<5;x++){
        // (maximum - minimum + 1)) + minimum
        def[x]=Math.floor(Math.random() * 3)+1;
    }
        var defence = def.join("");
    return defence;
}