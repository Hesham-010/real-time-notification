import "./bootstrap";

Echo.channel("users." + userId).listen("UserRegistered", (e) => {
    console.log(e.message);
    console.log(e.user_name);
    console.log(e.user_email);
});
