var mysql = require('mysql');
var interval = 1000;
var interval2 = 5000;
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "asdf",
    database: "rpg"
});

update();
updatePerSecond();

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