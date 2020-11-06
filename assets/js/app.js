let path=window.location.origin;

Blog={
    list:function(){
        RestCalls(path+'/app/function.php?action=list-blogs',function(data){alert('An error occurred getting posts.')},function(data){
            data=JSON.parse(data);
            let rows='';
            $.each(data,function(k,v){
                rows+=`
                    <tr>
                        <td>`+v.id+`</td>
                        <td>`+v.title+`</td>
                        <td>`+v.author+`</td>
                        <td><a href="#" class="edit">edit</a></td>
                        <td><a href="#" class="delete">delete</a></td>
                        <td><a href="#" class="publish">publish</a></td>
                    </tr>`;
            });
            $('#posts_table').html(rows);
        });
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
        RestCalls(path+'/app/function.php?action=list-users',function(data){alert('An error occurred')},function(data){
            data=JSON.parse(data);
            let rows='';
            $.each(data,function(k,v){
                rows+=`
                    <tr>
                        <td>`+v.id+`</td>
                        <td>`+v.username+`</td>
                        <td>`+isAdmin(v.admin)+`</td>
                        <td><a href="#" class="edit">edit</a></td>
                        <td><a href="#" class="delete">delete</a></td>
                    </tr>`;
            });
            $('#users-table').html(rows);
        });
    },
    select:function(){

    }
}

Topics={
    list:function(){
        RestCalls(path+'/app/function.php?action=list-topics',function(data){
            alert('Cannot retrieve topics at this time');
        },function(data){
            data=JSON.parse(data);
            let rows='';
            $.each(data,function(k,v){
                rows+=`
                    <tr>
                        <td>`+v.id+`</td>
                        <td>`+v.name+`</td>
                        <td><a href="#" class="edit">edit</a></td>
                        <td><a href="#" class="delete">delete</a></td>
                    </tr>`;
            });
            $('#topics-table').html(rows);
        });
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

function isAdmin(data){
    if(data==null){
        return 'User';
    }else{
        return "Admin";
    }
}