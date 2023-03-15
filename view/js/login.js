async function loginClick(){
    url = "http://localhost/coffeeAssignment/api/control.php";
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