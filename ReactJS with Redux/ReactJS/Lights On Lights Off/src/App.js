import './App.css';
import Light from './assets/images/Light.png';
import Dark from './assets/images/Dark.png';
import { useState } from 'react';

function App() {
  let [light , setLight] = useState(true);

  if(light){
    return (
      <div className="App">
        <img src={Light} alt="Light" />
        <button onClick={() => setLight(false)}>Off</button>
      </div>
    );
  }else{
    return (
      <div className="App">
        <img src={Dark} alt="Dark" />
        <button onClick={() => setLight(true)}>On</button>
      </div>
    );
  }
}

export default App;
