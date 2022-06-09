        //regex
        var regexNom = /^\w[A-z\-]{3,}$/,
            regexMembre = /^\d{8}$/,
            regexAdr = /^([0-9]*) ?([a-zA-Z,\. ]*)$/,
            regexCode = /^[0-9]{5}$/,
            regexMail = /^[a-z][a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]{2,3}$/,
            regexTel = /^[0-9]{10}$/;

        function checkNom(valEntree) {
            if (regexNom.test(valEntree)) {
                $("#cNom").text("Pass");
                return true;
            } else {
                $("#cNom").text("Fail");
                return false;
            }
        }

        function checkPrenom(valEntree) {
            if (regexNom.test(valEntree)) {
                $("#cPrenom").text("Pass");
                return true;
            } else {
                $("#cPrenom").text("Fail");
                return false;
            }
        }

        function checkNum(valEntree) {
            if (regexMembre.test(valEntree)) {
                $("#cNom").text("Pass");
                return true;
            } else {
                $("#cNum").text("Fail");
                return false;
            }
        }

        function checkAdr(valEntree) {
            if (regexAdr.test(valEntree)) {
                $("#cAddress").text("Pass");
                return true;
            } else {
                $("#cAddress").text("Fail");
                return false;
            }
        }

        function checkCity(valEntree) {
            if (regexNom.test(valEntree)) {
                $("#cCity").text("Pass");
                return true;
            } else {
                $("#cCity").text("Fail");
                return false;
            }
        }

        function checkCP(valEntree) {
            if (regexCode.test(valEntree)) {
                $("#cCP").text("Pass");
                return true;
            } else {
                $("#cCP").text("Fail");
                return false;
            }
        }

        function checkMail(valEntree) {
            if (regexMail.test(valEntree)) {
                $("#cMail").text("Pass");
                return true;
            } else {
                $("#cMail").text("Fail");
                return false;
            }
        }

        function checkTel(valEntree) {
            if (regexTel.test(valEntree)) {
                $("#cTel").text("Pass");
                return true;
            } else {
                $("#cTel").text("Fail");
                return false;
            }
        }

        $('#form1').submit(function() {
            var checkAll = new Array(checkNom($("#name").val()), checkPrenom($("#surname").val()), checkNum($("#numMember").val()), checkAdr($("#address").val()), checkCity($("#city").val()), checkCP($("#code").val()), checkMail($("#mail").val()), checkTel($("#phone").val()));

            if ($.inArray(false, checkAll) != -1) {
                return false;
            } else {
                return true;
            }
        })