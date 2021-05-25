console.log("Form handler loaded");

$("#login-form").submit(function(e){
    e.preventDefault();

    let eStatus=$(this).find(".status-text");
    let eLoader=$(this).find(".form-submit .loader");
    let bDataValid=true;
    let username=$("#username").val();
    let password=$("#password").val();

    let callback=(response)=>{
        if(response.code==100)
        {
            eStatus.text("").removeClass("error").hide();
        }
        else
        {
            eStatus.text(response.text).addClass("error").show();
            eLoader.css("display","none");
        }
    };

    if(!username || !password)
    {
        eStatus.text("Invalid Credentials").addClass("error").show();
        bDataValid=false;
    }

    if(bDataValid)
    {
        eLoader.css("display","inline-block");
        window.phoenix.user.login(username, password, callback);
    }
});

$("#signup-form").submit(function(e){
    e.preventDefault();

    let eStatus=$(this).find(".status-text");
    let eLoader=$(this).find(".form-submit .loader");
    let bDataValid=true;

    let callback=(response)=>{
        if(response.code==100)
        {
            eStatus.text("").removeClass("error").hide();
        }
        else
        {
            eStatus.text(response.text).addClass("error").show();
            eLoader.css("display","none");
        }
    };

    let user = {
        regUsername:$("#reg-username").val(),
        regPassword:$("#reg-password").val(),
        regCpassword:$("#reg-cpassword").val(),
        regTos:$("#reg-tos").prop('checked')?1:0,
        regNewsletter:$("#reg-newsletter").prop('checked')?1:0,
    };    

    if(!user.regUsername || !user.regPassword || !user.regCpassword)
    {
        eStatus.text("Please fill in the required fields").addClass("error").show();
        bDataValid=false;
    }

    if(bDataValid)
    {
        eLoader.css("display","inline-block");
        window.phoenix.user.signup(user, callback);
    }
});