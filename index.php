<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
    case "login":
        login();
        break;
    case "loginerror":
        loginerror();
        break;
    case "authenticate":
        authenticate();
        break;
    case "userprofile":
        userProfile();
        break;
    case "adminprofile":
        adminProfile();
        break;
    case "editadminprofile":
        editAdminProfile();
        break;
    case "doeditadminprofile":
        doEditAdminProfile();
        break;
    case "logout":
        logout();
        break;
    case "updateimage":
        updateProfilePic();
        break;
    case "register":
        showRegister();
        break;
    case "doregister":
        register();
        break;  
    case "activate":
        activate();
        break;
    case "getresults":
        getResults();
        break;
    case "editprofile":
        editProfile();
        break;
    case "doeditprofile":
        doEditProfile();
        break;
    case "logincheck":
        logincheck();
        break;
    case "resetpassword":
        resetpassword();
        break;  
    case "resetpasswordrequest":
        resetpasswordrequest();
        break;
    case "doresetpasswordrequest":
        doresetpasswordrequest();
        break;
    case "doresetpassword":
        doresetpassword();
        break;
    case "edittest":
        editTest();
        break;
    case "doedittest":
        doEditTest();
        break;
    case "newtest":
        newTest();
        break;
    case "donewtest":
        doNewTest();
        break;
    case "deletetest":
        deleteTest();
        break;
    case "chat":
        chat();
        break;
    case "getmessages":
        getMessages();
        break;
    case "sendmessage":
        sendMessage();
        break;
    case "showsearchuser":
        showsearchuser();
        break;
    case "showsearchmanager":
        showsearchmanager();
        break;
    case "showsearchadmin":
        showsearchadmin();
        break;
    case "searchuser":
        searchuser();
        break;
    case "searchmanager":
        searchmanager();
        break;
    case "searchadmin":
        searchadmin();
        break;
    case "cgu":
        cgu();
    break;
    case "forum":
        forum();
    break;
    case "viewtopic":
        viewTopic();
    break;
    case "newtopic":
        newTopic();
    break;
    case "newpost":
        newPost();
    break;
    case "closetopic":
        closeTopic();
    break;

    }
    

}
else {
    homePage();
}