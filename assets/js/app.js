let path=window.location.origin;

Blog={
    list:function(){
        RestCalls(path+'/app/function.php?action=list-blogs');
    },
    search:function(){

    },
    update:function(){

    },
    post:function (){

    },
    delete:function (){
        
    }
}


Users={
    list:function(){
        RestCalls(path+'/app/function.php?action=list-users');
    },
    select:function(){

    }
}

Topics={
    list:function(){
        RestCalls(path+'/app/function.php?action=list-topics');
    }
}
function RestCalls(Myurl, error, f) {
    $.ajax({
        url: Myurl,
        method: "GET",
        headers: {"Accept": "application/json;"},
        async:true,
        success: function (data) {
            f(data)
        },
        error: function (data) {
            onError(data);
        }
    })
}

function postJson(endpointUri, payload,success=null,error=null) {
    $.ajax({
        url: endpointUri,
        type: "POST",
        data: JSON.stringify(payload),
        contentType: "application/json;",
        headers: {
            "Accept": "application/json;",
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(success){
                success(data)
            }else {
                onSuccess(data);
            }
        },
        error: function (data) {
            if(error){
                error(data);
            }else{
                onError(data);
            }
        }
    });
}

function onError(error) {
    alert(error.responseJSON.message)
    console.log(error);
}

function onSuccess(msg) {
    alert(msg);
}