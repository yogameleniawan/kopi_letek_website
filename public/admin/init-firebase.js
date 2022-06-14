import { initializeApp } from "firebase/app";
import { getStorage } from "firebase/storage";
import { getFirestore } from "firebase/firestore";

// Initialize Firebase with a "default" Firebase project
const defaultProject = initializeApp(firebaseConfig);

console.log(defaultProject.name);  // "[DEFAULT]"

// Option 1: Access Firebase services via the defaultProject variable
let defaultStorage = getStorage(defaultProject);
let defaultFirestore = getFirestore(defaultProject);

// Option 2: Access Firebase services using shorthand notation
defaultStorage = getStorage();
defaultFirestore = getFirestore();
