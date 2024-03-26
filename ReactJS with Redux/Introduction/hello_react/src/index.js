import React from 'react';  
import ReactDOM from 'react-dom/client';

const root = ReactDOM.createRoot(document.getElementById('root'));

const element = getGreeting();

function getGreeting(user) {
    if (user) {
        return <h1>Hello, {user}!</h1>;
    }
    return <h1>Hello, Stranger!</h1>;
}

root.render(element);