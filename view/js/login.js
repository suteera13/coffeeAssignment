async function loginClick(){
    url = "http://localhost/coffeeAssignment/api/controls.php?ac=0";
    const checkUser = {
        user_name : document.getElementById("username").value,
        user_pass : document.getElementById("password").value
    };
    try{
        const response = await fetch(url,{
            method: "post",
            headers: {"Content-Type":"application/text"},
            body: JSON.stringify(checkUser)
        });
        if(!response.ok){
            const message = "Error with status code : "+ response.status;
            throw new Error(message);
        }
        const data = await response.text();
        console.log(data);
    }catch(er){
        console.log("Error : "+ er);
    }
}
async function signupClick(){
    const keypass = document.getElementById("password").value;
    const conpass = document.getElementById("confirm").value;
    if(keypass==conpass){
        url = "http://localhost/coffeeAssignment/api/controls.php?ac=1";
        const addUser = {
            user_name : document.getElementById("username").value,
            user_pass : document.getElementById("password").value
        };
        try{
            const response = await fetch(url,{
                method: "post",
                headers: {"Content-Type":"application/text"},
                body: JSON.stringify(addUser)
            });
            if(!response.ok){
                const message = "Error with status code : "+ response.status;
                throw new Error(message);
            }
            const data = await response.text();
            console.log(data);
        }catch(er){
            console.log("Error : "+ er);
        }
    }else{
        alert("The passwords do not match.");
    }
}