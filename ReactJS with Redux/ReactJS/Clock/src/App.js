import './App.css';

function App() {
    let now = new Date().toLocaleTimeString();

    return (
        <div className='App'>
            <h1>Hello, world!</h1>
            <h2>It is {now}</h2>
        </div>
    );
}

export default App;
