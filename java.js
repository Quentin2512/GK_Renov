
$(function(){
    $("#sumbit").click(function(event)
    {
        test = 1;
        pb="";
        var exp = new RegExp("^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]{3,30}$","g");
        var exp2 = new RegExp("^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]{3,30}$","g");
        var expNum = new RegExp("^[0-9]{10}$");
        var expEmail = "^[\\w|\\.]+@+[\\w]+\\.[\\w]{2,4}$"
        var email = $("#email").val();

        // test nom
        if(!exp.test($("#nom").val()))
        {
            pb+="Probleme Nom \n";
            test=0;
        }

        //test prenom
        if(!exp2.test($("#prenom").val()))
        {
            pb+="Probleme Prenom \n";
            test=0;
        }

        //test telephone
        if($("#tel").val() != "")
        {
            if(!expNum.test($("#tel").val()))
            {
                pb+="Numero de téléphone non valide \n";
                test=0;
            }
        }

        //test mail
        if($("#email").val() == "")
        {
            pb+="Email non rensseigner\n";
            test=0;
        }
        else
        {
            if($("#email").val()!= $("#verifEmail").val())
            {
                pb+="Email different \n";
                test=0;
            }
            else
            {
                var testEmail = email.match(expEmail);
                if(testEmail=null)
                {
                    pb+="Email non valide \n";
                    test=0;
                }
            }
        }
        if(test ==0) 
        {
            alert(pb);
            event.preventDefault();
        }         
    });
    
     $(document).ready(function () {
      $('#verifEmail').bind('paste', function (e) {
         e.preventDefault();
      });
   });
});