 $(document).ready(function () {
        $("#ajax_loader").hide();    
            $('#choi_wilaya').on('show.bs.modal', function(e) {
            var act = $(e.relatedTarget).data('act-id');
            $(e.currentTarget).find('input[name="act"]').val(act);
			});
  
        var select_jour = document.getElementById("jour");
        var select_mois = document.getElementById("mois");
        var select_annee = document.getElementById("annee");
        var select_anneeins = document.getElementById("anneeins");
        var select_code_wilaya = document.getElementById("annexe");
        code_wilaya = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48"];
        jour = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
        mois = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
        for (var i = 0; i < jour.length; i++)
        {
            var option = document.createElement("OPTION");
            txt = document.createTextNode(jour[i]);
            option.appendChild(txt);
            option.setAttribute("value", jour[i]);
            select_jour.insertBefore(option, select_jour.lastChild);
        }
        for (var i = 0; i < mois.length; i++)
        {
            var option = document.createElement("OPTION"),
                    txt = document.createTextNode(mois[i]);
            option.appendChild(txt);
            option.setAttribute("value", mois[i]);
            select_mois.insertBefore(option, select_mois.lastChild);
        }
        for (var i = 2009; i > 1938; i--)
        {
            var option = document.createElement("OPTION"),
                    txt = document.createTextNode(i);
            option.appendChild(txt);
            option.setAttribute("value", i);
            select_annee.insertBefore(option, select_annee.lastChild);
        }
        for (var i = 2019; i > 2001; i--)
        {
            var option = document.createElement("OPTION"),
                    txt = document.createTextNode(i);
            option.appendChild(txt);
            option.setAttribute("value", i);
            select_anneeins.insertBefore(option, select_anneeins.lastChild);
        }
      
   
 });
  function presumer()
    {

        var vv = document.getElementById('pre').checked;
        if (vv)
        {
            document.getElementById('jour').disabled = true;
            document.getElementById('jour').selectedIndex = '0';

            document.getElementById('mois').disabled = true;
            document.getElementById('mois').selectedIndex = '0';
        }
        else if (vv == false)
        {
            document.getElementById('jour').disabled = false;
            document.getElementById('mois').disabled = false;
        }
    }
//==========================================================================
   
            function vara(myfield, e, dec) {
                var key;
                var keychar;
                if (window.event)
                    key = window.event.keyCode;
                else if (e)
                    key = e.which;
                else
                    return true;
                keychar = String.fromCharCode(key);
                if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13)
                        || (key == 27))
                    return true;
                else if ((("ابتثج حخدؤآذرزسشصضطظعغفقكلمنهويأإءئةى").indexOf(keychar) > -1))
                    return true;
                else if (dec && (keychar == " ") && (myfield.value.length != 0)) {
                    myfield.form.elements[dec].focus();
                    return false;
                } else
                    return false;
            }
//==========================================================================			
		 function vnum(myfield, e, dec) {
                var key;
                var keychar;
                if (window.event)
                    key = window.event.keyCode;
                else if (e)
                    key = e.which;
                else
                    return true;
                keychar = String.fromCharCode(key);
                if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13)
                        || (key == 27))
                    return true;
                else if ((("0123456789").indexOf(keychar) > -1))
                    return true;
                else if (dec && (keychar == " ") && (myfield.value.length != 0)) {
                    myfield.form.elements[dec].focus();
                    return false;
                } else
                    return false;
            }	
//==========================================================================	

            function vadr(myfield, e, dec) {
                var key;
                var keychar;
                if (window.event)
                    key = window.event.keyCode;
                else if (e)
                    key = e.which;
                else
                    return true;
                keychar = String.fromCharCode(key);
                if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13)
                        || (key == 27))
                    return true;
                else if ((("ابتثج حخدؤآذرزسشصضطظعغفقكلمنهويأإءئةى0123456789")
                        .indexOf(keychar) > -1))
                    return true;
                else if (dec && (keychar == " ") && (myfield.value.length != 0)) {
                    myfield.form.elements[dec].focus();
                    return false;
                } else
                    return false;
            }
//==========================================================================		
 function valpha(myfield, e, dec) {
                var key;
                var keychar;
                if (window.event)
                    key = window.event.keyCode;
                else if (e)
                    key = e.which;
                else
                    return true;
                keychar = String.fromCharCode(key);
                if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13)
                        || (key == 27))
                    return true;
                else if ((("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz")
                        .indexOf(keychar) > -1))
                    return true;
                else if (dec && (keychar == " ") && (myfield.value.length != 0)) {
                    myfield.form.elements[dec].focus();
                    return false;
                } else
                    return false;
            }

