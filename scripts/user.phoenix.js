console.log("Phoenix API loaded");

let config={
    apiUrl:"/php/api/"
};

window.phoenix={

    user:{
        login:(username, password, callback)=>{
            $.ajax({
                url:`${config.apiUrl}login.php`,
                method:"POST",
                dataType:"json",
                data:{username:username, password:password},
                success:function(response){
                    callback(response);
                },
                error:function(xhr, err){
                    console.log(xhr.responseText);
                    callback({text:"Internal Error"});
                },
                cache:false
            });
        },

        signup:(user, callback)=>{
            $.ajax({
                url:`${config.apiUrl}signup.php`,
                method:"POST",
                dataType:"json",
                data:{user:user},
                success:function(response){
                    console.log(response);
                    callback(response);
                },
                error:function(xhr, err){
                    console.log(xhr.responseText);
                    callback({text:"Internal Error"});
                },
                cache:false
            });
        }
    }

};
