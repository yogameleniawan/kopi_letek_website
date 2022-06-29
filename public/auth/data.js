// import { getDatabase, ref, set } from "firebase/database";
// import { initializeApp } from 'firebase/app';
// import { getFirestore, collection, getDocs } from 'firebase/firestore/lite';
// import firebase from 'firebase/app'
 

// const database = getDatabase();
var firebaseConfig = {
    apiKey: "AIzaSyAOsK0bISQ1CujkpQku-GFZG1251qTUsUQ",
    authDomain: "report-7fb48.firebaseapp.com",
    projectId: "report-7fb48",
    storageBucket: "report-7fb48.appspot.com",
    messagingSenderId: "976211834871",
    appId: "1:976211834871:web:a80903f2f5ee06a7ac20f2",
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
//   import 'firebase/auth';    

// let's code 
var datab = firebase.database().ref('data');
function UserRegister(){
var email = document.getElementById('eemail').value;
var password = document.getElementById('lpassword').value;
firebase.auth().createUserWithEmailAndPassword(email,password).then(function(){
    
}).catch(function (error){
    var errorcode = error.code;
    var errormsg = error.message;
});
}
const auth = firebase.auth();
function SignIn(){
    var email = document.getElementById('eemail').value;
    var password = document.getElementById('lpassword').value;
    const promise = auth.signInWithEmailAndPassword(email,password);
    promise.catch( e => alert(e.msg));
    window.open("https://www.kopiletek.oprek.in","_self");
}
document.getElementById('form').addEventListener('submit', (e) => {
    e.preventDefault();
    var userInfo = datab.push();
    userInfo.set({
        name: getId('fname'),
        email : getId('eemail'),
        password : getId('lpassword')
    });
    alert("Successfully Signed Up");
    console.log("sent");
    document.getElementById('form').reset();
});
function  getId(id){
    return document.getElementById(id).value;
}