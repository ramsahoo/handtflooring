import { initializeApp } from 'firebase/app';
import { getFirestore, collection, getDocs } from 'firebase/firestore/lite';
// Follow this pattern to import other Firebase services
// import { } from 'firebase/<service>';

// TODO: Replace the following with your app's Firebase project configuration
const firebaseConfig = {
    apiKey: "AIzaSyAf4JL0nk8I63Lv0XTOMI-7EyRoosFeEy4",
    authDomain: "h-and-t-flooring.firebaseapp.com",
    databaseURL: "https://h-and-t-flooring-default-rtdb.firebaseio.com",
    projectId: "h-and-t-flooring",
    storageBucket: "h-and-t-flooring.appspot.com",
    messagingSenderId: "604553209510",
    appId: "1:604553209510:web:9f4adf9069edba6a98f667",
    measurementId: "G-YG6500FRZ9"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Get a list of cities from your database
async function getCities(db) {
  const citiesCol = collection(db, 'cities');
  const citySnapshot = await getDocs(citiesCol);
  const cityList = citySnapshot.docs.map(doc => doc.data());
  return cityList;
}

