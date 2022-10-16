 $(document).ready(function () {
	      $("#ajax_loader").hide();    
            $('#choi_wilaya').on('show.bs.modal', function(e) {
            var act = $(e.relatedTarget).data('act-id');
            $(e.currentTarget).find('input[name="act"]').val(act);
			});
		
			});
			
//==========================================================================			
    function inj2(){
	
      document.getElementById('prenomlat').value=document.getElementById('prenomlat').value.replace('OR','O R');
      document.getElementById('prenomlat').value=document.getElementById('prenomlat').value.replace('FILE','FI LE');
      document.getElementById('prenomlat').value=document.getElementById('prenomlat').value.replace('AND','AN D');
	}
	function inj1(){
	
      document.getElementById('nomlat').value=document.getElementById('nomlat').value.replace('OR','O R');
      document.getElementById('nomlat').value=document.getElementById('nomlat').value.replace('FILE','FI LE');
      document.getElementById('nomlat').value=document.getElementById('nomlat').value.replace('AND','AN D');
	}
//===================================================  
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


