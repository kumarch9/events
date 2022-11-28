
function genbarcode(value) {
    JsBarcode("#prtbarcode", value, {
        format: 'CODE128',
        displayValue: true,
        width: 2,
        height: 20,
        textMargin: 2,
        fontSize: 20,
        margin: 5,
    });
};

function getbardata() {
    var bID = document.getElementById('getBarcode').value;
    var sName = document.getElementById('sysnamesearch').value;
    var vChk = document.getElementById('banVisitor').checked;
    var dChk = document.getElementById('banDelegate').checked;
    var eChk = document.getElementById('banExhibitor').checked;
    var iChk = document.getElementById('banInvitee').checked;
    var oChk = document.getElementById('banOrganiser').checked;

    let visVal, desVal, exhVal, invVal, orgVal;

    if (vChk) {
        visVal = "Visitor";
    }
    if (dChk) {
        desVal = "Delegate";
    }
    if (eChk) {
        exhVal = "Exhibitor";
    }
    if (iChk) {
        invVal = "Invitee";
    }
    if (oChk) {
        orgVal = "Organiser";
    }

   // alert(visVal,desVal,exhVal);
    if (sName != "") {

        if (bID.length >= 6 && bID.length < 10) {
            debugger;

            $.post("getdata.php", { barID: bID, scanArea: sName }, function (response) {
                var rawdata = jQuery.parseJSON(response, false);
                if ((rawdata[0]['type'] == visVal) || (rawdata[0]['type'] == desVal) || (rawdata[0]['type'] == exhVal) || (rawdata[0]['type'] == invVal) || (rawdata[0]['type'] == orgVal)) {
                    document.getElementById("status").innerHTML = "Ban...!";
                } else if (rawdata != "") {
                    document.getElementById("status").innerHTML = "Allowed!";
                    document.getElementById("spDt").innerHTML = rawdata[0]['date'];
                    document.getElementById("spType").innerHTML = rawdata[0]['type'];
                    document.getElementById("spName").innerHTML = rawdata[0]['name'];
                    document.getElementById("spDes").innerHTML = rawdata[0]['designation'];
                    document.getElementById("spCom").innerHTML = rawdata[0]['company'];

                    // document.writeln("<?php $Tvisit = todayCount($tblvisit); ?>");
                    //console.log(rawdata[0]);
                } else if (rawdata == "") {
                    document.getElementById("status").innerHTML = "Not Allowed!";

                    //alert("no data found!");
                }
            }).fail(function () {
                console.log("failed in post request of B-ID!");
            }).done(function () {
                console.log("B-ID is founded.");
                setTimeout(function () {
                    //refresh/reload only selected div
                    $("#refreshSearch").load(location.href + " #refreshSearch");
                }, 3000);
            })
        }
    } else {
        alert("must be system name!");
    }

}

var expanded = false;
function showBanList() {
    //debugger;
    var checkboxes = document.getElementById("BanChBox");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}

