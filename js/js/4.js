        //regex
        var regexNom = /^\w[A-z\-]{3,}$/;
        var regexMembre = /^\d{8}$/;
        var regexAdr = /^([0-9]*) ?([a-zA-Z,\. ]*)$/;
        var regexCode = /^[0-9]{5}$/;
        var regexMail = /^[a-z][a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]{2,3}$/;
        var regexTel = /^[0-9]{10}$/;

        function checkNom(valEntree) {
            if (regexNom.test(valEntree) == true) {
                document.getElementById('cNom').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cNom').innerHTML = "FAIL";
                return false;
            }
        }

        function checkPrenom(valEntree) {
            if (regexNom.test(valEntree) == true) {
                document.getElementById('cPrenom').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cPrenom').innerHTML = "FAIL";
                return false;
            }
        }

        function checkNum(valEntree) {
            if (regexMembre.test(valEntree) == true) {
                document.getElementById('cNum').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cNum').innerHTML = "FAIL";
                return false;
            }
        }

        function checkAdr(valEntree) {
            if (regexAdr.test(valEntree) == true) {
                document.getElementById('cAddress').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cAddress').innerHTML = "FAIL";
                return false;
            }
        }

        function checkCity(valEntree) {
            if (regexNom.test(valEntree) == true) {
                document.getElementById('cCity').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cCity').innerHTML = "FAIL";
                return false;
            }
        }

        function checkCP(valEntree) {
            if (regexCode.test(valEntree) == true) {
                document.getElementById('cCP').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cCP').innerHTML = "FAIL";
                return false;
            }
        }

        function checkMail(valEntree) {
            if (regexMail.test(valEntree) == true) {
                document.getElementById('cMail').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cMail').innerHTML = "FAIL";
                return false;
            }
        }

        function checkTel(valEntree) {
            if (regexTel.test(valEntree) == true) {
                document.getElementById('cTel').innerHTML = "PASS";
                return true;
            } else {
                document.getElementById('cTel').innerHTML = "FAIL";
                return false;
            }
        }

        function verif() {
            //valeurs des textbox
            var valNom = document.getElementById("name").value;
            var valPrenom = document.getElementById("surname").value;
            var valMembre = document.getElementById("numMember").value;
            var valAdr = document.getElementById("address").value;
            var valCity = document.getElementById("city").value;
            var valCP = document.getElementById("code").value;
            var valMail = document.getElementById("mail").value;
            var valTel = document.getElementById("phone").value;

            //vérif de si les regex sont respectées
            var verifNom = checkNom(valNom);
            var verifPrenom = checkPrenom(valPrenom);
            var verifMembre = checkNum(valMembre);
            var verifAdr = checkAdr(valAdr);
            var verifCity = checkCity(valCity);
            var verifCP = checkCP(valCP);
            var verifMail = checkMail(valMail);
            var verifTel = checkTel(valTel);

            if (verifNom == false || verifPrenom == false || verifMembre == false || verifAdr == false || verifCity == false || verifCP == false || verifMail == false || verifTel == false) {
                return false;
            } else {
                return true;
            }
        }