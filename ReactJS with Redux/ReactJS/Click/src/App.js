import './App.css';
import { useState } from 'react';

function App() {
  let [count , setCount] = useState(1)

  const addCount = () => {
    setCount(++count);
  }

  return (
    <div className="App">
			<button onClick={addCount}>Click me</button>
      <p>Total number of clicks: {count}</p>
		</div>
  );
}

export default App;
