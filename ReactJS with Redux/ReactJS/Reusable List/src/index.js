import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import Comments from './Comments';

import Luffy from './assets/images/luffy.jpg';
import Zoro from './assets/images/zoro.jpg';
import Sanji from './assets/images/sanji.jpg';

let comments = [
    {image: Luffy , name: 'Monkey D. Luffy' , date: 'January 25, 2022 3:00 PM' , message: 'React is amazing!'},
    {image: Zoro , name: 'Roronoa Zoro' , date: 'January 25, 2022 3:30 PM' , message: 'This website is cool!'},
    {image: Sanji , name: 'Vinsmoke Sanji' , date: 'January 25, 2022 4:00 PM' , message: 'I love ReactJS!'},
]

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <div className="App">
        <Comments comments={comments}/>
    </div>
);