function printHideShow() {
    var x = document.getElementById("frmprint");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



function saveprint() {
    debugger;
    if (document.getElementById('sysname').value == '') { alert('missing system name'); return }
    if (document.getElementById('visitor_type').value == '') { alert('missing visitor type'); return }
    if (document.getElementById('name').value == '' && document.getElementById('chkName').checked == true) { alert('missing name'); return }
    if (document.getElementById('desg').value == '' && document.getElementById('chkDes').checked == true) { alert('missing Designation'); return }
    if (document.getElementById('cname').value == '' && document.getElementById('chkComp').checked == true) { alert('missing company name'); return }

    var Name = document.getElementById("name").value;
    var Des = document.getElementById("desg").value;
    var Comp = document.getElementById("cname").value;
    var NowTime = document.getElementById("today_date").value;
    var vType = document.getElementById("visitor_type").value;
    var SysName = document.getElementById("sysname").value;
    document.getElementById("prtname").innerHTML = Name;
    document.getElementById("prtdes").innerHTML = Des;
    document.getElementById("prtcomp").innerHTML = Comp;
    var isBarcodeCheck = document.getElementById('chkBar').checked;

    let vinfo = {
        name: Name,
        desg: Des,
        cname: Comp,
        today_date: NowTime,
        visitor_type: vType,
        sysname: SysName

    };

    var saveData = $.ajax({
        type: 'POST',
        url: "saveform.php",
        contentType: 'application/x-www-form-urlencoded',
        data: vinfo,
        dataType: "text",
        success: function (resultBarcode) {
            console.log("Save Complete", resultBarcode);
            let bcID = resultBarcode;

            if (isBarcodeCheck == true) {
                genbarcode(bcID);
            }

            //printjs library using here
            printJS({
                printable: 'frmprint',
                type: 'html',
                css: './css/print.css'
                //css: './testcss.css'
            });

            setTimeout(function () {
                //refresh/reload only selected div
                $("#frmCounter").load(location.href + " #frmCounter");
                $("#frmprint").load(location.href + " #frmprint");

                if (document.getElementById('chkName').checked == true) {
                    $("#divName").load(location.href + " #divName");
                }
                if (document.getElementById('chkDes').checked == true) {
                    $("#divDes").load(location.href + " #divDes");
                }
                if (document.getElementById('chkComp').checked == true) {
                    $("#divComp").load(location.href + " #divComp");
                }

            }, 2000);
        }
    });

    saveData.error(function () { alert("Something went wrong"); });

}



var intervalTime;
function timeUpdate() {
    intervalTime = window.setInterval(function () {
        $("#date_time").load(location.href + " #date_time");
    }, 1000);
}


function frmReset() {
    document.getElementById('name').value = "";
    document.getElementById('desg').value = "";
    document.getElementById('cname').value = "";
}


function checkSysEdit() {
    var s = document.getElementById('chksys').checked;
    if (s == true) {
        $("#sysname").prop("readonly", false);
        $("#sysname").css("background-color", "white");

    } else {
        $("#sysname").prop("readonly", true);
        $("#sysname").css("background-color", "#51b8b8");
    }
}




function ckname() {
    var s = document.getElementById('chksysname').checked;
    if (s == true) {
        $("#sysnamesearch").prop("readonly", false);
        $("#sysnamesearch").css("background-color", "white");
    } else {
        $("#sysnamesearch").prop("readonly", true);
        $("#sysnamesearch").css("background-color", "#51b8b8");
    }
}

function ckCompPrint() {
    let pChComp = document.getElementById('chkComp').checked;
    if (pChComp == true) {
        $("#divComp *").prop('disabled', false);
        //$("#divComp").show();
    } else {
        $("#divComp *").prop('disabled', true);
        //$("#divComp").hide();
    }
}
function ckNamePrint() {
    let pChName = document.getElementById('chkName').checked;
    if (pChName == true) {
        $("#divName *").prop('disabled', false);
        // $("#divName").show();
    } else {
        $("#divName *").prop('disabled', true);
        //$("#divName").hide();
    }
}
function ckDesPrint() {
    let pChDes = document.getElementById('chkDes').checked;
    if (pChDes == true) {
        $("#divDes *").prop('disabled', false);
        //$("#divDes").show();
    } else {
        $("#divDes *").prop('disabled', true);
        // $("#divDes").hide();
    }
}

function ckBarcodePrint() {
    let pChBar = document.getElementById('chkBar').checked;
    if (pChBar == true) {
        $("#divImg").css("display", "block");
    } else {
        $("#divImg").css("display", "none");
    }
}

function pswlen() {
    var psw1 = document.getElementById('psw_signup').value;
    if (psw1.length < 5) {
        document.getElementById('msg').innerHTML = "*Password length must be atleast 5 characters";
    }
}

function confirmPsw() {
    var psw1 = document.getElementById('psw_signup').value;
    var psw2 = document.getElementById('repsw_signup').value;
    console.log(psw1, psw2);
    if (psw1 != psw2) {
        document.getElementById('msg').innerHTML = "password does not match!";

    } else {
        document.getElementById('form_save_signup').disabled = false;
    }

};

function print_page_barcode(div) {
    debugger;
    var name = document.getElementById('name');
    var designation = document.getElementById('desg');
    var company = document.getElementById('cname');

    document.getElementById('lb_name').innerHTML = name.value;
    document.getElementById('lb_des').innerHTML = designation.value;
    document.getElementById('lb_comp').innerHTML = company.value;
    //genbarcode(name.value);
    var printContents = document.getElementById(div).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
};

function ckCompPrintFound() {
    debugger;
    let ChComp = document.getElementById('chkCompFound').checked;
    if (ChComp == true) {
        $("#prtcompOnly").css("display", "block");
        //$("#prtcompOnly").prop('disabled', false);
    } else {
        $("#prtcompOnly").css("display", "none");
        //$("#prtcompOnly").prop('disabled', true);
    }
}

function ckNamePrintFound() {
    //debugger;
    let ChName = document.getElementById('chkNameFound').checked;
    if (ChName == true) {
        $("#prtnameOnly").css("display", "block");

    } else {
        $("#prtnameOnly").css("display", "none");

    }
}


function ckDesPrintFound() {
    debugger;
    let ChDes = document.getElementById('chkDesFound').checked;
    if (ChDes == true) {
        $("#prtdesOnly").css("display", "block");
        //$("#prtdesOnly").prop('disabled', false);
    } else {
        $("#prtdesOnly").css("display", "none");
        //$("#prtdesOnly").prop('disabled', true);
    }
}

function ckBarcodePrintFound() {
    //debugger;

    let ChBar = document.getElementById('chkBarFound').checked;
    if (ChBar == true) {
        $("#prtbcodeOnly").css("display", "block");
        //$("#svgImgBCode *").prop('disabled', false);
        //$("#foundImgBCode").css("visibility", "visible");
    } else {
        $("#prtbcodeOnly").css("display", "none");
        //$("#prtbarcodesvgImgBCodespan *").prop('disabled', true);
        // $("#foundImgBCode").css("visibility", "hidden");
    }
}

function genbarcodeFound(value) {
    JsBarcode("#foundImgBCode", value, {
        format: 'CODE128',
        displayValue: true,
        width: 2,
        height: 20,
        textMargin: 0.5,
        fontSize: 10,
        margin: 5,
    });
}

function PrintOnly() {
    // debugger;
    let CheckBCodeOnly = document.getElementById('chkBarFound').checked;
    let ValBCodeOnly = document.getElementById('bcNumber').value;
    if (CheckBCodeOnly == true) {
        genbarcodeFound(ValBCodeOnly);
    }
    //printjs library using here
    setTimeout(function () {
        printJS({
            printable: 'divPrintFound',
            type: 'html',
            css: './css/print.css'
            //css: './testcss.css'
        });
    }, 2000);
}

function closeOnly() {
    window.location.href = "./home.php";
}


